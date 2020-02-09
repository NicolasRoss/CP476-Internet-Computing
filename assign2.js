function q1() {
    var similar = document.querySelectorAll(".section.similar");
    // console.log(similar);
    for (i = 0; i < similar.length; i++) {
        var img = similar[i].querySelector("img");
        img.addEventListener("mouseover", function(event) {
            event.target.style.transform = "scale(1.2, 1.2)";
        });

        img.addEventListener("mouseout", function(event) {
            event.target.style.transform = "scale(1, 1)";
        });
    }
}

function q2() {
    var form = document.querySelector("#signUpForm");
    var selector = "input[type=text],input[type=password],input[type=email],input[type=tel]";
    var fields = document.querySelectorAll(selector);
    // console.log(fields);
    form.addEventListener("submit", function(event) {
        for (i = 0; i < fields.length; i++) {
            if(fields[i].value == "") {
                fields[i].style.backgroundColor = "#ffcccc";
                fields[i].style.borderColor = "red";
                fields[i].style.backgroundImage = "url('images/error.png')";
                fields[i].style.backgroundRepeat = "no-repeat";
                fields[i].style.backgroundPosition = "right";

            } else {
                fields[i].style.backgroundColor = null;
                fields[i].style.borderColor = null;
                fields[i].style.backgroundImage = null;
            }
        }

        var conts = document.querySelectorAll("input[name='Continent']");
        var checked = false;

        for (i = 0; i < conts.length; i++) {
            if (conts[i].checked) {
                checked = true;
                break;
            }
        }

        var continents = document.querySelector(".continent");

        if (!checked) {
            continents.style.backgroundColor = "#ffcccc";
            continents.style.backgroundImage = "url('images/error.png')";
            continents.style.backgroundRepeat = "no-repeat";
            continents.style.backgroundPosition = "right";

        } else {
            continents.style.backgroundColor = null;
            continents.style.backgroundImage = null;
        }

        var agreement = document.querySelector(".terms")
        var check = document.querySelector(".agreement")
        if(!check.checked) {
            agreement.style.backgroundColor = "#ffcccc";
            alert("Please agree to the terms and services.");

        } else {
            agreement.style.backgroundColor = null;
        }
    });
} 