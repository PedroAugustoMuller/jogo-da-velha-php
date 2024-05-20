<?php

require_once __DIR__ . '/Dependencies/constants.php';
require_once __DIR__ . '/Dependencies/variables.php';
require_once __DIR__.  '/Funcoes/getPlayersName.php';

do{
    $players = getPlayersName();

    $player = 'X';

    $board = ['.','.','.',
              '.','.','.',
              '.','.','.']; 

    $winner = null;

    while ($winner === null){
        echo PHP_EOL . <<<END
            POSIÇÕES:  | TABULEIRO
            0 | 1 | 2  | $board[0]|$board[1]|$board[2]
            3 | 4 | 5  | $board[3]|$board[4]|$board[5]
            6 | 7 | 8  | $board[6]|$board[7]|$board[8]
            
            END . PHP_EOL
        ;

        $position = (int) readline("Jogador {$player} Digite a sua posição: ". PHP_EOL);

        if(!in_array($position,[0,1,2,3,4,5,6,7,8])){
            echo "Posição fora do tabuleiro!" . PHP_EOL . "Insira a posição novamente" . PHP_EOL;
            continue;
        }
        if($board[$position] !== '.'){
            echo "Posição já ocupada!" . PHP_EOL . "Insira a posição novamente". PHP_EOL;
            continue;
        }

        $board[$position] = $player;

        if($board[0] === $player && $board[1] === $player && $board[2] === $player ||
           $board[3] === $player && $board[4] === $player && $board[5] === $player ||
           $board[6] === $player && $board[7] === $player && $board[8] === $player ||
           $board[0] === $player && $board[3] === $player && $board[6] === $player ||
           $board[1] === $player && $board[4] === $player && $board[7] === $player ||
           $board[2] === $player && $board[5] === $player && $board[8] === $player ||
           $board[6] === $player && $board[4] === $player && $board[2] === $player ||
           $board[0] === $player && $board[4] === $player && $board[8] === $player
    ){
        $winner = $player;
        break;
    }
        if(!in_array('.',$board)){
            break;
        }
        if ($player === 'X'){
            $player = 'O';
        } else {
            $player = 'X';
        }
    }

    if ($winner === 'X'){
        echo "Parabéns $playerOne, você foi o vencedor". PHP_EOL;
    } else if ($winner === 'O') {
        echo "Parabéns $playerTwo, você foi o vencedor". PHP_EOL;
    } else {
        echo "Aconteceu um EMPATE!". PHP_EOL;
    }

     $playAgain = filter_var(
         readline("Você deseja jogar novamente?(true/false)". PHP_EOL),
         FILTER_VALIDATE_BOOLEAN
     );

}while ($playAgain === true);