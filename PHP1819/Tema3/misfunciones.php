<?php
    function numeroceldas($ancho,$largo){
    echo "<table border='1'>";
    

    for($i=0;$i<$ancho;$i++){
        echo "<tr>";
        for($j=0;$j<$largo;$j++){
            echo "<td>$i,$j</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>