<?php
namespace HeroGame\Factory;
use HeroGame\Characters\AbstractCharacter;
use HeroGame\Config\Config;
use HeroGame\Characters\RandomStatsGenerator;
use HeroGame\Characters\Hero;
use HeroGame\Skills\Skill;
use HeroGame\Skills\SkillsGenerator;

class HeroFactory implements CharacterFactory
{
    public static function create() : AbstractCharacter
    {
        return (new Hero(new RandomStatsGenerator, Config::HERO_STATS))
            ->setName(Config::HERO_NAME)
            ->learnSkill(new Skill( new SkillsGenerator(), Config::MAGIC_SHIELD))
            ->learnSkill(new Skill( new SkillsGenerator(), Config::RAPID_STRIKE));
    }
}