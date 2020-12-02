<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/33318d06aa.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo APP . PUBFOL; ?>css/styles.css?var=<?php echo rand(1, 1000) ?>">
    <?php
    if (isset($this->data['css'])) { ?>
    <link rel="stylesheet" href="<?php echo APP . PUBFOL; ?>css/<?php echo $this->data['css']; ?>.css?var=<?php echo rand(1, 1000) ?>">
    <?php   } ?>

    <title><?php echo $this->data['title']; ?></title>
</head>

<body>

    <header>

        <nav>
            <div class="logSite"><a href="<?php echo APP; ?>"><span>AUTO</span>ARENDA</a></div>

            <ul>
                <li><a href="<?php echo APP; ?> " target="_blank">Автопарк</a></li>
                <li><a href="<?php echo APP . "admin/manager"; ?>">ADMINPANEL</a></li>
                <li><a href="<?php echo APP . "admin/addcar"; ?>">ADD CAR</a></li>
                <li><a href="<?php echo APP . "admin/singout"; ?>"  >SING OUT</a></li>
            </ul>

        </nav>

    </header>