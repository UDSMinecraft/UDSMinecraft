<?php
class HTML {
    public static function linkBox(Sections $sections) {
?>
<style scoped>
    div#linkbox {
        float: left;
        margin: 0 15px 15px 0;
        width: 200px;
        border: #888833 3px outset;
        background-color: rgba(88, 88, 33, 0.3);
    }
        div#linkbox p {
        text-align: center;
        color: #EEEE00;
        font-weight: bold;
        text-decoration: underline;
        margin: 14px auto 7px auto;
    }
        div#linkbox ol {
        margin: 7px 0 14px 0;
        text-align: left;
    }
        h2.linkbox_correction {
        margin-right: 215px;
    }
        span.linktotop {
        display: block;
        margin: 14px auto;
    }
        a.linkbox {
        padding: 0;
    }
</style>
<div id='linkbox'>
    <p class='title'>Jump to:</p>
    <ol>
<?php
        foreach ($sections->sections as $id => $section) {
            echo "        <li><a href='#".str_replace(" ", "", $section)."'>$section</a></li>".PHP_EOL;
        }
?>
    </ol>
</div>
<?php
        foreach ($sections->sections as $id => $section) {
            $correction = "";
            if ($id == 0){
                $correction = " class='linkbox_correction'";
            }
?>
<a class='linkbox' id='<?=str_replace(" ", "", $section)?>'></a>
<h2<?=$correction?>><?=$section?></h2>
<?php
            $sections->echoSection($id);
?>
<span class='linktotop'>
    <a href='#'>Top of page</a>
</span>
<hr>
<?php
        }
    }

    public static function echoButton($msg, $class, $type) {
        global $background;
        echo "<input type='hidden' name='bg' value='$background'>".PHP_EOL
            ."<input type='hidden' name='submit' value='$type'>".PHP_EOL
            ."<input class='$class' type='submit' value='$msg'>".PHP_EOL;
    }

    public static function echoBox($count, $global_prefix, $single_prefix, $single_suffix, $plural_prefix, $plural_suffix, $global_suffix) {
        if ($count == 0) {
            echo "<div class='redbox'>";
            $newcount = "no";
        } else {
            echo "<div class='greenbox'>";
            $newcount = $count;
        }
        echo $global_prefix;
        if ($newcount == 1) {
            echo $single_prefix.$newcount.$single_suffix;
        } else {
            echo $plural_prefix.$newcount.$plural_suffix;
        }
        echo "$global_suffix</div>".PHP_EOL;
    }

    public static function echoLogoLink($name, $link) {
        $alts = array(
            "youtube" => "YouTube Channel",
            "twitter" => "Twitter Feed",
            "twitch" => "Twitch Channel",
            "tumblr" => "Tumblr Feed",
            "klout" => "Klout Overview",
            "steam" => "Steam Profile",
            "backloggery" => "Backloggery",
            "kongregate" => "Kongregate Profile",
            "facebook" => "Facebook Page",
            "skype" => "Add to Skype",
            "google" => "Google+ Profile"
        );
?>
<a class='icon' href='<?=$link?>' target='_blank'>
    <span><img src='<?=GRAPHICS?>/icon/<?=$name?>.png' alt='<?=$alts[$name]?>'></span>
</a>
<?php
    }
}
