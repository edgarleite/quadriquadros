<?php

namespace app\models;

use core\db\Model;

/**
 * Description of Quadros
 *
 * @author Edgar Leite
 */
class Quadros extends Model {
    
    /**
     *
     * @var int
     */
    private $id;
    
    /**
     *
     * @var string
     */
    private $nome;
    
    /**
     *
     * @var int
     */
    private $imgCols;
    
    /**
     *
     * @var string
     */
    private $imgStr;
    
    /**
     *
     * @var int
     */
    private $imgWidth;
    
    /**
     *
     * @var int
     */
    private $imgHeight;
    
    /**
     *
     * @var string
     */
    private $color1;
    
    /**
     *
     * @var string
     */
    private $color2;
    
    /**
     * 
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }
    
    /**
     * 
     * @return int
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * 
     * @param string $nome
     */
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    /**
     * 
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }
    
    /**
     * 
     * @param int $imgCols
     */
    public function setImgCols($imgCols) {
        $this->imgCols = $imgCols;
    }
    
    /**
     * 
     * @return int
     */
    public function getImgCols() {
        return $this->imgCols;
    }
        
    /**
     * 
     * @param string $imgStr
     */
    public function setImgStr($imgStr) {
        $this->imgStr = $imgStr;
    }
    
    /**
     * 
     * @return string
     */
    public function getImgStr() {
        return $this->imgStr;
    }
        
    /**
     * 
     * @param int $imgWidth
     */
    public function setImgWidth($imgWidth) {
        $this->imgWidth = $imgWidth;
    }
    
    /**
     * 
     * @return int
     */
    public function getImgWidth() {
        return $this->imgWidth;
    }
        
    /**
     * 
     * @param int $imgHeigth
     */
    public function setImgHeigth($imgHeigth) {
        $this->imgHeigth = $imgHeigth;
    }
    
    /**
     * 
     * @return int
     */
    public function getImgHeigth() {
        return $this->imgHeigth;
    }
            
    /**
     * 
     * @param string $color1
     */
    public function setColor1($color1) {
        $this->color1 = $color1;
    }
    
    /**
     * 
     * @return string
     */
    public function getColor1() {
        return $this->color1;
    }
            
    /**
     * 
     * @param string $color2
     */
    public function setColor2($color2) {
        $this->color2 = $color2;
    }
    
    /**
     * 
     * @return string
     */
    public function getColor2() {
        return $this->color2;
    }
    
}
