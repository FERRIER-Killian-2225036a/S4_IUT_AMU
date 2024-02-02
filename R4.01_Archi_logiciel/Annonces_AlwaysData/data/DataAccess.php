<?php

namespace data;
use service\DataAccessInterface;
include_once 'service/DataAccessInterface.php';
use domain\{User, Post};
include_once 'domain/User.php';
include_once 'domain/Post.php';
class DataAccess implements DataAccessInterface
{
    protected $dataAccess = null;

    public function __construct($dataAccess)
    {
        $this->dataAccess = $dataAccess;
    }

    public function __destruct()
    {
        $this->dataAccess = null;
    }

    public function isUser( $login, $password )
    {
        $isuser = False ;

        $query= 'SELECT login FROM Users WHERE login="'.$login.'" and password="'.$password.'"';
        $result = $this->dataAccess->query($query);

        if( mysqli_num_rows( $result) )
            $isuser = True;

        $result->closeCursor();

        return $isuser;
    }

    public function getAllAnnonces()
    {
        $result = $this->dataAccess->query('SELECT * FROM Post');
        $annonces = array();

        while ($row = $result->fetch()) {
            $currentPost = new Post($row['id'], $row['title'], $row['body'], $row['date']);
            $annonces[] = $currentPost;
        }

        $result->closeCursor();

        return $annonces;
    }

    public function getPost($id)
    {
        $id = intval($id);
        $result = $this->dataAccess->query('SELECT * FROM Post WHERE id=' . $id);
        $row = $result->fetch();

        $post = new Post($row['id'], $row['title'], $row['body'], $row['date']);

        $result->closeCursor();

        return $post;
    }

    public function getUser($login, $password)
    {
        $user = null;

        $query = 'SELECT login FROM Users WHERE login="' . $login . '" and password="' . $password . '"';
        $result = $this->dataAccess->query($query);

        if ($result->rowCount())
            $user = new User($login, $password);

        $result->closeCursor();

        return $user;
    }

    //TODO : Après vérification, ajout des données dans la bd
    public function addUser($login, $password, $prenom, $nom, $dateCreation) {

        $query = 'INSERT INTO Users (login, password, prenom, nom, dateCreation) VALUES (?, ?, ?, ?, ?)';
        $statement = $this->dataAccess->prepare($query);
        $success = $statement->execute([$login, $password, $prenom, $nom, $dateCreation]);

        // Vérifie si l'ajout a été réussi
        if ($success) {
            // Crée un nouvel objet User avec les données ajoutées
            $user = new User($login, $password);
        } else {
            $user = null;
        }

        $statement->closeCursor();

        return $user;
    }
}

