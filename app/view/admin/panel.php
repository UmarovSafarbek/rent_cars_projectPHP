<?php 
    if(!$_SESSION['admin']['allow']){
        header("Location: ". APP . "admin");
    }

    $orders = $params['orders'];
    $cars = $params['cars'];
   
?>
<div class="container-fluid mt-4">


    <div class="row">

       

        <!-- CARS DIV -->
        <div class="col">
            <h1 class="table-dark">CARS TABLE</h1>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">P_HOUR</th>
                        <th scope="col">P_DAY</th>
                        <th scope="col">Photo</th>
                        <th scope="col">year</th>
                        <th scope="col">Color</th>
                    </tr>
                </thead>
                <tbody>
                  
                <?php foreach ($cars as $key => $val):?>
                    <tr>
                        <th scope="row"><?php echo $cars[$key]['id_car'] ?></th>
                        <td><?php echo $cars[$key]['name'] ?></td>
                        <td><?php echo $cars[$key]['price_hour'] ?></td>
                        <td><?php echo $cars[$key]['price_day'] ?></td>
                        <td><img src="<?php echo APP . PUBFOL . "images/carsImage/" . $cars[$key]['photo'] ?>" width="60"></td>
                        <td><?php echo $cars[$key]['year'] ?></td>
                        <td   ><?php  echo $cars[$key]['color'] ?></td>
                        <td><a id="delete" class='text-danger'  href="<?php echo APP . "admin/deleteCar?idCar=" . $cars[$key]["id_car"];?>">DELETE</a></td>
                    </tr>
                <?php endforeach; ?>    
                   
                </tbody>
            </table>
        </div>


        <!-- ORDERS DIV -->
        <div class="col-7">
            <h1 class="table-dark">ORDER TABLE</h1>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Full name</th>
                        <th scope="col">Phone</th>
                        <th scope="col-2">Message</th>
                        <th scope="col">Car</th>
                        <th scope="col">Date</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($orders as $key => $val) : ?>
                        <tr>
                            <th scope="row"><?php echo $orders[$key]["id_ord"];?></th>
                            <td><?php echo $orders[$key]['name']; ?></td>
                            <td><?php echo $orders[$key]['phone']; ?></td>
                            <td><?php echo $orders[$key]['message']; ?></td>
                            <td><?php echo $orders[$key]['nameCar']; ?></td>
                            <td><?php echo $orders[$key]['date']; ?></td>
                            <td><a id="delete" href="<?php echo APP . "admin/deleteOrd?idOrd=" . $orders[$key]["id_ord"];?>" class="bg-white p-2 text-danger">DELETE</a></td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>


</div>