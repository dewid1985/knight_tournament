<?php
namespace Armor;
/**
 * Class Sword
 * @package Armor
 */
class Sword implements Armor
{
    /** @var int */
    private int $extraDamage = 3 ;

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
        return "Sword";
    }
}