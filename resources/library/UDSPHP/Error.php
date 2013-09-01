<?php
class Error {
    public static function newError($type, $message, $file, $line, $context) {
        if (error_reporting() == 0) return;
        $trace = PHP_EOL."<br>".PHP_EOL;
        foreach (debug_backtrace() as $value) {
            if (isset($value["file"])) {
                $trace .= str_replace(".php", "", array_reverse(explode("\\",$value["file"]))[0])."-{$value["line"]}({$value["function"]})<br>".PHP_EOL;
            }
        }
        self::postError($message.$trace);
        die;
    }

    public static function postError($message) {
?>
</head>
<style scoped>
    div.error {
        padding: .3em 0;
        margin: 1em auto;
        width: 500px;
        background: #0cf;
        font: sans-serif;
        border-radius: 50px;
    }
    div.error img {
         border-radius: 50px;
         border: 5px solid #069;
    }
    div.error p {
        text-align: center;
    }
</style>
<div class='error'>
    <h1>"Great Scott!"</h1>
    <img src='<?=GRAPHICS?>/etc/great_scott.png'>
    <h2>You've encountered an error!</h2>
    <p>If you can, send this message to an administrator:</p>
    <p><?=$message?></p>
</div>
<?php
    }
}
?>