<?php
namespace Armor;
/**
 * Class Spear
 * @package Armor
 */
class Spear implements Armor
{
    /** @var int */
    private int $extraDamage = 2;

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
        return "Spear";
    }
}