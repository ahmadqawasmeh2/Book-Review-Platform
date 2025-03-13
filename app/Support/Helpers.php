<?php


if (!function_exists("upImage")) {
    function upImage($image, $directory)
    {
        $base_path = "public/uploads/" . $directory;
        $filename  = md5(strtotime(date("Y-m-d H:i:s")) . rand(1111, 9999)) . "." . $image->getClientOriginalExtension();
        $image->move(public_path($base_path), $filename);
        return  $base_path . "/" . $filename;
    }
}
