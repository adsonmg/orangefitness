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
     * This page is not visible for users with role other than admin
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
     * This function is used to retrieve a list of trainers that match with
     * a query made by our users.
     * 
     * TODO: work in the algorithm of rank and filters
     */
    public function search()
    {
        if($this->request->is('get')){
            
            $specilaty = $this->request->query('specialties');
            $city = $this->request->query('city');

            $this->paginate = [
                'contain' => ['Users', 'Specialties']
            ];
            $query = $this->Trainers->find('trainers',[
                'specialty_id' => $specilaty
            ]);
            
            $trainers = $this->paginate($query);
                        
            $this->set(compact('trainers', 'city'));
            $this->set('_serialize', ['trainers']);
        }
    }

    /**
     * View method
     * 
     * This method is the profile of a trainer
     *
     * @param string|null $id Trainer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $trainer = $this->Trainers->get($id, [
            'contain' => ['Users', 'Specialties', 'SocialMedias', 'Telephones', 'Certificates', 'Articles']
        ]);

        $this->set('trainer', $trainer);
        $this->set('_serialize', ['trainer']);
    }

    /**
     * Add method
     * 
     * First method called when we adding a trainer to our platform 
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('cake_layout');

       $trainer = $this->Trainers->newEntity();
        if ($this->request->is('post')) {
            $trainer = $this->Trainers->patchEntity($trainer, $this->request->data);
            
            //By setting the entity property with the session data,
            //we remove any possibility of the user modifying which user 
            $trainer->users_id = $this->Auth->user('id');
            
            $this->log($trainer->users_id);
            if ($this->Trainers->save($trainer)) {
                $this->Flash->success(__('The trainer has been saved.'));
                return $this->redirect(['action' => 'edit']);
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
     * Method called when to edit profile of a trainer
     *
     * @param string|null $id Trainer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('cake_layout');

        
        $trainer = $this->Trainers->get($id, [
            'contain' => ['Users', 'Specialties', 'SocialMedias', 'Telephones', 'Certificates', 'Articles', 'Degrees', 'Locations']
        ]);
                if ($this->request->is(['patch', 'post', 'put'])) {
            $trainer = $this->Trainers->patchEntity($trainer, $this->request->data);
            if ($this->Trainers->save($trainer)) {
                $this->Flash->success(__('The trainer has been saved.'));

                return $this->redirect(['action' => 'edit']);
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
     * TODO: A trainer should not be deleted from the database at once. Instead t should
     * be marked as bloqued when requested and then, after a couple of days, be
     * deleted from the db by our admins
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
    
    /**
     * By default access to trainer is denied. So we´ll 
     * incrementally grant access where it makes sense.
     * @param type $user
     */
    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        //view and add profile are alwayes allowed.
        if(in_array($action, ['view', 'add', 'search'])){
            return true;
        }
        
        //All other actions require an id.
        if(empty($this->request->params['pass'][0])){
            return false;
        }
        
        //check that the profile belongs to the current user.
        $id = $this->request->params['pass'][0];
        $trainer = $this->Trainers->get($id);
        if($trainer->users_id == $user['id']){
            return true;
        }
        
        parent::isAuthorized($user);
    }

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['view']);
    }
}
