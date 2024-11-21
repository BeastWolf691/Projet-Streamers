<?php

// function getCatIcon(Category $category) {
//     $category->color = $color;
//     return $color;
// }

function getIconForCategory(string $category) {
    $category = strtolower(trim($category));
    switch($category) {
        case "actualités" :
            return "actualites";
            break;
        case "divertissement" :
            return "divertissement";
            break;
        case "manga" :
            return "bdmanga";
            break;
        case "e-sport" :
            return "esport";
            break;
        case "formation" :
            return "formation";
            break;
        case "gaming" :
            return "gaming";
            break;
        case "humour" :
            return "humour";
            break;
        case "lifestyle" :
            return "lifestyle";
            break;
        case "musique" :
            return "musique";
            break;    
        case "sport" :
            return "sport";
            break;
        case "voyage" :
            return "voyage";
            break;
    }
}