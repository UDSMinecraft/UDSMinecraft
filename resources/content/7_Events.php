<?php
class EventsSections extends Sections {
    public $sections = array(
        "Pixel Art Comp",
        "House Comp",
        "YouTube Video Comp"
    );

    public function echoSection($id) {
        switch ($id) {
            case 0:
?>
<p class='thin'>
    Head into the Creative world and impress the other players with your pixel
    art. Dave will be heading up the judging of this competition. Good luck to
    all who enter!
</p>
<?php
                break;
            case 1:
?>
<p class='thin'>
    The best house built in survival wins this competition, leading the panel of
    judges will be Mag, so make sure to make your house epic. Remember half the
    battle is finding a good location!
</p>
<?php
                break;
            case 2:
?>
<div>
    <p class='thin'>
        Upload a video to YouTube featuring the server and send the video to the UDS
        Minecraft YouTube page to enter. Whether you are building, fighting monsters
        or trading sticks for gold, we want to see it.
    </p>
    <!-- Begin PHP -->
<?php HTML::echoLogoLink('youtube', 'http://www.youtube.com/user/udsminecraft');?>
    <!-- End PHP -->
</div>
<?php
                break;
        }
    }
}
HTML::linkBox(new EventsSections);
?>
