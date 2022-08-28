$( document ).ready(function() {
    $('#editBookForm').submit(function(event) {
        const formData = new FormData(this)
        fetch('/updateBook', {
            method: 'POST',
            body: formData
        }).then(response => response.json()).then((result) => updateBooks())
        this.reset();
        event.preventDefault();
        $('#editBookModal').modal('hide');
        return false;
    });

    $('#addBookForm').submit(function( event ) {
        const formData = new FormData(this)
        fetch('/addBook', {
            method: 'POST',
            body: formData
        }).then(response => response.json()).then((result) => updateBooks())
        this.reset();
        event.preventDefault();
        $('#addBookModal').modal('hide');
        return false;
    });

    $(document).on('click','.deleteBookButton', function() {
        $('#bookName').html(this.dataset.title)
        $('#removeBookModal').modal('show');
        const bookId = this.dataset.book;

        $('#deleteBook').click(function() {
            fetch('/deleteBook/'+bookId, {
                method: 'DELETE',
            }).then(response => response.json()).then((result) => {
                updateBooks();
            })
        });
    });
//takeBookButton
    $('#takeBookForm').submit(function( event ) {

        const formData = new FormData(document.querySelector('#takeBookForm'))
        fetch('/takeBook/', {
            method: 'POST',
            body: formData
        }).then(response => response.json()).then((result) => {
            if(result.result == 'error') {
                alert('Bad dates!')
            }
        })

        event.preventDefault();

        $('#takeBookModal').modal('hide');
        return false;
    });

    $(document).on('click','.takeBookButton', function() {
        const bookId = this.dataset.book;
        $('#takeBookId').val(bookId);
        //get users
        fetch('/users').then(res => res.json()).then((result) => {
            const users = document.querySelector('#user_id')
            users.innerHTML = '';
            result.forEach(element => users.innerHTML += '<option  value="' + element.id + '">' + element.name + '</option>');
            $('.ui.dropdown').dropdown();
        });
        //get blocked dates
        fetch('/book/'+bookId).then(response => response.json()).then((result) => {
            $('#takeBookModal').modal('show');
            const dateFunc = dateCheck(result.taken);
            $("#datepicker_from").datepicker("destroy");
            $("#datepicker_to").datepicker("destroy");
			 $("#datepicker_from").val("");
            $("#datepicker_to").val("");
            
            $( "#datepicker_from" ).datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
                beforeShowDay: dateFunc
            });
            $( "#datepicker_to" ).datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
                beforeShowDay: dateFunc
            });
        });
    });
    $('#showHistory').click(function() {
        $('#historyModal').modal('show');
        fetch('/booksTaken').then(res => res.json()).then((result) => {
            const history = document.querySelector('#historyBlock');
            history.innerHTML = '';

            result.forEach(elem => {
                history.innerHTML+='<p><i class="book icon"></i> '+elem.bookname+' <i class="user icon"></i> '+elem.username+' <i class="clock icon"></i> From: '+elem.from_time+' To: '+elem.to_time+'</p>';
            });
        });
    });

    $(document).on('click','.editBookButton', function() {
        const bookId = this.dataset.book;
        fetch('/book/'+bookId).then(response => response.json()).then((result) => {
            $('#update_id').val(result.id)
            $('#update_name').val(result.name)
            $('#update_description').val(result.description)
            $('#update_image').val(result.image)
            $('#update_year').val(result.publish_year)

            getAuthors('#update_author_id', result.author_id );
            getTypes('#update_type_id', result.type_id);

        })

        $('.ui.dropdown').dropdown();
        $('#editBookModal').modal('show');
    });

    $('#addBook').click(function () {
        getAuthors('#author_id');
        getTypes('#type_id');

        $('.ui.dropdown').dropdown();
        $('#addBookModal').modal('show');
    })

    let seachTextOld = '';
    $("#searchText").bind("change paste keyup", function() {
        const searchText = $(this).val();
        if (searchText != seachTextOld) {
            seachTextOld = searchText;
            //make request
            updateBooks(searchText);
        }
    });


    updateBooks();
});