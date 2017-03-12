<?php
/**
 * Created by PhpStorm.
 * User: NB0065
 * Date: 11/03/2017
 * Time: 16:26
 */

namespace Blog\Controller\Factory;


use Blog\Controller\PostController;
use Blog\Model\CommentTable;
use Blog\Model\PostTable;
use Interop\Container\ContainerInterface;

class PostControllerFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $postTable = $container->get(PostTable::class);
        $commentTable = $container->get(CommentTable::class);
        return new PostController($postTable, $commentTable);
    }


}