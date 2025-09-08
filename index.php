<?php
$slots = array("A","B","C");

$totalspins = [];

$maxwinnings = 500;
$maxspins = 20;
//echo implode(",", $slots) . "\n";
$i = 0;
$wins = 0;

// run the slot machine
while($i < $maxspins && $wins < $maxwinnings){

    //holds the results of the spin
    $spin =[];
    // spins 3 times, once for each slot
    for($j = 0; $j < 3; $j++){
        // picks a random slot in the array
        $spin[] = $slots[array_rand($slots)];
    }
    // condenses the array into a string for easy comparison
    $condensedSpin = implode($spin);
    //echo $condensedSpin . "\n";

    //match expression to determine payout
    $payout = match($condensedSpin) {
        "AAA","BBB","CCC" => 100,
        "AAB","ABA","BAA","ABB","BBA","BAB","BCC","CBC","CCB","ACC","CAC","CCA" => 50,
        2 => 20,
        default => 0
    };

    //updates total spin array to store results.
    $totalspins[] = $totalspins + ['spin' => $condensedSpin, 'payout' => $payout];

    // increments spin counter and winnings
    $i++;
    $wins += $payout;
}

//winnings cut
//fixing max wins logic

// display results
foreach($totalspins as $spin) {
    echo "Spin: " . $spin['spin'] . " - Payout: " . $spin['payout'] . "\n";
}

if($wins > $maxwinnings){
    $wins = $maxwinnings;
    echo "Winnings Passed Max- payout set to 500";
}
echo "Total spins: $i\n";
echo "Total winnings: $$wins\n";
