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
            break;
        }
        swapPlayer($player);
        
    }

    echo showBoard($board);

    if ($winner === 'X')
    {
        echo "Parabéns $playerOne, você foi o vencedor". PHP_EOL;
    } else if ($winner === 'O') 
    {
        echo "Parabéns $playerTwo, você foi o vencedor". PHP_EOL;
    } else {

        echo "Aconteceu um EMPATE!". PHP_EOL;
    }

     $playAgain = filter_var
     (
         readline("Você deseja jogar novamente?(true/false)". PHP_EOL),
         FILTER_VALIDATE_BOOLEAN
     );

}while ($playAgain === true);