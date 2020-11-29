
const URL = "http://localhost/avtoarenda/";


var buttonCont = document.querySelector("#buttonCont");
var spanMessageContact = document.querySelector("#mesCont");
buttonCont.addEventListener("click", sendDataContact);


function sendDataContact() {
    var name = document.getElementsByName("nameContact")[0];
    var phone = document.getElementsByName("phoneContact")[0];
    var message = document.getElementsByName("messageContact")[0];
    
    if(name.value != "" && phone.value != "" && message.value != "") {
      var data = "name="+name.value+"&"+"phone="+phone.value+"&message="+message.value;
        ajaxPost(data, spanMessageContact);
        message.value = ""
        name.value = ''
        phone.value =''
    }  else {
        spanMessageContact.innerHTML = "Пожалуйста заполняйте все поля";
    }

}




function ajaxPost(data, message) {

    var xhr = new XMLHttpRequest();
    xhr.open("POST", URL + "home/order");
    xhr.onload = () => {
        if(xhr.status == 200 && xhr.readyState == 4) {
             var res = JSON.parse(xhr.response);
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

