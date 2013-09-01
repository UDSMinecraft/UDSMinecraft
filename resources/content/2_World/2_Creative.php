<?php
HTML::echoBox(SQL::countPlayers("creative"), "There ", "is ", " player", "are ", " players", " online in the Creative world.");
class CreativeSections extends Sections {
    public $sections = array(
        "How it Works",
        "Handy Commands",
        "Rules"
    );

    function echoSection($id) {
        switch($id) {
            case 0:
?>
<p>
    The creative world is the place to be if you want to build without limits.
    You will be able to claim up to four plots 44 blocks in each direction which
    are protected from bedrock to the sky limit. The whole of Creative world is
    a superflat, which means that the entire world is just four blocks deep: a
    layer of bedrock, which you are allowed to break, two layers of dirt and a
    layer of grass.
</p>
<img class='stretch' src='<?=GRAPHICS?>/etc/superflat.png'>
<p>
    You are not allowed to transfer items or experience from the Creative world
    to the Survival world and for that reason a small number of items are not
    permitted. If you are caught abusing a bug to do get around this restriction
    the UDS Admins will take action.
</p>
<h3>Restricted items</h3>
<div class='imgborder'>
    <img src='<?=GRAPHICS?>/item/ender_chest.gif'>
    <img src='<?=GRAPHICS?>/item/exp_bottle.png'>
</div>
<?php
                break;
            case 1:
?>
<div class='thin cmd'>
    <ul>
        <li><span>/plot claim -</span> Claim the area you are standing in.</li>
        <li><span>/plot name (plot) [name] -</span> Rename a plot.</li>
        <li><span>/plot tp [plot] -</span> Teleport to your plot.</li>
    </ul>
</div>
<?php
                break;
            case 2:
                include(TEMPLATES.'/rules.php');
                break;
        }
    }
}
HTML::linkBox(new CreativeSections);
?>