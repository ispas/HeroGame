<?php

namespace HeroGame\Factory;

use HeroGame\Skills\AbstractSkill;

class SkillFactory
{

    /**
     * @param string $skillName
     * @return mixed
     * @throws \Exception
     */
    public static function create(string $skillName): AbstractSkill{
        $skill = "Skills\\Skill" . str_replace('_','',ucwords($skillName," \t\r\n\f\v_"));
        if (class_exists($skill)) {
            return new $skill();
        } else {
            throw new \Exception('Skill not found '.$skillName);
        }
    }
}