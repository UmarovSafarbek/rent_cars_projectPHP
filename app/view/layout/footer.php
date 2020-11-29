<section class="footer">

    <div class="cont">
        <div class="navig">
            <p>Навигация</p>
            <ul>
                <li><a href="<?php echo APP; ?>">Автопарк</a></li>
                <li><a href="<?php echo APP . "contact"; ?>">Конатакты</a></li>
                <li><a href="<?php echo APP . "about"; ?>">О нас</a></li>
            </ul>
        </div>

        <div class="form">
            <p>Напишите нас</p>
            <span style="color: rgb(255, 111, 0.2); font-weight:800; font-size: 22px" id="mesCont"></span>
            <form action="">
                <input name='nameContact' type="text" placeholder="Ваш  имя и фамиля">
                <input name="phoneContact" type="number" placeholder="Ваш  номер">
                <textarea name="messageContact" placeholder="Ваш  вапрос" name="" id="" cols="34" rows="4"></textarea>
                <input type="button" id="buttonCont" value="Отправить сообщение" class="otprav">
            </form>
        </div>
    </div>'
    <div style="max-width: 1009px; margin:auto">
    <p style="color: rgb(223, 221, 221); ">© 2019 Аренда автомобилей в Таджикистан. Авто под выкуп!</p>
    </div>
</section>

    <script  src="<?php echo PUBFOL . "js/script.js"; ?>"></script>
    <script  src="<?php echo PUBFOL . "js/footer.js"; ?>"></script>
    <?php if(isset($this->data['js'])) : ?>
    <script type="module" src="<?php echo PUBFOL . "js/{$this->data['js']}.js"; ?>"></script>
    <?php endif; ?>
</body>
</html>