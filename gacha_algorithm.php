<?php

/* I know this is written in PHP instead of JS. Will port the code soon */


//Values
$rollVal;
$boolean = true;
$counter = 0;

/*
mt_rand function only uses integers so all probability values must be
multiplied by 10 to accomodate correct probability values. eg 2.5% = 25;
*/
$commonRate = array(1000,501); //50%
$uncommonRate = array(500,251); //25%
$rareRate = array(250,101); //15%
$veryRareRate = array(100,51); //5%
$extremelyRareRate = array(50,26); //2.5%
$cosmicRate = array(25); //2.5%
 
//INIT floor values
$INITcommonRate = 500;
$INITuncommonRate = 251;
$INITrareRate = 101;
$INITveryRareRate = 51;
$INITextremelyRareRate = 26;

//Functions

function decreaseIncreaseRates(){
    /* 
    use function to adjust other rates to increase probability of getting an
    extremely rare when $rollValue did not get a winning roll.
    chance to get extremely rare goes up by .25% (2.50) per unsuccessful roll.
    [0] = probability ceiling, [1] = probability floor. 
    */
    
    //global variables to access probability array and counter
    global $commonRate, $uncommonRate, $rareRate, $veryRareRate,
           $extremelyRareRate, $INITcommonRate, $INITuncommonRate, 
           $INITrareRate, $INITveryRareRate, $INITextremelyRareRate, $counter;
   
    //ceiling cap of 1000 remains. commons decrease probability by 0.0625% (0.625)
    $commonRate[1] += 0.625;
    
    /* 
    uncommons increase ceiling cap to adjust with common probability drop.
    add same amount to probability floor, then add in 0.0625% (0.625)
    for probability drop. 
    */
    $uncommonRate[0] += 0.625;
    $uncommonRate[1] += 1.25;
    
    $rareRate[0] += 1.25;
    $rareRate[1] += 1.875;
    
    $veryRareRate[0] += 1.875;
    $veryRareRate[1] += 2.50;
    
    //only ceiling cap adjusted to increase probability by full value .25%
    $extremelyRareRate[0] += 2.50;
    
    //cosmicRate will not adjust.
    
    //add +1 to counter
    $counter++;
    
}//END function decreaseIncreaseRates();


function echoRates(){
    //Print Rates after getting a winning roll
    
    global $commonRate, $uncommonRate, $rareRate, $veryRareRate,
           $extremelyRareRate, $INITcommonRate, $INITuncommonRate, 
           $INITrareRate, $INITveryRareRate, $INITextremelyRareRate, $counter,
           $rollVal;
           
    //WIP: Need to have condition if winning roll occurs the first time to 
    //output stock values.
    $c = ($commonRate[0]-(($commonRate[1] - $INITcommonRate)+$INITcommonRate))/10;
    $u = ($uncommonRate[0]-(($uncommonRate[1] - $INITuncommonRate)+$INITuncommonRate))/10;
    $r = ($rareRate[0]-(($rareRate[1] - $INITrareRate)+$INITrareRate))/10;
    $v = ($veryRareRate[0]-(($veryRareRate[1] - $INITveryRareRate)+$INITveryRareRate))/10;
    $e = ($extremelyRareRate[0]-(($extremelyRareRate[1] - $INITextremelyRareRate)+$INITextremelyRareRate))/10;
    
    echo "You rolled ".$counter." times and got an Extremely Rare roll!".
         "\nWinning Roll: ".$rollVal.
         "\nRange: ".$extremelyRareRate[0]." - ".$extremelyRareRate[1].
         "\n\nRATES:".
         "\nCommon: ".$c.
         "% \nUncommon: ".$u.
         "% \nRare: ".$r.
         "% \nVery Rare: ".$v.
         "% \nExtremely Rare: ".$e."%";
         
}//END function echoRates();

//rolls infinitely until it gets a winning roll: Extremely Rare or Cosmic Rare
while ($boolean){
    
    //determines rollVal.
    //rollVal multiplied by 10 to accomodate decimal chances.
    $rollVal = mt_rand(1,1000);
    
    if ($rollVal <= $commonRate[0] and $rollVal >= $commonRate[1]) {
       decreaseIncreaseRates();
    } elseif ($rollVal <= $uncommonRate[0] and $rollVal >= $uncommonRate[1]) {
       decreaseIncreaseRates();
    } elseif ($rollVal <= $rareRate[0] and $rollVal >= $rareRate[1]) {
       decreaseIncreaseRates();
    } elseif ($rollVal <= $veryRareRate[0] and $rollVal >= $veryRareRate[1]) {
       decreaseIncreaseRates();
    } elseif ($rollVal <= $extremelyRareRate[0] and $rollVal >= $extremelyRareRate[1]) {
       echoRates();
       $boolean=false;
    } elseif ($rollVal <= $cosmicRate[0]) {
       echoRates();
       echo "\n \n***!!!YOU DEFIED THE ODDS AND GOT AN EVEN RARER WINNING ROLL!!!***";
       $boolean=false;
    }
}//END while function

?>
