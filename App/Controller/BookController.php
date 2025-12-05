<?php

namespace App\Controller;

use App\Repository\BookRepository;

class BookController extends Controller
{

    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'show':
                        //appeler la methode show()
                        $this->show();
                        break;
                    // case 'list':
                    //     //appeler la methode list()
                    //     $this->list();
                    //     break;
                    // case 'edit':
                    //     //appeler la methode edit()
                    //     $this->edit();
                    //     break;
                    // case 'add':
                    //     //appeler la methode add()
                    //     $this->add();
                    //     break;
                    // case 'delete':
                    //     //appeler la methode delete()
                    //     $this->delete();
                    //     break;
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


    /* 
Example d'apple depuis l'url
?controller=book&action=show&id=1
*/
    protected function show(): void
    {
        try {
            if (isset($_GET['id'])) {

                $id = (int) $_GET['id'];
                //charger le livre par un appel au repository (model)
                $bookRepository = new BookRepository();
                $book = $bookRepository->findOnebyId($id);

                $this->render('book/show', [
                    'book' => $book
                ]);
            } else {
                throw new \Exception("L'id est manquant en parametre");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }
}
