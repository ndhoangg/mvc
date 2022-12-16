<?php
namespace app\util;

class Validator{
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public static function validateName($name) {
        return preg_match("/^[a-zA-Z-' ]*$/", $name);
    }

    public static function validateImage($name,$dir,$size){

    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    
    // Get image file extension
    $file_extension = pathinfo($name, PATHINFO_EXTENSION);
    
    // Validate file input to check if is not empty
    if (! file_exists($dir)) {
         return $response = array(
            "success" => false,
            "message" => "Choose image file to upload."
        );
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
         return $response = array(
            "success" => false,
            "message" => "Upload valid images. Only PNG and JPEG are allowed."
        );
    }    // Validate image file size
    else if (($size > 2000000)) {
         return $response = array(
            "success" => false,
            "message" => "Image size exceeds 2MB"
        );
    }    // Validate image file dimension
    else {
        $target = SITE_ROOT.'/uploads/' .$name;
        if (move_uploaded_file($dir, $target)) {
            move_uploaded_file($dir, $target);
             return $response = array(
                "success" => true,
                "message" => "Image uploaded successfully."
            );
        } else {
             return $response = array(
                "success" => false,
                "message" => "Problem in uploading image files."
            );
        }
    }
}



    }




?>
