<?php
class Image {
    public static function getFace($name) {
        if (!file_exists(GRAPHICS."/face/$name.png")) {
            $tex = imagecreatefrompng(SKIN_STORE."/$name.png");
            $face = imagecreatetruecolor(8, 8);
            imagecopy($face, $tex, 0, 0, 8, 8, 8, 8);
            imagecopy($face, $tex, 0, -1, 40, 7, 8, 8);
            $final = imagecreatetruecolor(100, 100);
            imagecopyresized($final, $face, 0, 0, 0, 0, 100, 100, 8, 8);
            imagepng($final, GRAPHICS."/face/$name.png");
        }
        return GRAPHICS."/face/$name.png";
    }
}
