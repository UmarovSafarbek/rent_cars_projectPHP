
formCar.onsubmit = async (e) => {
    e.preventDefault();

    var data =  new FormData(formCar);
    let respons = await fetch("http://localhost/avtoarenda/admin/addCarData", {
        method: "POST",
        body: data
    })
    var messageError = document.getElementById("messageError");
    var fileMessage = document.getElementById("fileMessage");
    let result = await respons.json();
    if(result.error) {
        messageError.innerText = result.message;
        fileMessage.innerText = result.messageFile
       
    } else {
        messageError.innerText = result.message;
        fileMessage.innerText = result.messageFile;
        var form = formCar.elements;
        Array.from(form).forEach((el, ind) => {
            el.value = ''
        })
    }
}

