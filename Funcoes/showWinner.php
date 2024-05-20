<?php

function showWinner(string $winner, array $players): string
{
    if($winner === PLAYER_ONE)
    {
        return "Parabéns $players[0], você foi o vencedor". PHP_EOL;
    } else if ($winner === PLAYER_TWO)
    {
        return "Parabéns $players[1], você foi o vencedor". PHP_EOL;
    } 
        return "Aconteceu um EMPATE!". PHP_EOL;
}