<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * UserProfiles Controller
 *
 * @property \App\Model\Table\UserProfilesTable $UserProfiles
 * @method \App\Model\Entity\UserProfile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserProfilesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $userProfiles = $this->paginate($this->UserProfiles);

        $this->set(compact('userProfiles'));
    }

    /**
     * View method
     *
     * @param string|null $id User Profile id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userProfile = $this->UserProfiles->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('userProfile'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userProfile = $this->UserProfiles->newEmptyEntity();
        if ($this->request->is('post')) {
            $userProfile = $this->UserProfiles->patchEntity($userProfile, $this->request->getData());
            if ($this->UserProfiles->save($userProfile)) {
                $this->Flash->success(__('The user profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user profile could not be saved. Please, try again.'));
        }
        $users = $this->UserProfiles->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('userProfile', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Profile id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userProfile = $this->UserProfiles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userProfile = $this->UserProfiles->patchEntity($userProfile, $this->request->getData());
            if ($this->UserProfiles->save($userProfile)) {
                $this->Flash->success(__('The user profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user profile could not be saved. Please, try again.'));
        }
        $users = $this->UserProfiles->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('userProfile', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Profile id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userProfile = $this->UserProfiles->get($id);
        if ($this->UserProfiles->delete($userProfile)) {
            $this->Flash->success(__('The user profile has been deleted.'));
        } else {
            $this->Flash->error(__('The user profile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
