<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class DiController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // $container = new \yii\di\Container;

        Yii::$container->setSingleton('app\controllers\Bar');
        echo 'ff';
        Yii::$container->set('app\controllers\FooInterface', 'app\controllers\Bar');
        $foo = Yii::$container->get('app\controllers\Foo');
        $foo2 = Yii::$container->get('app\controllers\Foo');

        print_r($foo);
    }
}

class Foo
{
    public $var = 'Foo';

    function __construct(FooInterface $bar) 
    {
        // Constructor
        echo '{Foo new}';
    }
}

interface FooInterface
{
    public function calculate();
}

class Bar implements FooInterface
{
    public $var = 'Bar';

    function __construct() 
    {
        // Constructor
        echo '{Bar new}';
    }

    public function calculate()
    {
        return 100;
    }
}