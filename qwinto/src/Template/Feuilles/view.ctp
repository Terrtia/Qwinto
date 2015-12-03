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
	function change_val(nval,id){
		element = document.getElementById(id);
		element.style.color = "RED";
		alert("fait");
	}

</script>

