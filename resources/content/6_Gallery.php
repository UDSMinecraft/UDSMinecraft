<?php
Submission::checkSubmission();
class GallerySections extends Sections {
    public $sections;
    private $users;
    private $admin;
    private $approvals;

    function __construct() {
        $this->users = File::scanFiles(UPLOADS);
        $this->sections = array_merge(array("The UDSMinecraft Gallery"), $this->users);
        if(isset($_COOKIE["member"]) && isset($_COOKIE["session"]) && SQL::is_admin($_COOKIE["member"], $_COOKIE["session"])) {
            $this->admin = true;
            $this->approvals = File::scanFiles(PENDING);
            $this->sections = array_merge(array("The UDSMinecraft Gallery"), array("Awaiting Approval"), $this->users);
        }
    }

    function echoSection($id) {
        if ($id == 0) {
?>
<p class='thin'>
    The gallery is the place to share the pictures and screen shots you have
    made on the server. Click on a thumbnail to open the full size image in a
    new window.
</p>
<p class='thin'>
    You can only submit images using this form if you are a member on the
    server. Using the <span class='cmd'>/password</span> command in-game will
    generate a password for you to use here.
</p>
<p class='thin'>
    At the moment, this form can only accept .png files up to 5MB in size.
</p>
<?php
            if (isset($file_upload_error) || isset($red)) {
                if (isset($red)) {
                    include(TEMPLATES."/upload_form.php");
                } else {
?>
<form method='post' action='/'>
    <p class='center'><?=$file_upload_error?></p>
    <!-- Begin PHP -->
<?php echoButton("OK", "gallery", "", "redirect");?>
    <!-- End PHP -->
</form>
<?php
                }
            } else if(isset($file_upload_success)) {
                echo("<p class='center'>Thanks for submitting your image!</p>".PHP_EOL);
            } else {
                $red = '';
                include(TEMPLATES."/upload_form.php");
            }
        } else if(isset($this->admin) && $id == 1) {
            echo "<div class='gallery imgborder'>".PHP_EOL;
            if (count($this->approvals) == 0) {
                echo "<p class='center'>No images currently need approval.</p>";
            }
            foreach ($this->approvals as $user) {
                echo "<h3>$user</h3>";
                foreach (scanFiles(PENDING . "/$user") as $file) {
                    $thumb = PENDING . THUMBS . "/$user/$file";
                    $full = PENDING . "/$user/$file";
                    if(!file_exists(PENDING . "/$user/$file")) {
                        if(!file_exists(PENDING . THUMBS . "/$user")) {
                            mkdir(PENDING . THUMBS . "/$user");
                        }
                        $img = imagecreatefrompng($full);
                        $tmp = imagecreatetruecolor(300, 168);
                        imagecopyresized($tmp, $img, 0, 0, 0, 0, 300, 168, imagesx($img), imagesy($img));
                        imagepng($tmp, $thumb);
                    }
?>
<a href='$full' target='_blank'><img src='<?=$thumb?>'></a>
<form method='post' action='/'>
    <input type='hidden' name='file' value='<?=$user/$file?>'>
    <!-- Begin PHP -->
<?php echoButton("", "gallery", "deny", "deny");?>
    <!-- End PHP -->
</form>
<form method='post' action='/'>
    <input type='hidden' name='file' value='<?=$user/$file?>'>
    <!-- Begin PHP -->
<?php echoButton("", "gallery", "allow", "allow");?>
    <!-- End PHP -->
</form>
<?php
                }
            }
            echo "</div>";
        } else {
            echo "<div class='gallery imgborder'>".PHP_EOL;
            $offset = 1;
            if (isset($admin)) {
                $offset = 2;
            }
            $files = scandir(ROOT.UPLOADS."/{$this->users[$id - $offset]}");
            foreach (array_slice($files, 2) as $file) {
                if (is_dir(UPLOADS."/{$this->users[$id - $offset]}/$file")) continue;
                $thumb = ROOT.UPLOADS."/{$this->users[$id - $offset]}".THUMBS."/$file";
                $full = ROOT.UPLOADS."/{$this->users[$id - $offset]}/$file";
                if (!file_exists(ROOT.UPLOADS.THUMBS."/{$this->users[$id - $offset]}/$file")) {
                    if (!file_exists(ROOT.UPLOADS."/{$this->users[$id - $offset]}".THUMBS)) {
                        mkdir(ROOT.UPLOADS."/{$this->users[$id - $offset]}".THUMBS);
                    }
                    $img = imagecreatefrompng($full);
                    $tmp = imagecreatetruecolor(300, 168);
                    imagecopyresized($tmp, $img, 0, 0, 0, 0, 300, 168, imagesx($img), imagesy($img));
                    imagepng($tmp, $thumb);
                }
                echo "<a href='$full' target='_blank'><img src='$thumb'></a>".PHP_EOL;
                if (isset($admin)) {
?>
<form method='post' action='/'>
    <input type='hidden' name='file' value='<?=$users[$id - $offset]?>/$file'>
    <!-- Begin PHP -->
<?php echoButton("", "gallery", "deny", "deny");?>
    <!-- End PHP -->
</form>
<?php
                }
            }
            echo "</div>";
        }
    }
}
HTML::linkBox(new GallerySections);
?>
