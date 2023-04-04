<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // users
        $users = array(                                      
            array('janus.cyril@email.com', 'Cyril Januš', 'ROLE_ADMIN', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('netolicky.stanislav@email.com', 'Stanislav Netolický', 'ROLE_ADMIN', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('vojacek.pankrac@email.com', 'Pankrác Vojáček', 'ROLE_USER', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('hurta.ctirad@email.com', 'Ctirad Hurta', 'ROLE_ADMIN', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('rychtarik.tomas@email.com', 'Tomáš Rychtařík', '', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('trefil.pavel@email.com', 'Pavel Trefil', 'ROLE_ADMIN', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('jira.borivoj@email.com', 'Bořivoj Jíra', 'ROLE_USER', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('pospech.venceslav@email.com', 'Věnceslav Pospěch', '', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('zika.leopold@email.com', 'Leopold Zíka', 'ROLE_ADMIN', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('strunc.libor@email.com', 'Libor Štrunc', '', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('kasparkova.oldriska@email.com', 'Oldřiška Kašpárková', 'ROLE_USER', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('krejzova.gita@email.com', 'Gita Krejzová', 'ROLE_USER', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('sudova.michaela@email.com', 'Michaela Sudová', 'ROLE_ADMIN', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('kucharova.nela@email.com', 'Nela Kuchařová', 'ROLE_ADMIN', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('romanova.bozena@email.com', 'Božena Romanová', '', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('bursikova.libuse@email.com', 'Libuše Buršíková', 'ROLE_USER', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('voriskova.viktorie@email.com', 'Viktorie Voříšková', 'ROLE_ADMIN', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('chramostova.alice@email.com', 'Alice Chramostová', '', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('zednickova.martina@email.com', 'Martina Zedníčková', 'ROLE_ADMIN', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba'),
            array('mertova.tereza@email.com', 'Tereza Mertová', '', '$2y$13$wg7WrZkilKpjZIfsukWXvO7kxjujeakuK2NtC7ohVyXSQem2Iftba')
        );

        // users array to User obj
        for ($i = 0; $i < count($users); $i++) 
        {
            $user = new User();
            $user->setEmail($users[$i][0]);
            $user->setUsername($users[$i][1]);
            $user->setRoles(array($users[$i][2]));
            $user->setPassword($users[$i][3]);

            $manager->persist($user);
        }

        $manager->flush();


    }
}