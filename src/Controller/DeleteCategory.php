<?php

namespace Jonas\ListController\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Jonas\ListController\Entity\Category;
use Jonas\ListController\Helper\AlertMessage;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteCategory implements RequestHandlerInterface
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

        $categoryId = $get['id'];

        $category = $this->entityManager->find(Category::class, $categoryId);

        $this->entityManager->remove($category);
        $this->entityManager->flush();

        $this->setMessage("success", "Categoria removida!");
        
        return new Response(200, ['Location' => '/home']);
    }
}
