//URL SITE
const URL = "http://localhost/avtoarenda/";

// All buttons order 
const buttonOrders = document.querySelectorAll(".order");

// MAIN DIV FOR SHOWING FORM
const formOrder = document.querySelector("#fromOrderDiv");

// SEND BUTTON FORM
const sendButton = document.getElementById("sendButton");

// CLOSE icon form 
const closeButton = document.querySelector("#close");





buttonOrders.forEach((val, index) => {
        buttonOrders[index].addEventListener("click", showOrderForm);
});


// Show Form to client
closeButton.addEventListener("click", showOrderForm);

// Send data from user
sendButton.addEventListener("click", sendData);


// Function for showing form for client
function showOrderForm(e) {
    e.preventDefault();
    formOrder.classList.toggle("orderHide");
    sendButton.dataset.id =  e.target.dataset.id ?? "";
}



var messageSpan = document.getElementById("Message"); 

function sendData(e) {
    var name = document.getElementById("name");
    var phone = document.getElementById("phone");
    var message = document.getElementById("messageInp");
    var id = e.target.dataset.id;
    if(name.value != "" && phone.value != "" && message.value != "") {
      var data = "name="+name.value+"&"+"phone="+phone.value+"&message="+message.value+"&id="+id;
        ajax(data, messageSpan);
        formOrder.style.display = ''
        message.value = ""
        name.value = ''
        phone.value =''
    } else {
        messageSpan.innerHTML = "Пожалуйста заполняйте все поля";
    }

}


function ajax(data, message) {

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




// var arr = [11, 2,4, 4,55,6,3,25,12,32,41];
// var arrnew = [];
// for(var i = 0; i < arr.length; i++) {

//     for(var j = 0; j < arr.length; j++) {
//         if(arr[i] > arr[j] ){
//            let temp = arr[i]
//            arr[i] = arr[j];
//            arr[j] = temp
//         }
//     }

// }



