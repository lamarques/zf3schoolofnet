<?php
/**
 * Created by PhpStorm.
 * User: NB0065
 * Date: 11/03/2017
 * Time: 16:26
 */

namespace Blog\Controller\Factory;


use Blog\Controller\BlogController;
use Blog\Entity\Post;
use Blog\Form\PostForm;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

class BlogControllerFactory
{

    public function __invoke(ContainerInterface $container)
    {
        /**@var EntityManager $entityManager */
        $entityManager = $container->get(EntityManager::class);
        $repository = $entityManager->getRepository(Post::class);
        $postForm = $container->get(PostForm::class);
        return new BlogController($entityManager, $repository, $postForm);
    }


}