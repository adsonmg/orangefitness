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
            'contain' => ['Trainers'],
            'conditions' => [
                   'Trainers.users_id' => $this->Auth->user('id'),
            ]
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
            
            //Set trainer id
            $id = $this->Auth->user('id');
            $this->loadModel('Trainers');
            $profile = $this->Trainers->find('trainer', ['users_id' => $id])
                    ->first()
                    ->toArray();
            $certificate->trainers_id = $profile['id'];
            
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
            
            //Set trainer id
            $id = $this->Auth->user('id');
            $this->loadModel('Trainers');
            $profile = $this->Trainers->find('trainer', ['users_id' => $id])
                    ->first()
                    ->toArray();
            $certificate->trainers_id = $profile['id'];
            
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

        return $this->redirect($this->referer());
    }
    
    
    /**
     * By default access to trainer is denied. So we´ll 
     * incrementally grant access where it makes sense.
     * @param type $user
     */
    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        //view and add profile are alwayes allowed.
        if(in_array($action, ['index', 'add'])){
            return true;
        }
        
        //All other actions require an id.
        if(empty($this->request->params['pass'][0])){
            return false;
        }
        
        // Only the owner of an profile can edit and delete information
        if (in_array($this->request->action, ['edit', 'delete'])) {
            $certificateID = (int) $this->request->params['pass'][0];
            if ($this->Certificates->isOwnedBy($certificateID, $user['id'])) {
                return true;
            }
        }
        
        parent::isAuthorized($user);
    }
    
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('cake_layout');
    }
}
