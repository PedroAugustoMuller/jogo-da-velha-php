<?php

require_once __DIR__ . '/Dependencies/constants.php';
require_once __DIR__ . '/Dependencies/variables.php';
require_once __DIR__ . '/Funcoes/getPlayersName.php';
require_once __DIR__ . '/Funcoes/buildBoard.php';
require_once __DIR__ . '/Funcoes/showBoard.php';
require_once __DIR__ . '/Funcoes/validatePosition.php';

do{
    $players = getPlayersName();

    $player = PLAYER_ONE;

    $board = buildBoard(); 

    $winner = null;

    while ($winner === null){
        echo showBoard($board);

        $position = (int) readline("Jogador {$player} Digite a sua posição: ". PHP_EOL);

        if (!validatePosition($position,$board)){
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

    echo showBoard($board);

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