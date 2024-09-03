<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\data;

class Box {
    
    private object $t;    

    public function add(object $t) {
        $this->t = $t;
    }

    public function get():object {
        return $this->t;
    }
}

?>