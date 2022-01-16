<?php

namespace Tournament;

use Exceptions\OddNumberKnightsException;
use Knight\Unit;

/**
 * Class Arena
 */
class Arena
{
    /** @var int */
    const DEFAULT_HP = 100;

    /** @var Unit[] $units */
    private array $units = [];

    /** @var array */
    public array $levels = [];

    /**
     * @param Unit $unit
     * @return $this
     */
    public function setUnit(Unit $unit): Arena
    {
        $this->units[] = $unit;
        return $this;
    }

    /**
     * START!!!
     */
    public function start()
    {
        $level = $this->startLevel($this->createLevel());
        $this->levels[] = $level;
        $battles = $level->getBattles();

        /** @var Battle $battle */
        foreach ($battles as $battle) {
            $this->units[] = $battle->getWinner()->addHealth(self::DEFAULT_HP);
        }

        if (count($this->units) <= 1) {
            return;
        }

        $this->start();
    }

    /**
     * @return Level
     */
    private function createLevel(): Level
    {
        $level = new Level();
        $count = count($this->units) / 2;

        for ($i = 1; $i <= $count; $i++) {
            $battle = new Battle();
            $battle->setKnightFirst(array_shift($this->units));
            $battle->setKnightSecond(array_shift($this->units));
            $level->setBattle($battle);
        }


        return $level;
    }

    /**
     * @param Level $level
     * @return Level
     */
    private function startLevel(Level $level)
    {
        $battles = $level->getBattles();
        /** @var Battle $battle */
        foreach ($battles as $battle) {
            $battle->fight();
        }
        return $level;
    }

    /**
     * @param int $quantityKnights
     */
    public static function createRandom(int $quantityKnights = 4)
    {
        if (($quantityKnights % 2) != 0){
            throw new OddNumberKnightsException("The number of knights cannot be an odd number");
        }

        $arena = new static();


        for ($i = 1; $i <= $quantityKnights; $i++) {
            /** @var Unit $unit */
            $arena->setUnit(Unit::createRandom(self::DEFAULT_HP));
        }

        $arena->start();
        return $arena;
    }

    /**
     * @return string
     */
    public function toString()
    {
        $out = <<<EOT
START TOURNAMENT

EOT;

        $count = count($this->levels);
        for ($i = 1; $i <= $count; $i++) {
            $out .= <<<EOT
*****************************************************************************
LEVEL $i
*****************************************************************************

EOT;
            /** @var Level $level */
            $level = $this->levels[$i-1];
            $out .= $level->toString();

        }
        $out .= <<<EOT
END TOURNAMENT

EOT;
        return $out;

    }
}