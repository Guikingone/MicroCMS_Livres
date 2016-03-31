<?php

// Return all articles
function getArticles() {
    $bdd = new PDO('mysql:host=localhost;dbname=microcms_livres;charset=utf8', 'root', '');
    $articles = $bdd->query('select * from book order by book_id desc');
    return $articles;
}