<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Specialties Controller
 *
 * @property \App\Model\Table\SpecialtiesTable $Specialties
 */
class SpecialtiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $specialties = $this->paginate($this->Specialties);

        $this->set(compact('specialties'));
        $this->set('_serialize', ['specialties']);
    }

    /**
     * View method
     *
     * @param string|null $id Specialty id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $specialty = $this->Specialties->get($id, [
            'contain' => ['Trainers']
        ]);

        $this->set('specialty', $specialty);
        $this->set('_serialize', ['specialty']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $specialty = $this->Specialties->newEntity();
        if ($this->request->is('post')) {
            $specialty = $this->Specialties->patchEntity($specialty, $this->request->data);
            if ($this->Specialties->save($specialty)) {
                $this->Flash->success(__('The specialty has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The specialty could not be saved. Please, try again.'));
            }
        }
        $trainers = $this->Specialties->Trainers->find('list', ['limit' => 200]);
        $this->set(compact('specialty', 'trainers'));
        $this->set('_serialize', ['specialty']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Specialty id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $specialty = $this->Specialties->get($id, [
            'contain' => ['Trainers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $specialty = $this->Specialties->patchEntity($specialty, $this->request->data);
            if ($this->Specialties->save($specialty)) {
                $this->Flash->success(__('The specialty has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The specialty could not be saved. Please, try again.'));
            }
        }
        $trainers = $this->Specialties->Trainers->find('list', ['limit' => 200]);
        $this->set(compact('specialty', 'trainers'));
        $this->set('_serialize', ['specialty']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Specialty id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $specialty = $this->Specialties->get($id);
        if ($this->Specialties->delete($specialty)) {
            $this->Flash->success(__('The specialty has been deleted.'));
        } else {
            $this->Flash->error(__('The specialty could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
