<table width="720">
    <tr height=60>
        <td colspan=2 width=120 bgcolor = 'WHITE'>  </td>
            <?php
            for($i=2;$i<12;$i++){
		$temp = 'case/0/'.$i;
                if($tableau[$i] == -1) echo '<td width=60 background=/img/rouge.png></td>';
                else if($tableau[$i] == -2) {
                    echo '<td width=60 background="/img/pentaRouge.png" id ="'.$temp.'" onclick=affecter("'.$temp.'")>'; 
                    if($tableau[$i]>0) echo $tableau[$i];
                    echo'</td>';
                }else{
                    echo'<td width=60 background=/img/rondRouge.png align=center id ="'.$temp.'" onclick=affecter("'.$temp.'")>';
                    if($tableau[$i]>0) echo $tableau[$i];
                    echo'</td>';
                };
            }
            ?>
    </tr>


    <tr height=60>
        <td width=60 bgcolor ='WHITE'></td>
            <?php
            for($i=1;$i<11;$i++){
		$temp = 'case/1/'.$i;
                if($tableau1[$i] == -1) echo '<td width=60 background="/img/jaune.png"></td>';
                else if($tableau1[$i] == -2) {
                    echo '<td width=60 background="/img/pentaJaune.png" id ="'.$temp.'" onclick=affectCase("'.$temp.'")>'; 
                    if($tableau1[$i]>0) echo $tableau1[$i];
                    echo'</td>';
                }else {
                    echo'<td  width=60 background=/img/rondJaune.png align=center id ="'.$temp.'" onclick=affectCase("'.$temp.'")>';
                    if($tableau1[$i]>0)echo $tableau1[$i];  
                    echo'</td>'; 
                };
            }
            ?>

        <td width=60 bgcolor ='WHITE'></td>
    </tr>

    <tr height=60>
            <?php
            for($i=0;$i<10;$i++){
		$temp = 'case/2/'.$i;
                if($tableau2[$i] == -1) echo '<td width=60 background=/img/orange.png></td>';
                else if($tableau2[$i] == -2) { 
                    echo '<td width=60 background="/img/pentaOrange.png" id ="'.$temp.'" onclick=affectCase("'.$temp.'")>'; 
                    if($tableau2[$i]>0) echo $tableau2[$i];
                    echo'</td>';
                }else {
                    echo'<td width=60 background=/img/rondOrange.png align=center id ="'.$temp.'" onclick=affectCase("'.$temp.'")>';
                    if($tableau2[$i]>0) echo $tableau2[$i];
                    echo'</td>';
                };
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
</FORM>

<img id="de1" src="/img/de0rouge.png"></img>
<img id="de2" src="/img/de0jaune.png"></img>
<img id="de3" src="/img/de0orange.png"></img>
<br><br>
<button id="lancerDes" onclick="lancerDes()">Lancer Dés</button>
<br><br>

Pénalités :  
<div id="penalites"></p>

<br><br>
<div id="score">Score = </div>


<?= $this->Html->link(__('ChangeCase'),['action' => 'change_case', $party->ID]) ?>


<script type = "text/javascript">
    
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
            url:"/parties/change_case",
            data: {
                id: id
            },
            type: 'post',
            datatype: 'json', 
            success : function(res){ 
	        var resultat = JSON.parse(res);
                alert(resultat.val);
                //var kase = document.getElementById(resultat.id);
    		//kase[0].innerHTML = resultat.val;
            }, 
            error : function(result, statut, erreur){
                console.log(result);
            },
            
            complete : function(result,statut,erreur){

            }
        });
        }
    
    function affecter(id){
            $.ajax({
            url:"/parties/modifcase",
            data: {
                id: id
            },
            type: 'post',
            datatype: 'json', 
            success : function(res){ 
	        var resultat = JSON.parse(res);
                alert(resultat.val);
                //var case = document.getElementById(resultat.id);
    		//case[0].innerHTML = resultat.val;
            }, 
            error : function(result, statut, erreur){
                console.log(result);
            },
            
            complete : function(result,statut,erreur){

            }
        });
        }
</script>
