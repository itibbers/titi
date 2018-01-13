<?php

namespace titi\controller;

use titi\core\Controller;

class ErrorController extends Controller
{
    /**
     * This method handles the error page that will be shown when a page is not found.
     */
    public function index()
    {
        $this->view('index.php');
    }
}