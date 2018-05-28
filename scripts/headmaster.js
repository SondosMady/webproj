function newsAndEvents() {
    removeSelected();
    document.querySelector("body > header > ul > li:nth-child(1) > a").classList.add("selected");
    getPage("news_and_events.php");
}

function getForms() {
    removeSelected();
    document.querySelector("body > header > ul > li:nth-child(2) > a").classList.add("selected");
    getPage("forms.php");
}

function getTeachers() {
    removeSelected();
    document.querySelector("body > header > ul > li:nth-child(3) > a").classList.add("selected");
    getPage("getTeachers.php");
}

function getPage(pageName) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("contents").innerHTML = this.responseText;
            // document.body.innerHTML += this.responseText;
        }
    };
    xmlhttp.open("GET", pageName, true);
    xmlhttp.send();
}

function removeSelected() {
    var selectedNav = document.getElementsByClassName("selected")[0];
    selectedNav.classList.remove("selected");
}

function approvingForm(element) {
    var pn = element.parentElement.getElementsByTagName('p')[2].innerHTML;
    var ap = element.id;

    getPage("approveForm.php?phone_number=" + pn + "&approve=" + ap);
}

function removeTeacher(element) {
    var pn = element.parentElement.getElementsByTagName('p')[0].innerHTML;
    getPage("approveForm.php?phone_number=" + pn + "&isTeacher=1");
}

