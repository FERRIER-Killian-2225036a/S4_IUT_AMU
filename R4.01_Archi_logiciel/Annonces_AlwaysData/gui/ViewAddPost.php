<?php
namespace gui;
include_once "View.php";
class ViewAddPost extends View
{

    public function __construct($layout)
    {
        parent::__construct($layout);

        $this->title = 'Exemple Annonces Basic PHP: Connexion';

        $this->content = '
            <form method="post" action="/annonces/index.php/addPost">
                <a href="javascript:history.back()">Retour</a><br />
                <label for="title"> Titre du post<span style="color: red">*</span> </label> : 
                <input type="text" name="title" id="title" placeholder="titre" maxlength="20" required />
                <br />
                <label for="body"> Contenue du post<span style="color: red">*</span> </label> : <br />
                <textarea name="body" id="body" placeholder="contenu" maxlength="200" required rows="4" cols="50"></textarea>
                
                <br />
                <input type="submit" value="Envoyer">
            </form>';
    }
}