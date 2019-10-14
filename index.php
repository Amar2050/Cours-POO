<?php

require_once('libraries/database.php');
require_once('libraries/utils.php');
require_once('libraries/models/Article.php');

$model = new Article();
/**
 * 2. Récupération des articles
 */
$articles = $model->findAll("created_at DESC");

/**
 * 3. Affichage
 */
$pageTitle = "Accueil";

render('articles/index', compact('pageTitle', 'articles'));