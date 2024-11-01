<?php
function getColorForMainCategory($mainCat) {
    $mainCat = strtolower(trim($mainCat));
    switch ($mainCat) {
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
        default:
            return 'grey';
    }
}

function getColorForSecondCategory($secondCat) {
    $secondCat = strtolower(trim($secondCat));
    switch ($secondCat) {
        case 'e-sport':
            return 'yellow';
        case 'fps':
            return 'red';
        case 'talk-show':
            return 'blue';
        case 'vlog':
            return 'green';
        case 'gaming':
            return 'purple';
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