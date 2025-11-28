<?php

namespace App\Controller;

use App\Controller\PageController;

class Controller
{
    public function route(): void
    {
        if (isset($_GET['controller'])) {
            switch ($_GET['controller']) {
                case 'page':
                    echo "DEBUG: On est dans le case 'page'<br>";
                    //charger controller page
                    $PageController = new PageController();
                    $PageController->route();
                    break;
                case 'book':
                    //charger controller book

                    break;
                default:
                    //erreur 
                    break;
            }
        } else {
            //charger la page d'accueil
            $this->home();
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
                require_once $filePath;
            }
        } catch (\Exception $e) {
            //gerer l'exception
            echo $e->getMessage();
        }
    }
}
