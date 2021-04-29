<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"></head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <form>

                <div class="form-group row">
                    <label for="name"">Имя</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group row">
                    <label for="email"">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>

                <div class="form-group row">
                    <label for="date"">Дата рождения</label>
                    <input type="date" class="form-control" id="date" name="date">
                </div>

                <div class="form-group row">
                    <label for="sex">Пол</label>
                    <div class="form-check">
                        <input type="radio" name="sex" id="gridGender1" value="female" checked>
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
                                <input type="radio" name="countLimbs" id="gridRadios1" value="allHuman" checked>
                                <label for="gridRadios1">Полный человеческий комплект</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="countLimbs" id="gridRadios2" value="someAlien">
                                <label for="gridRadios2">Немного инопланетянин</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="countLimbs" id="gridRadios3" value="goodForLive">
                                <label for="gridRadios3">Для жизни хватает</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="countLimbs" id="gridRadios4" value="wantManyHand" checked>
                                <label for="gridRadios4">Найти бы еще парочку рук</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="countLimbs" id="gridRadios5" value="infinity">
                                <label for="gridRadios5">Бесконечностей</label>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-group row">
                        <label for="Superpowers">Сверхспособности</label>
                            <select multiple class="form-control" id="exampleFormControlSelect2" name="superpower">
                                <option>Кодить без багов</option>
                                <option selected="selected">Читать мысли животных</option>
                                <option>Не спать(мечта студента =))</option>
                            </select>
                </fieldset>

                <div class="form-group form-check row">
                    <input name="agree" type="checkbox" class="form-check-input" id="agree">
                    <label class="form-check-label" for="agree">Соглашаюсь с обработкой персональных данных</label>
                </div>

                <button type="submit" class="btn btn-primary row">Отправить</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>