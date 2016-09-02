<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Trainers Controller
 *
 * @property \App\Model\Table\TrainersTable $Trainers
 */
class TrainersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $trainers = $this->paginate($this->Trainers);

        $this->set(compact('trainers'));
        $this->set('_serialize', ['trainers']);
    }

    /**
     * View method
     *
     * @param string|null $id Trainer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trainer = $this->Trainers->get($id, [
            'contain' => ['Users', 'Specialties']
        ]);

        $this->set('trainer', $trainer);
        $this->set('_serialize', ['trainer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
       $trainer = $this->Trainers->newEntity();
        if ($this->request->is('post')) {
            $trainer = $this->Trainers->patchEntity($trainer, $this->request->data);
            
            //By setting the entity property with the session data,
            //we remove any possibility of the user modifying which user 
            $trainer->users_id = $this->Auth->user('id');
            
            $this->log($trainer->users_id);
            if ($this->Trainers->save($trainer)) {
                $this->Flash->success(__('The trainer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The trainer could not be saved. Please, try again.'));
            }
        }
        $users = $this->Trainers->Users->find('list', ['limit' => 200]);
        $specialties = $this->Trainers->Specialties->find('list', ['limit' => 200]);
        $this->set(compact('trainer', 'users', 'specialties'));
        $this->set('_serialize', ['trainer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Trainer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trainer = $this->Trainers->get($id, [
            'contain' => ['Specialties']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trainer = $this->Trainers->patchEntity($trainer, $this->request->data);
            if ($this->Trainers->save($trainer)) {
                $this->Flash->success(__('The trainer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The trainer could not be saved. Please, try again.'));
            }
        }
        $users = $this->Trainers->Users->find('list', ['limit' => 200]);
        $specialties = $this->Trainers->Specialties->find('list', ['limit' => 200]);
        $this->set(compact('trainer', 'users', 'specialties'));
        $this->set('_serialize', ['trainer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Trainer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trainer = $this->Trainers->get($id);
        if ($this->Trainers->delete($trainer)) {
            $this->Flash->success(__('The trainer has been deleted.'));
        } else {
            $this->Flash->error(__('The trainer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
     public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('cake_layout');
    }
}