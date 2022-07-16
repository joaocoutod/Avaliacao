
var modal = document.getElementsByClassName("modal");

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}