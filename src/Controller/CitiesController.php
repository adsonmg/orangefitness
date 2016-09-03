<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cities Controller
 *
 * @property \App\Model\Table\CitiesTable $Cities
 */
class CitiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $cities = $this->paginate($this->Cities);

        $this->set(compact('cities'));
        $this->set('_serialize', ['cities']);
    }

    /**
     * View method
     *
     * @param string|null $id City id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $city = $this->Cities->get($id, [
            'contain' => []
        ]);

        $this->set('city', $city);
        $this->set('_serialize', ['city']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $city = $this->Cities->newEntity();
        if ($this->request->is('post')) {
            $city = $this->Cities->patchEntity($city, $this->request->data);
            if ($this->Cities->save($city)) {
                $this->Flash->success(__('The city has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The city could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('city'));
        $this->set('_serialize', ['city']);
    }

    /**
     * Edit method
     *
     * @param string|null $id City id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $city = $this->Cities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $city = $this->Cities->patchEntity($city, $this->request->data);
            if ($this->Cities->save($city)) {
                $this->Flash->success(__('The city has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The city could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('city'));
        $this->set('_serialize', ['city']);
    }

    /**
     * Delete method
     *
     * @param string|null $id City id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $city = $this->Cities->get($id);
        if ($this->Cities->delete($city)) {
            $this->Flash->success(__('The city has been deleted.'));
        } else {
            $this->Flash->error(__('The city could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Cities method
     *
     * Method used to load cities in inputs ajax
     * Reference:
     * http://stackoverflow.com/questions/32464016/cakephp-3-0-autocomplete-jquery-ui
     */
    public function autoCompleteCities() 
    {
        //Load cities model
        $this->loadModel('Cities');
        
        //Verifies if it's an ajax request
        if ($this->request->is('ajax')) {    
            $this->autoRender = false;            
            $name = $this->request->query('term');  
            //Finding city
            $results = $this->Cities->find('all', [
                                           'conditions' => [
                                               'Cities.name LIKE ' => $name . '%'
                                            ]
                                      ]);
         
            //create and populate the array of results
            $resultArr = array();
        
            foreach($results as $result) {
               $resultArr[] = [
                   'label' =>$result['name'].' - '.$result['uf'] ,
                   'label' =>$result['name'].' - '.$result['uf']
                   ];
            }
          
            //create a json with the result
            echo json_encode($resultArr);  
            
    }}
    
    /**
     * 
     * @param \Cake\Event\Event $event
     */
    public function beforeFilter(\Cake\Event\Event $event)
    {
        //Allows all method works without authentication
        $this->Auth->allow();
    }
    
    /**
     * Method isAuthorized
     * 
     * @param type $user
     * @return boolean
     */
    
    public function isAuthorized($user)
    {
        return true;
    }
}
