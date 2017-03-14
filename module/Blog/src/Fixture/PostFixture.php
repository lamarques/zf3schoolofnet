<?php

namespace Blog\Fixture;


use Blog\Entity\Post;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class PostFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        foreach (range(1,20) as $value){
            $post = new Post();
            $post->setTitle("Title $value");
            $post->setContent("<p>Content {$value}</p>");

            $manager->persist($post);
            $this->addReference("post-{$value}", $post);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }


}