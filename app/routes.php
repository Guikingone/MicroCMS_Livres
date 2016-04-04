<?php

// Home page
$app->get('/', function () use ($app) {
    $livre = $app['dao.livre']->findAll();
    return $app['twig']->render('index.html.twig', array('livres' => $livre));
})->bind('home');

// Livre details with author
$app->get('/livre/{id}', function($id) use ($app){
    $livre = $app['dao.livre']->find($id);
    $author = $app['dao.author']->findAllByLivre($id);
    return $app['twig']->render('livre.html.twig', array('livre' => $livre,
        'author' => $author));
})->bind('livre');