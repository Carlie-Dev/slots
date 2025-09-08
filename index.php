<?php
$slots = array("A","B","C");

$maxwinnings = 500;
$maxspins = 20;
echo implode(",", $slots) . "\n";
$i = 0;
$wins = 0;

while($i<=$maxspins and $wins <= $maxwinnings) {

    $spin =[];
    for($j = 0; $j < 3; $j++){
        // picks a random slot in the array
        $spin[] = $slots[array_rand($slots)];
    }
    $condensedSpin = implode($spin);
    echo $condensedSpin . "\n";

    $payout = match($condensedSpin) {
        "AAA","BBB","CCC" => 100,
        "AAB","ABA","BAA","ABB","BBA","BAB","BCC","CBC","CCB","ACC","CAC","CCA" => 50,
        2 => 20,
        default => 0
    };

    $i++;
    $wins += $payout; 
}
echo "Total spins: $i\n";
echo "Total winnings: $wins\n";
