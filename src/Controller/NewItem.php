<?php

namespace Jonas\ListController\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Jonas\ListController\Entity\Category;
use Jonas\ListController\Entity\Item;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class NewItem implements RequestHandlerInterface
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
        $itemDescription = $post['description'];

        $category = $this->entityManager->find(Category::class, $categoryId);

        $item = new Item($itemDescription);
        $item->setCategory($category);

        $this->entityManager->persist($item);
        $this->entityManager->flush();

        return new Response(201, ['Location' => '/category-items?id=' . $categoryId]);
    }
}
