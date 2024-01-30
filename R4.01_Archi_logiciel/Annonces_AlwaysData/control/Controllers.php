<?php
namespace control;
include_once 'service/AnnoncesChecking.php';
class Controllers
{


    public function annoncesAction($login, $password, $data, $annoncesCheck)
    {
        if ($annoncesCheck->authentificate($login,$password,$data)) {
            $annoncesCheck->getAllAnnonces($data);
        }
    }

    public function postAction($id, $data, $annoncesCheck)
    {
        $annoncesCheck->getPost($id,$data);
    }
}


/*
    protected $data = null;

    public function __construct($data)
    {
        $this->data = $data;
    }
 */