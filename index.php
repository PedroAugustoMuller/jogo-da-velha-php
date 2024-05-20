<?php

require_once __DIR__ . '/Dependencies/constants.php';
require_once __DIR__ . '/Dependencies/variables.php';
require_once __DIR__ . '/Funcoes/getPlayersName.php';
require_once __DIR__ . '/Funcoes/buildBoard.php';
require_once __DIR__ . '/Funcoes/showBoard.php';
require_once __DIR__ . '/Funcoes/validatePosition.php';
require_once __DIR__ . '/Funcoes/validatePlay.php';
require_once __DIR__ . '/Funcoes/isBoardFull.php';
require_once __DIR__ . '/Funcoes/swapPlayer.php';
require_once __DIR__ . '/Funcoes/showWinner.php';
require_once __DIR__ . '/Funcoes/playAgain.php';

do{
    $players = getPlayersName();

    $player = PLAYER_ONE;

    $board = buildBoard(); 

    $winner = null;

    while ($winner === null)
    {
        echo showBoard($board);

        $position = (int) readline("Jogador {$player} Digite a sua posição: ". PHP_EOL);

        if (!validatePosition($position,$board))
        {
            continue;
        }

        $board[$position] = $player;

        if(validatePlay($board,PLAYER_ONE))
        {
            $winner = PLAYER_ONE;
            break;
        }
        if(validatePlay($board,PLAYER_TWO))
        {
            $winner = PLAYER_TWO;
            break;
        }
        if(isBoardFull($board))
        {
            $winner = '';
            break;
        }
        $player = swapPlayer($player);
        
    }

    echo showBoard($board);

    echo showWinner($winner, $players);

     $playAgain = playAgain();

}while ($playAgain === true);