<?php

namespace Jonas\ListController\Controller;

use Jonas\ListController\Helper\HtmlBuild;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoginForm implements RequestHandlerInterface
{
    use HtmlBuild;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->htmlBuild('Login/form.php', []);

        return new Response(200, [], $html);
    }
}
