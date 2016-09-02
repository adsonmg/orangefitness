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
            'contain' => ['Trainers']
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

        return $this->redirect(['action' => 'index']);
    }
    
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('cake_layout');
    }
}
