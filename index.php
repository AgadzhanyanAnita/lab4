<?php

session_start();
require_once __DIR__ . '/incs/data.php';
require_once __DIR__ . '/incs/functions.php';

if(!empty($_POST)){
    $fields = load($fields);
    if($errors = validate($fields)){
        // Если есть ошибки, то показываем их в ответе
        $res = ['answer' => 'error', 'errors' => $errors];
    }else{
        if (!send_data($fields, $pdo_settings)) {
            $res = ['answer' => 'error', 'errors' => 'Ошибка отправки данных'];
        } else {
            // Если нет, обновляем капчу

            $res = ['answer' => 'ok', 'captcha' => set_captcha()];
        }
    }
    exit(json_encode($res));
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <form method="post" id="form" class="needs-validation mt-5 mb-5" novalidate>

                <div class="form-group row">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните имя
                    </div>
                </div>

                <div class="form-group row">
                    <label for="number">Номер телефона</label>
                    <input type="text" class="form-control" id="number" name="number" required>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните имя
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните почту
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date">Дата рождения</label>
                    <input type="date" class="form-control" id="date" name="date"  required>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните дату рождения
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sex">Пол</label>
                    <div class="form-check">
                        <input type="radio" name="sex" id="sex" value="female" checked>
                        <label for="gridGender1">Женский</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="sex" id="gridGender2" value="male">
                        <label for="gridGender2">Мужской</label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="comment">Комментарий</label>
                    <textarea name="comment" id="comment" rows="3" class="form-control"></textarea>
                </div>

                <fieldset class="form-group row">
                <div class="row">
                    <label class="col-form-label col-sm-2 pt-0">Количество конечностей</label>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input type="radio" name="countLimbs" id="countLimbs1" value="allHuman" checked>
                            <label for="gridRadios1">Полный человеческий комплект</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="countLimbs" id="countLimbs2" value="someAlien">
                            <label for="gridRadios2">Немного инопланетянин</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="countLimbs" id="countLimbs3" value="goodForLive">
                            <label for="gridRadios3">Для жизни хватает</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="countLimbs" id="countLimbs4" value="wantManyHand" checked>
                            <label for="gridRadios4">Найти бы еще парочку рук</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="countLimbs" id="countLimbs5" value="infinity">
                            <label for="gridRadios5">Бесконечностей</label>
                        </div>
                    </div>
                </div>
                </fieldset>

                <fieldset class="form-group row">
                    <label for="Superpowers">Сверхспособности</label>
                    <select multiple class="form-control" id="superpowers" name="superpowers">
                        <option>Кодить без багов</option>
                        <option selected="selected">Читать мысли животных</option>
                        <option>Не спать(мечта студента =))</option>
                    </select>
                </fieldset>

                <div class="form-group row">
                    <label for="captcha" id="label-captcha"><?= set_captcha() ?></label>
                    <input type="text" class="form-control" id="captcha" name="captcha" required>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните капчу
                    </div>
                </div>

                <div class="form-group form-check row">
                    <input name="agree" type="checkbox" class="form-check-input" id="agree" required>
                    <label class="form-check-label" for="agree">Соглашаюсь с обработкой персональных данных</label>
                    <div class="invalid-feedback">
                        Пожалуйста, согласитесь
                    </div>
                </div>

                <button type="submit" class="btn btn-primary row">Submit</button>
                
                <div class="mt-3" id="answer"></div>

                <!--Картинка во время отправки формы, чтобы пользователь не нажал еще раз кнопку submit-->
            </form>

        </div>
    </div>

    <div class="loader">
        <img src="ripple.svg" alt="">
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="main.js"></script>

</body>
</html>