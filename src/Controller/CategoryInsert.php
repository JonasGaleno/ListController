<?php

namespace Jonas\ListController\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Jonas\ListController\Entity\Category;
use Jonas\ListController\Entity\User;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CategoryInsert implements RequestHandlerInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $post = $request->getParsedBody();

        $categoryName = strip_tags($post['name']);

        $category = new Category($categoryName);

        // trocar pelo usuário logado na sessão
        $userId = $_SESSION['user'];

        $user = $this->entityManager->getReference(User::class, $userId);

        $category->setUser($user);

        $this->entityManager->persist($category);

        $this->entityManager->flush($category);

        return new Response(302, ['Location' => '/home']);
    }
}
