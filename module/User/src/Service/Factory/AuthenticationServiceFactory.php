<?php

namespace User\Service\Factory;


use Interop\Container\ContainerInterface;
use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session;
use Zend\Db\Adapter\AdapterInterface;

class AuthenticationServiceFactory
{

    //pegar adaptador de db
    //configurar um adptador para administrar a autenticação do usuário
    //criar a sessao para guardarmos o user
    //criar o serviço de authentication service
    public function __invoke(ContainerInterface $container)
    {
        $passwordCallbackVerify = function ($passwordInDatabase, $passwordSent) {
            return password_verify($passwordSent, $passwordInDatabase);
        };
        $dbAdapter = $container->get(AdapterInterface::class);
        $authAdapter = new CallbackCheckAdapter($dbAdapter, 'users', 'username', 'password', $passwordCallbackVerify);
        $storage = new Session();
        return new AuthenticationService($storage, $authAdapter);
    }


}