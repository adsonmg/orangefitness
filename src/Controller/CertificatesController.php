<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Certificates Controller
 *
 * @property \App\Model\Table\CertificatesTable $Certificates
 */
class CertificatesController extends AppController
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
        $certificates = $this->paginate($this->Certificates);

        $this->set(compact('certificates'));
        $this->set('_serialize', ['certificates']);
    }

    /**
     * View method
     *
     * @param string|null $id Certificate id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $certificate = $this->Certificates->get($id, [
            'contain' => ['Trainers']
        ]);

        $this->set('certificate', $certificate);
        $this->set('_serialize', ['certificate']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $certificate = $this->Certificates->newEntity();
        if ($this->request->is('post')) {
            $certificate = $this->Certificates->patchEntity($certificate, $this->request->data);
            if ($this->Certificates->save($certificate)) {
                $this->Flash->success(__('The certificate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The certificate could not be saved. Please, try again.'));
            }
        }
        $trainers = $this->Certificates->Trainers->find('list', ['limit' => 200]);
        $this->set(compact('certificate', 'trainers'));
        $this->set('_serialize', ['certificate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Certificate id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $certificate = $this->Certificates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $certificate = $this->Certificates->patchEntity($certificate, $this->request->data);
            if ($this->Certificates->save($certificate)) {
                $this->Flash->success(__('The certificate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The certificate could not be saved. Please, try again.'));
            }
        }
        $trainers = $this->Certificates->Trainers->find('list', ['limit' => 200]);
        $this->set(compact('certificate', 'trainers'));
        $this->set('_serialize', ['certificate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Certificate id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $certificate = $this->Certificates->get($id);
        if ($this->Certificates->delete($certificate)) {
            $this->Flash->success(__('The certificate has been deleted.'));
        } else {
            $this->Flash->error(__('The certificate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('cake_layout');
    }
}
