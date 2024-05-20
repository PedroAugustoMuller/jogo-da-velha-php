<?php

    function validatePosition(int $position, array $board): bool{
        if(!in_array($position,[0,1,2,3,4,5,6,7,8])){
            echo "Posição fora do tabuleiro!" . PHP_EOL . "Insira a posição novamente" . PHP_EOL;
            return false;
        } else if($board[$position] !== '.'){
            echo "Posição já ocupada!" . PHP_EOL . "Insira a posição novamente". PHP_EOL;
            return false;
        }
        return true;
    }