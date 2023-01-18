<?php

namespace Jonas\ListController\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Jonas\ListController\Entity\User;
use Jonas\ListController\Helper\AlertMessage;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SignIn implements RequestHandlerInterface
{
    use AlertMessage;

    private $userRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->userRepository = $entityManager->getRepository(User::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $post = $request->getParsedBody();

        $email = filter_var($post['email'], FILTER_VALIDATE_EMAIL);

        if (is_null($email) || $email === false) {
            $this->setMessage("error", "O email digitado está inválido.");

            return new Response(400, ['Location' => '/login']);
        }

        $password = strip_tags($post['password']);

        $user = $this->userRepository->findOneBy([
            'email' => $email
        ]);

        if (is_null($user) || !$user->verifyPassword($password)) {
            $this->setMessage("error", "E-mail ou senha incorretos.");

            return new Response(400, ['Location' => '/login']);
        }

        $_SESSION['user'] = $user->getId();
        $_SESSION['logged'] = true;

        return new Response(200, ['Location' => '/home']);
    }
}
