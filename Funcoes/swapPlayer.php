<?php

function swapPlayer(string $player):string
{
    if ($player === PLAYER_ONE)
        {
            $player = PLAYER_TWO;
        } else 
        {
            $player = PLAYER_ONE;
        }
    return $player;
}