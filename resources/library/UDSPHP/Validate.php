<?php
class Validate {
    public static function postVars($variables) {
        $notSet = array ();
        foreach ($variables as $var) {
            if (!isset($_POST[$var]) || empty($_POST[$var])) {
                $notSet[$var] = true;
            }
        }
        return $notSet;
    }

    public static function imageFile($file) {
        if($file["file"]["error"] > 0) {
            switch($file["file"]["error"]) {
                case 1:
                    return "This file is too big to upload.";
                case 4:
                    return "No file has been selected.";
                default:
                    return "Error code {$file["file"]["error"]}";
            }
        }
        if($file["file"]["type"] != "image/x-png" && $file["file"]["type"] != "image/png") {
            return "This file is not a valid .png format.";
        }
        if($file["file"]["size"] > 5000000) {
            return "This file is too big to upload.";
        }
        if(@end(explode(".", $file["file"]["name"])) != "png") {
            return "This file has a bad extension.";
        }
    }
}
