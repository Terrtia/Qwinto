<table width="720">
		<tr height=60>
                    <td colspan=2 width=120 bgcolor = 'WHITE'>  </td>
			<?php

			for($i=2;$i<12;$i++){
                            if($tableau[$i] == -1) echo '<td width=60 background=/Qwinto/qwinto/img/rouge.png></td>';
                            else if($tableau[$i] == -2) echo '<td width=60 background=/Qwinto/qwinto/img/pentaRouge.png></td>'; else{
                            $temp = 'case0'.$i;
                            echo'<td width=60 background=/Qwinto/qwinto/img/rondRouge.png align=center id ="'.$temp.'" onclick="change_val('.$feuille->ID.',0,'.$i.')">';
                            if($tableau[$i] >0){
                             echo $tableau[$i];
                            }
                            echo'</td>';};
			}
            //echo $feuille->TABLEAU.'</br>';
            //echo $string;
			?>
		</tr>

		<tr height=60>
                    <td width=60 bgcolor ='WHITE'></td>
			<?php
			for($i=1;$i<11;$i++){
                            if($tableau1[$i] == -1) echo '<td width=60 background=/Qwinto/qwinto/img/jaune.png></td>';
                            else if($tableau1[$i] == -2) echo '<td width=60 background=/Qwinto/qwinto/img/pentaJaune.png></td>'; else {
				echo'<td  width=60 background=/Qwinto/qwinto/img/rondJaune.png align=center >';
                if($tableau1[$i] >0){
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
                            if($tableau2[$i] == -1) echo '<td width=60 background=/Qwinto/qwinto/img/orange.png></td>';
                            else if($tableau2[$i] == -2) echo '<td width=60 background=/Qwinto/qwinto/img/pentaOrange.png></td>'; else {
				echo'<td width=60 background=/Qwinto/qwinto/img/rondOrange.png align=center >';
				if($tableau2[$i] >0){
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
    <INPUT type="checkbox" name="de1" value="1"> Dé Rouge
    <INPUT type="checkbox" name="de2" value="2"> Dé Jaune
    <INPUT type="checkbox" name="de3" value="3"> Dé Orange
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

    
    // ne sert à rien pour l'instant
    echo '<br>
    <button id="lancerDes" onclick="lancer_des(' . $de1 . ',' . $de2 . ',' . $de3 . ')">Lancer Dés</button>
    <br>';
        
    $de1val = 0;
    $de2val = 0;
    $de3val = 0;
            
    /* Affichage de valeurs aléatoires pour les dés selectionnés et remise à 0 */
    if($de1 == 1) {
        $de1val = rand(1,6);
        echo "Dé rouge : " . $de1val . "     ";
        echo '<img src="/Qwinto/qwinto/img/de' . $de1val .'rouge.png">';
        $de1 = 0;
        $de1val = 0;
    }
    if($de2 == 1) {
        $de2val = rand(1,6);
        echo "Dé jaune : " . $de2val . "     ";
        echo '<img src="/Qwinto/qwinto/img/de' . $de2val .'jaune.png">';
        $de2 = 0;
        $de2val = 0;
    }
    if($de3 == 1) {
        $de3val = rand(1,6);
        echo "Dé orange : " . $de3val . "     ";
        echo '<img src="/Qwinto/qwinto/img/de' . $de3val .'orange.png">';
        $de3 = 0;
        $de3val = 0;
    }

    //echo $de1val . "   " . $de2val . "   " . $de3val;
?>
<script type="text/javascript">
//$(document).ready(function(){
        function change_val(id, numLigne, numCase){
            var val = prompt("Quel est la valeur?");
            $.ajax({
                url:"feuilles/changeCase",
                data: {
                    id: id,
                    noLigne: numLigne,
                    noCase: numCase,
                    val: val
                },
            type: 'post',
            datatype: 'json', 
            success : function(res){          
                    alert(res);
            
            }, 

            error : function(result, statut, erreur){
                console.log(result);
            },
            
            complete : function(result,statut,erreur){

            }
        });
    }   
//}); 

    function lancer_des(de1, de2, de3) {
        alert("blp");
        if(de1 == 1) {
            de1val = Math.floor((6*Math.random()+1));
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
     
</script>
