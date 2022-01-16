<?php

namespace Protection;

/**
 * Class Dukes
 * @package Armor
 */
class Hauberk extends Protection
{
    /** @var int */
    public int $extraHealth = 30;

    /** @var int */
    public int $damageReduction = 1;

    public function getName(): string
    {
        return "Hauberk";
    }

    /**
     * procedure protection
     */
    public function useProtection(): int
    {
        $this->extraHealth = $this->extraHealth - $this->damageReduction;
        if ($this->extraHealth <= 0) {
            return 0;
        }
        return $this->damageReduction;
    }
}