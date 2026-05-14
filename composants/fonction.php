<?php
function champ_requis(string $valeur): bool
{
    return !empty(trim($valeur));
}

function nettoyer_champ(string $valeur): string
{
    return htmlspecialchars(trim($valeur));
}
