$(function () {

    var addBook = $('#addButton');

    function loadAllBooks() {
        $.ajax({
            url: 'books.php',
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                console.log('sukces 1');
                console.log(result);
                for (var i = 0; i < result.length; i++) {
                    $('#books').append('<div id="' + result[i].id + '" class="book">' + result[i].name + '<div class="toDel"> Usun</div><div class="bookInfo"></div></div>');
                }
            },
            error: function () {
                console.log('blad 1');
            },
            complete: function () {
                console.log('complete 1');
            }
        });
    }

    loadAllBooks();

    $(addBook).on('click', function (event) {
        event.preventDefault();
        $('#books').empty();
        var addTitle = $('#addTitle').val();
        var addAuthor = $('#addAuthor').val();
        var addDesc = $('#addDesc').val();

        var toSend = {};
        toSend.title = addTitle;
        toSend.author = addAuthor;
        toSend.description = addDesc;

        $.ajax({
            url: 'books.php',
            type: 'POST',
            data: toSend,
            dataType: 'json',
            success: function (result) {
                console.log('sukces 2');
                loadAllBooks();
            },
            error: function (a, b, c) {
                console.log('blad 2');
            },
            complete: function () {
                console.log('complete 2');
            }

        });
    });

    $('#books').on('click', '.book', function () {
        console.log('asda');
        var book = {};
        book.id = $(this).attr('id');
        var bookInfo = $(this).find('.bookInfo');

        $.ajax({
            url: 'books.php',
            type: 'GET',
            data: book,
            dataType: 'json',
            success: function (result) {
                console.log(result);

                var toDiv = 'Autor: ' + result.author + '<br>' + 'Opis: ' + result.description;
                bookInfo.html(toDiv).slideToggle('slow');
            },
            error: function (err) {
                console.log('blad 2');
                console.log(err);
            },
            complete: function () {
                console.log('complete 2');
            }

        });
    });

    $('#books').on('click', '.toDel', function (event) {
        event.stopPropagation();

        var idToDel = {};
        idToDel.id = $(this).parent().attr('id');

        $.ajax({
            url: 'books.php',
            type: 'DELETE',
            data: idToDel,
            dataType: 'json',
            success: function (result) {
                console.log('sukces DELETE');
                console.log(result);
            },
            error: function (err) {
                console.log('blad DELETE ');
                console.log(err);
            },
            complete: function () {
                console.log('complete DELETE');
            }
        });
    });

});