function item(id) {
    if (id == 2) {
        document.getElementById('menu2').style.display = "flex";
        document.getElementById('menu1').style.display = 'none';
        document.getElementById("item1").className = "none";
        document.getElementById("item2").className = "active";
    }
    if (id == 1) {
        document.getElementById('menu1').style.display = "flex";
        document.getElementById('menu2').style.display = 'none';
        document.getElementById("item2").className = "none";
        document.getElementById("item1").className = "active";

    }

}

function scrollPage(id) {
    var item = document.getElementById("scrollID" + id);
    window.scrollTo(item.offsetLeft, item.offsetTop - 100);
}

function rate(x) {

    if (x == 1) {
        document.getElementById("star-" + x).classList.add("checked");
        document.getElementById("star-2").classList.remove("checked");
        document.getElementById("star-3").classList.remove("checked");
        document.getElementById("star-4").classList.remove("checked");
        document.getElementById("star-5").classList.remove("checked");
    }
    if (x == 2) {
        document.getElementById("star-1").classList.add("checked");
        document.getElementById("star-" + x).classList.add("checked");
        document.getElementById("star-3").classList.remove("checked");
        document.getElementById("star-4").classList.remove("checked");
        document.getElementById("star-5").classList.remove("checked");
    }
    if (x == 3) {
        document.getElementById("star-1").classList.add("checked");
        document.getElementById("star-2").classList.add("checked");
        document.getElementById("star-" + x).classList.add("checked");
        document.getElementById("star-4").classList.remove("checked");
        document.getElementById("star-5").classList.remove("checked");
    }
    if (x == 4) {
        document.getElementById("star-1").classList.add("checked");
        document.getElementById("star-2").classList.add("checked");
        document.getElementById("star-3").classList.add("checked");
        document.getElementById("star-" + x).classList.add("checked");
        document.getElementById("star-5").classList.remove("checked");
    }
    if (x == 5) {
        document.getElementById("star-1").classList.add("checked");
        document.getElementById("star-2").classList.add("checked");
        document.getElementById("star-3").classList.add("checked");
        document.getElementById("star-4").classList.add("checked");
        document.getElementById("star-" + x).classList.add("checked");
    }


}