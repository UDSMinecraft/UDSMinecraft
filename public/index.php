<!DOCTYPE html>
<?php
include "../resources/application/bootstrap.php";
$backgroundPath = Glob::$backgroundPath;
$pageName = Glob::$currentPage;
$pageTitle = Glob::$pageTitles[$pageName];
$pageUrl = Glob::$pageUrls[$pageName];
$menuTree = Glob::$menuTree;
?>
<!-- Document generated on <?=date("Y-m-d h:i:s")?> from Version <?=VERSION?> -->
<html>
    <head>
        <meta charset='utf-8'>
        <link rel='shortcut icon' href='<?=GRAPHICS?>/logo/uds.png' type='image/png'>
        <link rel='stylesheet' href='<?=CSS?>/master.css' type='text/css'>
        <style>div#main {background-image: url('<?=$backgroundPath?>');}</style>
        <title>UDSMinecraft - <?=$pageTitle?></title>
    </head>
    <body>
<?php if (!isset($_SESSION["hideCookie"])) {?>
        <div id='cookie'>
            <a href='/cookies'>
                <img src='<?=GRAPHICS?>/item/cookie.png' alt='A Minecraft cookie.'>
                <p>This site uses cookies, click the cookie to learn more.</p>
            </a>
        </div>
        <!-- Begin PHP -->
<?php
}
Menu::echoMenu($menuTree);
?>
        <!-- End PHP -->
        <div id='main'>
            <header>
                <h1><?=$pageTitle?></h1>
            </header>
            <article>
                <!-- Begin PHP -->
<?php
include $pageUrl;
include TEMPLATES."/footer.php";
?>
                <!-- End PHP -->
            </article>
        </div>
        <aside>
            <p id='cake'>The cake is a lie.</p>
        </aside>
    </body>
</html>
