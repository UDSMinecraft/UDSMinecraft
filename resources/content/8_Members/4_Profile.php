<?php
if(isset($_GET["name"])) {
    $name = $_GET["name"];
    $record = SQL::get_record($name);
?>
<h2><?php echo($name);?></h2>
<img src='/<?=Image::getFace($name)?>'>
<?php if($record["real"] != "") echo "<p class='center'>Real name: {$record["real"]}</p>";?>
<p class='center'>Coming soon: PMs, 'About Me' and a friends list!</p>
<a href='/profile'>Back to Member List</a>
<hr>
<?php
} else {
    include(TEMPLATES."/directory.php");
}
?>
