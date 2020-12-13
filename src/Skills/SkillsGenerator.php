<?php

namespace HeroGame\Skills;

class SkillsGenerator implements SkillsGeneratorInterface
{

    /**
     * @param AbstractSkill $skill
     * @param array $stats
     * @throws \Exception
     */
    public function generate(AbstractSkill $skill, $stats = []): void
    {
        if(empty($stats))
        {
            throw new \Exception('The stats cannot be empty');
        }

        foreach ($stats as $statKey => $statValue)
        {
            $method = sprintf("set%s", ucfirst(strtolower($statKey)));
            if (!method_exists($skill, $method))
            {
                throw new \Exception(sprintf('Attribute cannot be set. Method [%s] does not exist.', $method));
            }
            $skill->$method($statValue);

        }
    }

}