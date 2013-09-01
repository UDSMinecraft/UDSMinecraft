<?php
if(!isset($_COOKIE['session']) && !isset($_COOKIE['member'])) {
?>
<h3>You are already logged out!</h3>
<div class='center'>
    <p>
        Did you actually want to <a href='login'>login</a>?
    </p>
    <p>
        Maybe you just want to head back to the <a href='home'>home</a> page.
    </p>
    <p>
        Well if it's not the cute
        <a href='https://www.google.co.uk/search?q=cute%20kittens&tbm=isch' target='_blank'>kittens</a>,
        you must be headed over to the
        <a href='http://www.minecraftforum.net/' target='_blank'>Minecraft Forums</a>!
    </p>
</div>
<hr>
<?php
} else {
    function loadPage() {
        logout();
?>
<h3>You have been logged out!</h3>
<div class='center'>
    <p>
        Maybe this was an accident and you want to <a href='login'>login</a> again?
    </p>
    <p>
        Maybe you just want to head back to the <a href='home'>home</a> page.
    </p>
    <p>
        Well if it's not the cute
        <a href='https://www.google.co.uk/search?q=cute%20kittens&tbm=isch' target='_blank'>kittens</a>,
        you must be headed over to the
        <a href='http://www.minecraftwiki.net/wiki/Main_Page' target='_blank'>Minecraft Wiki</a>!
    </p>
</div>
<hr>
<?php
    }
    include(TEMPLATES.'/members_area.php');
}
?>