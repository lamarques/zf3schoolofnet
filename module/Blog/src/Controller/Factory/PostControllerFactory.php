<?php
/**
 * Created by PhpStorm.
 * User: NB0065
 * Date: 11/03/2017
 * Time: 16:26
 */

namespace Blog\Controller\Factory;


use Blog\Controller\PostController;
use Blog\Entity\Comment;
use Blog\Entity\Post;
use Blog\Form\CommentForm;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

class PostControllerFactory
{

    public function __invoke(ContainerInterface $container)
    {
        /**@var EntityManager $entityManager */
        $entityManager = $container->get(EntityManager::class);
        $postRepository = $entityManager->getRepository(Post::class);
        $commentRepository = $entityManager->getRepository(Comment::class);
        $commentForm = $container->get(CommentForm::class);
        return new PostController($entityManager, $postRepository, $commentRepository, $commentForm);
    }


}