<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Client;
use Cake\Mailer\Mailer;

/**
 * Filters Controller
 *
 * @property \App\Model\Table\FiltersTable $Filters
 * @method \App\Model\Entity\Filter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FiltersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel('FilterDetails');
        $findOpts = [
            'conditions' => [
                'Filters.user_id' => $this->request->getAttribute('identity')->id,
                'Filters.removed'           => 0
            ]
        ];
        
        $filters = $this->Filters->find('list', $findOpts)->limit(50)->all();
        $this->paginate = [
            'limit' => '100',
            'order' => ['FilterDetails.created' => 'DESC'],
            'conditions' => [
                'Filters.user_id' => $this->request->getAttribute('identity')->id,
                'Filters.removed' => 0,
                'FilterDetails.removed'           => 0
            ],
            'contain' => ['Filters'],
        ];
        $filterCounter = [];
        foreach($filters as $filter_id => $filter_name){
            $filterCounter[$filter_id] = $this->FilterDetails->find('all', [
                'conditions' => [
                    'Filters.id'                     => $filter_id,
                    'Filters.user_id'                       => $this->request->getAttribute('identity')->id,
                    'Filters.removed'                       => 0,
                    'FilterDetails.notification_status'     => 0
                ],
                'contain' => [
                    'Filters'
                ]
            ])->count();
        }
        $homeTabFilters = $this->paginate($this->FilterDetails);
        $this->set(compact('filters', 'homeTabFilters', 'filterCounter'));
    }
        
    /**
     * ajaxFilterDetailListById
     *
     * @return void
     */
    public function ajaxFilterDetailListByFilterId(){
        $this->loadModel('FilterDetails');
        if($this->request->is('ajax')){
			$filter_id   = $this->request->getData('filter_id');
            if($filter_id == "home" || $filter_id == "pri" || $filter_id == "fav" || $filter_id == "trash"){
                if($filter_id == "pri"){
                    $conditions = [
                        'Filters.user_id'           => $this->request->getAttribute('identity')->id,
                        'Filters.priority'          => 1,
                        'FilterDetails.removed'           => 0,
                    ];
                }
                if($filter_id == "fav"){
                    $conditions = [
                        'Filters.user_id'           => $this->request->getAttribute('identity')->id,
                        'FilterDetails.favourite'   => 1,
                        'FilterDetails.removed'           => 0,
                    ];
                }
                if($filter_id == "home"){
                    $conditions = [
                        'Filters.user_id'           => $this->request->getAttribute('identity')->id,
                        'FilterDetails.removed'           => 0,
                    ];
                }
                if($filter_id == "trash"){
                    $conditions = [
                        'Filters.user_id'           => $this->request->getAttribute('identity')->id,
                        'FilterDetails.removed'           => 1,
                    ];
                }
            }else{
                $conditions = [
                    'Filters.user_id'           => $this->request->getAttribute('identity')->id,
                    'FilterDetails.filter_id'   => $filter_id,
                    'FilterDetails.removed'           => 0,
                ];
            }
            $conditions['Filters.removed'] = 0;
            
            $this->paginate = [
                'limit' => '100',
                'order' => ['FilterDetails.created' => 'DESC'],
                'conditions' => $conditions,
                'contain' => ['Filters'],
            ];
            $currentfilters = $this->paginate($this->FilterDetails);
            $this->set(compact('currentfilters'));
        } else {
            //echo "100"; # Niezgodne wywołanie metody
        }
    }
    /**
     * View method
     *
     * @param string|null $id Filter id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $filter = $this->Filters->get($id, [
            'contain' => ['Users', 'FilterDetails'],
        ]);

        $this->set(compact('filter'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $filter = $this->Filters->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $data = $this->request->getData();
            $data['user_id']        = $this->request->getAttribute('identity')->id;
            $data['notification']   = 1;
            $data['removed']        = 0;
            $data['status']         = 1;
            $data['priority']       = 0;
            $data['private_tab']    = 1;
            $filter = $this->Filters->patchEntity($filter, $data);
            if ($this->Filters->save($filter)) {
                $this->Flash->success(__('The filter has been saved.'));
            }else{
                $this->Flash->error(__('The filter could not be saved. Please, try again.'.json_encode($filter->getErrors())));
            }
            $this->viewBuilder()->setLayout('ajax');
            $this->render('/layout/ajax_response');
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Filter id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $filter = $this->Filters->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $filter = $this->Filters->patchEntity($filter, $this->request->getData());
            if ($this->Filters->save($filter)) {
                $this->Flash->success(__('The filter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The filter could not be saved. Please, try again.'));
        }
        $users = $this->Filters->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('filter', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Filter id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $filter = $this->Filters->get($id);
        if ($this->Filters->delete($filter)) {
            $this->Flash->success(__('The filter has been deleted.'));
        } else {
            $this->Flash->error(__('The filter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * getFiltersByPortal
     *
     * @param  mixed $portal
     * @return void
     */
    public function getFiltersByPortal($portal = 'olx') {
        $this->autoRender = false;
	    $http = new Client();
        $this->loadModel('Filters');
        $this->loadModel('FilterDetails');
        $filters = $this->Filters->find('all', [
            'conditions' => [
                'Filters.link LIKE'	=> "%{$portal}%", 
                'Filters.status'	=> '1',
            ], 
                'fields'	=> ['Filters.id', 'Filters.link', 'Filters.title', 'Filters.user_id', 'MyUsers.email'], 
                'order'	=> 'Filters.id ASC',
                'limit' => 10,
                'contain' => ['MyUsers']
            ]);
        foreach ($filters as $filter){
            $linkTmp = $this->checkPortalURL($this->unicodes($filter->link));
            $response = $http->put('http://192.168.0.179:3132/api/getJsonProductList', json_encode(['link' => $linkTmp]), ['type' => 'json']);
            $items = $response->getJson();
            // debug($items);
            $itemsTmp = [];
            foreach($items as $k => $item) {
                $exists = $this->FilterDetails->exists(['filter_id' => $filter->id, 'ad_id_out' => $item['ad_id']]);
                if ($exists !== true) {
                    $itemsTmp[$k] = $item;
                    $itemsTmp[$k]['ad_title']       = trim($itemsTmp[$k]['ad_title']);
                    $itemsTmp[$k]['ad_price']       = floatval(str_replace(" ", "", $itemsTmp[$k]['ad_price']));
                    $itemsTmp[$k]['filter_id']      = $filter->id;
                    $itemsTmp[$k]['ad_id_out']      = $item['ad_id'];
                    $itemsTmp[$k]['ad_img']         = $item['ad_img_src'];
                    $itemsTmp[$k]['view_status']    = 0;
                    $itemsTmp[$k]['removed']        = 0;
                    $itemsTmp[$k]['favourite']      = 0;
                    $itemsTmp[$k]['ad_pro']         = (isset($item['ad_promoted']) && $item['ad_promoted'])? true: false;
                }
            }
            $entities = $this->FilterDetails->newEntities($itemsTmp);
            
            foreach ($entities as $entity) {
                if($this->FilterDetails->save($entity)){
                    //echo "OPK";
                }else{
                    debug($entity->getErrors());
                    //echo "noOPK";
                }
            }

            if($itemsTmp){
                $subject = 'Nowa oferta w Twoim wyszukiwaniu: ';
                if(count($itemsTmp) > 1) {$subject = 'Nowe oferty w Twoim wyszukiwaniu: '; }
                $mailer = new Mailer('default');
                $mailer
                ->setTo([$filter->my_user->email])
                // ->setBcc(['krzysztof@3ck.pl'])
                ->setEmailFormat('html')
                ->setSubject($subject. ': '.$filter->title)
                ->viewBuilder()
                ->setTemplate('notification');
                $mailer->setViewVars(['items' => $itemsTmp, 'user' => $filter->my_user]);
                if($mailer->deliver()){
                    
                }else{
                
                }
            }
        }
    }
    public function ajaxAddToTrash(){
        $this->autoRender = false;
        if($this->request->is('ajax')){
            $filter_id   = $this->request->getData('filter_id');
            $filter = $this->Filters->get($filter_id);
            $data['removed'] = ($filter->removed == 1)? 0:1;
            $filter = $this->Filters->patchEntity($filter, $data);
            if ($this->Filters->save($filter)) {
                echo "200";
            }else{
                echo "100";
            }
        } else {
            echo "100";
        }
    }
}
