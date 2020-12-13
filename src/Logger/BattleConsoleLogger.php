<?php
namespace HeroGame\Logger;
use HeroGame\Battle\BattleInterface;

class BattleConsoleLogger implements LoggerInterface {

    /**
     * @param BattleInterface $battle
     */
    public function printInitialStats(BattleInterface $battle): void
    {
        echo "Start Battle! <br/> <br/>";
        echo "Hero health: ".$battle->getHero()->getHealth()."<br/>";
        echo "Hero strength: ".$battle->getHero()->getStrength()."<br/>";
        echo "Hero speed: ".$battle->getHero()->getSpeed()."<br/>";
        echo "Hero defence: ".$battle->getHero()->getDefence()."<br/>";
        echo "Hero luck: ".$battle->getHero()->getLuck()."<br/>";
        echo "Hero skills: ";
        foreach ($battle->getHero()->getSkills() as $result){
            echo $result->getName().'. ';
        }
        echo "<br/>";
        echo "<br/>";

        echo "Beast health: ".$battle->getBeast()->getHealth()."<br/>";
        echo "Beast strength: ".$battle->getBeast()->getStrength()."<br/>";
        echo "Beast speed: ".$battle->getBeast()->getSpeed()."<br/>";
        echo "Beast defence: ".$battle->getBeast()->getDefence()."<br/>";
        echo "Beast luck: ".$battle->getBeast()->getLuck()."<br/>";
        echo "<br/>";
    }

    /**
     * @param BattleInterface $battle
     * @param $currentRound
     */
    public function printRoundStats(BattleInterface $battle, $currentRound): void
    {
        echo "ROUND: ".$currentRound."<br/>";
        echo "Attacker: ".$battle->getAttacker()->getName()."<br/>";
        echo "Attacker Health: ".$battle->getAttacker()->getHealth()."<br/>";
        if (!empty($battle->getAttackerUsedSkills()))
        {
            echo "Attacker used the following skills: ";
            foreach ($battle->getAttackerUsedSkills() as $skillName)
            {
                echo $skillName.'. ';
            }
            echo "<br/>";
        }
        echo "<br/>";

        echo "Defender: ".$battle->getDefender()->getName()."<br/>";
        echo "Defender Health: ".$battle->getDefender()->getHealth()."<br/>";
        if (!empty($battle->getDefenderUsedSkills()))
        {
            echo "Defender used the following skills: ";
            foreach ($battle->getDefenderUsedSkills() as $skillName)
            {
                echo $skillName.'. ';
            }
            echo "<br/>";
        }


        if($battle->getDefenderWasLucky() === true)
        {
            echo "Defender was lucky. No damage will be taken."."<br/>";
        }   
            
        echo "<br/>";
    }

    /**
     * @param BattleInterface $battle
     */
    public function printBattleResults(BattleInterface $battle): void
    {
        echo "Winner is: ".$battle->getWinner()->getName()."<br/>";
        echo "GAME OVER!!";
    }
}