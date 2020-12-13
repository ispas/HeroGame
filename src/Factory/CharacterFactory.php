<?php
namespace HeroGame\Factory;

use HeroGame\Characters\AbstractCharacter;

interface CharacterFactory
{

    /**
     * @return AbstractCharacter
     */
    public static function create(): AbstractCharacter;
}