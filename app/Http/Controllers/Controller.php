<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    public $msg_success = "Enregistrement réussie avec succès";
    public $msg_error = "Ressource non trouvé";
    public $status_ok = 200;
    public $status_error = 404;
}
