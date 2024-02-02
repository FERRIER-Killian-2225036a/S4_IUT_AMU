<?php
namespace gui;
include_once "gui/View.php";

class ViewSignup extends View
{
    public function __construct($layout)
    {
        parent::__construct($layout);

        $this->title = 'Exemple Annonces Basic PHP: Connexion';

        $this->content = '
            <form method="post" action="/annonces/index.php/signup">
            
            
                <label for="prenom"> Votre Prénom </label> :
                <input type="text" name="prenom" id="prenom" placeholder="prenom" maxlength="12" required />
                <br />
                <label for="nom"> Votre Nom </label> :
                <input type="text" name="nom" id="nom" placeholder="nom" maxlength="12" required />
                <br />
                <label for="login"> Votre identifiant </label> :
                <input type="text" name="login" id="login" placeholder="identifiant" maxlength="12" required />
                <br />
                <label for="password"> Votre mot de passe </label> :
                <input type="password" name="password" id="password" maxlength="20" required />
                
                <br />
                <input type="submit" value="Envoyer">
            </form>';
    }
}