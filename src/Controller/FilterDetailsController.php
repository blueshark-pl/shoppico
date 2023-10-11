<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FilterDetails Controller
 *
 * @property \App\Model\Table\FilterDetailsTable $FilterDetails
 * @method \App\Model\Entity\FilterDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilterDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Filters'],
        ];
        $filterDetails = $this->paginate($this->FilterDetails);

        $this->set(compact('filterDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Filter Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $filterDetail = $this->FilterDetails->get($id, [
            'contain' => ['Filters'],
        ]);

        $this->set(compact('filterDetail'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $filterDetail = $this->FilterDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $filterDetail = $this->FilterDetails->patchEntity($filterDetail, $this->request->getData());
            if ($this->FilterDetails->save($filterDetail)) {
                $this->Flash->success(__('The filter detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The filter detail could not be saved. Please, try again.'));
        }
        $filters = $this->FilterDetails->Filters->find('list', ['limit' => 200])->all();
        $this->set(compact('filterDetail', 'filters'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Filter Detail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $filterDetail = $this->FilterDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $filterDetail = $this->FilterDetails->patchEntity($filterDetail, $this->request->getData());
            if ($this->FilterDetails->save($filterDetail)) {
                $this->Flash->success(__('The filter detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The filter detail could not be saved. Please, try again.'));
        }
        $filters = $this->FilterDetails->Filters->find('list', ['limit' => 200])->all();
        $this->set(compact('filterDetail', 'filters'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Filter Detail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $filterDetail = $this->FilterDetails->get($id);
        if ($this->FilterDetails->delete($filterDetail)) {
            $this->Flash->success(__('The filter detail has been deleted.'));
        } else {
            $this->Flash->error(__('The filter detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * ajaxAddToFavourite
     *
     * @return void
     */
    public function ajaxAddToFavourite(){
        $this->autoRender = false;
        if($this->request->is('ajax')){
            $filter_detail_id   = $this->request->getData('filter_detail_id');
            $filterDetail = $this->FilterDetails->get($filter_detail_id, [
                'contain' => [],
            ]);
            $data['favourite'] = ($filterDetail->favourite == 1)? 0:1;
            $filterDetail = $this->FilterDetails->patchEntity($filterDetail, $data);
            if ($this->FilterDetails->save($filterDetail)) {
                echo "20".$data['favourite'];
            }else{
                echo "100";
            }
        } else {
            echo "100";
        }
    }    
    /**
     * ajaxToTrash
     *
     * @return void
     */
    public function ajaxAddToTrash(){
        $this->autoRender = false;
        if($this->request->is('ajax')){
            $filter_detail_id   = $this->request->getData('filter_detail_id');
            $filterDetail = $this->FilterDetails->get($filter_detail_id, [
                'contain' => [],
            ]);
            $data['removed'] = ($filterDetail->removed == 1)? 0:1;
            $filterDetail = $this->FilterDetails->patchEntity($filterDetail, $data);
            if ($this->FilterDetails->save($filterDetail)) {
                echo "200";
            }else{
                echo "100";
            }
        } else {
            echo "100";
        }
    }
}
