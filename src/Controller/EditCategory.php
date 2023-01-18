<?php

namespace Jonas\ListController\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Jonas\ListController\Entity\Category;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class EditCategory implements RequestHandlerInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $get = $request->getQueryParams();
        $post = $request->getParsedBody();

        $categoryId = $get['id'];
        $categoryName = $post['name'];

        $categoryRepository = $this->entityManager->getRepository(Category::class);
        
        $category = $categoryRepository->find($categoryId);

        $category->name = $categoryName;

        $this->entityManager->flush();

        return new Response(201, ['location' => '/category-items?id=' . $categoryId]);
    }
}
