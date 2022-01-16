<?php

namespace Tournament;

use Knight\Unit;

/**
 * Class Battle
 * @package Tournament
 */
class Battle
{

    /** @var Unit */
    public Unit $knightFirst;

    /** @var Unit */
    public Unit $knightSecond;

    /** @var Unit */
    public Unit $winner;

    /**
     * @return Unit
     */
    public function getWinner(): Unit
    {
        return $this->winner;
    }

    /**
     * @param Unit $knightFirst
     * @return $this
     */
    public function setKnightFirst(Unit $knightFirst): Battle
    {
        $this->knightFirst = $knightFirst;
        return $this;
    }

    /**
     * @param Unit $knightSecond
     * @return $this
     */
    public function setKnightSecond(Unit $knightSecond): Battle
    {
        $this->knightSecond = $knightSecond;
        return $this;
    }

    /**
     * FIGHT!!!
     */
    public function fight()
    {
        $this->knightFirst->getHealth()->damage(
            ($this->damage() + $this->knightSecond->getArmor()->getExtraDamage()) - $this->knightFirst->getProtection()->useProtection()
        );

        if ($this->knightFirst->getHealth()->getValue() <= 0) {
            $this->winner = $this->knightSecond;
            return;
        }

        $this->knightSecond->getHealth()->damage(
            ($this->damage() + $this->knightFirst->getArmor()->getExtraDamage()) - $this->knightSecond->getProtection()->useProtection()
        );

        if ($this->knightSecond->getHealth()->getValue() <= 0) {
            $this->winner = $this->knightFirst;
            return;
        }

        $this->fight();
    }

    /**
     * @return int
     * @throws \Exception
     */
    private function damage()
    {
        return random_int(1, 6);
    }

    public function toString()
    {
        $out = "Fight between knights\n";
        $out .= "1. Name: " . $this->knightFirst->getName()
            . "|Armor: ".$this->knightFirst->getArmor()->getName()
                ."|Protection: ".$this->knightFirst->getProtection()->getName()."\n";
        $out .= "2. Name: " . $this->knightSecond->getName()
            . "|Armor: ".$this->knightSecond->getArmor()->getName()
            ."|Protection: ".$this->knightSecond->getProtection()->getName()."\n";
        $out .= "Winner: " . $this->getWinner()->getName() . "\n";
        return $out;
    }

}