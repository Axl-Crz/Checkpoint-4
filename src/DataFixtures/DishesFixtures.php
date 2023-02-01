<?php

namespace App\DataFixtures;

use App\Entity\Dishes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class DishesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // @todo Reprendre les fixtures ci-dessous a l'aide quete fixtures avancées, faire le crud sur menu et dishes, et faire les fixtures suivantes et ensuite user + inscription
        $faker = Factory::create();
        for ($i = 0; $i < 11; $i++) {
            $dishes = new Dishes();
            $dishes->setTitle($faker->words(3, true));
            $dishes->setUser($this->getReference('user_0'));
            $manager->persist($dishes);
            $this->addReference('dishes_' . ($i + 1), $dishes);

        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            DishesFixtures::class,
        ];
    }
}