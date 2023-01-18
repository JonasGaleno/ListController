<?php

namespace Jonas\ListController\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Jonas\ListController\Entity\Category;
use Jonas\ListController\Entity\User;
use Jonas\ListController\Helper\HtmlBuild;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Home implements RequestHandlerInterface
{
    use HtmlBuild;

    private $categoryRepository;
    private $userRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->categoryRepository = $entityManager->getRepository(Category::class);
        $this->userRepository = $entityManager->getRepository(User::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $userId = $_SESSION['user'];

        $user = $this->userRepository->findBy([
            'id' => $userId
        ]);
        
        $categories = $this->categoryRepository->findBy([
            'user' => $user
        ]);

        $html = $this->htmlBuild('Home/home.php', [
            'categories' => $categories
        ]);

        return new Response(200, [], $html);
    }
}
