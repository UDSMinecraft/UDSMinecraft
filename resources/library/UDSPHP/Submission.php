<?php
class Submission {
    public static $highlight = array();
    public static $oldValues = array();
    public static $submissionMsg = "";

    public static function processSubmission($type) {
        switch ($type) {
            case "contact":
                $vars = array (
                    "from",
                    "msg",
                    "to"
                );
                $errors = Validate::postVars($vars);
                if (count($errors) > 0) {
                    self::formErrors($errors, $vars, " class='error'");
                    return;
                }
                if (!SQL::is_member($_POST["from"])) {
                    self::$submissionMsg = "You must be a member on the server to use this form.";
                    return;
                }
                Mailer::sendMessage($_POST["from"], $_POST["msg"], $_POST["to"]);
                self::$submissionMsg = "Your message has been sent! Thanks for contacting us.";
                break;
            case "upload":
                File::uploadFile($_FILES, $_POST["name"]);
                break;
            case "allow":
                File::approveUserContent($file);
                break;
            case "deny":
                File::removeUserContent($file);
                break;
            case "login":
                Login::loginUser();
                break;
            case "account":
                SQL::update_record();
                break;
            case "cookie":
                $_SESSION["hideCookie"] = true;
                break;
            case "redirect":
                break;
        }
    }

    private static function formErrors($errors, $vars, $insert) {
        foreach ($vars as $var) {
            if (isset($errors[$var])) {
                self::$highlight[$var] = $insert;
                self::$oldValues[$var] = "";
            } else {
                self::$highlight[$var] = "";
                self::$oldValues[$var] = $_POST[$var];
            }
        }
    }

    public static function checkSubmission() {
        global $background;
        global $backgroundDirectory;
        if (isset($_POST["submit"])) {
            self::processSubmission($_POST["submit"]);
            if (isset($_POST["bg"])) {
                $background = $_POST["bg"];
                $backgroundDirectory = explode("/", $background)[2];
            }
        }
    }
}
