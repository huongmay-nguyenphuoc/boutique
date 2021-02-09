<?php


require_once('database.php');



class Searchbar
{
    private $pdo;

    function __construct()
    {
        $this->pdo = new database();
    }

    function selectArticles($query)
    {
        $searchResults = $this->pdo->Select('SELECT title, shortdesc, id_product FROM products WHERE title LIKE "%' . $query . '%" ORDER BY id_product DESC');
        if(empty($searchResults)) {
            $searchResults = $this->pdo->Select('SELECT title, shortdesc, id_product FROM products WHERE CONCAT(title, description) LIKE "%' . $query . '%" ORDER BY id_product DESC');
        }
        return $searchResults;
    }

    function suggestArticles()
    {
        $suggests = $this->pdo->Select('SELECT title FROM products ORDER BY rand() LIMIT 3');
        foreach($suggests as $suggest)
        {
           echo $suggest['title'].'...';
        }
    }
}
/*$search = new Searchbar();
$search->suggestArticles();*/