<?php

function getPlayersName(): array {
    return [
        readline("Jogador N1(". PLAYER_ONE.") - Insira o seu nome: "),
        readline("Jogador N2(". PLAYER_TWO.") - Insira o seu nome: ")
    ];
};