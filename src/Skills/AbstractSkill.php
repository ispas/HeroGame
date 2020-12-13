<?php

namespace HeroGame\Skills;

abstract class AbstractSkill
{
    const TRIGGER_ON_DEFENSE = 0;
    const TRIGGER_ON_ATTACK = 1;

    private int $id;
    private string $name;
    private int $chance;
    private int $triggerType;
    private int $multiplier;

    /**
     * AbstractSkill constructor.
     * @param SkillsGeneratorInterface $generator
     * @param array $stats
     */
    public function __construct(SkillsGeneratorInterface $generator, $stats = [])
    {
        $generator->generate($this, $stats);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return AbstractSkill
     */
    public function setId(int $id): AbstractSkill
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return AbstractSkill
     */
    public function setName(string $name): AbstractSkill
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getChance(): int
    {
        return $this->chance;
    }

    /**
     * @param int $chance
     * @return AbstractSkill
     */
    public function setChance(int $chance): AbstractSkill
    {
        $this->chance = $chance;
        return $this;
    }

    /**
     * @return int
     */
    public function getTriggerType(): int
    {
        return $this->triggerType;
    }

    /**
     * @param int $triggerType
     * @return AbstractSkill
     */
    public function setTrigger(int $triggerType): AbstractSkill
    {
        $this->triggerType = $triggerType;
        return $this;
    }

    /**
     * @return int
     */
    public function getMultiplier(): int
    {
        return $this->multiplier;
    }

    /**
     * @param int $multiplier
     * @return AbstractSkill
     */
    public function setMultiplier(int $multiplier): AbstractSkill
    {
        $this->multiplier = $multiplier;
        return $this;
    }

}