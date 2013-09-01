<?php
global $login_success;
global $login_error;
global $pageName;
if (isset($login_success)) {
    loadPage();
} elseif (count($login_error) > 0) {
    echo "<div class='form'>";
    echo "<form method='post' action='/'>".PHP_EOL;
    echo "<p class='center'>".PHP_EOL."{$login_error[0]}</p>".PHP_EOL;
    echoButton("OK", $pageName, "", "redirect");
    echo "</form>".PHP_EOL;
    echo "</div>";
} elseif (!isset($red) && isset($_COOKIE["session"]) && isset($_COOKIE["member"]) && SQL::get_session_id($_COOKIE["member"]) == $_COOKIE["session"]) {
    loadPage();
} else {
    include(TEMPLATES."/login_form.php");
}
