<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

class SelectItem {
    
    public string $label='';
    public string $value='';
    
    function __construct() {
        $this->label='';
        $this->value='';
    }
    
    public function getLabel():string
    {
        return $this->label;
    }

    public function getValue():string
    {
        return $this->value;
    }

    public function setLabel(string $label)
    {
        $this->label = $label;
    }

    public function setValue(string $value)
    {
        $this->value = $value;
    }  
}

?>