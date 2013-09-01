<?php
//class DB extends SQLite3 {
//    function __construct() {
//        $this->open(DB_PATH);
//    }
//}
class DB {
    private $connection;

    function __construct() {
        $connection = mysqli_connect("", "", "", "udsmc");
    }
}

