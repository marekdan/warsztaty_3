<?php

/*
CREATE TABLE Book(
    id int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    author varchar(255) NOT NULL,
    description varchar(255),
    PRIMARY KEY(id)
);
*/

class Book {

    static private $connection;
    private $id;
    private $name;
    private $author;
    private $description;

    static public function SetConnection(mysqli $newConnection) {
        Book::$connection = $newConnection;
    }

    static public function AddBook($newName, $newAuthor, $newDesc) {
        if ($newName != null && $newAuthor != null && $newDesc != null) {
            $sql = "INSERT INTO Book (name, author, description) VALUES ('$newName', '$newAuthor', '$newDesc')";
            $result = self::$connection->query($sql);
            if ($result !== false) {
            }
            else {
                echo 'Wystąpil problem 2 z dodaniem książki';
            }
        }
        else {
            echo 'Wystąpil problem 1 z dodaniem książki';
        }
    }

    static public function UpdateDescription() {

    }

    static public function DeleteBook($bookId) {
        $sql = "DELETE FROM Book WHERE id='$bookId'";
        $result = self::$connection->query($sql);
        if ($result !== false) {

            return $result->fetch_assoc();
        }
    }

    static public function GetAllBooks() {
        $ret = [];
        $sql = "SELECT * FROM Book";
        $result = self::$connection->query($sql);

        if ($result !== false) {
            while ($row = $result->fetch_assoc()) {
                $ret[] = $row;
            }

            return $ret;
        }

    }

    static public function GetSingleBook($bookId) {
        $sql = "SELECT * FROM Book WHERE id='$bookId'";
        $result = self::$connection->query($sql);
        if ($result !== false) {

            return $result->fetch_assoc();
        }

        return false;
    }

    public function __construct($newId, $newName, $newAuthor, $newDesc) {
        $this->id = intval($newId);
        $this->setName($newName);
        $this->setAuthor($newAuthor);
        $this->setDescription($newDesc);
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

}