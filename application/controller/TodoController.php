<?php

namespace titi\controller;

use titi\core\Controller;

class TodoController extends Controller
{
    public function index()
    {
        $this->view('index');
    }
}