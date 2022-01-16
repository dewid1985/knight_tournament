<?php

namespace Armor;
/**
 * Class Dukes
 * @package Armor
 */
class Dukes implements Armor
{
    /** @var int */
    private int $extraDamage = 0;

    /**
     * @return int
     */
    public function getExtraDamage(): int
    {
        return $this->extraDamage;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return "Dukes";
    }
}