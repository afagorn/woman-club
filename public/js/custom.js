$('.js-confirm-delete').on('click', function (event) {
    event.preventDefault();
    //const url = $(this).attr('href');
    Swal.fire({
        title: 'Вы уверены?',
        //text: "Удалить продукт?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Удалить',
        cancelButtonText: 'Отменить'
    }).then((result) => {
        if (result.value) {
            $(this).closest('form').submit();
            //window.location.href = url;
            /*Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )*/
        }
    })
});

