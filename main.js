(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Выбираем все формы с классом "needs-validation"
        var forms = document.getElementsByClassName('needs-validation');
        // Перебираем их и предотвращаем отправку
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    //Отменяем действия по умолчанию, то есть отправку формы
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    $.ajax({
                        url: 'index.php',
                        type: 'POST',
                        data: $('#form').serialize(),
                        // Перед отправкой показываем loader картинку
                        beforeSend: function () {
                            $('.loader').fadeIn();
                        },
                        // В случае успеха
                        success: function (response) {
                            // Скрываем loader
                            $('.loader').fadeOut('slow', function () {
                                // Принимаем ответ сервера, он приходит JSON, поэтому распарсим его
                                // Нас интересует переменная response
                                console.log(response);
                                let res = JSON.parse(response);
                                //console.log(response);
                                // let res = response.text();
                                // Если все хорошо, то нужно очистить форму и убрать подсвеченные поля
                                if(res.answer == 'ok'){
                                    //Для этого у формы надо убрать класс was-validated
                                    $('#form').removeClass('was-validated').trigger('reset');
                                    $('#label-captcha').text(res.captcha);
                                    $('#answer').html(`<div class="alert alert-success" role="alert">
                                    Спасибо за обращение!
                                    </div>`);
                                }
                                // Если есть ошибки, то показываем их в блоке answer, который находится под кнопкой
                                else{
                                    $('#answer').html(`<div class="alert alert-danger" role="alert">
                                    ${res.errors}
                                    </div>`);
                                }
                            });
                        },
                        // В случае ошибки (например, сервер недоступен)
                        error: function () {
                            alert('Error!');
                        }
                    });
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
