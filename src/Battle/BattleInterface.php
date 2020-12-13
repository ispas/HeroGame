<?php
namespace HeroGame\Battle;
use HeroGame\Characters\AbstractCharacter;

interface BattleInterface {
	public function initHero(AbstractCharacter $hero): BattleInterface;
	public function initBeast(AbstractCharacter $beast): BattleInterface;
	public function startBattle(): void;
	public function getWinner(): AbstractCharacter;
}