<?php

namespace Controller;

use Studoo\EduFramework\Core\Controller\ControllerInterface;
use Studoo\EduFramework\Core\Controller\Request;
use Studoo\EduFramework\Core\Service\DatabaseService;
use Studoo\EduFramework\Core\View\TwigCore;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class AppleController implements ControllerInterface
{
	public function execute(Request $request): string|null
	{
        // Etape 1 : Recuperation de l'objet DataService
        $connexion = DatabaseService::getConnect();

        // Etape 2 : Requete SQL
        $statement = $connexion->query("SELECT * FROM user");

        // Recuperer les données
        $result = $statement->fetchAll();


		return TwigCore::getEnvironment()->render('apple/apple.html.twig',
		    [
		        "titre"   => 'AppleController',
		        "request" => $request,
                "list_user" => $result
		    ]
		);
	}
}
