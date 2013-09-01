<?php
class Sock {
    const ONLINE = 1;
    const OFFLINE = 0;

    public static function getServerStatus() {
        return self::checkConnection("localhost", "25565");
    }

    public static function getMapStatus() {
        return self::checkConnection("localhost", "8123");
    }

    private static function checkConnection($host, $port) {
        $connection = @fsockopen($host, $port);
        if (is_resource($connection)) {
            return self::ONLINE;
        } else {
            return self::OFFLINE;
        }
    }
}