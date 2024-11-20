<?php
function getColorForCategory($category) {
    $category = strtolower(trim($category));
    
    switch ($category) {
        case 'gaming':
            return 'var(--color-primary-dark)';
        case 'formation':
            return '#5f0404';
        case 'actualités':
            return '#9FF0F7';
        case 'irl':
            return '#47af21';
        case 'react':
            return '#462e79';
        case 'e-sport':
            return 'yellow';
        case 'fps':
            return 'red';
        case 'talk-show':
            return 'blue';
        case 'vlog':
            return 'green';
        case 'divertissement':
            return 'grey';
        case 'variétés':
            return 'brown';
        case 'humour':
            return 'pink';
        case 'speedrunning':
            return 'orange';
        default:
            return 'grey';
    }
}
?>
