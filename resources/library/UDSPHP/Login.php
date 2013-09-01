<?php
class Login {
    function checkLogin() {
        include(LIBRARY . '/sql_handler.php');
        global $red;
        global $login_error;
        global $login_success;
        $login_error = array();
        if(!isset($_POST["mc_name"]) || $_POST["mc_name"] == "") {
            $red = "name";
            return;
        }
        $mc_name = $_POST["mc_name"];
        require_once(LIBRARY . '/sql_handler.php');
        if(!is_member($mc_name)) {
            $login_error[] = "You need to be a member on the server.";
            return;
        }
        if(!isset($_POST["password"]) || $_POST["password"] == "") {
            $red = "password";
            return;
        }
        $password = $_POST["password"];
        if(!good_password($mc_name, $password)) {
            $login_error[] = "You have entered a bad password.";
            return;
        }

        if(isset($_POST["keep"])) {
            setcookie("member", $mc_name, time() + 31536000);
            setcookie("session", get_session_id($mc_name), time() + 31536000);
        } else {
            setcookie("member", $mc_name);
            setcookie("session", get_session_id($mc_name));
        }
        $login_success = true;
    }
}
