<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HotelsController Controller
 *
 * @property \App\Model\Table\HotelsControllerTable $HotelsController
 */
class HotelsControllerController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $hotelsController = $this->paginate($this->HotelsController);

        $this->set(compact('hotelsController'));
        $this->set('_serialize', ['hotelsController']);
    }

    /**
     * View method
     *
     * @param string|null $id Hotels Controller id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hotelsController = $this->HotelsController->get($id, [
            'contain' => []
        ]);

        $this->set('hotelsController', $hotelsController);
        $this->set('_serialize', ['hotelsController']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hotelsController = $this->HotelsController->newEntity();
        if ($this->request->is('post')) {
            $hotelsController = $this->HotelsController->patchEntity($hotelsController, $this->request->data);
            if ($this->HotelsController->save($hotelsController)) {
                $this->Flash->success(__('The hotels controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hotels controller could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('hotelsController'));
        $this->set('_serialize', ['hotelsController']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hotels Controller id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hotelsController = $this->HotelsController->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hotelsController = $this->HotelsController->patchEntity($hotelsController, $this->request->data);
            if ($this->HotelsController->save($hotelsController)) {
                $this->Flash->success(__('The hotels controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hotels controller could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('hotelsController'));
        $this->set('_serialize', ['hotelsController']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hotels Controller id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hotelsController = $this->HotelsController->get($id);
        if ($this->HotelsController->delete($hotelsController)) {
            $this->Flash->success(__('The hotels controller has been deleted.'));
        } else {
            $this->Flash->error(__('The hotels controller could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
