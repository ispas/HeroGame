<?php

namespace HeroGame\Characters;

use HeroGame\Factory\SkillFactory;
use HeroGame\Skills\SkillInterface;

abstract class AbstractCharacter{
    
    protected string $name;

    protected int $health;

    protected int $strength;

    protected int $defence;

    protected int $speed;

    protected int $luck;

    protected array $skill;

    public function __construct(StatsGeneratorInterface $generator, $stats = [])
    {
        $generator->generate($this, $stats);
    }

    abstract function getSkills():array;
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return AbstractCharacter
     */
    public function setName(string $name): AbstractCharacter
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $health
     * @return AbstractCharacter
     */
    public function setHealth(int $health): AbstractCharacter
    {
        $this->health = $health;
        return $this;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @param int $strength
     * @return AbstractCharacter
     */
    public function setStrength(int $strength): AbstractCharacter
    {
        $this->strength = $strength;
        return $this;
    }

    /**
     * @return int
     */
    public function getDefence(): int
    {
        return $this->defence;
    }

    /**
     * @param int $defence
     * @return AbstractCharacter
     */
    public function setDefence(int $defence): AbstractCharacter
    {
        $this->defence = $defence;
        return $this;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @param int $speed
     * @return AbstractCharacter
     */
    public function setSpeed(int $speed): AbstractCharacter
    {
        $this->speed = $speed;
        return $this;
    }

    /**
     * @return int
     */
    public function getLuck(): int
    {
        return $this->luck;
    }

    /**
     * @param int $luck
     * @return AbstractCharacter
     */
    public function setLuck(int $luck): AbstractCharacter
    {
        $this->luck = $luck;
        return $this;
    }

    /**
     * @return array
     */
    public function getSkill(): array
    {
        return $this->skill;
    }

}
