<?php
namespace HeroGame\Battle;
use HeroGame\Characters\AbstractCharacter;
use HeroGame\Characters\Beast;
use HeroGame\Characters\Hero;
use HeroGame\Logger\LoggerInterface;
use HeroGame\Config\ConfigInterface;
use HeroGame\Skills\AbstractSkill;

class Battle implements BattleInterface {

    private $attacker = null;
    private $defender = null;

    private $hero = null;
    private $beast = null;

    private ?ConfigInterface $config = null;
    private ?LoggerInterface $logger = null;

    private bool $defenderWasLucky = false;
    private array $attackerUsedSkills = [];
    private array $defenderUsedSkills = [];

    public function __construct(ConfigInterface $config, LoggerInterface $logger)
    {
        $this->config = $config;
        $this->logger = $logger;
    }

    public function initHero(AbstractCharacter $hero): battle
    {
        $this->hero = $hero;
        return $this;
    }

    public function initBeast(AbstractCharacter $beast): battle
    {
        $this->beast = $beast;
        return $this;
    }

    public function getHero(): AbstractCharacter
    {
        return $this->hero;
    }

    public function getBeast(): AbstractCharacter
    {
        return $this->beast;
    }

    public function getAttacker(): AbstractCharacter
    {
        return $this->attacker;
    }

    public function getDefender(): AbstractCharacter
    {
        return $this->defender;
    }

    public function getDefenderWasLucky(): bool
    {
        return $this->defenderWasLucky;
    }

    /**
     * @return array
     */
    public function getAttackerUsedSkills(): array
    {
        return $this->attackerUsedSkills;
    }

    /**
     * @return array
     */
    public function getDefenderUsedSkills(): array
    {
        return $this->defenderUsedSkills;
    }


    public function startBattle(): void
    {
        $this->printInitialStats();
        $this->selectFirstAttacker();

        for($round = 1; $round <= $this->config::BATTLE_ROUNDS; $round++)
        {
            $currentRound = $round;

            if($this->isEndOfBattle() === true)
            {
                break;
            }

            $this->playRound($round);
            $this->attackerUsedSkills = [];
            $this->defenderUsedSkills = [];
        }

        $this->printBattleResults();
    }

    private function playRound(int $round): void
    {
        $this->checkIfDefenderWasLucky();
        $this->updateDefenderHealth();
        $this->printRoundStats($round);
        $this->switchPlayerRoles();
    }

    private function isEndOfBattle(): bool
    {
        if($this->defender->getHealth() <= 0 || $this->attacker->getHealth() <= 0)
        {
            return true;
        }

        return false;
    }

    private function selectFirstAttacker(): bool
    {
        if($this->hero->getSpeed() > $this->beast->getSpeed())
        {
            $this->attacker = $this->hero;
            $this->defender = $this->beast; 
            return false;
        }

        if($this->hero->getSpeed() < $this->beast->getSpeed())
        {
            $this->attacker = $this->beast;
            $this->defender = $this->hero;  
            return false;
        }

        if($this->hero->getLuck() > $this->beast->getLuck())
        {
            $this->attacker = $this->hero;
            $this->defender = $this->beast; 
            return false;
        }

        if($this->hero->getLuck() < $this->beast->getLuck())
        {
            $this->attacker = $this->beast;
            $this->defender = $this->hero;  
            return false;
        }

        $this->attacker = $this->hero;
        $this->defender = $this->beast; 
    }

    private function calculateDamage(): float|int
    {
        if($this->attacker->getStrength() > $this->defender->getDefence())
        {
            return ($this->attacker->getStrength() - $this->defender->getDefence())*$this->useSkills();
        }
    }

    private function useSkills(): float|int
    {
        $multiplier = 1;

        foreach($this->attacker->getSkills() as $skill)
        {
            if($skill->getTriggerType() == AbstractSkill::TRIGGER_ON_ATTACK)
            {
                $rand = mt_rand(0,100);
                if ($rand <= $skill->getChance())
                {
                    $this->attackerUsedSkills[] = $skill->getName();
                    $multiplier *= $skill->getMultiplier();
                }
            }
        }

        foreach($this->defender->getSkills() as $skill)
        {
            if($skill->getTriggerType() == AbstractSkill::TRIGGER_ON_DEFENSE)
            {
                $rand = mt_rand(0,100);
                if ($rand <= $skill->getChance())
                {
                    $this->defenderUsedSkills[] = $skill->getName();
                    $multiplier /= $skill->getMultiplier();
                }
            }
        }
        return $multiplier;
    }

    private function updateDefenderHealth(): void
    {
        $damage = $this->calculateDamage();

        if($this->defenderWasLucky === true)
        {
            $damage = 0;
        }

        $newHealthValue = $this->defender->getHealth() - $damage;

        if($newHealthValue < 0)
        {   
            $newHealthValue = 0;
        }

        $this->defender->setHealth($newHealthValue);
    }

    private function switchPlayerRoles(): void
    {
        $temp = $this->attacker;
        $this->attacker = $this->defender;
        $this->defender = $temp;
    }

    public function getWinner(): AbstractCharacter
    {
        if($this->attacker->getHealth() > $this->defender->getHealth())
        {
            return $this->attacker;
        }

        return $this->defender;
    }

    private function checkIfDefenderWasLucky(): void
    {
        $rand = mt_rand(0, 100);
        if($rand <= $this->defender->getLuck())
        {
            $this->defenderWasLucky = true;
            return;
        }   

        $this->defenderWasLucky = false;
    }

    private function printInitialStats(): void
    {
        $this->logger->printInitialStats($this);
    }
    
    private function printRoundStats($currentRound): void
    {
        $this->logger->printRoundStats($this, $currentRound);
    }

    private function printBattleResults(): void
    {
        $this->logger->printBattleResults($this);
    }
}