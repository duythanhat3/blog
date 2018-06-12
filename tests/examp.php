<?php

const NAME = 'name';
$name = 'name';
$fullName = 'fullName';

/**
 * Get name
 * @param string $name
 * @return string
 */
function getName($name) {
    return $name;
}

class Personal {

    private $name;

    /**
     * set name
     * @param string $myName
     */
    public function setName($myName) {
        $this->name = $myName;
    }

    /**
     * get name
     * @return string
     */
    public function getName(){
        return $this->name;
    }
    
    /**
     * action eat
     */
    public function eat() {
        echo $this->name . ' ' . $this->generateActionEat();
    }

    /**
     * generate action eat
     */
    private function generateActionEat(){
        return 'an com';
    }
}

class WoMan extends Personal {

    public function getMarried(){
        echo $this->getName() . ' happy wedding!';
    }
}

$an = new WoMan; // khởi tạo đối tượng $an từ class WoMan
$an->setName('An');
$an->getMarried();

/** Tạo 1 class A và 1 class B kế thừa class A. Khởi tạo đối tượng c từ clas B */

/** Dong Vat -> Cho -> $milu */
/** Ô tô -> Ô tô Honda -> $hondaCivic */




