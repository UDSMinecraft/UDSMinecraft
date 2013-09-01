<?php
if (isset($_COOKIE["member"]) && isset($_COOKIE["session"]) && SQL::get_session_id($_COOKIE["member"]) == $_COOKIE["session"]) {
    $loggedIn = true;
}
$error = " class='error'";
echo "<form action='/gallery' method='post' enctype='multipart/form-data'>";
if (!isset($loggedIn)) {
?>
    <label<?php if ($red == "name") echo($error);?>>
        Minecraft Username:<input type='text' name='name' maxlength='12'>
    </label>
    <label<?php if ($red == "password") echo($error);?>>
        UDS Password:<input type='password' name='password'>
    </label>
<?php
}
?>
    <label<?php if ($red == "file") echo($error);?>>
        File:<input class='long' type='file' name='file'>
    </label>
<?php
if (isset($loggedIn)) {
    echo "<input type='hidden' name='login' value='{$_COOKIE["member"]}'>";
}
?>
    <input type='hidden' name='submit' value='upload'>
    <input type='hidden' name='bg' value='<?=$GLOBALS["background"]?>'>
    <input type='submit' value='Upload'>
</form>
