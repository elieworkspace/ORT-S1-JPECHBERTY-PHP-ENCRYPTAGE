<?php

namespace Controller;

use Studoo\EduFramework\Core\Controller\ControllerInterface;
use Studoo\EduFramework\Core\Controller\Request;
use Studoo\EduFramework\Core\View\TwigCore;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class DecryptController implements ControllerInterface
{
    /**
     * @param Request $request Requête HTTP
     * @return string|null
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function execute(Request $request): string|null
    {

        $value = $request->getVars();
        $decryptValue = $value["decryptValue"];
        $base64Val = base64_decode($decryptValue);

        return TwigCore::getEnvironment()->render('home/decrypt.html.twig',
            [
                'titre'   => "Page de decryptage",
                'requete' => $request,
                'val_decrypt' => $base64Val,
            ]
        );
    }
}