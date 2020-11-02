<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/33318d06aa.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo PUBFOL; ?>css/header.css?var=<?php echo rand(1, 1000) ?>">
    <?php
    if (isset($this->data['css'])) { ?>
    <link rel="stylesheet" href="<?php echo PUBFOL; ?>css/<?php echo $this->data['css']; ?>.css?var=<?php echo rand(1, 1000) ?>">
    <?php   } ?>

    <title><?php echo $this->data['title']; ?></title>
</head>

<body>

    <header>

        <nav>
            <div class="logSite"><a href="<?php echo APP; ?>"><span>AUTO</span>ARENDA</a></div>

            <ul>
                <li><a href="<?php echo APP; ?>">Автопарк</a></li>
                <li><a href="<?php echo APP . "contact"; ?>">Конатакты</a></li>
                <li><a href="<?php echo APP . "about"; ?>">О нас</a></li>
                <li><a href="tel:+79994951041" target="">+7(999)4951041</a></li>
            </ul>

        </nav>

    </header>