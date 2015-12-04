	<table BORDER = 2>
		<tr bgcolor = 'RED'>
                    <td colspan=2 bgcolor = 'WHITE'>  </td>
			<?php
			for($i=2;$i<12;$i++){
                            if($tableau[$i] == -1) echo '<td></td>'; else {
                            $temp = 'case0'.$i;
                            echo'<td id ="'.$temp.'" onclick=change_val("A","'.$temp.'")>';
                            echo $tableau[$i];
                            echo'</td>';};
			}
			?>
		</tr>

		<tr bgcolor = 'yellow'>
                    <td bgcolor ='WHITE'></td>
			<?php
			for($i=1;$i<11;$i++){
                            if($tableau1[$i] == -1) echo '<td bgcolor = "yellow"></td>'; else {
				echo'<td bgcolor = "yellow">';
					echo $tableau1[$i];
                            echo'</td>';};
			}
			?>
                    <td bgcolor ='WHITE'></td>
		</tr>
		
		<tr bgcolor = 'ORANGE'>
			<?php
			for($i=0;$i<10;$i++){
                            if($tableau2[$i] == -1) echo '<td></td>'; else {
				echo'<td>';
					echo $tableau2[$i];
                            echo'</td>';};
			}
			?>
                        <td colspan=2 bgcolor = 'WHITE'>  </td>
		</tr>	
	</table>

<br>
<FORM method="POST">
    <INPUT type="checkbox" name="de1" value="1"> Dé bleu
    <INPUT type="checkbox" name="de2" value="2"> Dé blanc
    <INPUT type="checkbox" name="de3" value="3"> Dé rouge
    <INPUT type ="submit" value="Valider choix dés"/>
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
    }

    //echo $de1val . "   " . $de2val . "   " . $de3val;
?>
<script type="text/javascript">
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


