<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Telephones Controller
 *
 * @property \App\Model\Table\TelephonesTable $Telephones
 */
class TelephonesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Trainers']
        ];
        $telephones = $this->paginate($this->Telephones);

        $this->set(compact('telephones'));
        $this->set('_serialize', ['telephones']);
    }

    /**
     * View method
     *
     * @param string|null $id Telephone id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $telephone = $this->Telephones->get($id, [
            'contain' => ['Trainers']
        ]);

        $this->set('telephone', $telephone);
        $this->set('_serialize', ['telephone']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $telephone = $this->Telephones->newEntity();
        if ($this->request->is('post')) {
            $telephone = $this->Telephones->patchEntity($telephone, $this->request->data);
            if ($this->Telephones->save($telephone)) {
                $this->Flash->success(__('The telephone has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The telephone could not be saved. Please, try again.'));
            }
        }
        $trainers = $this->Telephones->Trainers->find('list', ['limit' => 200]);
        $this->set(compact('telephone', 'trainers'));
        $this->set('_serialize', ['telephone']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Telephone id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $telephone = $this->Telephones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $telephone = $this->Telephones->patchEntity($telephone, $this->request->data);
            if ($this->Telephones->save($telephone)) {
                $this->Flash->success(__('The telephone has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The telephone could not be saved. Please, try again.'));
            }
        }
        $trainers = $this->Telephones->Trainers->find('list', ['limit' => 200]);
        $this->set(compact('telephone', 'trainers'));
        $this->set('_serialize', ['telephone']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Telephone id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $telephone = $this->Telephones->get($id);
        if ($this->Telephones->delete($telephone)) {
            $this->Flash->success(__('The telephone has been deleted.'));
        } else {
            $this->Flash->error(__('The telephone could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('cake_layout');
    }
}
