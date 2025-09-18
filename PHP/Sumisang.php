<?php
class Sumisang {
    private $code, $name, $category, $desc, $photo;

    public function __construct($code = '', $name = '', $category = '', $desc = '', $photo = '') {
        $this->code = $code;
        $this->name = $name;
        $this->category = $category;
        $this->desc = $desc;
        $this->photo = $photo;
    }

    public function getCode() { 
        return $this->code; 
    }
    public function setCode($code) { 
        $this->code = $code; 
    }
    
    public function getName() { 
        return $this->name; 
    }
    public function setName($name) { 
        $this->name = $name; 
    }

    public function getCategory() { 
        return $this->category; 
    }
    public function setCategory($category) { 
        $this->category = $category; 
    }

    public function getDesc() { 
        return $this->desc; 
    }
    public function setDesc($desc) { 
        $this->desc = $desc; 
    }

    public function getPhoto() { 
        return $this->photo; 
    }
    public function setPhoto($photo) { 
        $this->photo = $photo; 
    }
}
?>