<?php

function playAgain():bool
{

        $result = readline("Você deseja jogar novamente?(s/n)". PHP_EOL);

    return $result === 's' ? true : false;
}