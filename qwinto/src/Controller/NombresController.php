<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Nombres Controller
 *
 * @property \App\Model\Table\NombresTable $Nombres
 */
class NombresController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('nombres', $this->paginate($this->Nombres));
        $this->set('_serialize', ['nombres']);
    }

    /**
     * View method
     *
     * @param string|null $id Nombre id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nombre = $this->Nombres->get($id, [
            'contain' => []
        ]);
        $this->set('nombre', $nombre);
        $this->set('_serialize', ['nombre']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nombre = $this->Nombres->newEntity();
        if ($this->request->is('post')) {
            $nombre = $this->Nombres->patchEntity($nombre, $this->request->data);
            if ($this->Nombres->save($nombre)) {
                $this->Flash->success(__('The nombre has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The nombre could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('nombre'));
        $this->set('_serialize', ['nombre']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Nombre id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nombre = $this->Nombres->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nombre = $this->Nombres->patchEntity($nombre, $this->request->data);
            if ($this->Nombres->save($nombre)) {
                $this->Flash->success(__('The nombre has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The nombre could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('nombre'));
        $this->set('_serialize', ['nombre']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Nombre id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nombre = $this->Nombres->get($id);
        if ($this->Nombres->delete($nombre)) {
            $this->Flash->success(__('The nombre has been deleted.'));
        } else {
            $this->Flash->error(__('The nombre could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
