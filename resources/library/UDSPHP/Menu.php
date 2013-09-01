<?php
class Menu {
    public static function echoMenu($directory) {
?>
<div id='menu'> <!-- < HTML5 compat -->
    <!-- Begin PHP -->
<?php self::echoSubMenu($directory);?>
    <!-- End PHP -->
</div> <!-- < HTML5 compat -->
<?php
    }

    private static function echoSubMenu($directory) {
        $pageUrls = Glob::$pageUrls;
        $currentPage = Glob::$currentPage;
        $pageTitles = Glob::$pageTitles;
        echo "<ul>".PHP_EOL;
        foreach ($directory as $name => $url) {
            echo "    <li>";
            if (is_array($url)) {
                if (isset($pageUrls[$name]) && strpos($pageUrls[$name], ".php") > 0 && isset($url[$currentPage])) {
                    echo PHP_EOL."        <a class='dead' href='/$name'>".$pageTitles[$name]."</a>";
                } elseif (isset($url[$currentPage]) || $currentPage == $name) {
                    echo PHP_EOL."        <a class='dead'>".$pageTitles[$name]."</a>";
                } elseif (isset($pageUrls[$name]) && strpos($pageUrls[$name], ".php") > 0) {
                    echo PHP_EOL."        <a href='/$name'>".$pageTitles[$name]."</a>";
                } else {
                    echo PHP_EOL."        <a>".$pageTitles[$name]."</a>";
                }
                echo PHP_EOL."        <!-- Begin PHP -->".PHP_EOL;
                self::echoSubMenu($url);
                echo "        <!-- End PHP -->".PHP_EOL."    ";
            } else {
                if ($currentPage == $name) {
                    echo "<a class='dead'>".$pageTitles[$name]."</a>";
                } else {
                    echo "<a href='/$name'>".$pageTitles[$name]."</a>";
                }
            }
            echo "</li>".PHP_EOL;
        }
        echo "</ul>".PHP_EOL;
    }
}