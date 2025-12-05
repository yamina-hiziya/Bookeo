<?php

namespace App\Repository;

use App\Entity\Book;
use App\Db\Mysql;
use App\Tools\StringTools;

class BookRepository
{
    // Méthodes pour interagir avec la base de données des livres
    public function findOnebyId(int $id) //prend en parametre un id de type entier
    {
        // Logique pour trouver un livre par son ID
        //appel bdd (et retour d'un objet Book ou null)
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        $query = $pdo->prepare('SELECT * FROM book WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        //pour l'exemple on simule un livre
        $book = $query->fetch(\PDO::FETCH_ASSOC);
        //$book = ['id' => 1, 'title' => 'Exemple de Livre', 'description' => 'Ceci est une description.'];

        $bookEntity = new Book();
        // $bookEntity->setId($book['id']);
        // $bookEntity->setTitle($book['title']);
        // $bookEntity->setDescription($book['description']);

        foreach ($book as $key => $value) {
            $bookEntity->{"set" . StringTools::toPascalCase($key)}($value);
        }

        return $bookEntity;
    }
}
