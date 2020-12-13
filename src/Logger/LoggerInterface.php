<?php
namespace HeroGame\Logger;
use HeroGame\Battle\BattleInterface;

interface LoggerInterface {
    public function printInitialStats(BattleInterface $battle): void;
    public function printRoundStats(BattleInterface $battle, $currentRound): void;
    public function printBattleResults(BattleInterface $battle): void;
}