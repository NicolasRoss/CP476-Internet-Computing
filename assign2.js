function hover(img) {
    document.getElementById(img).style.transform = "scale(1.2, 1.2)";
}

function unhover(img) {
    document.getElementById(img).style.transform = "scale(1, 1)";
}

function isValid() {
    var form = document.getElementById("signUpForm").elements;
    
    for (var i = 0; i < form.length; i++) {
        if (form[i].value == "" || form[i].checked == false) {
            form[i].style.borderColor = "red";
            form[i].style.bacvground = "#ffcccc";

        } else {
            form[i].style.borderColor = "";
            form[i].style.bacvground = "";
        }
    }

    return false;
}