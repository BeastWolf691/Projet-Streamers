<?php
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
}