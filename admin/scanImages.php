<?php

$list = array();
$dir = "../media/";
$a_dir = "/teamire/media/";
$exclude = array(".", "..", ".png", "error_log", "_notes");
if (is_dir($dir)) {
    $files = scandir($dir);
    foreach ($files as $file) {
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        if ($extension == "png" || $extension == "jpg" || $extension == "jpeg") {
            $list3 = array(
                'image' => $a_dir.$file,
                'thumb' => $a_dir.$file);
            array_push($list, $list3);
        }
    }
    $fp = fopen('images_list.json', 'w');
    fwrite($fp, json_encode($list));
    fclose($fp);
    rename("images_list.json", "../media/images_list.json");
}

