<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Parties Controller
 *
 * @property \App\Model\Table\PartiesTable $Parties
 */
class PartiesController extends AppController
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
        $this->set('parties', $this->paginate($this->Parties));
        $this->set('_serialize', ['parties']);
    }

    /**
     * View method
     *
     * @param string|null $id Party id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $party = $this->Parties->get($id, [
            'contain' => ['feuilles']
        ]);
        $tableau = $party->feuilles[0]->ligne0_explode();
        $tableau1 = $party->feuilles[0]->ligne1_explode();
        $tableau2 = $party->feuilles[0]->ligne2_explode();
        $deRouge = $party->DE_ROUGE;
        $deJaune = $party->DE_JAUNE;
        $deOrange = $party->DE_VIOLET;
        $this->set('party', $party);
        $this->set('tableau', $tableau);
        $this->set('tableau1', $tableau1);
        $this->set('tableau2', $tableau2);
        $this->set('deRouge', $deRouge);
        $this->set('deJaune', $deJaune);
        $this->set('deOrange', $deOrange);
        $this->set('_serialize', ['party']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $party = $this->Parties->newEntity();
        if ($this->request->is('post')) {
            $party = $this->Parties->patchEntity($party, $this->request->data);
            if ($this->Parties->save($party)) {
                $this->Flash->success(__('The party has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The party could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('party'));
        $this->set('_serialize', ['party']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Party id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $party = $this->Parties->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $party = $this->Parties->patchEntity($party, $this->request->data);
            if ($this->Parties->save($party)) {
                $this->Flash->success(__('The party has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The party could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('party'));
        $this->set('_serialize', ['party']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Party id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $party = $this->Parties->get($id);
        if ($this->Parties->delete($party)) {
            $this->Flash->success(__('The party has been deleted.'));
        } else {
            $this->Flash->error(__('The party could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function change(){
    $this->viewBuilder()->layout(false);
       if($this->request->is('ajax')){
            $de1 = $this->request->data['de1'];
            $de2 = $this->request->data['de2'];
            $de3 = $this->request->data['de3'];
            $de1val = 0;
            $de2val = 0;
            $de3val = 0;
            if($de1) $de1val = rand(1,6);
            if($de2) $de2val = rand(1,6);
            if($de3) $de3val = rand(1,6);
            $this->set('de1val',$de1val);
            $this->set('de2val',$de2val);
            $this->set('de3val',$de3val);
            
            /*$party = $this->Feuilles->find()->where(['ID' => $id])->first();
            $party->DE_ROUGE = $de1val;
            $party->DE_JAUNE = $de2val;
            $party->DE_VIOLET = $de3val;
            $this->Party->save($party);*/
        }		
    }
    
    // fonction d'axel
    /*public function change(){
    $this->viewBuilder()->layout(false);
            if($this->request->is('ajax')){
                    $anais = $this->request->data['element'];
                    $brice = "yarr";
                    $this->set('change',$anais);
        $this->set('sbla',$brice);
            }		
    }*/
}
