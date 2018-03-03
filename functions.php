<?php
    //-------------------------------------This was done by Jessica-----------------------------------------
    // function for the deck
    function createDeck()
    {
        // suit, bool, val
        // 4 arrays
        $suit = "";
        $drawn = FALSE;
        
        $deck = array
        (
             array(),
             array(),
             array(),
             array() 
        );
    
        for ($i = 0; $i < 4; $i++)
        {   // suit type
            switch($i) 
            {
                case 0:
                    $suit = "hearts";
                    for ($j = 0; $j < 13; $j++)
                    {
                        $card = array($suit, $j + 1, $drawn);
                        //array_push($deck, $card);
                        array_push($deck[0], $card);
                    }
                    break;
                case 1:
                    $suit = "diamonds";
                    for ($j = 0; $j < 13; $j++)
                    {
                        $card = array($suit, $j + 1, $drawn);
                        //array_push($deck, $card);    
                        array_push($deck[1], $card); 
                    }
                    break;
                case 2:
                    $suit = "spades";
                    for ($j = 0; $j < 13; $j++)
                    {
                        $card = array($suit, $j + 1, $drawn);
                        //array_push($deck, $card);
                        array_push($deck[2], $card);
                    }
                    break;
                case 3:
                    $suit = "clubs";
                    for ($j = 0; $j < 13; $j++)
                    {
                        $card = array($suit, $j + 1, $drawn);
                        //array_push($deck, $card);
                        array_push($deck[3], $card);  
                    }
                    break;
                default:
                    break;
            }
        }
        
        // checks what the array is
        return $deck;
    }
    //-----------------------------Roberto wrote this function which calls all other functions and deals cards-----------------
    function play()
    {
          $deck = createDeck();
          $playerArray = createPlayers();
          $playerOneContinue = TRUE;
          $playerTwoContinue = TRUE;
          $playerThreeContinue = TRUE;
          $playerFourContinue = TRUE;
          
          
          while($playerOneContinue)
          {
              $suitSel = rand(0,3);
              $carsSel = rand(0,12);
            if ($deck[$suitSel][$carsSel][2] == FALSE)
              {
                $cardSuit = $deck[$suitSel][$carsSel][0];
                $cardNum = $deck[$suitSel][$carsSel][1];
                $card = array($cardSuit, $cardNum);
                array_push($playerArray[0][2], $card);
                $deck[$suitSel][$carsSel][2] = TRUE;
                $playerArray[0][1] += $cardNum;
                
                if ( $playerArray[0][1] > 30 &&  $playerArray[0][1] <=42 ||  $playerArray[0][1] >= 42)   //stops the draw process
                    {
                        $playerOneContinue = FALSE;
                    }
              }
            else if ($deck[$suitSel][$carsSel][2] == TRUE)
              {
                    $playerOneContinue = TRUE;
              }
          }
          
         while($playerTwoContinue)
          {
              $suitSel = rand(0,3);
              $carsSel = rand(0,12);
            if ($deck[$suitSel][$carsSel][2] == FALSE)
              {
                $cardSuit = $deck[$suitSel][$carsSel][0];
                $cardNum = $deck[$suitSel][$carsSel][1];
                $card = array($cardSuit, $cardNum);
                array_push($playerArray[1][2], $card);
                $deck[$suitSel][$carsSel][2] = TRUE;
                $playerArray[1][1] += $cardNum;
                if ($playerArray[1][1] > 30 && $playerArray[1][1] <=42 ||  $playerArray[1][1] >= 42)   //stops the draw process
                    {
                        $playerTwoContinue = FALSE;
                    }
              }
            else if ($deck[$suitSel][$carsSel][2] == TRUE)
              {
                    $playerTwoContinue = TRUE;
              }
          }
         
         while($playerThreeContinue)
          {
              $suitSel = rand(0,3);
              $carsSel = rand(0,12);
            if ($deck[$suitSel][$carsSel][2] == FALSE)
              {
                $cardSuit = $deck[$suitSel][$carsSel][0];
                $cardNum = $deck[$suitSel][$carsSel][1];
                $card = array($cardSuit, $cardNum);
                array_push($playerArray[2][2], $card);
                $deck[$suitSel][$carsSel][2] = TRUE;
                $playerArray[2][1] += $cardNum;
                if ($playerArray[2][1] > 30 &&  $playerArray[2][1] <=42 ||  $playerArray[2][1] >= 42)   //stops the draw process
                    {
                        $playerThreeContinue = FALSE;
                    }
              }
            else if ($deck[$suitSel][$carsSel][2] == TRUE)
              {
                    $playerThreeContinue = TRUE;
              }
          }
          
          while($playerFourContinue)
          {
                $suitSel = rand(0,3);
                $carsSel = rand(0,12);
                if ($deck[$suitSel][$carsSel][2] == FALSE)
                {
                    $cardSuit = $deck[$suitSel][$carsSel][0];
                    $cardNum = $deck[$suitSel][$carsSel][1];
                    $card = array($cardSuit, $cardNum);
                    array_push($playerArray[3][2], $card);
                    $deck[$suitSel][$carsSel][2] = TRUE;
                    $playerArray[3][1] += $cardNum;
                    if ($playerArray[3][1] > 30 && $playerArray[3][1] <=42 ||  $playerArray[3][1] >= 42)   //stops the draw process
                    {
                        $playerFourContinue = FALSE;
                    }
                }
                else if ($deck[$suitSel][$carsSel][2] == TRUE)
                {
                    $playerFourContinue = TRUE;
                }
            }
          
          displayCards($playerArray);
          calcWinner($playerArray);
          
    }
    
    // Jessica: Added range and shuffle functions for randomizing players,
    //          added player's Points after cards are displayed. Moved some breaklines.
    // Roberto: Made array operations to print out the cards in each player's hand
    function displayCards($playerArray)
    {  
        $nums = range(0,3);
        shuffle($nums);
        
        for ($j = 0; $j < 4; $j++)
        {
            switch($nums[$j]) 
           {
                case 0:
                    echo "<br>";
                    echo "<img src='players/1.png' width='75'/>";
                    for ($i = 0; $i < count($playerArray[0][2]); $i++)
                    {
                        $currSuit = $playerArray[0][2][$i][0];
                        $currCard = $playerArray[0][2][$i][1];
                        echo "<img src='cards/$currSuit/$currCard.png' width='75'/>";
                    }
                    echo "\tPoints: " . ($playerArray[0][1]);
                    echo "<br>";
                    break;
                case 1:
                    echo "<br>";
                    echo "<img src='players/2.png' width='75'/>";
                    for ($i = 0; $i < count($playerArray[1][2]); $i++)
                    {
                        $currSuit = $playerArray[1][2][$i][0];
                        $currCard = $playerArray[1][2][$i][1];
                        echo "<img src='cards/$currSuit/$currCard.png' width='75'/>";
                    }
                    echo "\tPoints: " . ($playerArray[1][1]);
                    echo "<br>";
                    break;
                case 2:
                    echo "<br>";
                    echo "<img src='players/3.png' width='75'/>"; 
                    for ($i = 0; $i < count($playerArray[2][2]); $i++)
                    {
                        $currSuit = $playerArray[2][2][$i][0];
                        $currCard = $playerArray[2][2][$i][1];
                        echo "<img src='cards/$currSuit/$currCard.png' width='75'/>";
                    }
                    echo "\tPoints: " . ($playerArray[2][1]);
                    echo "<br>";
                    break;
                case 3:
                    echo "<br>";
                    echo "<img src='players/4.png' width='75'/>"; 
                    for ($i = 0; $i < count($playerArray[3][2]); $i++)
                    {
                        $currSuit = $playerArray[3][2][$i][0];
                        $currCard = $playerArray[3][2][$i][1];
                        echo "<img src='cards/$currSuit/$currCard.png' width='75'/>";
                    }
                    echo "\tPoints: " . ($playerArray[3][1]);
                    echo "<br>";
                    break;
            }
        }
    }
    
    // Jessica: Changed if-else statements to if statements to help resolve ties,
    //          also took out breaks in if-statements for winners
    //Roberto: Added for loop which finds the highest scores. also finds the winners' scores.
    function calcWinner($playerArray)
    {
        $win = FALSE;
        
        $p1win = $playerArray[1][1]+$playerArray[2][1]+$playerArray[3][1];
        $p2win = $playerArray[0][1]+$playerArray[2][1]+$playerArray[3][1];  
        $p3win = $playerArray[0][1]+$playerArray[1][1]+$playerArray[3][1];
        $p4win = $playerArray[0][1]+$playerArray[1][1]+$playerArray[2][1];
        
        for ($s=42; $s > 30; $s--)
        {
            if ($win)
            {
                break;
            }
        
            if ($playerArray[0][1] == $s)
            {
                echo "<h1>Cody wins $p1win points</h1>";
                $win = TRUE;
            }
            if ($playerArray[1][1] == $s)
            {
                echo "<h1>Kara wins $p2win points</h1>";
                $win = TRUE;
            }
            if ($playerArray[2][1] == $s)
            {
                echo "<h1>Fernando wins $p3win points</h1>";
                $win = TRUE;
            }
            if ($playerArray[3][1] == $s)
            {
                echo "<h1>Dani wins $p4win points</h1>";
                $win = TRUE;
            }     
        }   
    }
    //-------------------------------------This was done by Jessica-----------------------------------------
    // arrays for a player object
    // element of an array has to be a hand
        
    // deal function:
    // hand out cards
    // display cards
    // 4 things: hand, score, pic, name
    function createPlayers()
    {
        
        $points = 0;
        $name = "";
        $hand = array();
        $playerArray = array();
        
        for ($i = 0; $i < 4; $i++)
        {
            switch ($i)
            {
                case 0:
                    $name = "Cody";
                    $player = array($name, $points, $hand);
                    array_push($playerArray, $player);
                    break;
                case 1:
                    $name = "Kara";
                    $player = array($name, $points, $hand);
                    array_push($playerArray, $player);
                    break;
                case 2:
                    $name = "Fernando";
                    $player = array($name, $points, $hand);
                    array_push($playerArray, $player);
                    break;
                case 3:
                    $name = "Dani";
                    $player = array($name, $points, $hand);
                    array_push($playerArray, $player);
                    break;
                default:
                    break;
            }
        }
        return $playerArray;
    }
    
?>

    