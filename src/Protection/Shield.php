<?php

namespace Protection;

/**
 * Class Dukes
 * @package Armor
 */
class Shield extends Protection
{
    /** @var int */
    public int $extraHealth = 20;

    /** @var int */
    public int $damageReduction = 2;



    public function getName(): string
    {
        return "Shield";
    }

    /**
     * procedure protection
     */
    public function useProtection(): int
    {
        $this->extraHealth = $this->extraHealth - $this->damageReduction;

        if ($this->extraHealth <= 0){
            return 0;
        }

        return $this->damageReduction;
    }
}