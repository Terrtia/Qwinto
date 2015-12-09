<table width="720">
    <tr height=60>
        <td colspan=2 width=120 bgcolor = 'WHITE'>  </td>
            <?php
            for($i=2;$i<12;$i++){
		$temp = 'case/0/'.$i;
                if($tableau[$i] == -1) echo '<td width=60 background=/img/rouge.png></td>';
                else if($tableau[$i] == -2) echo '<td width=60 background=/img/pentaRouge.png id ="'.$temp.'" onclick=affectCase("'.$temp.'")></td>'; else{   
                echo'<td width=60 background=/img/rondRouge.png align=center id ="'.$temp.'" onclick=affectCase("'.$temp.'")>';
                if($tableau[$i]>0){
                echo $tableau[$i];
                }   
                echo'</td>';};
            }
            ?>
    </tr>


    <tr height=60>
        <td width=60 bgcolor ='WHITE'></td>
            <?php
            for($i=1;$i<11;$i++){
		$temp = 'case/1/'.$i;
                if($tableau1[$i] == -1) echo '<td width=60 background=/img/jaune.png></td>';
                else if($tableau1[$i] == -2) echo '<td width=60 background=/img/pentaJaune.png id ="'.$temp.'" onclick=affectCase("'.$temp.'")></td>'; else {
                    echo'<td  width=60 background=/img/rondJaune.png align=center id ="'.$temp.'" onclick=affectCase("'.$temp.'")>';
                if($tableau1[$i]>0){
                    echo $tableau1[$i];
                }  
                echo'</td>';};
            }
            ?>

        <td width=60 bgcolor ='WHITE'></td>
    </tr>

    <tr height=60>
            <?php
            for($i=0;$i<10;$i++){
		$temp = 'case/2/'.$i;
                if($tableau2[$i] == -1) echo '<td width=60 background=/img/orange.png></td>';
                else if($tableau2[$i] == -2) echo '<td width=60 background=/img/pentaOrange.png id ="'.$temp.'" onclick=affectCase("'.$temp.'")></td>'; else {
                    echo'<td width=60 background=/img/rondOrange.png align=center id ="'.$temp.'" onclick=affectCase("'.$temp.'")>';
                if($tableau2[$i]>0){
                    echo $tableau2[$i];
                }  
                echo'</td>';};
            }
            ?>
            <td width=60 colspan=2 bgcolor = 'WHITE'>  </td>
    </tr>	
    </table>

<br>
<FORM method="POST">
    <INPUT type="checkbox" id="checkbox1" name="de1" value="1"> Dé Rouge
    <INPUT type="checkbox" id="checkbox2" name="de2" value="2"> Dé Jaune
    <INPUT type="checkbox" id="checkbox3" name="de3" value="3"> Dé Orange
    <INPUT type ="submit" value="Lancer dés"/>
</FORM>



<?php
    $de1 = 0;
    $de2 = 0;
    $de3 = 0;
    if(isset($_POST['de1'])) $de1 = 1;
    if(isset($_POST['de2'])) $de2 = 1;
    if(isset($_POST['de3'])) $de3 = 1;
    /*vérification dés selectionnés par les checkbox
     * echo $de1 . "   " . $de2 . "   " . $de3 . "<br>";;*/

    echo '<img id="de1" src=""></img>';
    echo '<img id="de2" src=""></img>';
    echo '<img id="de3" src=""></img>';
    // ne sert à rien pour l'instant
    echo '<br>
    <button id="lancerDes" onclick="lancerDes()">Lancer Dés</button>
    <br>';
        
    $de1val = 0;
    $de2val = 0;
    $de3val = 0;
    

            
    /* Affichage de valeurs aléatoires pour les dés selectionnés et remise à 0 */
    /*if($de1 == 1) {
        //$de1val = rand(1,6);
        echo "Dé rouge : " . $de1val . "     ";
        echo '<img src="/img/de' . $de1val .'rouge.png">';
        $de1 = 0;
        $de1val = 0;
    }
    if($de2 == 1) {
        $de2val = rand(1,6);
        echo "Dé jaune : " . $de2val . "     ";
        echo '<img src="/img/de' . $de2val .'jaune.png">';
        $de2 = 0;
        $de2val = 0;
    }
    if($de3 == 1) {
        $de3val = rand(1,6);
        echo "Dé orange : " . $de3val . "     ";
        echo '<img src="/img/de' . $de3val .'orange.png">';
        $de3 = 0;
        $de3val = 0;
    }*/
    

    //echo $de1val . "   " . $de2val . "   " . $de3val;
?>

<?= $this->Html->link(__('Change'),['action' => 'change', $party->ID]) ?>
<?= $this->Html->link(__('ChangeCase'),['action' => 'changeCase', $party->ID]) ?>

<!--<script type="text/javascript">
    function lancer_des(de1, de2, de3) {
        if(de1 == 1) {
            de1val = Math.floor((6*Math.random()+1));
            $this->set('DE_ROUGE' => de1val);
            de1 = 0;
            alert("dé1 = " + de1val);
        }
        if(de2 == 1) {
            de2val = Math.floor(("Dé Blanc : " + 6*Math.random()+1));
            de2 = 0;
        }
        if(de3 == 1) {
            de3val = Math.floor(("Dé Rouge : " + 6*Math.random()+1));
            de3 = 0;
        }
    }
</script>-->

<script type = "text/javascript">
 //   $(document).ready(function(){
        function lancerDes(){
            var de1Check = document.getElementById("checkbox1").checked;
            var de2Check = document.getElementById("checkbox2").checked;
            var de3Check = document.getElementById("checkbox3").checked;
	
            $.ajax({
                url:"/parties/change",
                data: {
                    de1 : de1Check,
                    de2 : de2Check,
                    de3 : de3Check
                },
            type: 'post',
            datatype: 'json', 
            success : function(res){  
                var resultat = JSON.parse(res);
                var srcDe1 = '/img/de'+ resultat.d1 +'rouge.png'
                de1.setAttribute('src',srcDe1);
                var srcDe2 = '/img/de'+ resultat.d2 +'jaune.png'
                de2.setAttribute('src',srcDe2);
                var srcDe3 = '/img/de'+ resultat.d3 +'orange.png'
                de3.setAttribute('src',srcDe3);
            }, 

            error : function(result, statut, erreur){
                console.log(result);
            },
            
            complete : function(result,statut,erreur){

            }
        });
        }

	function affectCase(id){
        
          	kase = document.getElementById(id);
		//alert(id);
	        $.ajax({
                url:"/parties/changeCase",
                data: {
                    id: id
                },
            type: 'post',
            datatype: 'json', 
            success : function(res){  
                alert(res.val);
	           	var resultat = JSON.parse(res);
                alert();
                var kase = document.getElementById(resultat.id);
    		    kase[0].innerHTML = resultat.val;
            }, 
            error : function(result, statut, erreur){
                console.log(result);
            },
            
            complete : function(result,statut,erreur){

            }
        });
        }
    
</script>
