<?php

namespace App\Controller;

use App\Controller\PageController;

class Controller
{

    public function route(): void
    {
        try {
            if (isset($_GET['controller'])) {
                switch ($_GET['controller']) {
                    case 'page':
                        //charger controlleur page 
                        $pageController = new PageController();
                        $pageController->route();
                        break;
                    case 'book':
                        // charger controlleur book
                        $bookController = new BookController();
                        $bookController->route();
                        break;
                    default:
                        //erreur 
                        throw new \Exception("Le Controlleur n'existe pas");
                        break;
                }
            } else {
                //chargement de la page d'accueil si pas de controlleur dans l'url
                $pageController = new PageController();
                $pageController->home();
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }



    protected function home(): void
    {
        $this->render('home');
    }

    protected function render(string $path, array $params = []): void
    {
        $filePath = ROOT_PATH . '/templates/' . $path . '.php';
        try {
            if (!file_exists($filePath)) {
                //alors generer une erreur 404
                throw new \Exception("Fichier non trouvé : " . $filePath);
            } else {
                //extrait chaque ligne du tableau et crée des variables pour chaque clé
                extract($params);
                require_once $filePath;
            }
        } catch (\Exception $e) {
            //gerer l'exception et afficher une page d'erreur
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }
}
