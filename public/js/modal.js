var modal = document.getElementById("myModal");
var btn1 = document.getElementById("myBtn1");
var btn2 = document.getElementById("myBtn2");
var btn3 = document.getElementById("myBtn3");
var span = document.getElementsByClassName("close")[0];

btn1.onclick = function() {
  modal.style.display = "flex";
}

btn2.onclick = function() {
    modal.style.display = "flex";
  }

btn3.onclick = function() {
    modal.style.display = "flex";
  }
span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}





