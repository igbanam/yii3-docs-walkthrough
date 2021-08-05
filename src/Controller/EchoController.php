<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\EchoForm;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Yiisoft\Http\Method;
use Yiisoft\Validator\Validator;
use Yiisoft\Yii\View\ViewRenderer;

class EchoController {
    private ViewRenderer $viewRenderer;

    public function __construct(ViewRenderer $viewRenderer)
    {
        $this->viewRenderer = $viewRenderer->withControllerName('echo');
    }

    public function say(ServerRequestInterface $request, Validator $validator): ResponseInterface
    {
        $form = new EchoForm();

        if ($request->getMethod() === Method::POST) {
            $form->load($request->getParsedBody());
            $validator->validate($form);
        }

        return $this->viewRenderer->render('say', [
            'form' => $form,
        ]);
    }
}
