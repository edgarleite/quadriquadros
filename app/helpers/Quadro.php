<?php

namespace app\helpers;

/**
 * Description of Quadro
 *
 * @author Edgar Leite
 */
class Quadro {

    public $color1 = '#000000';
    public $color2 = '#ffffff';
    public $cols = 11;
    private $rows = 6;
    private $box;
    private $boxSize;
    private $canvas;
    private $canvasWidth = 2000;
    private $canvasHeight;
    private $image;
    private $imgInfo = [];
    private $tempPath;

    public function __construct() {
        $this->tempPath = sys_get_temp_dir() . DS . 'temp.jpeg';
    }

    public function draw() {
        $this->createBox();
        $this->setRows();
        $this->createCanvas();
        $this->create();
    }

    public function create() {
        for ((int) $j = 0; $j < $this->rows; $j++) {
            for ((int) $i = 0; $i < $this->cols; $i++) {
                $this->setBoxColor($i, $j);
                imagecopymerge($this->canvas, $this->box, $i * $this->boxSize, $j * $this->boxSize, 0, 0, $this->boxSize, $this->boxSize, 100);
            }
        }

        $this->image = imagejpeg($this->canvas, $this->tempPath);
        imagedestroy($this->canvas);
    }

    public function getInfo() {
        $image = imagecreatefromjpeg($this->tempPath);
        
        return [
            'width' => imagesx($image),
            'height' => imagesy($image),
            'size' => filesize($this->tempPath),
            'file' => file_get_contents($this->tempPath),
            'color1' => $this->color1, 
            'color2' => $this->color2, 
        ];
    }

    protected function setBoxColor($colCounter, $rowCounter) {
        //  Alterna cores dos blocos
        if ($colCounter % 2) {
            $color = ($rowCounter % 2 ? $this->color1 : $this->color2);
        } else {
            $color = ($rowCounter % 2 ? $this->color2 : $this->color1);
        }

        $arrRGB = $this->getRGB($color);
        $bg = imagecolorallocate($this->box, $arrRGB[1], $arrRGB[1], $arrRGB[2]);
        imagefill($this->box, 0, 0, $bg);
    }

    protected function getRGB($hexa) {
        $hexa = str_replace('#', '', $hexa);

        $r = hexdec(substr($hexa, 0, 2));
        $g = hexdec(substr($hexa, 2, 2));
        $b = hexdec(substr($hexa, 4, 2));

        $rgb = array($r, $g, $b);

        return $rgb;
    }

    protected function createCanvas() {
        $this->canvas = imagecreatetruecolor($this->canvasWidth, $this->canvasHeight);
        $bg = imagecolorallocate($this->canvas, 255, 255, 255);
        imagefill($this->canvas, 0, 0, $bg);
    }

    protected function createBox() {
        $this->boxSize = round($this->canvasWidth / $this->cols);
        $this->box = imagecreatetruecolor($this->boxSize, $this->boxSize);
    }

    protected function setRows() {
        $rows = ceil($this->cols * 0.54);

        if ($rows % 2) {
            $this->rows = $rows + 1;
        } else {
            $this->rows = $rows;
        }

        $this->canvasWidth = $this->boxSize * $this->cols;
        $this->canvasHeight = $this->boxSize * $this->rows;
    }

}
