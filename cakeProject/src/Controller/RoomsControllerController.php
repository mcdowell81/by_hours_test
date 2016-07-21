<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RoomsController Controller
 *
 * @property \App\Model\Table\RoomsControllerTable $RoomsController
 */
class RoomsControllerController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $roomsController = $this->paginate($this->RoomsController);

        $this->set(compact('roomsController'));
        $this->set('_serialize', ['roomsController']);
    }

    /**
     * View method
     *
     * @param string|null $id Rooms Controller id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $roomsController = $this->RoomsController->get($id, [
            'contain' => []
        ]);

        $this->set('roomsController', $roomsController);
        $this->set('_serialize', ['roomsController']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $roomsController = $this->RoomsController->newEntity();
        if ($this->request->is('post')) {
            $roomsController = $this->RoomsController->patchEntity($roomsController, $this->request->data);
            if ($this->RoomsController->save($roomsController)) {
                $this->Flash->success(__('The rooms controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rooms controller could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('roomsController'));
        $this->set('_serialize', ['roomsController']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rooms Controller id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $roomsController = $this->RoomsController->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $roomsController = $this->RoomsController->patchEntity($roomsController, $this->request->data);
            if ($this->RoomsController->save($roomsController)) {
                $this->Flash->success(__('The rooms controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rooms controller could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('roomsController'));
        $this->set('_serialize', ['roomsController']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rooms Controller id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $roomsController = $this->RoomsController->get($id);
        if ($this->RoomsController->delete($roomsController)) {
            $this->Flash->success(__('The rooms controller has been deleted.'));
        } else {
            $this->Flash->error(__('The rooms controller could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
