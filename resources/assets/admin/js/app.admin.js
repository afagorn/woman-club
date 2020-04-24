require('./bootstrap');
const Swal = require('sweetalert2');

$('.js-confirm-delete').on('click', function (event) {
    event.preventDefault();
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

$('.js-datetimepicker').datetimepicker({
    locale: 'ru',
    icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
    }
});

