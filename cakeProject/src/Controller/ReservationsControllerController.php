<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ReservationsController Controller
 *
 * @property \App\Model\Table\ReservationsControllerTable $ReservationsController
 */
class ReservationsControllerController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $reservationsController = $this->paginate($this->ReservationsController);

        $this->set(compact('reservationsController'));
        $this->set('_serialize', ['reservationsController']);
    }

    /**
     * View method
     *
     * @param string|null $id Reservations Controller id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reservationsController = $this->ReservationsController->get($id, [
            'contain' => []
        ]);

        $this->set('reservationsController', $reservationsController);
        $this->set('_serialize', ['reservationsController']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reservationsController = $this->ReservationsController->newEntity();
        if ($this->request->is('post')) {
            $reservationsController = $this->ReservationsController->patchEntity($reservationsController, $this->request->data);
            if ($this->ReservationsController->save($reservationsController)) {
                $this->Flash->success(__('The reservations controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reservations controller could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('reservationsController'));
        $this->set('_serialize', ['reservationsController']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reservations Controller id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reservationsController = $this->ReservationsController->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reservationsController = $this->ReservationsController->patchEntity($reservationsController, $this->request->data);
            if ($this->ReservationsController->save($reservationsController)) {
                $this->Flash->success(__('The reservations controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reservations controller could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('reservationsController'));
        $this->set('_serialize', ['reservationsController']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reservations Controller id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reservationsController = $this->ReservationsController->get($id);
        if ($this->ReservationsController->delete($reservationsController)) {
            $this->Flash->success(__('The reservations controller has been deleted.'));
        } else {
            $this->Flash->error(__('The reservations controller could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
