<?php

namespace HeroGame\Skills;

interface SkillsGeneratorInterface
{

    /**
     * @param AbstractSkill $skill
     * @param array $stats
     */
    public function generate(AbstractSkill $skill, array $stats): void;
}