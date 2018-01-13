<?php

namespace titi\controller;

use titi\core\Controller;

class HomeController extends Controller
{
    /**
     * Default method for the controller
     */
    public function index()
    {
        $titi = "Hello titi😋!";

        $this->view('index.php', [
            'titi' => $titi
        ]);
    }

    /**
     * For example.
     * @param null $p1
     * @param null $p2
     * @param null $p3
     */
    public function hello($p1 = null, $p2 = null, $p3 = null)
    {
        //TODO: if $p1 has no default value ?
        echo 'Hello ' . $p1 . ', ' . $p2 . ', ' . $p3;
    }

    /**
     * Deal with your data.
     * Attention: all *private* method can not be accessed by url.
     */
    private function process()
    {

    }
}