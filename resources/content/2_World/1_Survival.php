<?php
HTML::echoBox(SQL::countPlayers("survival"), "There ", "is ", " player", "are ", " players", " online in the Survival world.");
class SurvivalSections extends Sections {
    public $sections = array(
        "How to Start",
        "Custom Recipes",
        "Special Feature",
        "Rules",
        "Handy Commands"
    );
    public function echoSection($id) {
        switch($id) {
            case 0:
?>
<p>
    UDSMinecraft tries to keep the adventure of survival alive whilst also
    adding a few perks of modern day society such as trading, protected regions
    and clans. Join up with friends and compete to be the strongest, richest or
    most feared group on the server. Or go it alone!
</p>
<p>
    When you first connect your top priority should be to check out the rules
    and start to make a little money to promote yourself. For example, you can
    do this by helping to kill monsters at night or mining for ores to sell to
    players. If you have other friends online they may be willing to cover your
    costs and fast track you on the road to success.
</p>
<p>
    Next you choose your path, find a clan and prove yourself a mighty warrior,
    settle down to build a home and breed animals for a living, mine to bedrock
    and sell your ores to become the richest player on the server or something
    completely different.
</p>
<?php
                break;
            case 1:
?>
<div class='thin imgborder'>
    <h3>Chainmail Armor:</h3>
    <p>Get geared up on the cheap!</p>
    <img src='/<?=GRAPHICS?>/craft/chain_helm.png'>
    <img src='/<?=GRAPHICS?>/craft/chain_body.png'>
    <img src='/<?=GRAPHICS?>/craft/chain_legs.png'>
    <img src='/<?=GRAPHICS?>/craft/chain_boots.png'>
    <h3>Brick Blocks:</h3>
    <p>No more hunting down strongholds to get these rare blocks!</p>
    <img src='/<?=GRAPHICS?>/craft/mossy_brick.png'>
    <img src='/<?=GRAPHICS?>/craft/cracked_brick.png'>
    <img src='/<?=GRAPHICS?>/craft/circle_brick.png'>
    <img src='/<?=GRAPHICS?>/craft/mossy_cobble.png'>
    <h3>Ice Block:</h3>
    <p>Handle with care!</p>
    <img src='/<?=GRAPHICS?>/craft/ice_block.png'>
    <h3>Snow:</h3>
    <p>These layers can be stacked to create up to 8 heights of snow!</p>
    <img src='/<?=GRAPHICS?>/craft/snow_layer.png'>
    <h3>Grass Block:</h3>
    <p>Grass, where YOU want it!</p>
    <img src='/<?=GRAPHICS?>/craft/grass_block.png'>
    <h3> Mystery Recipe:</h3>
    <p>The mystery recipe. Keep trying, it's gotta be something!</p>
    <img src='/<?=GRAPHICS?>/craft/mystery.png'>
</div>
<?php
                break;
            case 2:
?>
<div class='thin'>
    <p>
        Do you want to stand out on the server or show off your expert combat
        skills? When you kill another player they may drop their head as an
        item. If you manage to kill one of the UDS Admins in the Survival world,
        you will be rewarded with their head, which you can wear or place as a
        rare trophy!
    </p>
</div>
<h3>Heads:</h3>
<div>
    <img src='/<?=GRAPHICS?>/head/uds.png'>
    <img src='/<?=GRAPHICS?>/head/mag.png'>
    <img src='/<?=GRAPHICS?>/head/jon.png'>
    <img src='/<?=GRAPHICS?>/head/dru.png'>
</div>
<?php
                break;
            case 3:
                include(TEMPLATES.'/rules.php');
                break;
            case 4:
?>
<div class='thin cmd'>
    <h3>Home Commands</h3>
    <ul>
        <li><span>/home make</span> Set a new home protection. (<span>500 credits</span>)</li>
        <li><span>/home</span> Teleport to your home.</li>
        <li><span>/home set</span> Set your home warp point.</li>
        <li><span>/home clear</span> Clear your home protection.</li>
        <li><span>/home sell [player] [price]</span> Sell your home to a player</li>
        <li><span>/home add [player)</span> Add a player as a room mate.</li>
        <li><span>/home roomies</span> Check your current room mates.</li>
        <li><span>/home [player]</span> Teleport to a room mates home.</li>
        <li><span>/home boot [player] -</span> Forcibly boot a player from your home.</li>
        <li><span>/home lock</span> Lock your house.</li>
        <li><span>/home unlock</span> Unlock your house.</li>
    </ul>
</div>
<?php
                break;
        }
    }
}
HTML::linkBox(new SurvivalSections);
?>
