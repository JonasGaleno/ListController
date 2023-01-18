<?php

namespace Jonas\ListController\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Jonas\ListController\Entity\Item;
use Jonas\ListController\Helper\AlertMessage;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RemoveFinish implements RequestHandlerInterface
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

        $itemId = $get['id'];

        $item = $this->entityManager->find(Item::class, $itemId);

        $item->status = 'PENDENTE';

        $category = $item->getCategory();
        
        $this->entityManager->flush();

        $this->setMessage("success", "Item removido dos finalizados!");
        
        return new Response(201, ['Location' => '/finished-items?id=' . $category->getId()]);
    }
}
