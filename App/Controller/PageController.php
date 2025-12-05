<?php

namespace App\Controller;

class PageController extends Controller
{

    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'about':
                        //appeler la methode about()
                        $this->about();
                        break;
                    case 'home':
                        //appeler la methode home()
                        $this->home();
                        break;
                    default:
                        //erreur 
                        throw new \Exception(" Cette action n'existe pas : " . $_GET['action']);
                        break;
                }
            } else {
                //charger la page d'accueil
                throw new \Exception("Aucune action détectée");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }



    protected function about(): void
    {
        /*on pourrait recuperer les données
        en fesant appel au model
        */
        /*on passe en premier paramètre la page à charger
        en second paramètre un tableau associatif des données à passer à la vue */

        $this->render('page/about', [
            'test' => 'abc',
            'test3' => 'abc2',
        ]);
    }

    protected function home(): void
    {
        /*on pourrait recuperer les données
        en fesant appel au model
        */
        /*on passe en premier paramètre la page à charger
        en second paramètre un tableau associatif des données à passer à la vue */

        $this->render('page/home', [
            'test' => 'abc',
            'test3' => 'abc2',
        ]);
    }
}
