<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Feuilles Controller
 *
 * @property \App\Model\Table\FeuillesTable $Feuilles
 */
class FeuillesController extends AppController
{
	

	public function initialize(){	
		parent::initialize();
		$this->loadComponent('RequestHandler');
	}

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('feuilles', $this->paginate($this->Feuilles));
        $this->set('_serialize', ['feuilles']);
    }

    /**
     * View method
     *
     * @param string|null $id Feuille id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $feuille = $this->Feuilles->get($id, [
            'contain' => []
        ]);

	$tableau = $feuille->ligne0_explode();
	$tableau1 = $feuille->ligne1_explode();
	$tableau2 = $feuille->ligne2_explode();
        
	$this->set('feuille', $feuille);
	$this->set('tableau' , $tableau);
	$this->set('tableau1' , $tableau1);
	$this->set('tableau2' , $tableau2);
        $this->set('_serialize', ['feuille']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $feuille = $this->Feuilles->newEntity();
        if ($this->request->is('post')) {
            $feuille = $this->Feuilles->patchEntity($feuille, $this->request->data);
            if ($this->Feuilles->save($feuille)) {
                $this->Flash->success(__('The feuille has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The feuille could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('feuille'));
        $this->set('_serialize', ['feuille']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Feuille id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $feuille = $this->Feuilles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $feuille = $this->Feuilles->patchEntity($feuille, $this->request->data);
            if ($this->Feuilles->save($feuille)) {
                $this->Flash->success(__('The feuille has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The feuille could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('feuille'));
        $this->set('_serialize', ['feuille']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Feuille id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $feuille = $this->Feuilles->get($id);
        if ($this->Feuilles->delete($feuille)) {
            $this->Flash->success(__('The feuille has been deleted.'));
        } else {
            $this->Flash->error(__('The feuille could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

	public function change(){
        $this->viewBuilder()->layout(false);
		if($this->request->is('ajax')){
			$anais = $this->request->data['element'];
			$brice = "yarr";
			$this->set('change',$anais);
            $this->set('sbla',$brice);
		}		
	}
}
