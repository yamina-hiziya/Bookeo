<?php

namespace App\Controller;

class Controller
{
    public function route(): void
    {
        if (isset($_GET['controller'])) {
            switch ($_GET['controller']) {
                case 'page':
                    //charger controller page
                    var_dump('on charge PageController');
                    break;
                case 'book':
                    //charger controller book
                    var_dump('on charge BookController');
                    break;
                default:
                    //erreur 
                    break;
            }
        } else {
            //charger la page d'accueil
        }
    }
}
