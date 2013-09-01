<?php
require_once LIBRARY."/PEAR/Mail.php";
class Mailer {
    public static function sendMessage($from, $message, $to) {
        global $contacts;
        $bad = array (
            "content-type",
            "bcc:",
            "to:",
            "cc:",
            "href"
        );
//        if(isset($_POST["mc_name"]) && isset($_POST["message"]) && isset($_POST["to"]) && isset($_POST["thanks"]) && isset($_POST["bg"])) {
//            $mc_name = $_POST["mc_name"];
//            $message = $_POST["message"];
//            $gmail_address = "daveyognaut2@gmail.com";
//            $gmail_password = "gooJynxy496?";
//            $to = $contacts[$_POST["to"]];
//            $thanks = $_POST["thanks"];
//            if($mc_name == "") {
//                $contact_fail_name = true;
//                $currentPage = "contact";
//            }
//            if($message == "") {
//                $contact_fail_message = true;
//                $currentPage = "contact";
//            } else {
//            }
//            if(!isset($contact_fail_name) && !isset($contact_fail_message)) {
        $message = str_replace($bad , "", $message)."\r\n\r\nThis message was automatically generated at udsminecraft.com, please do not reply to this address.";
        $headers = array(
            "From" => "$from@udsminecraft.com",
            "To" => $to,
            "Subject" => "UDSMinecraft Contact - $from"
        );
        $smtp = @Mail::factory("smtp", array(
            "host" => "ssl://smtp.gmail.com",
            "port" => "465",
            "auth" => true,
            "username" => GMAIL_ADDRESS,
            "password" => GMAIL_PASSWORD
        ));
        $mail = @$smtp->send($to, $headers, $message);
    }
}