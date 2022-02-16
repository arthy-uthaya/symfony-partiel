<?php

namespace App\DataFixtures;

use App\Entity\Memo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for($e=0;$e<11;$e++){
            $memo = new Memo();
            $memo->setContenu($faker->contenue);

            $manager->persist($memo);
        }

        $manager->flush();
        
    }
}
