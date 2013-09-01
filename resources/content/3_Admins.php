<script type='text/javascript' src='js/clock.js'></script>
<?php
HTML::echoBox(SQL::countActiveAdmins(), "There ", "is ", " UDS Admin", "are ", " UDS Admins", " online.");
class AdminsSections extends Sections {
    public $sections = array(
        "Meet the UDS Admins",
        "UndeadScythes",
        "Magazine2",
        "Redcomet1972",
        "DruBadertscher"
    );

    public function echoSection($id) {
        switch($id) {
            case 0:
?>
<p>
    The UDS Admins do their very best to keep the server up and running
    smoothly. Whether this involves organizing new events in which you can win
    VIP time or special items or adding new worlds and minigames for you to
    explore the UDS Admins are always busy making UDSMinecraft a unique and
    enjoyable experience for you.
</p>
<?php
            break;
        case 1:
?>
<h3>Founder & Programmer</h3>
<img src='/<?=GRAPHICS?>/head/uds.png'>
<br>
<pre id='uds-clock' class='clock'></pre>
<br>
<?php
            HTML::echoLogoLink("youtube", "http://www.youtube.com/user/undeadscythes");
            HTML::echoLogoLink("steam", "http://steamcommunity.com/id/undeadscythes/");
            HTML::echoLogoLink("kongregate", "http://www.kongregate.com/accounts/UndeadScythes");
            HTML::echoLogoLink("backloggery", "http://www.backloggery.com/undeadscythes");
            HTML::echoLogoLink("twitch", "http://www.twitch.tv/undeadscythes");
            HTML::echoLogoLink("skype", "skype:undeadscythes?add");
            HTML::echoLogoLink("twitter", "https://twitter.com/UndeadScythes");
            HTML::echoLogoLink("klout", "http://klout.com/UndeadScythes");
            HTML::echoLogoLink("facebook", "https://www.facebook.com/daveywavygravy");
            HTML::echoLogoLink("google", "https://plus.google.com/106152819568635557112/posts");
?>
<p class='thin'>
    UndeadScythes, also known as Dave or simply UDS, is the founder and owner of
    UDSMinecraft. Back in 2010 Dave had no idea he was to going to be running a
    popular public multiplayer Minecraft server in his spare time. In early 2011
    things changed. After starting a server on Hamachi with the goal of teaching
    a friend how to play Minecraft he opened the server to his YouTube audience
    and the rest, as they say, is history.
</p>
<?php
            break;
        case 2:
?>
<h3>Builder & Website Designer</h3>
<img src='/<?=GRAPHICS?>/head/mag.png'>
<br>
<pre id='mag-clock' class='clock'></pre>
<br>
<?php HTML::echoLogoLink("youtube", "http://www.youtube.com/user/MyMagazine2");?>
<p class='thin'>
    Magazine2, more commonly known as Mag, is the website designer and a builder
    for UDSMinecraft. Mag joined Dave's Hamachi server in March 2011. He was
    soon made Moderator, and later he was promoted to Admin. Mag has
    participated in many collaborations with Dave, such as recording Minecraft
    challenge maps which can be found on Dave's YouTube channel. In early 2013,
    Mag started a to design a new spawn area for UDSMinecraft which is the same
    area that exists on the server today.
</p>
<?php
            break;
        case 3:
?>
<h3>Builder & Redstone Engineer</h3>
<img src='/<?=GRAPHICS?>/head/jon.png'>
<br>
<pre id='jon-clock' class='clock'></pre>
<br>
<?php HTML::echoLogoLink("youtube", "http://www.youtube.com/user/redcomet1972");?>
<p class='thin'>
    Redcomet1972, also known as Jon or Redkiller, is a builder on UDSMinecraft.
    After meeting Dave through a common acquaintance on Xbox, Dave joined Jon's
    home hosted server and they became good friends. He first joined the server
    in May 2012, wanting to help out Atisme, Mag and Dave in building spawn. Jon
    is well known for his vast knowledge of and love for redstone circuitry of
    all kinds.
</p>
<?php
            break;
        case 4:
?>
<h3>Builder & Coding Apprentice</h3>
<img src='/<?=GRAPHICS?>/head/dru.png'>
<br>
<pre id='dru-clock' class='clock'></pre>
<br>
<?php HTML::echoLogoLink("youtube", "http://www.youtube.com/user/92futurecop");?>
<p class='thin'>
    DruBadertscher, better known as Dru a builder on UDSMinecraft and girlfriend
    of Jon. Dru first met Dave when he was building on Jon's home hosted server
    and they soon became good friends. Dru first joined the server in May 2012
    along with Jon and showed great interest in becoming an Admin. Dru also
    presented a desire to help with the coding of the plugin that runs on
    UDSMinecraft and quickly learnt the layout of the project and began to make
    valuable contributions.
</p>
<?php
                break;
        }
    }
}
HTML::linkBox(new AdminsSections);
?>
