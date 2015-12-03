	<table BORDER = 2 bgcolor='RED'>
		<tr bgcolor = 'BLUE'>
			<?php
			for($i=0;$i<12;$i++){
					$temp = 'case0'.$i;
					echo'<td id ="'.$temp.'" onclick=change_val("A","'.$temp.'")>';
					echo $tableau[$i];
				echo'</td>';
			}
			?>
		</tr>

		<tr bgcolor = 'RED'>
			<?php
			for($i=0;$i<12;$i++){
				echo'<td>';
					echo $tableau1[$i];
				echo'</td>';
			}
			?>
		</tr>
		
		<tr bgcolor = 'RED'>
			<?php
			for($i=0;$i<12;$i++){
				echo'<td>';
					echo $tableau2[$i];
				echo'</td>';
			}
			?>
		</tr>	
	</table>
<button onclick=alert("lol");>Click</button>

<script type = "text/javascript">
	$(document).ready(function(){
		function change_val(nval,id){
			element = document.getElementById(id);
			var orel = 1;
			$.ajax({
				url:'feuilles/change',
				data: {
					element: orel
				},
			type: 'post',
			datatype: 'json', 
			success : function(res){
				$.each(res, function(clef,valeur){
					alert(clef + valeur);
				});
			
			}, 
			error : function(result, statut, erreur){
				console.log(result);
			},
			
			complete : function(result,statut,erreur){

			}
		});
		}
	change_val('A',1);		
	});

</script>

