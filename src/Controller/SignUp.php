<?php

namespace Jonas\ListController\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Jonas\ListController\Entity\User;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SignUp implements RequestHandlerInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $post = $request->getParsedBody();

        $email = filter_var($post['email'], FILTER_VALIDATE_EMAIL);

        if (is_null($email) || $email === false) {
            $message = 'O email digitado está inválido.';

            return new Response(400, ['Location' => '/register']);
        }

        $name = strip_tags($post['name']);
        $password = password_hash(strip_tags($post['password']), PASSWORD_DEFAULT);

        $user = new User(
            $name,
            $email,
            $password
        );

        $this->entityManager->persist($user);

        $this->entityManager->flush();

        $_SESSION['user'] = $user->getId();
        $_SESSION['logged'] = true;

        return new Response(302, ['Location' => '/home']);
    }
}
