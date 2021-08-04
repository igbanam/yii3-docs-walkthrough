<?php

declare(strict_types=1);

namespace App\Controller;

use Yiisoft\Yii\View\ViewRenderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class EchoController {
    private ViewRenderer $viewRenderer;

    public function __construct(ViewRenderer $viewRenderer)
    {
        $this->viewRenderer = $viewRenderer->withControllerName('echo');
    }

    public function say(ServerRequestInterface $request): ResponseInterface
    {
        $message = $request->getAttribute('message', 'Hello!');

        return $this->viewRenderer->render('say', [
            'message' => $message,
        ]);
    }
}
