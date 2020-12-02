<?php 

if(!$_SESSION['admin']['allow']){
    header("Location: ". APP . "admin");
}


?>
<div class="container col-5 mt-3">

<div class="col">
            <form class='text-white bg-dark p-2 mb-3' id="formCar">
                <span class='text-danger' id="messageError"></span>
                <div class="form-group">
                    <label for="formGroupExampleInput">Name Car</label>
                    <input name="nameCar" type="text" class="form-control" id="formGroupExampleInput"required placeholder="Name car here">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Price Hour</label>
                    <input name="priceHour" type="number" class="form-control" id="formGroupExampleInput2"required placeholder="Price for hour">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Price day</label>
                    <input name="priceDay"  type="number" class="form-control" id="formGroupExampleInput2" required placeholder="Price for day">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2"> Year</label>
                    <input name='year' type="number" class="form-control" id="formGroupExampleInput2" required placeholder="Year of car">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Color</label>
                    <input name="color" type="text" class="form-control" id="formGroupExampleInput2" required placeholder="Color of car">
                </div>
                <div class="form-group">
                    <span class="text-danger" id="fileMessage"></span>
                    <input name="file" type="file" class="form-group" id="customFileLang" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="form-control bg-success text-white" id="submit" placeholder="Another input">Send</button>
                </div>
            </form>
        </div>
    
</div>