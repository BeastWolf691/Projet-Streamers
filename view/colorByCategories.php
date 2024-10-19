<?php
$mainCat = strtolower($d->mainCat);
$backgroundColor = '';
switch ($mainCat) {
    case 'gaming':
        $backgroundColor = '#ff8970';
        break;
    case 'formation':
        $backgroundColor = '#5f0404';
        break;
    case 'actualités':
        $backgroundColor = '#9FF0F7';
        break;
    case 'irl':
        $backgroundColor = ' #47af21';
        break;
    case 'react':
        $backgroundColor = ' #462e79';
        break;
}
