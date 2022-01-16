<?php

namespace Knight;

use Armor\Armor;
use Armor\Crossbow;
use Armor\Dukes;
use Armor\Spear;
use Armor\Sword;

use Protection\Hauberk;
use Protection\Protection;
use Protection\Shield;

/**
 * Class Unit
 * @package Knight
 */
class Unit
{
    /** @var string|null */
    protected string|null $name = null;

    /** @var Health */
    protected Health $health;

    /** @var Armor */
    private Armor $armor;

    /** @var Protection */
    private Protection $protection;

    /** @var array|string[] */
    private array $armors = [
        Crossbow::class,
        Dukes::class,
        Spear::class,
        Sword::class
    ];

    /** @var array|string[] */
    private array $protections = [
        Shield::class,
        Hauberk::class
    ];

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): Unit
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param Health $health
     * @return $this
     */
    public function setHealth(Health $health): Unit
    {
        $this->health = $health;
        return $this;
    }

    /**
     * @param int $health
     * @return $this
     */
    public function addHealth(int $health): Unit
    {
        $this->getHealth()->setValue($this->getHealth()->getValue() + $health);
        return $this;
    }

    /**
     * @return Health
     */
    public function getHealth(): Health
    {
        return $this->health;
    }

    /**
     * @return Armor
     */
    public function getArmor(): Armor
    {
        return $this->armor;
    }


    /**
     * @param Armor $armor
     * @return $this
     */
    public function setArmor(Armor $armor): Unit
    {
        $this->armor = $armor;
        return $this;
    }

    /**
     * @return Protection
     */
    public function getProtection(): Protection
    {
        return $this->protection;
    }

    /**
     * @param Protection $protection
     * @return $this
     */
    public function setProtection(Protection $protection): Unit
    {
        $this->protection = $protection;
        return $this;
    }

    /**
     * @param int $healthValue
     * @return Unit
     * @throws \Exception
     */
    public static function createRandom(int $healthValue): Unit
    {
        $unit = new static();

        /** @var string[] $namesOfKnights */
        $namesOfKnights = require "names.inc.php";

        /** @var string|null $knightsName */
        $knightsName = $namesOfKnights[random_int(0, count($namesOfKnights) - 1)];

        /** @var string $armor */
        $armor = $unit->armors[random_int(0, count($unit->armors) - 1)];

        /** @var string $protection */
        $protection = $unit->protections[random_int(0, count($unit->protections) - 1)];

        $unit
            ->setName($knightsName)
            ->setHealth(
                (new Health())
                    ->setValue($healthValue)
            )
            ->setArmor(new $armor())
            ->setProtection(new $protection());

        return $unit;
    }
}