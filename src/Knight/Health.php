<?php

namespace Knight;

/**
 * Class Health
 * @package Knight
 */
class Health {

    /** @var int  */
    protected int $value = 0;

    /**
     * @param $value
     * @return $this
     */
    public function setValue($value): Health {
        $this->value = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getValue(): int {
        return  $this->value;
    }

    /**
     * @param $int
     * @return $this
     */
    public function damage($int){
        $this->value = $this->value - $int;
        return $this;
    }

}