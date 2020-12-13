<?php

namespace HeroGame\Characters;

use HeroGame\Skills\AbstractSkill;

class Hero extends AbstractCharacter {

    /**
     * @param AbstractSkill $skill
     * @return $this
     */
    function learnSkill(AbstractSkill $skill): Hero
    {
        $this->skill[] = $skill;
        return $this;
    }

    /**
     * @return array
     */
    function getSkills(): array
    {
        return $this->skill;
    }

}