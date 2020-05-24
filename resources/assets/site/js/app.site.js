require('./bootstrap');

document.addEventListener('DOMContentLoaded', function(){

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
                
                    var data = xhr.responseText;
                    try {
                        //data = JSON.parse(data);
                        console.log(data)
                        alert('Заполните все необходимые поля')
                    } catch (e) {
                        console.error('Could not parse the response received from the server.');
                    }
                }
                
            }
        }
    }

    let payButton = document.getElementById('jsPayFormSubmit');
    payButton.addEventListener('click', (event => {
        event.preventDefault();
        let payForm = payButton.parentElement;
        let email = payForm.querySelector('input[name="email"]').value;
        let productsId = payForm.querySelector('input[name="productsId"]').value;
        let token = payForm.querySelector('input[name="_token"]').value;

        //Делаем заказ через ajax
        createOrder(email, productsId, token, response => {
            let data = JSON.parse(response);

            let inputLabel = payForm.querySelector('input[name="label"]');
            let labelJson = {'orderId': data.orderId};
            inputLabel.value = JSON.stringify(labelJson);

            payForm.submit();
        });
    }));



}, false);
