<?php
function getColorForCategory($category) {
    $category = strtolower(trim($category));
    
    switch ($category) {
        case 'actualités':
            return 'var(--color-cat-actualites)';
        case 'bdmanga':
            return 'var(--color-cat-bdmanga)';
        case 'divertissement':
            return 'var(--color-cat-divertissement)';
        case 'e-sport':
            return 'var(--color-cat-esport)';
        case 'formation':
            return 'var(--color-cat-formation)';
        case 'gaming':
            return 'var(--color-cat-gaming)';
        case 'lifestyle':
            return 'var(--color-cat-lifestyle)';
        case 'musique':
            return 'var(--color-cat-musique)';
        case 'react':
            return 'var(--color-cat-react)';
        case 'talkshow':
            return 'var(--color-cat-talkshow)';
        case 'vlog':
            return 'var(--color-cat-vlog)';
    }
}
