var deleteButton = document.querySelectorAll("#delete");

for(var a = 0; a<deleteButton.length; a++){
    deleteButton[a].onclick = e => {
        var con = confirm("Are you really want to delete?")
        if(!con) {
            e.preventDefault()
        }
    }
}