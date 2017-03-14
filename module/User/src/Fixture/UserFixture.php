<?php

namespace User\Fixture;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use User\Entity\User;

class UserFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('lamarques@lamarques.com.br')
            ->setFullName('Rogério Lamarques')
            ->setPassword(password_hash('123456', PASSWORD_DEFAULT));
        $manager->persist($user);
        $manager->flush();
    }
}