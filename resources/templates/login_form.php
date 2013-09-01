<?php
global $red;
global $background;
global $pageName;
?>
<form action='/' method='post' enctype='multipart/form-data'>
    <label<?php if($red == "name") echo " class='error'";?>>
        Minecraft Username:
        <input type='text' name='mc_name' maxlength='12'>
    </label>
    <label<?php if($red == "password") echo " class='error'";?>>
        UDS Password:
        <input type='password' name='password'>
    </label>
    <label>
        Keep me logged in:
        <input type='checkbox' name='keep' value='keep'>
    </label>
    <input type='hidden' name='submit' value='login'>
    <input type='hidden' name='thanks' value='<?=$GLOBALS["currentPage"]?>'>
    <input type='hidden' name='bg' value='<?=$GLOBALS["background"]?>'>
    <input type='submit' value='Login'>
</form>
<form class='strip' action='/' method='post'>
    <!-- Begin PHP -->
<?php
HTML::echoButton("I forgot my password.", $pageName, "link", "password");
?>
    <!-- End PHP -->
</form>
<p class='center cookie'>
    By logging into this website you agree to allow us to place a
    <a href='http://en.wikipedia.org/wiki/HTTP_cookie' target='_blank'>cookie</a> on your computer to keep you logged in.
</p>
<p class='center cookie'>
    We will not store or access any personally identifying information.
</p>
<hr>
