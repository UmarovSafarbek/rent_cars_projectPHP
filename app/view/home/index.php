<div id="fromOrderDiv" class="orderForm ">

   <div class="container">
   <span style='color:red; font-size: 20px' id="Message"></span>
   <form id="formSend">
        <input id='name' name='name' type="text" placeholder="Ваш  имя и фамиля">
        <input id='phone' name="phone" type="number" placeholder="Ваш  телефон*">
        <input id="messageInp" name="message" type="text" placeholder="Какого числа нужна машина?">
        <input id="sendButton" type="button" value="Отправить сообщение" class="otprav">
    </form>


    <p>Или позвоните по тел.: </p>
        <span><a  href="tel:+99299502864">+992 93 000 0000</a></span>
        <i id='close' class="far fa-times-circle"></i>
    </div>

</div>



<section class='secMain'>
    <h1>Аренда и прокат автомобилей в Таджикистанe</h1>
    <div class='icons'>

        <div>
            <p><i class="far fa-clock"></i></p>
            <p>Оформление в течение 15 минут</p>
        </div>
        <div>
            <i class="fas fa-clock"></i>
            <p>Без лимита на километраж</p>
        </div>
        <div>
            <i class="fas fa-car"></i>
            <p>Более 50 машин в автопарке</p>
        </div>

        <div>
            <i class="fas fa-file-alt"></i>
            <p>Нужен только паспорт и права</p>
        </div>

    </div>

   
</section>


<section class="park">
    <div class="div1">
        <h1>НАШ АВТОПАРК</h1><br>
        <p>В нашем автопарке более 50 машин — самые популярные модели указаны ниже.</p>
    </div>

    <div class="cont">
    <?php foreach($params as $car => $val) : ?>
        <div class="car">
            <div class="about">
                <img src="<?php echo  PUBFOL . "images/carsImage/" . $params[$car]['photo'] ?>" width="200" alt="">
                <div>
                    <h2> <?php echo $params[$car]['name'] ?> </h2>
                    <br>
                    <p><i class="far fa-calendar-alt"></i> <strong>Годы выпуска: </strong><?php echo $params[$car]['year'] ?></p>
                    <p><i class="fas fa-palette"></i> <strong>Цвета: </strong><?php echo $params[$car]['color'] ?></p>
                </div>
            </div>
            <h3> <i class="fas fa-money-check-alt"></i> Цена: <span style="color: red"><?php echo $params[$car]['price_hour'] ?> руб./день <?php echo $params[$car]['price_day'] ?></span></h3>
            <a class="order" data-id="<?php echo $params[$car]['id_car'] ?>" href="##">АРЕНДОВАТЬ ЭТО АВТО <i class="fas fa-hand-pointer"></i></a>
        </div>
    <?php endforeach; ?>
       
    </div>
</section>