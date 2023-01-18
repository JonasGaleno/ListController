<?php

namespace Jonas\ListController\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Jonas\ListController\Entity\Category;
use Jonas\ListController\Entity\User;
use Jonas\ListController\Helper\AlertMessage;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CategoryInsert implements RequestHandlerInterface
{
    use AlertMessage;

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $post = $request->getParsedBody();

        $categoryName = strip_tags($post['name']);

        $category = new Category($categoryName);

        $userId = $_SESSION['user'];

        $user = $this->entityManager->getReference(User::class, $userId);

        $category->setUser($user);

        $this->entityManager->persist($category);

        $this->entityManager->flush($category);

        $this->setMessage("success", "Categoria adicionada!");

        return new Response(302, ['Location' => '/home']);
    }
}
