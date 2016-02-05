<?php
require_once("./src/connection.php");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $newName = $_POST['title'];
    $newAuthor = $_POST['author'];
    $newDesc = $_POST['description'];

    Book::AddBook($newName, $newAuthor, $newDesc);
    echo json_encode([]);
}

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $tab = [];
    $tab = Book::getAllBooks();
   echo  json_encode($tab);
}
