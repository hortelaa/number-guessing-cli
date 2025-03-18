#!/usr/bin/env php
<?php

echo "Welcome to the Number Guessing Game!
I'm thinking of a number between 1 and 100.
You have 5 chances to guess the correct number.
\n";

$computerNumber = rand(1,100);
echo $computerNumber;
echo "Please select the difficulty level:
1. Easy (10 chances)
2. Medium (5 chances)
3. Hard (3 chances) \n";

function getDifficulty($difficulty){
    switch($difficulty){
        case(1):
            $chances = 10;
            echo "Great! You have selected the Easy difficulty level. \n";
            return $chances;
        case(2):
            $chances = 5;
            echo "Great! You have selected the Medium difficulty level. \n";
            return $chances;
        case(3):
            $chances = 3;
            echo "Great! You have selected the Hard difficulty level. \n";
            return $chances;
        default:
            echo "Invalid option number, try again! \n";
            return getDifficulty((int)trim(fgets(STDIN)));
    }
}

$chances = getDifficulty((int)trim(fgets(STDIN)));

if(isset($chances)){
    echo "Let's start the game! \n";
    echo "Enter your guess:";
    for ($x = 1; $x <= $chances ; $x++) {
        checkGuess($x,$computerNumber);
    }
    echo "You depleted all your chances, the number was $computerNumber. \n";
}

function checkGuess($x,$computerNumber){
    $guess = (int)trim(fgets(STDIN));
    if($guess == $computerNumber){
        echo "Congratulations! You guessed the correct number in $x attempts. \n";
        exit;
    }elseif ($guess > $computerNumber){
        echo "Incorrect! The number is less than $guess. \n";
        echo "Enter your guess: \n";
    }elseif ($guess < $computerNumber){
        echo "Incorrect! The number is greater than $guess. \n";
        echo "Enter your guess: \n";
    }
}

