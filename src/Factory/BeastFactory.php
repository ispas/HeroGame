<?php
namespace HeroGame\Factory;
use HeroGame\Characters\AbstractCharacter;
use HeroGame\Config\Config;
use HeroGame\Characters\RandomStatsGenerator;
use HeroGame\Characters\Beast;

class BeastFactory implements CharacterFactory
{

    /**
     * @return AbstractCharacter
     */
    public static function create(): AbstractCharacter
    {
        return (new Beast(new RandomStatsGenerator, Config::BEAST_STATS))
            ->setName(Config::BEAST_NAME);
    }
}