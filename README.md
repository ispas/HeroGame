# The hero game


To start the battle, run the following command in the console. Also you can to run 'index.php' file in browser.
```
php index.php
```

Battle output:
```
Start Battle!

Hero health: 82
Hero strength: 70
Hero speed: 50
Hero defence: 52
Hero luck: 26
Hero skills: Magic Shield. Rapid Strike.

Beast health: 80
Beast strength: 82
Beast speed: 47
Beast defence: 55
Beast luck: 38

ROUND: 1
Attacker: Orderus
Attacker Health: 82
Attacker used the following skills: Rapid Strike.

Defender: Wild Beast
Defender Health: 80
Defender was lucky. No damage will be taken.

ROUND: 2
Attacker: Wild Beast
Attacker Health: 80

Defender: Orderus
Defender Health: 52

ROUND: 3
Attacker: Orderus
Attacker Health: 52

Defender: Wild Beast
Defender Health: 65

ROUND: 4
Attacker: Wild Beast
Attacker Health: 65

Defender: Orderus
Defender Health: 22

ROUND: 5
Attacker: Orderus
Attacker Health: 22

Defender: Wild Beast
Defender Health: 65
Defender was lucky. No damage will be taken.

ROUND: 6
Attacker: Wild Beast
Attacker Health: 65

Defender: Orderus
Defender Health: 0

Winner is: Wild Beast
GAME OVER!!
```

Unit tests can be run by the following command:
```
vendor/bin/phpunit tests/
```