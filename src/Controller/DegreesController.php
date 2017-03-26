<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Degrees Controller
 *
 * @property \App\Model\Table\DegreesTable $Degrees
 */
class DegreesController extends AppController
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
        $degrees = $this->paginate($this->Degrees);

        $this->set(compact('degrees'));
        $this->set('_serialize', ['degrees']);
    }

    /**
     * View method
     *
     * @param string|null $id Degree id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $degree = $this->Degrees->get($id, [
            'contain' => ['Trainers']
        ]);

        $this->set('degree', $degree);
        $this->set('_serialize', ['degree']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //Use autorender to avoid missing template error
        $this->viewBuilder()->layout('ajax');
        
        
        $degree = $this->Degrees->newEntity();
        if ($this->request->is('post')) {
            $degree = $this->Degrees->patchEntity($degree, $this->request->data);
            
             if ($this->Degrees->save($degree)) {
                $trainers = $this->Degrees->Trainers->find('list');
                $this->set(compact('degree', 'trainers'));
                $this->set('_serialize', ['degree']);
             }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Degree id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        //Use autorender to avoid missing template error
        $this->viewBuilder()->layout('ajax');
       
        if ($this->request->is(['patch', 'post', 'put'])) {
            
    
            
            $id = $this->request->data['id'];
           
           
            $degrees = TableRegistry::get('Degrees');
            $degree = $degrees->get($id); // Return article with id = $id (primary_key of row which need to get updated)
            $degree->instituition = $this->request->data['instituition'];
            $degree->course = $this->request->data['course'];
            $degree->duration = $this->request->data['duration'];
            $degree->description = $this->request->data['description'];
            if($degrees->save($degree)){
              // saved
            } else {
              // something went wrong
            }
            
            
            $trainers = $this->Degrees->Trainers->find('list', ['limit' => 200]);
            $this->set(compact('degree', 'trainers'));
            $this->set('_serialize', ['degree']);
        }
        
        
        
    }

    /**
     * Delete method
     *
     * @param string|null $id Degree id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        //Use autorender to avoid missing template error
        $this->viewBuilder()->layout('ajax');
       if ($this->request->is(['post'])) {
            $id = $this->request->data['id'];
            $this->request->allowMethod(['post', 'delete']);
            $degree = $this->Degrees->get($id);
            if ($this->Degrees->delete($degree)) {
                //$this->Flash->success(__('The degree has been deleted.'));
            } else {
                //$this->Flash->error(__('The degree could not be deleted. Please, try again.'));
            }
       }

    }
    
    /**
     * Allows access methods without login
     */
    public function initialize()
    {
        // Set the layout.
        $this->viewBuilder()->layout('cake_layout');
        
        parent::initialize();
        $this->Auth->allow(['index', 'view', 'add', 'edit', 'degree', 'delete']);
        //$this->viewBuilder()->layout('cake_layout');
    
      
        $this->loadComponent('RequestHandler');

    }
    
    /**
     * Source: https://book.cakephp.org/3.0/en/controllers/components/request-handling.html
     * Source: http://stackoverflow.com/questions/32078051/cakephp-3-json-render-view-not-working
     * @param Event $event
     */
    public function beforeRender(Event $event)
    {
        $this->RequestHandler->renderAs($this, 'json');
        $this->response->type('application/json');
        $this->set('_serialize', true);
        
    }
}
