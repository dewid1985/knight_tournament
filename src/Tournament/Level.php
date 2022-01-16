<?php

namespace Tournament;
/**
 * Class Level
 * @package Tournament
 */
class Level
{
    /** @var Battle */
    private array $battles = [];

    /**
     * @param Battle $battle
     * @return $this
     */
    public function setBattle(Battle $battle)
    {
        $this->battles[] = $battle;
        return $this;
    }

    /**
     * @return array|Battle
     */
    public function getBattles()
    {
        return $this->battles;
    }

    public function toString()
    {
        $out = "";

        $count = count($this->battles);
        for ($i = 1; $i <= $count; $i++) {
            $out .= <<<EOT
battle $i

EOT;
            /** @var Battle $level */
            $battle = $this->battles[$i - 1];
            $out .= $battle->toString();

        }

        return $out;

    }
}