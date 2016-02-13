<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/books_script.js"></script>
    <title>Biblioteka</title>
</head>

<body>

<form>
    <label>
        Tytuł książki:
        <input id="addTitle" type="text" name="title">
    </label>
    <br>
    <label>
        Autor:
        <input id="addAuthor" type="text" name="author">
    </label>
    <br>
    <label>
        Opis:
        <input id="addDesc" type="text" name="description">
    </label>
    <br>
    <input id="addButton" type="submit" value="Dodaj książkę">
</form>

<form method="GET">
    <input id="addButton" type="submit" value="Pokaż książki">
</form>

<h1>Lista Książek: </h1>
<div id="books"></div>

</body>

</html>