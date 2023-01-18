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

class FinishedItems implements RequestHandlerInterface
{
    use HtmlBuild;

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $get = $request->getQueryParams();

        $categoryId = $get['id'];

        $category = $this->entityManager->find(Category::class, $categoryId);

        $itemsRepository = $this->entityManager->getRepository(Item::class);

        $finishedItems = $itemsRepository->findBy([
            'category' => $category,
            'status' => 'FINALIZADO'
        ]);
        
        $html = $this->htmlBuild('Finish/finish.php', [
            'category' => $category,
            'items' => $finishedItems
        ]);

        return new Response(200, [], $html);
    }
}
