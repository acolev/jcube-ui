<?php

function genTrx($length = 12, $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZ123456789')
{
    $randomStringArray = array_map(function () use ($characters) {
        return $characters[random_int(0, strlen($characters) - 1)];
    }, range(1, $length));

    return implode('', $randomStringArray);
}

function keyToTitle($text)
{
    return ucfirst(preg_replace('/[^A-Za-z0-9 ]/', ' ', $text));
}

function titleToKey($text)
{
    return strtolower(str_replace(' ', '_', $text));
}

function replaceShortCode($message, $shorts = [])
{
    foreach ($shorts as $k => $short) {
        $message = str_replace("{{" . $k . "}}", $short ?: '', $message);
    }
    return $message;
}


function getImage($image, $size = '200x200')
{
    $clean = '';
    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    }

    return placeholderImage($size);
}

function placeholderImage()
{
    $args = func_get_args();
    if (!count($args)) {
        $args[] = '300x250';
    }

    $url = 'https://placehold.co/' . implode('/', array_filter($args));
    if (!empty($text)) {
        $url .= '?text=' . $text;
    }

    return $url;

}
