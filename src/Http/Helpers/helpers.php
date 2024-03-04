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

function menuActive($routeName, $type = null, $param = null)
{
    if ($type == 3) {
        $class = 'active';
    } elseif ($type == 2) {
        $class = 'sidebar-submenu__open';
    } elseif ($type == 4) {
        $class = 'show';
    } else {
        $class = 'active';
    }

    if (is_array($routeName)) {
        foreach ($routeName as $key => $value) {
            if (request()->routeIs($value)) {
                return $class;
            }
        }
    } elseif (request()->routeIs($routeName)) {
        if ($param) {
            $routeParam = array_values(@request()->route()->parameters ?? []);
            if (strtolower(@$routeParam[0]) == strtolower($param)) {
                return $class;
            } else {
                return;
            }
        }

        return $class;
    }
}

function createMenuItem($id, $parentId, $name, $icon, $link = null, $active = null, $access = null)
{
    $linkType = $link ? 'link' : 'title';
    $linkName = is_array($link) ? $link[0] : $link;
    $linkActive = $active ?: $linkName;

    $linkStructure = [
        'type' => $linkType,
        'name' => $linkName,
        'active' => $linkActive,
        'open' => $linkActive,
    ];

    if (is_array($link) && count($link) > 1) {
        $linkStructure['params'] = array_slice($link, 1);
    }

    $menuItem = [
        'id' => $id,
        'parent_id' => $parentId,
        'name' => $name,
        'icon' => $icon,
        'link' => array_filter($linkStructure), // Убираем пустые поля
    ];

    if ($access !== null) {
        $menuItem['access'] = strpos($access, ':') === 0 ? $name . $access : $access;
    }

    return $menuItem;
}

function createNotify($icon = 'message', $title = null, $subtitle = null, $actions = null, $time = 5000)
{
    $obj = (object)['icon' => $icon,];
    if ($title) $obj->title = $title;
    if ($subtitle) $obj->subtitle = $subtitle;
    if ($actions) $obj->actions = $actions;
    if ($time) $obj->time = $time;

    return $obj;
}

function notifyActions($actions)
{
    $json = json_encode($actions);
    $json = preg_replace('/"cb":"(.*)"/', '"cb":$1', $json);
    echo $json;
}
