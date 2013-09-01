<?php
global $background;
global $submissionMsg;
Submission::checkSubmission();
if(Sock::getServerStatus() == Sock::ONLINE) {
    $players = count_players("total");
    echoBox($players, "There ", "is ", " player", "are ", " players", " online on the server.");
} else {
    if(isset($submissionMsg)) {
        echo("<div class='greenbox'>An Admin has been informed, please check back soon.</div>");
    } else {
?>
<div class='redbox'>
    <form class='strip' method='post' action='/home'>
        <input type='hidden' name='bg' value='<?=$background?>'>
        <input type='hidden' name='from' value='Player'>
        <input type='hidden' name='to' value='<?=DEFAULT_CONTACT?>'>
        <input type='hidden' name='msg' value='Please turn the server on!'>
        <input type='hidden' name='submit' value='contact'>
        <input class='clicky' type='submit' value='The server is currently offline. Click this banner to nag an Admin to turn it on.'>
    </form>
</div>
<?php
    }
}
?>
<h2>UDSMinecraft</h2>
<p>
    Welcome to UDSMinecraft, a hybrid CraftBukkit Minecraft server founded in
    early 2010 that offers both Survival and Creative modes of play along with a
    host of other interesting and exciting minigames.
</p>
<p>
    We aim to bring you the best of online Minecraft gameplay no matter what
    you're into or where you're from. With a constantly expanding Survival world
    and near limitless space on a Creative world there will always be room for
    something new.
</p>
<p>
    With our bespoke CraftBukkit plugin, the aptly named UDSPlugin, we can offer
    a very broad range of services and enhancements to Vanilla Minecraft online
    multiplayer experiences.
</p>
<hr>
<?php
class HomeSections extends Sections {
    public $sections = array(
        "How to Join",
        "The Portal Hub",
        "Support UDSMinecraft",
        "Social Links"
    );

    public function echoSection($id) {
        switch ($id) {
            case 0:
?>
<div class="thin">
    <p>
        To join the server and begin your adventure you simply have to type
        <span class="cmd">udsminecraft.com</span> into your Minecraft client as
        shown below. If you have any issues logging in check the server status
        at the top of the page. If you still have problems please
        <a href ='/contact'>contact</a> us.
    </p>
    <img class='stretch imgborder' src='<?=GRAPHICS?>/etc/mc_client.png' alt='Login instructions'>
</div>
<?php
                break;
           case 1:
?>
<p class='thin'>
    When you first login you will find yourself in the Portal Hub, an area
    where the Admins are free to build things, players can relax
    and show off their new skins and just generally talk Minecraft. Around
    the central area are a number of portals leading to the various worlds
    of UDSMinecraft and a small passage with a brief description of some of
    the server commands. To get back to the Portal Hub at any time just
    enter the portal in your current world's spawn area.
</p>
<?php
                break;
            case 2:
?>
<div class='thin'>
    <p>
        We appreciate any kind of support from our members and are happy to
        reward those that are generous to us. Visit the
        <a href='/onlineshop'>online store</a> to buy various perks and items in game.
        If you would like to donate towards the costs of running the server
        please click the button below.
    </p>
    <a id='donate' href='#'>Donate</a>
    <br>
    <p class='center'>
        If you would like to show your support on a forum you can use our
        official forum banner shown below.
    </p>
</div>
<a class='img' href='<?=GRAPHICS?>/banner/udsmc.png'><img class='stretch' src='<?=GRAPHICS?>/banner/udsmc.png' alt='Signature Banner'></a>
<p class='thin center'>
    Use this URL <a href='<?=BANNER?>'><?=BANNER?></a> to link to this banner.
</p>
<?php
                break;
            case 3:
?>
<p class="thin center">
    Visit or follow UDSMinecraft to get all the latest news and information
    about events at the following places:
</p>
<?php
            HTML::echoLogoLink("youtube", "http://www.youtube.com/user/udsminecraft");
            HTML::echoLogoLink("facebook", "https://www.facebook.com/pages/UDS-Minecraft/423650920990106");
            HTML::echoLogoLink("twitter", "https://twitter.com/UDSminecraft");
            echo "<br>";
                break;
        }
    }
}
HTML::linkBox(new HomeSections);
?>
