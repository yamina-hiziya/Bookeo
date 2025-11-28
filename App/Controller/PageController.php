<?php

namespace App\Controller;

class PageController extends Controller
{

    public function route(): void
    {

        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'about':
                    //appeler la methode about()
                    var_dump('about');
                    break;
                case 'home':
                    //appeler la methode home()
                    var_dump('home');
                    break;
                default:
                    //erreur 
                    break;
            }
        } else {
            //charger la page d'accueil

        }
    }
    protected function about(): void
    {
        /*on pourrait recuperer les données
        en fesant appel au model
        */
        $params = [
            'test'  => 'abc'
        ];

        $this->render('page/about');
    }
}
