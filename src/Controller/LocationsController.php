<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Locations Controller
 *
 * @property \App\Model\Table\LocationsTable $Locations
 */
class LocationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        //Use autorender to avoid missing template error
        $this->viewBuilder()->layout('ajax');

        $this->paginate = [
            'contain' => ['Trainers']
        ];
        $locations = $this->paginate($this->Locations);

        $this->set(compact('locations'));
        $this->set('_serialize', ['locations']);
    }

    /**
     * View method
     *
     * @param string|null $id Location id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $location = $this->Locations->get($id, [
            'contain' => ['Trainers']
        ]);

        $this->set('location', $location);
        $this->set('_serialize', ['location']);
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
        
        $location = $this->Locations->newEntity();
        if ($this->request->is('post')) {
            $location = $this->Locations->patchEntity($location, $this->request->data);
            
            if ($this->Locations->save($location)) {
                $trainers = $this->Locations->Trainers->find('list');
                $this->set(compact('location', 'trainers'));
                $this->set('_serialize', ['location']);

            } 
        }
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Location id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        //Update data cake source: http://stackoverflow.com/questions/30218488/update-only-one-field-on-cakephp-3
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $id = $this->request->data['id'];
            $newLocation = $this->request->data['location'];
           
            $locations = TableRegistry::get('Locations');
            $location = $locations->get($id); // Return article with id = $id (primary_key of row which need to get updated)
            $location->location = $newLocation;
            if($locations->save($location)){
              // saved
            } else {
              // something went wrong
            }
            $this->set(compact('location', 'trainers'));
            $this->set('_serialize', ['location']);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Location id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        if ($this->request->is(['post'])) {
            $id = $this->request->data['id'];
            $this->request->allowMethod(['post', 'delete']);
            $location = $this->Locations->get($id);
            if ($this->Locations->delete($location)) {
                //$this->Flash->success(__('The location has been deleted.'));
            } else {
                //$this->Flash->error(__('The location could not be deleted. Please, try again.'));
            }
         }

        //return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Allows access methods without login
     */
    public function initialize()
    {
        // Set the layout.
        $this->viewBuilder()->layout('cake_layout');
        
        parent::initialize();
        $this->Auth->allow(['index', 'view', 'add', 'edit', 'delete']);
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
