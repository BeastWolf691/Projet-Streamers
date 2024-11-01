<?php
<<<<<<< HEAD
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
=======
$mainCat = strtolower($d->mainCat);
$secondCat = strtolower($d->secondCat);

$ColorMainCat = '';
switch ($mainCat) {
    case 'gaming':
        $ColorMainCat = '#ff8970';
        break;
    case 'formation':
        $ColorMainCat = '#5f0404';
        break;
    case 'actualités':
        $ColorMainCat = '#9FF0F7';
        break;
    case 'irl':
        $ColorMainCat = ' #47af21';
        break;
    case 'react':
        $ColorMainCat = ' #462e79';
        break;
     default:
        $ColorSecondCat = 'grey'; 
        break;
}

$ColorSecondCat = '';
switch ($secondCat) {
    case 'e-sport':
        $ColorSecondCat = 'yellow';
        break;
    case 'fps':
        $ColorSecondCat = 'red';
        break;
    case 'talk-show':
        $ColorSecondCat = 'blue';
        break;
    case 'vlog':
        $ColorSecondCat = 'green';
        break;
    case 'gaming':
        $ColorSecondCat = 'purple';
        break;
    case 'divertissement':
        $ColorSecondCat = 'grey';
        break;
    case 'variétés':
        $ColorSecondCat = 'brown';
        break;
    case 'humour':
        $ColorSecondCat = 'pink';
        break;
    case 'speedrunning':
        $ColorSecondCat = 'orange';
        break;
    default:
        $ColorSecondCat = 'grey'; 
        break;
}
>>>>>>> e0439d5fd79b959b9c5ede10525de2a99978f7cd
