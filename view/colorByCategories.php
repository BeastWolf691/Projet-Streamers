<?php
$mainCat = strtolower($d->mainCat);
$Color = '';
switch ($mainCat) {
    case 'gaming':
        $Color = '#ff8970';
        break;
    case 'formation':
        $Color = '#5f0404';
        break;
    case 'actualités':
        $Color = '#9FF0F7';
        break;
    case 'irl':
        $Color = ' #47af21';
        break;
    case 'react':
        $Color = ' #462e79';
        break;
}
