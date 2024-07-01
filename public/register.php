<?php

require_once __DIR__ . '/src/helpers.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Регистрация</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <img src="#" alt="Логотип" class="header_logo">

            <nav class="header_nav">
                <ul class="header_list">

                    <li><a href="#">Войти</a></li>
                    <li><a href="#">Зарегестрироваться</a></li>

                </ul>
            </nav>
        </div>
    </header>


    <form class="card" action="src/actions/register.php" method="post" enctype="multipart/form-data">

        <div class="main-regist">
            <div class="container">
                <div class="register">
                    <label for="name">
                        Имя:
                        <input type="text" name="name" placeholder="Твое имя" id="name"
                            value="<?php echo old('name') ?>" <?php validationError('name'); ?>>
                        <?php if (hasValidationError('name')): ?>
                            <small><?php validationErrorMessage('name'); ?></small>
                        <?php endif; ?>
                    </label>
                    <label for="email">
                        E-mail
                        <input type="text" name="email" id="email" value="<?php echo old('email') ?>" <?php validationError('email'); ?>>
                        <?php if (hasValidationError('email')): ?>
                            <small><?php validationErrorMessage('email'); ?></small>
                        <?php endif; ?>
                    </label>

                    <label for="password">
                        Пароль:
                        <input type="password" name="password" id="password" <?php validationError('password'); ?>>
                        <?php if (hasValidationError('password')): ?>
                            <small><?php validationErrorMessage('password'); ?></small>
                        <?php endif; ?>
                    </label>

                    <label for="password_confirmation">
                        Пароль:
                        <input type="password" name="password_confirmation" id="password_confirmation">
                    </label>

                    <button type="submit" id="submit">
                        Войти
                    </button>
                </div>
            </div>
        </div>
        <?php clearValidation(); ?>
    </form>



</body>

</html>