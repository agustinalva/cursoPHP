<?php
        $area = 20;
        $maximoMinas = (integer)($area * $area / 3);
        $minas = rand(1, $maximoMinas);
        $minasColocadas = 0;
        $fila = array_fill(0, $area , "");
        $tablero = array_fill(0, $area , $fila);
        
        
        while ($minasColocadas < $minas)
        {
        $a = rand(0, $area-1);
        $b = mt_rand(0, $area-1);
        //posiciono mina
        if ($tablero[$a][$b] != "*")
            {
            $tablero[$a][$b] = "*";
            //actualizo posicions
            if ($a > 0)
                {
                if ($tablero[$a-1][$b] != "*")
                    $tablero[$a-1][$b]++;
                if ($b > 0)
                    if ($tablero[$a-1][$b-1] != "*")
                        $tablero[$a-1][$b-1]++;
                if ($b < $area -1)    
                    if ($tablero[$a-1][$b+1] != "*")
                        $tablero[$a-1][$b+1]++;
                }
            if ($a < $area - 1)
                {
                if ($tablero[$a+1][$b] != "*")
                    $tablero[$a+1][$b]++;
                if ($b > 0)
                    if ($tablero[$a+1][$b-1] != "*")
                        $tablero[$a+1][$b-1]++;
                if ($b < $area -1)    
                    if ($tablero[$a+1][$b+1] != "*")
                        $tablero[$a+1][$b+1]++;
                }
            if ($b > 0)
                $tablero[$a][$b-1]++;
            if ($b < $area - 1)
                $tablero[$a][$b+1]++;
            $minasColocadas++;
            }
        }
        echo '<table width="505" border=1>';
	for ($a=0; $a<$area; $a++)
	{
		echo '<tr align="center">';
		for ($i=0; $i<$area; $i++)
                    echo '<td align="center">'.$tablero [$a][$i]."</td>";
		echo "</tr>";
	}
        //echo "</table>";
        //echo $a.",".$b."<br/>";
        //echo 'El array tiene ' . count($tablero) . ' elementos'."<br/>";
        //echo 'El array tiene ' . count($fila) . ' elementos'."<br/>";
        echo "area: ".$area." minas: ". $minas."<br/>";
        //var_dump($tablero);
        
 ?>