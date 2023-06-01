let button = document.getElementById('place-2');

for (let i = 0; i < button.length; i++) {
    button[i].addEventListener("click", function () {
        // alert(button[i].textContent)
        // let current = document.getElementById("current-place")
        // current.setAttribute("class", current.className.replace("current-place", "place"))
        // button[i].setAttribute("class", button[i].className.replace("place", "current-place"))
    });
}