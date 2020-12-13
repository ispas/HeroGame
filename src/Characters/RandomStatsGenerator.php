<?php
namespace HeroGame\Characters;

class RandomStatsGenerator implements StatsGeneratorInterface {

    /**
     * @param AbstractCharacter $character
     * @param array $stats
     * @throws \Exception
     */
    public function generate(AbstractCharacter $character, $stats = []):void
    {

        if(empty($stats))
        {
            throw new \Exception('The stats cannot be empty');
        }

        foreach($stats as $statKey => $statValue)
        {
            if(empty($statValue[0]) || empty($statValue[1]))
            {
                throw new \Exception('The minimum or maximum value is missing');
            }
            if($statValue[0] > $statValue[1])
            {
                throw new \Exception('The minimum cannot be greater than maximum');
            }

            $method = sprintf("set%s", ucfirst(strtolower($statKey)));
            if (!method_exists($character, $method)) {
                throw new \Exception(sprintf('Attribute cannot be set. Method [%s] does not exist.', $method));
            }

            $randNumber = $this->getRandomNumber($statValue[0], $statValue[1]);
            $character->$method($randNumber);
        }
    }

    /**
     * @param int $min
     * @param int $max
     * @return int
     */
    public function getRandomNumber(int $min, int $max): int
    {
        return mt_rand($min, $max);
    }
}