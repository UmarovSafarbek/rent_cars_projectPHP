const URL = 'http://localhost/avtoarenda/'
let messageSpan = document.getElementById("messageSpan");



let button = document.getElementById('submitAdmin');

button.addEventListener("click", sendData)



function sendData() {
    var emailName = document.getElementById("nameEmail");
    var password = document.getElementById("password");
    if(name.value != "" && emailName.value != "") {
      var data = "nameEmail="+emailName.value+"&"+"password="+password.value;
        ajax(data, messageSpan);
        emailName.value = ''
        password.value =''
    } else {
        messageSpan.innerHTML = "Пожалуйста заполняйте все поля";
    }

}




function ajax(data, message) {

    var xhr = new XMLHttpRequest();
    xhr.open("POST", URL + "admin/login");
    xhr.onload = () => {
        if(xhr.status == 200 && xhr.readyState == 4) {
             var res = (xhr.response);
             console.log(res);
             if(res.error) {
                message.innerHTML = "Пожалуйста заполняйте все поля";
             } else {
                message.innerHTML = res.message;
             }
        } else {
            return false
        } 
    }
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(data)
}

