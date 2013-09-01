<style scoped>
    div#map {
        width: 100%;
    }
    div#map iframe {
        width: 100%;
        height: 600px;
        border: #826653 3px outset;
    }
    div#map img {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 30px;
        padding: 1%;
        opacity: .9;
        width: 98%;
    }
</style>
<h2>UDSMinecraft Live Map</h2>
<?php
$url = "http";
if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
    $url .= "s";
}
$url .= "://{$_SERVER['SERVER_NAME']}:8123";
$map = Sock::getMapStatus();
if($map == true) {
    echo("<div id='map'><iframe src='$url'>Update your browser to view this live map. (We use an iframe here.)</iframe>");
} else {
?>
<div id='map'>
    <p class='thin center'>
        The UDS Minecraft Live Map shows all online players and all the worlds
        currently generated on the server... sadly it's not working right now so
        please check back later.
    </p>
    <img src='/<?=GRAPHICS?>/etc/no_map.png'>
    <hr>
<?php
}
?>
</div>
