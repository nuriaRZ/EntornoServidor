<?php
$nombres = ["Pedro", "Ismael", "Sonia", "Clara", "Susana", "Alfonso", "Teresa"];
echo count($nombres);

    echo "<ul>";    
foreach ($nombres as $nombre => $value) {
    echo "<li>".$value."</li>";
}
echo "</ul>";




?>

