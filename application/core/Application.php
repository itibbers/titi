<?php

namespace titi\core;


class Application
{
    private $url_controller = null;
    private $url_action = null;
    private $url_params = array();

    /**
     * "Start" the application:
     * Analyze the URL elements and calls the according controller/method or the fallback
     */
    public function __construct()
    {
        // create array with URL parts in $url
        $this->splitUrl();

        // check for controller: no controller given ? then load start-page
        if (!$this->url_controller) {

            $page = new \titi\controller\HomeController();
            $page->index();

        } elseif (file_exists(APP . 'controller/' . ucfirst($this->url_controller) . 'Controller.php')) {

            // load file and create controller
            $controller = "\\titi\\controller\\" . ucfirst($this->url_controller) . 'Controller';
            $this->url_controller = new $controller();

            // check is method exist in the controller
            if (method_exists($this->url_controller, $this->url_action)) {
                if (!empty($this->url_params)) {
                    // Call the method and pass arguments to it
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else {
                    // If no parameters are given, just call the method without parameters, like $this->home->method();
                    $this->url_controller->{$this->url_action}();
                }
            } else {
                if (strlen($this->url_action) == 0) {
                    // no action defined: call the default index() method of a selected controller
                    $this->url_controller->index();
                } else {
                    header('location: ' . URL . 'error');
                }
            }
        } else {
            header('location: ' . URL . 'error');
        }
    }

    /**
     * Get and split the URL
     */
    private function splitUrl()
    {
        if (isset($_GET['url'])) {

            // Split URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // Put URL parts into according properties
            // By the way, the syntax here is just a short form of if/else, called "Ternary Operators"
            // @see http://davidwalsh.name/php-shorthand-if-else-ternary-operators
            $this->url_controller = isset($url[0]) ? $url[0] : null;
            $this->url_action = isset($url[1]) ? $url[1] : null;

            // Remove controller and action from the split URL
            unset($url[0], $url[1]);

            // Rebase array keys and store the URL params
            $this->url_params = array_values($url);

            // Security filter
            $this->filterParams();

            // for debugging. uncomment this if you have problems with the URL
            //echo 'Controller: ' . $this->url_controller . '<br>';
            //echo 'Action: ' . $this->url_action . '<br>';
            //echo 'Parameters: ' . print_r($this->url_params, true) . '<br>';
        }
    }

    /**
     * Security filter
     */
    private function filterParams()
    {
        for ($i = 0; $i < count($this->url_params); $i++) {
            $this->url_params[$i] = htmlspecialchars(trim($this->url_params[$i]));
        }
    }
}