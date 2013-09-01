<?php
$timeStart = microtime(true);
set_error_handler(
    function ($type, $msg, $file, $line, $context) {
        Error::newError($type, $msg, $file, $line, $context);
    }
);
register_shutdown_function(
    function () {
        global $timeStart;
        $error = error_get_last();
        if ($error["type"] == "") {
            echo "<!-- Page generated in ".round((microtime(true) - $timeStart), 4)." seconds -->";
        } else {
            Error::newError($error["type"], $error["message"], $error["file"], $error["line"], "");
        }
    }
);
require "../resources/config.php";
require "../resources/Glob.php";
spl_autoload_register(
    function ($class) {
        include LIBRARY."/UDSPHP/$class.php";
    }
);
session_start();
list(Glob::$backgroundPath, Glob::$backgroundParent) = File::getBackground();
Glob::$menuTree = File::generateContentTree(CONTENT);
if (isset($_SESSION["username"])) {
    Glob::$menuTree["members"] = array("logout" => "/8_Members/0_Logout.php") + Glob::$menuTree["members"];
} else {
    Glob::$menuTree["members"] = array("login" => "/8_Members/0_Login.php") + Glob::$menuTree["members"];
}
Glob::$currentPage = DEFAULT_PAGE;
if (isset($_REQUEST["page"])) {
    $requestedPage = strtolower($_REQUEST["page"]);
    if (isset(Glob::$pageTitles[$requestedPage])) {
        Glob::$currentPage = $requestedPage;
    }
}
if(File::buildCSSMaster() == File::CHANGED) {
    File::appendCSSMaster(array(
        "body {".PHP_EOL,
        "    background: url('".GRAPHICS."/background/dark_dirt.png') fixed;".PHP_EOL,
        "}".PHP_EOL,
        "article {".PHP_EOL,
        "    background-image: url('".GRAPHICS."/background/dark_stone.png');".PHP_EOL,
        "}".PHP_EOL,
        CSS::genGradients("div#menu a", "#7A7A7A", "#4D4B4B"),
        CSS::genGradients("div#menu a:hover", "#4D4B4B", "#7A7A7A"),
        CSS::genGradients("div#menu a.dead", "#4D4B4B", "#7A7A7A"),
        CSS::genGradients("a#donate", "#F6D290", "#EBA729"),
        CSS::genGradients("a#donate:hover", "#EBA729", "#F6D290")
    ), "Extra Rules");
}
