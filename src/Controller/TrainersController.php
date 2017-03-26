<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


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
            'contain' => ['Users', 'Specialties', 'SocialMedias', 'Telephones', 'Certificates', 'Articles', 'Degrees', 'Locations', 'Users.Cities', 'Users.States']
        ]);
        
        //debug($trainer);
                
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
            //we remove any possibility of the user to access another user data
            $trainer->users_id = $this->Auth->user('id');
            
            if ($this->Trainers->save($trainer)) {
                $this->Flash->success(__('The trainer has been saved.'));
                //Get id of trainer just added and redirects to edit page
                return $this->redirect(['action' => 'edit', $trainer->id]);
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
        
        $trainer = $this->Trainers->get($id, [
            'contain' => ['Users', 'Specialties', 'SocialMedias', 'Telephones', 'Certificates', 'Articles', 'Degrees', 'Locations', 'Users.Cities', 'Users.States']
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
        
        //notMatching excludes specialties already taken 
        //by the trainer
        $specialties = $this->Trainers->Specialties
                ->find('all')
                ->notMatching('TrainersSpecialties', function ($q) use ($trainer) {
                    return $q->where(['trainer_id' => $trainer->id]);
                });
                
        $this->set(compact('trainer', 'users', 'specialties'));
        $this->set('_serialize', ['trainer', 'specialties']);
    }
    
    public function editBio(){
        
        $this->RequestHandler->renderAs($this, 'json');
        $this->response->type('application/json');
        $this->set('_serialize', true);
        
        //Use autorender to avoid missing template error
        $this->viewBuilder()->layout('ajax');
        
        if ($this->request->is('post')) {
            $id = $this->request->data['users_id'];
            $newBio = $this->request->data['bio'];
            
            $trainer = $this->Trainers->get($id);
            $trainer->bio = $newBio;
            
            if ($this->Trainers->save($trainer)){
              // saved
            } else {
              // something went wrong
            }
              
            $this->set(compact('trainer'));
            $this->set('_serialize', ['trainer']);
            
        }
        
        
    }
    
    public function addSpecialty(){
        
        $this->RequestHandler->renderAs($this, 'json');
        $this->response->type('application/json');
        $this->set('_serialize', true);
        
        //Use autorender to avoid missing template error
        $this->viewBuilder()->layout('ajax');
        
        if ($this->request->is('post')) {
            
            $this->loadModel('Specialties');
            
            $trainer = $this->Trainers->get($this->request->data['trainer_id']);
            $specialty = $this->Specialties->get($this->request->data['specialty_id']);

//            Often you’ll find yourself wanting to make an association between two existing entities,
//            eg. a user coauthoring an article. This is done by using the method link()
            $this->Trainers->Specialties->link($trainer, [$specialty]);
            
            $this->set(compact('trainer'));
            $this->set('_serialize', ['trainer']);
        }
    
    }
    
    public function deleteSpecialty(){
        
        $this->RequestHandler->renderAs($this, 'json');
        $this->response->type('application/json');
        $this->set('_serialize', true);
        
        //Use autorender to avoid missing template error
        $this->viewBuilder()->layout('ajax');
        
        if ($this->request->is('post')) {
            
            $this->loadModel('Specialties');
            
            $trainer = $this->Trainers->get($this->request->data['trainer_id']);
            $specialty = $this->Specialties->get($this->request->data['specialty_id']);

//            Often you’ll find yourself wanting to make an association between two existing entities,
//            eg. a user coauthoring an article. This is done by using the method link()
            $this->Trainers->Specialties->unlink($trainer, [$specialty]);
            
            
        }
    
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
        $this->Auth->allow(['view', 'editBio', 'addSpecialty', 'deleteSpecialty']);
        $this->loadComponent('RequestHandler');

    }
    
}
