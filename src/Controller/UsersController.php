<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cities', 'States']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Cities', 'States']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function register($role = null)
    {
        // Set the layout.
        $this->viewBuilder()->layout('cake_layout');
        
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            
            //Set role of the user
            if($role == 'trainer'){
                $user->role = 1;
            }
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $states = $this->Users->States->find('list', ['limit' => 200]);
        $this->set(compact('user', 'cities', 'states'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $states = $this->Users->States->find('list', ['limit' => 200]);
        $this->set(compact('user', 'cities', 'states'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Login method
     * @return type
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                
                //Get user's information
                $role = $this->Auth->user('role');
                $id = $this->Auth->user('id');
                
                 //Redirects user according to its role
                if($role == 1){
                    //Verifies if trainer exists
                    $this->loadModel('Trainers');
                    $profile = $this->Trainers->find('all')
                            ->where(['users_id =' => $id]);
                    
                    $profile = $profile->toArray();
                    if($profile != null){
                        //Trainer  exists
                        //Redirects to trainer's homepage
                        return $this->redirect(['controller' => 'Trainers', 'action' => 'edit', $profile[0]['id']]);
                    }else{
                        //Trainer doesn't  exist
                        //Creates one
                        return $this->redirect(['controller' => 'Trainers', 'action' => 'add']);
                    }
                    
                }
                //return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }
    
    /**
     * Login method
     * @return type
     */
    public function login1()
    {
        // Set the layout.
        $this->viewBuilder()->layout('cake_layout');
     
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                //Get user's information
                $role = $this->Auth->user('role');
                $id = $this->Auth->user('id');
                
                 //Redirects user according to its role
                if($role == 1){
                    //Verifies if trainer exists
                    $this->loadModel('Trainers');
                    $profile = $this->Trainers->find('all')
                            ->where(['users_id =' => $id]);
                    
                    $profile = $profile->toArray();
                    if($profile != null){
                        //Trainer  exists
                        //Redirects to trainer's homepage
                        return $this->redirect(['controller' => 'Trainers', 'action' => 'edit', $profile[0]['id']]);
                    }else{
                        //Trainer doesn't  exist
                        //Creates one
                        return $this->redirect(['controller' => 'Trainers', 'action' => 'add']);
                    }
                    
                }
                //return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }
    
    /**
     * Logout method
     * @return type
     */
    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
    
    /**
     * Allows access methods without login
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout', 'register', 'login1']);
        //$this->viewBuilder()->layout('cake_layout');
    }

}
