<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<div class="container col-4  " style="z-index: -0;">
<form class="form-signin">
      <h1 class="h3 mb-3 font-weight-normal m-3">Please sign in</h1>
      <span id="messageSpan" class='text-danger'></span>
      <label for="inputEmail" class="sr-only">Email address or Name</label>
      <input id="nameEmail" type="email" id="inputEmail" class="form-control m-3" placeholder="Email address"  >
      <label for="inputPassword" class="sr-only">Password</label>
      <input id="password" type="password" id="inputPassword" class="form-control m-3" placeholder="Password" >
   
      <button id="submitAdmin" class="btn btn-lg btn-primary btn-block m-3" type="button">Sign in</button>
      <p class="mt-5 mb-3 text-muted">© 2020</p>
    </form>
</div>


<script>

const URL = 'http://localhost/avtoarenda/'
let messageSpan = document.getElementById("messageSpan");



let button = document.getElementById('submitAdmin');

button.addEventListener("click", sendData)



function sendData() {
    var emailName = document.getElementById("nameEmail");
    var password = document.getElementById("password");
    if(name.value != "" && emailName.value != "") {
      var data = "nameEmail="+emailName.value+"&"+"password="+password.value;
        ajax(data, messageSpan)
    } else {
        messageSpan.innerHTML = "Пожалуйста заполняйте все поля";
    }

}




function ajax(data, message) {

    var xhr = new XMLHttpRequest();
    xhr.open("POST", URL + "admin/login");
    xhr.onload = () => {
        if(xhr.status == 200 && xhr.readyState == 4) {
            console.log(xhr.response);
             var res = JSON.parse(xhr.response);
            
             if(res.error) {
                message.innerHTML = res.message;
             } else {
                message.innerHTML = res.message;
                document.location = URL + "admin/manager";

             }
        } else {
            return false
        } 
    }
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(data)
}



</script>