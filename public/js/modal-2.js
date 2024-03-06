var modal1 = document.getElementById("myModal_2")
var modal =document.getElementById("myModal")
var btnn = document.getElementById("myBtnn")

btnn.onclick = function() {
    modal.style.display = "none"
    modal1.style.display = "flex"
    
    
    setTimeout(function(){
        modal1.style.display = "none";
      }, 2000);
}

