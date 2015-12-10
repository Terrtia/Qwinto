<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
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
	// $party = $this->Parties->find()->where(['ID' => 2])->first();
	$party = $this->Parties->get(2, [
            'contain' => ['feuilles']
        ]);
            $de1 = $this->request->data['de1'];
            $de2 = $this->request->data['de2'];
            $de3 = $this->request->data['de3'];
	$de1val = 0;
            $de2val = 0;
            $de3val = 0;
//a remettre pour le final empeche le jouer de relancer les des
	//if($party->DesOk()){
            if($de1 == "true"){
		$de1val = rand(1,6);	
            }

            if($de2 == "true"){
		$de2val = rand(1,6);
            }
            if($de3 == "true"){
		$de3val = rand(1,6);
            }
        
            $party->DE_ROUGE = $de1val;
            $party->DE_JAUNE = $de2val;
            $party->DE_VIOLET = $de3val;
            $this->Parties->save($party);
	/**}else{
	    $de1val = $party->DE_ROUGE ;
            $de2val = $party->DE_JAUNE ;
            $de3val = $party->DE_VIOLET ;
	}**/

	    $this->set('de1val',$de1val);
            $this->set('de2val',$de2val);
            $this->set('de3val',$de3val);
        }		
    }

    public function change_case()
    {
    $this->viewBuilder()->layout(false);
        if($this->request->is('ajax')){
            $id = $this->request->data['id'];
            $tab = explode("/",$id); 
	    $party = $this->Parties->get(2, [
            'contain' => ['feuilles']
            ]);

            $var = 4;
            //$feuille = $party->feuilles[0];
            //$feuille = $this->Feuilles->find()->first();
            $feuille = $feuilles->find()->first();
            $string = $feuille->addValeur(0,3,4);
            //$string = '-1,-1,4,18,0,-2,0,0,0,0,0,0/-1,0,0,0,0,0,-2,0,0,0,0,-1/0,0,0,0,-2,0,0,0,0,0,-1,-1/';
            $feuille->TABLEAU = $string;
            $this->Feuilles->save($feuille);

            $var = 2;
            $id = 12;
            $this->set('var',$var);
            $this->set('id',$id);
        }
    }
    
    public function modifcase()
    {
        $this->viewBuilder()->layout(false);
        if($this->request->is('ajax')){
            $feuilles = TableRegistry::get('Feuilles');
            $feuille = $feuilles->find()->first();
;            /* récupération de case/numLigne/numColonne */
            $id = $this->request->data['id'];

            /* séparation et stockage des données reçues */
            $tab = explode("/",$id); 
            $ligne = $tab[1];
            $colonne = $tab[2];

            
           


            /* val est le résultat de la somme des dés, mais si on clique la case avant 
             * de lancer les dés, les valeurs ne sont pas initialisées à 0  */
            //$party = $this->Parties->find()->where(['ID' => 2])->first();
	$party = $this->Parties->get(2, [
            'contain' => ['feuilles']
        ]);

	 $val = $party->DE_ROUGE + $party->DE_JAUNE + $party->DE_VIOLET;
            $id = 0;
            $string = $feuille->addValeur($ligne,$colonne,$val);
            $feuille->TABLEAU = $string;
            $feuilles->save($feuille);
	
            $party->DE_ROUGE = 0;
	    $party->DE_JAUNE = 0;
	    $party->DE_VIOLET = 0;
	     $this->Parties->save($party);

            $this->set('val',$val);
            $this->set('id',$id);
            $this->set('ligne',$ligne);
            $this->set('colonne',$colonne);
        }
    }

	 public function ajoutcroix()
    {
        $this->viewBuilder()->layout(false);
        if($this->request->is('ajax')){
            $feuilles = TableRegistry::get('Feuilles');
            $feuille = $feuilles->find()->first();
;           
	    $croix = $feuille->NOMBRES_CROIX +1;
	    $feuille->NOMBRES_CROIX = $croix;
	    $party = $this->Parties->get(2, [
            'contain' => ['feuilles']
        ]);
            $party->DE_ROUGE = 0;
	    $party->DE_JAUNE = 0;
	    $party->DE_VIOLET = 0;
	    $this->Parties->save($party);
           


            /* val est le résultat de la somme des dés, mais si on clique la case avant 
             * de lancer les dés, les valeurs ne sont pas initialisées à 0  */
   
            $feuilles->save($feuille);
            $this->set('croix',$croix);
        }
    }
   
}
