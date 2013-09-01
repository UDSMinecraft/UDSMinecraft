<?php
include(TEMPLATES.'/members_area.php');
function loadPage() {
    global $account_update_error;
    global $account_update_success;
    global $background;
    global $red;
    $name = $_COOKIE['member'];
    $record = get_record($name);
?>
<h2><?php echo($name);?>'s Account Settings</h2>
<div class='form'>
<?php
    if(isset($account_update_error)) {
        require_once(LIBRARY.'/html.php');
        echo("<form method='post' action='/'>");
        echo("<p class='center'>".PHP_EOL.$account_update_error.'</p>');
        echoButton('OK', 'account', '', 'redirect');
        echo('</form>');
    } else if(isset($account_update_success)) {
        echo("<p class='center'>Your changes have been saved!</p>");
    } else {
?>
    <p class='thin'>
        Add whichever details you wish, leave the new password field blank if you do
        not want to change your password.
    </p>
    <form name='account' method='post' action='/'>
        <label for='old_pass'<?php if($red == 'password') echo(" class='error'");?>>Current Password:</label>
        <input type='password' id='old_pass' name='old_pass'>
        <label for='new_pass'>New Password:</label>
        <input type='password' id='new_pass' name='new_pass'>
        <label for='email'>Email:</label>
        <input type='text' id='email' name='email' value='<?php echo($record['email']);?>'>
        <label for='real'>Real Name:</label>
        <input type='text' id='real' name='real' value='<?php echo($record['real']);?>'>
        <label for='time'>Time Zone:</label>
        <select id='time' name='time' size='1'>
<?php
$selected = 0;
if($record['time'] != '') {
    $selected = intval($record['time']);
}
for($i = -11; $i <= 14; $i++) {
    echo("<option value='$i'");
    if($i == $selected) {
        echo(' selected');
    }
    if($i >= 0) {
        echo('>UTC +$i');
    } else {
        echo('>UTC $i');
    }
    echo('</option>');
}
?>
        </select>
        <input type='hidden' name='name' value='<?php echo($name)?>'>
        <input type='hidden' name='thanks' value='account'>
        <input type='hidden' name='bg' value='<?php echo($background)?>'>
        <input type='hidden' name='submit' value='account'>
        <input type='submit' value='Submit Changes' id='submit'>
    </form>
<?php
    }
    ?>
</div>
<hr>
<?php
}
?>