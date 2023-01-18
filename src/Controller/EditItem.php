<?php

namespace Jonas\ListController\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Jonas\ListController\Entity\Item;
use Jonas\ListController\Helper\AlertMessage;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class EditItem implements RequestHandlerInterface
{
    use AlertMessage;

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $get = $request->getQueryParams();
        $post = $request->getParsedBody();

        $itemId = $get['id'];
        $itemDescription = $post['description'];

        $itemRepository = $this->entityManager->getRepository(Item::class);

        $item = $itemRepository->find($itemId);

        $item->description = $itemDescription;

        $this->entityManager->flush();

        $category = $item->getCategory();

        $this->setMessage("success", "Item atualizado!");

        return new Response(201, ['Location' => '/category-items?id=' . $category->getId()]);
    }
}
