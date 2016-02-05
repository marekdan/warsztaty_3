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

    static public function SetConnection(mysqli $newConnection) {
        Book::$connection = $newConnection;
    }

    static public function AddBook($newName, $newAuthor, $newDesc) {
        $sql = "INSERT INTO Book (name, author, description) VALUES ('$newName', '$newAuthor', '$newDesc')";
        $result = self::$connection->query($sql);
        if ($result !== false) {
        }
        else {
            echo 'Wystąpil problem z dodaniem książki';
        }
    }

    static public function updateDescription() {

    }

    static public function DeleteBook() {

    }

    static public function getAllBooks() {
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

    private $id;
    private $name;
    private $authoor;
    private $description;

    public function __construct($newId, $newName, $newAuthor, $newDesc) {
        $this->id = intval($newId);
        $this->name = $newName;
        $this->authoor = $newAuthor;
        $this->description = $newDesc;
    }

}

?>