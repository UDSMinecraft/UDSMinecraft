<?php
global $highlight;
global $oldValues;
?>
<form method='post' action='/contact'>
    <label<?=$highlight["from"]?>>
        Minecraft Username:
        <input type='text' name='from' maxlength='12' size='30' value='<?=$oldValues["from"]?>'>
    </label>
    <label>
        Contact:
        <select name='to' size='1'>
<?php
foreach ($contacts as $contact => $hide_me) {
    if($oldValues["to"] == $contact) {
        echo "            <option value='$contact' selected>$contact</option>".PHP_EOL;
    } else {
        echo "            <option value='$contact'>$contact</option>".PHP_EOL;
    }
}
?>
        </select>
    </label>
    <label<?=$highlight["msg"]?>>
        Message:
        <textarea name='msg' maxlength='1000' cols='25' rows='6'><?=$oldValues["msg"]?></textarea>
    </label>
    <input type='hidden' name='bg' value='<?php echo($background)?>'>
    <input type='hidden' name='submit' value='contact'>
    <input type='submit' value='Send'>
</form>
