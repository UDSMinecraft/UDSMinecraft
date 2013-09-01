<?php
class SQL {
    public static function is_member($name) {
        $db = new DB();
        $rs = $db->query("SELECT name FROM members WHERE LOWER(name)='".strtolower($name)."';");
        $name = $rs->fetchArray(SQLITE3_ASSOC)["name"];
        $db->close();
        if($name == "") {
            return false;
        }
        return true;
    }

    public static function is_admin($name, $session) {
        if($session == self::get_session_id($name)) {
            $db = new DB();
            $rs = $db->query("SELECT rank FROM members WHERE LOWER(name)='".strtolower($name)."';");
            $rank = $rs->fetchArray(SQLITE3_ASSOC)["rank"];
            $db->close();
            if($rank == "admin" || $rank == "owner") {
                return true;
            }
        }
        return false;
    }

    public static function good_password($name, $password) {
        $db = new DB();
        $rs = $db->query("SELECT password FROM members WHERE LOWER(name)='".strtolower($name)."';");
        $actual = $rs->fetchArray(SQLITE3_ASSOC)["password"];
        $db->close();
        if($actual == "") {
            return false;
        }
        if($password != $actual) {
            return(hash("ripemd160", $password) == $actual);
        }
        return($password == $actual);
    }

    public static function countActiveAdmins() {
        $db = new DB();
        $rs = $db->query("SELECT members FROM online WHERE loc='admin';");
        $count = $rs->fetchArray(SQLITE3_ASSOC)["members"];
        $db->close();
        return($count);
    }

    public static function countPlayers($world) {
        $db = new DB();
        $rs = $db->query("SELECT members FROM online WHERE loc='$world';");
        $count = $rs->fetchArray(SQLITE3_ASSOC)["members"];
        $db->close();
        return($count);
    }

    public static function get_session_id($name) {
        $db = new DB();
        $rs = $db->query("SELECT session FROM members WHERE LOWER(name)='".strtolower($name)."';");
        $session = $rs->fetchArray(SQLITE3_ASSOC)["session"];
        if($session == "") {
            $session = hash("ripemd160", $name.strval(time()));
            $db->exec("UPDATE members SET session='$session' WHERE LOWER(name)='".strtolower($name)."';");
        }
        $db->close();
        return($session);
    }

    public static function logout() {
        if(isset($_COOKIE["session"]) && isset($_COOKIE["member"])) {
            $name = $_COOKIE["member"];
            $db = new DB();
            $rs = $db->exec("UPDATE members SET session='' WHERE LOWER(name)='".strtolower($name)."';");
            setcookie("member", "", time() - 1);
            setcookie("session", "", time() - 1);
            $db->close();
        }
    }

    public static function get_members() {
        $db = new DB();
        $rs = $db->query("SELECT name, rank FROM members ORDER BY rankid DESC;");
        $results = array();
        $result = array();
        for($result = $rs->fetchArray(SQLITE3_ASSOC); $result; $result = $rs->fetchArray(SQLITE3_ASSOC)) {
            $results[] = $result;
        }
        $db->close();
        return($results);
    }

    public static function get_record($name) {
        $db = new DB();
        $rs = $db->query("SELECT * FROM members WHERE LOWER(name)='".strtolower($name)."';");
        $results = $rs->fetchArray(SQLITE3_ASSOC);
        $db->close();
        return($results);
    }

    public static function update_record() {
        global $account_update_error;
        global $account_update_success;
        $name = $_POST["name"];
        if(!good_password($name, $_POST["old_pass"])) {
            $account_update_error = "You have entered a bad password.";
            return;
        }
        $db = new DB();
        if($_POST["new_pass"] != "") {
            $db->exec("UPDATE members SET password='".hash("ripemd160", $_POST["new_pass"])."' WHERE LOWER(name)='".strtolower($name)."';");
        }
        $db->exec("UPDATE members SET email='".$_POST["email"]."', real='".$_POST["real"]."', time='".$_POST["time"]."' WHERE LOWER(name)='".strtolower($name)."';");
        $db->close();
        $account_update_success = true;
    }
}
