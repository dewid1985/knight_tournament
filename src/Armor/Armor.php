<?php
namespace Armor;

/**
 * Interface Armor
 */
interface Armor {
    /**
     * @return int
     */
    public function getExtraDamage(): int;

    /**
     * @return string
     */
    public function getName(): string;
}