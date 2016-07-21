<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersController Controller
 *
 * @property \App\Model\Table\UsersControllerTable $UsersController
 */
class UsersControllerController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $usersController = $this->paginate($this->UsersController);

        $this->set(compact('usersController'));
        $this->set('_serialize', ['usersController']);
    }

    /**
     * View method
     *
     * @param string|null $id Users Controller id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersController = $this->UsersController->get($id, [
            'contain' => []
        ]);

        $this->set('usersController', $usersController);
        $this->set('_serialize', ['usersController']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersController = $this->UsersController->newEntity();
        if ($this->request->is('post')) {
            $usersController = $this->UsersController->patchEntity($usersController, $this->request->data);
            if ($this->UsersController->save($usersController)) {
                $this->Flash->success(__('The users controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The users controller could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('usersController'));
        $this->set('_serialize', ['usersController']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Controller id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersController = $this->UsersController->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersController = $this->UsersController->patchEntity($usersController, $this->request->data);
            if ($this->UsersController->save($usersController)) {
                $this->Flash->success(__('The users controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The users controller could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('usersController'));
        $this->set('_serialize', ['usersController']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Controller id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersController = $this->UsersController->get($id);
        if ($this->UsersController->delete($usersController)) {
            $this->Flash->success(__('The users controller has been deleted.'));
        } else {
            $this->Flash->error(__('The users controller could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
