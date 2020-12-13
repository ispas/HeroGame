<?php
namespace HeroGame\Factory;
use HeroGame\Logger\BattleConsoleLogger;
use HeroGame\Config\Config;
use HeroGame\Battle\Battle;
use HeroGame\Characters\AbstractCharacter;

class BattleFactory
{

    /**
     * @param AbstractCharacter $hero
     * @param AbstractCharacter $beast
     * @return Battle
     */
    public static function create(AbstractCharacter $hero, AbstractCharacter $beast) : Battle
    {
        return (new Battle(new Config, new BattleConsoleLogger))
            ->initHero($hero)
            ->initBeast($beast);
    }
}