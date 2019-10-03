<?php


namespace App\SBlog\Core;


class BlogApp
{
    public static $app;
    protected static $properties;

    public static function getInstance()
    {
        self::$app = Registry::instance();
        self::getParams();
        return self::$app;
    }

    protected static function getParams()
    {
        $params = require CONF . "/params.php";

        if(!empty($params)) {
            foreach($params as $name => $param) {
                self::$app->setProperty($name, $param);
            }
        }

    }
}
