<?php
class File {
    const NOT_CHANGED = 0;
    const CHANGED = 1;

    public static function uploadFile($directory) {
    //    require_once(LIBRARY . 'sql_handler.php');
    //    global $red;
    //    global $file_upload_error;
    //    global $file_upload_success;
    //    if(isset($_POST['login'])) {
    //        $mc_name = $_POST['login'];
    //    } else {
    //        if(!isset($_POST['mc_name']) || $_POST['mc_name'] == '') {
    //            $red = 'name';
    //            return;
    //        }
    //        $mc_name = $_POST['mc_name'];
    //        if(!is_member($mc_name)) {
    //            $file_upload_error = 'You need to be a member on the server.';
    //            return;
    //        }
    //        if(!isset($_POST['password']) || $_POST['password'] == '') {
    //            $red = 'password';
    //            return;
    //        }
    //        $password = $_POST['password'];
    //        if(!good_password($mc_name, $password)) {
    //            $file_upload_error = 'You have entered a bad password.';
    //            return;
    //        }
    //    }
//        $directory = PENDING."/$username";
        if(!file_exists($directory)) {
            mkdir($directory);
        }
        $filePath = "$directory/".uniqid().".png";
        move_uploaded_file($_FILES["file"]["tmp_name"], $filePath);
//        Image::generateThumbnail($filePath);
//        $thumbnailPath = PENDING."/$username/".THUMBS;
//        if(!file_exists($thumbnailPath)) {
//            mkdir($thumbnailPath);
//        }
//        $image = @imagecreatefrompng($filePath);
//        $thumbnail = imagecreatetruecolor(300, 168);
//        @imagecopyresized($thumbnail, $image, 0, 0, 0, 0, 300, 168, imagesx($image), imagesy($image));
//        imagepng($thumbnail, $thumbnailPath.'/'.$fileName);
    }

    public static function approveUserContent($file) {
        $username = explode('/', $file)[0];
        foreach(array(IMAGES, THUMBS) as $dir) {
            if(!file_exists(USER_CONTENT . "/$dir/$username")) {
                mkdir(USER_CONTENT . "/$dir/$username");
            }
            copy(PENDING_CONTENT . "/$dir/$file", USER_CONTENT . "/$dir/$file");
            unlink(PENDING_CONTENT . "/$dir/$file");
            if(count(scandir(PENDING_CONTENT  . "/$dir/$username")) == 2) {
                rmdir(PENDING_CONTENT . "/$dir/$username");
            }
        }
    }

    public static function removeUserContent($file) {
        $user = explode('/', $file)[0];
        foreach(array(IMAGES, THUMBS) as $dir) {
            if(file_exists(USER_CONTENT . "/$dir/$file")) {
                unlink(USER_CONTENT . "/$dir/$file");
                if(count(scandir(USER_CONTENT . "/$dir/$user")) == 2) {
                    rmdir(USER_CONTENT . "/$dir/$user");
                }
            } else {
                unlink(PENDING_CONTENT . "/$dir/$file");
                if(count(scandir(PENDING_CONTENT . "/$dir/$user")) == 2) {
                    rmdir(PENDING_CONTENT . "/$dir/$user");
                }
            }
        }
    }

    public static function generateContentTree($path) {
        $directoryTree = array();
        $maxIndex = 0;
        foreach(self::scanFiles($path) as $fileName) {
            $fileNameSplit = explode('_', str_replace('.php', '', $fileName));
            $pageIndex = intval($fileNameSplit[0]);
            $maxIndex = max(array($maxIndex, $pageIndex));
            $pageTitle = implode(' ', array_slice($fileNameSplit, 1));
            $pageName = strtolower(str_replace(' ', '', $pageTitle));
            Glob::$pageTitles[$pageName] = $pageTitle;
            $pageUrl = "$path/$fileName";
            Glob::$pageUrls[$pageName] = $pageUrl;
            if(is_dir($pageUrl)) {
                $directoryTree[$pageIndex] = array($pageName => self::generateContentTree($pageUrl));
            } else if(!isset($directoryTree[$pageIndex])) {
                $directoryTree[$pageIndex] = array($pageName => $pageUrl);
            }
        }
        $resultTree = array();
        for($i = 1; $i <= $maxIndex; $i++) {
            if(isset($directoryTree[$i])) {
                foreach($directoryTree[strval($i)] as $key => $value) {
                    $resultTree[$key] = $value;
                }
            }
        }
        return $resultTree;
    }

    public static function scanFiles($dir) {
        if(strpos($dir, ROOT) === 0) {
            $absoluteDir = $dir;
        } else {
            $absoluteDir = ROOT.$dir;
        }
        return array_values(array_diff(scandir($absoluteDir), array(".", "..")));
    }

    public static function getBackground() {
        if (isset($_SESSION["background"])) {
            $file = $_SESSION["background"];
            $_SESSION["background"] = "";
            $fileSplit = explode("/", $file);
            $directory = $fileSplit[count($fileSplit) - 2];
        } else {
            $uploadDirectories = self::scanFiles(UPLOADS);
            $directory = $uploadDirectories[rand(0, count($uploadDirectories) - 1)];
            $images = self::scanFiles(UPLOADS."/$directory");
            do {
                $image = $images[rand(0, count($images) - 1)];
            } while (is_dir(UPLOADS."/$directory/$image"));
            $file = UPLOADS."/$directory/$image";
        }
        return array($file, $directory);
    }

    public static function buildCSSMaster() {
        $path = CSS_MASTER;
        //if (!is_file($path) || filemtime($path) + 60 * 60 < time()) {
            $master = fopen($path, "w");
            fwrite($master, "/* Stylesheet generated on ".date("Y-m-d h:i:s")." */".PHP_EOL);
            foreach (self::scanFiles(CSS) as $stylesheet) {
                if ($stylesheet == "master.css") continue;
                fwrite($master, "/* $stylesheet */".PHP_EOL);
                fwrite($master, file_get_contents(ROOT."/".CSS."/$stylesheet"));
            }
            fclose($master);
            return self::CHANGED;
        //}
        return self::NOT_CHANGED;
    }

    public static function appendCSSMaster($lines, $title) {
        $path = CSS_MASTER;
        if (is_file($path)) {
            $master = fopen($path, "a");
            fwrite($master, "/* $title */".PHP_EOL);
            foreach ($lines as $line) {
                fwrite($master, $line);
            }
            fclose($master);
        }
    }
}
