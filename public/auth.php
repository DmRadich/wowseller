<?php

require_once __DIR__ . '/src/helpers.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Авторизация</title>
</head>

<body>
    <form class="card" action="src/actions/login.php" method="post">
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
        <div class="main-auth">
            <div class="container">
                <div class="auth">

                    <?php if (hasMessage('error')): ?>
                        <div class="notice error"><?php echo getMessage('error') ?></div>
                    <?php endif; ?>

                    <label for="email">
                        Имя:
                        <input type="text" name="email" id="email" value="<?php echo old('email') ?>" <?php validationError('email'); ?>>
                        <?php if (hasValidationError('email')): ?>
                            <small><?php validationErrorMessage('email'); ?></small>
                        <?php endif; ?>
                    </label>
                    <label for="password">
                        Пароль:
                        <input type="password" name="password" id="password">
                    </label>
                    <button type="submit" id="submit">
                        Войти
                    </button>
                </div>
            </div>
        </div>
    </form>

</body>

</html>