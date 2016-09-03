<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SocialMedias Controller
 *
 * @property \App\Model\Table\SocialMediasTable $SocialMedias
 */
class SocialMediasController extends AppController
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
        $socialMedias = $this->paginate($this->SocialMedias);

        $this->set(compact('socialMedias'));
        $this->set('_serialize', ['socialMedias']);
    }

    /**
     * View method
     *
     * @param string|null $id Social Media id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $socialMedia = $this->SocialMedias->get($id, [
            'contain' => ['Trainers']
        ]);

        $this->set('socialMedia', $socialMedia);
        $this->set('_serialize', ['socialMedia']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $socialMedia = $this->SocialMedias->newEntity();
        if ($this->request->is('post')) {
            $socialMedia = $this->SocialMedias->patchEntity($socialMedia, $this->request->data);
            
            //Set trainer id
            $id = $this->Auth->user('id');
            $this->loadModel('Trainers');
            $profile = $this->Trainers->find('trainer', ['users_id' => $id])
                    ->first()
                    ->toArray();
            $socialMedia->trainers_id = $profile['id'];
            
            if ($this->SocialMedias->save($socialMedia)) {
                $this->Flash->success(__('The social media has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The social media could not be saved. Please, try again.'));
            }
        }
        $trainers = $this->SocialMedias->Trainers->find('list', ['limit' => 200]);
        $this->set(compact('socialMedia', 'trainers'));
        $this->set('_serialize', ['socialMedia']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Social Media id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $socialMedia = $this->SocialMedias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $socialMedia = $this->SocialMedias->patchEntity($socialMedia, $this->request->data);
            
            //Set trainer id
            $id = $this->Auth->user('id');
            $this->loadModel('Trainers');
            $profile = $this->Trainers->find('trainer', ['users_id' => $id])
                    ->first()
                    ->toArray();
            $socialMedia->trainers_id = $profile['id'];
            
            if ($this->SocialMedias->save($socialMedia)) {
                $this->Flash->success(__('The social media has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The social media could not be saved. Please, try again.'));
            }
        }
        $trainers = $this->SocialMedias->Trainers->find('list', ['limit' => 200]);
        $this->set(compact('socialMedia', 'trainers'));
        $this->set('_serialize', ['socialMedia']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Social Media id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $socialMedia = $this->SocialMedias->get($id);
        if ($this->SocialMedias->delete($socialMedia)) {
            $this->Flash->success(__('The social media has been deleted.'));
        } else {
            $this->Flash->error(__('The social media could not be deleted. Please, try again.'));
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
            $socialMediaID = (int) $this->request->params['pass'][0];
            if ($this->SocialMedias->isOwnedBy($socialMediaID, $user['id'])) {
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
