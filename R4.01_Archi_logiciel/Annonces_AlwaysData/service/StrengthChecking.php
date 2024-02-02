<?php
namespace service;
class StrengthChecking {
    public function passwordStrengthChecking($password): bool
    {
        // Vérifie la longueur du mot de passe
        if (strlen($password) >= 12 && preg_match('/[A-Z]/', $password) &&     // Au moins une majuscule
                preg_match('/[a-z]/', $password) &&     // Au moins une minuscule
                preg_match('/[0-9]/', $password) &&     // Au moins un chiffre
                preg_match('/[@!#$%^&*()\-_=+{};:,<.>]/', $password) // Au moins un caractère spécial
            ) {
                // Le mot de passe respecte les critères
                return true;
            }

        // Le mot de passe ne respecte pas les critères
        return false;
    }
}
