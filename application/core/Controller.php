<?php

namespace titi\core;

class Controller
{
    /**
     * @param $pagePath
     * @param array $params
     */
    protected function view($pagePath, $params = [])
    {
        foreach ($params as $k => $v) {
            $$k = $v;
        }
        if (file_exists(APP . 'view/public/header.php')) {
            require APP . 'view/public/header.php';
        }
        require APP . 'view/portal/' . $this->getClassName() . $pagePath;
        if (file_exists(APP . 'view/public/footer.php')) {
            require APP . 'view/public/footer.php';
        }
    }

    /**
     * Get called class name
     * @return string
     */
    private function getClassName()
    {
        $name = get_called_class();
        $name = strtolower(substr(strstr($name, 'Controller', true), 16)) . '/';
        return $name;
    }

    /**
     * security GET | POST method
     * @param $param
     * @return string
     */
    protected function I($param)
    {
        $param = trim($param);
        switch ($_SERVER["REQUEST_METHOD"]) {
            case 'POST':
                return htmlspecialchars($_POST[$param]);
            case 'GET':
                return htmlspecialchars($_GET[$param]);
        }
    }
}