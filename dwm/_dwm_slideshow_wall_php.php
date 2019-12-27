#!/usr/bin/php
<?php

trait FilePickCriteria {
    function randomize($amount) {
        return rand(0, $amount - 1);
    }
}

class FehSlideshow {

    use FilePickCriteria {
        randomize as private criteria;
    }

    const WALL_DIR = "/home/abhishek/.dwm/wallpapers/";

    const HOME = "/home/abhishek/";

    const WALL_EXT = "jpg";

    protected $current;

    public function __construct(){
        $this->getFile();
//         echo "Got " . count($this->current) . " files.";
    }

    private function getValidFiles(){
        return glob(self::WALL_DIR . '*.' . self::WALL_EXT);
    }

    private function getFile(){
        $files = $this->getValidFiles();
        $this->current = $files[ $this->criteria(count($files)) ];
        return $this->current;
    }

    public function genAccentColor(){
        if(!is_file($this->current))
            return null;

        $histogram = exec(implode(' ',
            [
                'convert',
                $this->current,
                '+dither -colors 5 -define histogram:unique-colors=true -format "%c" histogram:info:'
            ]));
        $accent = null;
        preg_match('/(\#.{6})/', $histogram, $accent);
        return current($accent);
    }

    public function apply() {
//         echo "Got " . $this->current . " file for wallpaper.";
        if(is_file($this->current))
            system('DISPLAY=:0 feh --bg-scale ' . $this->current);
        if($color = $this->genAccentColor()){
//             echo "Got " . $color . " color.";
            file_put_contents(self::HOME . ".fehaccent", $color);
        }
    }
}

$gg = new FehSlideshow();
$gg->apply();
