<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 02/04/2016
 * Time: 09:10
 */

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// Register services.
$app['dao.livre'] = $app->share(function ($app) {
    return new MicroCMS\DAO\LivreDAO($app['db']);
});
$app['dao.author'] = $app->share(function ($app){
    $authorDAO = new \MicroCMS\DAO\AuthorDAO($app['db']);
    $authorDAO->setLivreDAO($app['dao.livre']);
    return $authorDAO;
});