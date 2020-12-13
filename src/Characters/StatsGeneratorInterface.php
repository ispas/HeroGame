<?php
namespace HeroGame\Characters;

interface StatsGeneratorInterface {


    /**
     * @param AbstractCharacter $character
     * @param array $stats
     */
    public function generate(AbstractCharacter $character, $stats = []): void;
}