<?php

namespace Controller;


use Studoo\EduFramework\Core\Controller\ControllerInterface;
use Studoo\EduFramework\Core\Controller\Request;
use Studoo\EduFramework\Core\View\TwigCore;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class EncryptController implements ControllerInterface
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
        $encryptValue = $value["encryptValue"];
        $base64Val = base64_encode($encryptValue);
        #base64_decode($str);
        return TwigCore::getEnvironment()->render('home/encrypt.html.twig',
            [
                'titre'   => "Page d'encryptage",
                'requete' => $request,
                'val_encrypt' => $base64Val,

            ]
        );
    }
}