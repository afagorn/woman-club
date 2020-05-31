require('./bootstrap');

document.addEventListener('DOMContentLoaded', function(){

    //Создание заказа через "API"
    /*let API = (function () {
        API.tokenCSRF = '';
    })();*/

    function createOrder(email, productsId, token, callback) {
        let data = new FormData();
        data.append('email', email);
        data.append('productsId', productsId);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', '/api/order/create');
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
        //xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

        xhr.send(data);

        xhr.onreadystatechange = function() {
            if(xhr.readyState === 4) {
                if (xhr.status >= 200 && xhr.status < 300) {
                    callback(xhr.response);
                }  else {

                    let data = xhr.responseText;
                    try {
                        //data = JSON.parse(data);
                        console.log(data);
                        alert('Заполните все необходимые поля')
                    } catch (e) {
                        console.error('Could not parse the response received from the server.');
                    }
                }

            }
        }
    }

    //Отправка формы оплаты и создание заказа
    let payButtonSubmit = document.getElementById('jsPayFormSubmit');
    payButtonSubmit.addEventListener('click', (event => {
        event.preventDefault();
        let payForm = payButtonSubmit.parentElement,
            email = payForm.querySelector('input[name="email"]').value,
            productsId = payForm.querySelector('input[name="productsId"]').value,
            token = payForm.querySelector('input[name="_token"]').value;

        createOrder(email, productsId, token, response => {
            let data = JSON.parse(response),
                inputLabel = payForm.querySelector('input[name="label"]'),
                labelJson = {'orderId': data.id};
            inputLabel.value = JSON.stringify(labelJson);
            payForm.querySelector('input[name="targets"]').value = 'Заказ ' + data.id + '';
            payForm.querySelector('input[name="sum"]').value = data.cost;
            payForm.querySelector('input[name="successURL"]').value = '/success-payment?secret=XAEA12';

            payForm.submit();
        });
    }));

    //Добавление айди продуктов в модальной окно с формой оплаты
    let payModalForm = document.querySelector('.js-PayModalForm'),
        payButtons = document.querySelectorAll('.js-ModalPayButton');
    for (let i = 0; i < payButtons.length; i++) {
        let payButton = payButtons[i];
        payButton.addEventListener('click', evt => {
            let currentProductsId = JSON.parse(payButton.getAttribute('data-productsId'));

            payModalForm.querySelector('input[name="productsId"]')
                .value = JSON.stringify(currentProductsId);
        });
    }



}, false);
