$(function () {

    var addBook = $('#addButton');


    console.log(addTitle);
    console.log(addAuthor);
    console.log(addDesc);

    $(addBook).on('click', function (event) {
        event.preventDefault();
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
                $.ajax({
                    url: 'books.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function (result) {
                        console.log('sukces');
                        for (var i = 0; i < result.length; i++) {
                            $('h1').append('<div>' + result[i].name + '</div>');
                        }
                    },
                    error: function () {
                        console.log('blad 2');
                    },
                    complete: function () {
                        console.log('complete');
                    }

                });
            },
            error: function (a, b, c) {
                console.log('blad 1');
            },
            complete: function () {
                console.log('complete');
            }

        });
    });
});