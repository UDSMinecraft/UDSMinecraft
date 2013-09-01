<?php
?>
<h2>UDSMinecraft Members</h2>
<div class='thin'>
<?php
foreach (SQL::get_members() as $key => $value) {
    echo "<img class='smallface' src='/".Image::getFace($value["name"])."'><a href='/profile/{$value["name"]}'>{$value["name"]}</a> - {$value["rank"]}<br></img>";
}
?>
</div>
<hr>
