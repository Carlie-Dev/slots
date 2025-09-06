<?php
$slots = array("A","B","C");

$maxwinning = 500;
$maxspins = 20;
echo implode(",", $slots) . "\n";
$i = 0;
$wins = 0;

while($i!=$maxspins or $wins <= 100 ){
    echo "hi\n";
    $i++;
    $wins += 10; 
}
