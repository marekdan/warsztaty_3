<?php
require_once("./src/connection.php");

if($_SERVER['REQUEST_METHOD'] === 'GET' && (!isset($_GET['id']))){
    $tab = [];
    $tab = Book::getAllBooks();
    echo  json_encode($tab);
}

if($_SERVER['REQUEST_METHOD'] === 'GET' && (isset($_GET['id']))){
    $tab = Book::GetSingleBook($_GET['id']);
    echo  json_encode($tab);
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $newName = $_POST['title'];
    $newAuthor = $_POST['author'];
    $newDesc = $_POST['description'];

    Book::AddBook($newName, $newAuthor, $newDesc);
    echo json_encode([]);
}

if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    $toDel = json_decode(file_get_contents('php://input'));
    Book::DeleteBook($toDel['id']);
    echo json_encode([]);
}


