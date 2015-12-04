<?php
            $tableau = "-1,-1, 0,0,0,-1,0,0,0,0,0,0/-1,0,0,0,0,0, -1,0,0,0,0,-1/0,0,0,0,-1,0,0,0,0,0,-1,-1";
            $ligne = explode("\n", $tableau);
            echo $ligne[0];
	    echo "\n";
	    echo $ligne[1];
	    echo "\n";
	    echo $ligne[2];
	    echo "\n";

	    $ligne0 = explode(',', $ligne[0]);
            echo $ligne0[3];
	    echo "\n";

	    $ligne2 = explode(',', $ligne[2]);
	    echo $ligne2[4];
	    echo "\n";
		
        ?>
