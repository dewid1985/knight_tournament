<?php
namespace Armor;

/**
 * Class Crossbow
 * @package Armor
 */
class Crossbow implements Armor
{
    /** @var int */
    private int $extraDamage = 4;

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
        return  "Crossbow";
    }
}