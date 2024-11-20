<?php
function getFlagIcon($language) {
    // Associe chaque langue à son code de pays pour les drapeaux
    $flags = [
        'allemand' => 'de',
        'anglais' => 'gb',
        'danois' => 'dk',
        'espagnol' => 'es',
        'français' => 'fr',
        'française' => 'fr',
        'portugais' => 'pt',
        'suedois' => 'se',
        // Ajoutez d'autres langues ici si nécessaire
    ];

    // Retourne le code de pays correspondant à la langue
    return isset($flags[strtolower($language)]) ? $flags[strtolower($language)] : 'unknown';
}
?>
