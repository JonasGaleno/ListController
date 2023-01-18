<?php

namespace Jonas\ListController\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Jonas\ListController\Entity\Category;
use Jonas\ListController\Entity\Item;
use Jonas\ListController\Helper\HtmlBuild;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CategoryItems implements RequestHandlerInterface
{
    use HtmlBuild;

    private $itemsRepository;
    private $categoriesRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->itemsRepository = $entityManager->getRepository(Item::class);
        $this->categoriesRepository = $entityManager->getRepository(Category::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $get = $request->getQueryParams();

        $categoryId = $get['id'];

        $category = $this->categoriesRepository->find($categoryId);

        $items = $this->itemsRepository->findBy([
            'category' => $category,
            'status' => 'PENDENTE'
        ]);
        
        $html = $this->htmlBuild('Category/category.php', [
            'category' => $category,
            'items' => $items
        ]);
        
        return new Response(200, [], $html);
    }
}
