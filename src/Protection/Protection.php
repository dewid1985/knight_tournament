<?php

namespace Protection;
/**
 * Interface Armor
 */
abstract class Protection {


    /** @var int */
    public int $extraHealth = 0;

    /** @var int */
    public int $damageReduction = 0;

    /**
     * @return int
     */
    public function getExtraHealth(): int
    {
        return $this->extraHealth;
    }

    /**
     * @param int $extraHealth
     * @return $this
     */
    public function setExtraHealth(int $extraHealth): Protection
    {
        $this->extraHealth = $extraHealth;
        return $this;
    }

    /**
     * @return int
     */
    public function getDamageReduction(): int
    {
        return $this->damageReduction;
    }

    /**
     * @param int $damageReduction
     * @return $this
     */
    public function setDamageReduction(int $damageReduction): Protection
    {
        $this->damageReduction = $damageReduction;
        return $this;
    }


    /**
     * @return string
     */
    public abstract function getName(): string;

    /**
     * procedure
     */
    public abstract function useProtection(): int;
}