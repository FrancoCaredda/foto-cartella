const login = (event) => {
    let form = document.forms["login-form"];

    $.ajax({
        url: "http://localhost/foto-cartella/scripts/login.php",
        data: {
            email: form["email"].value,
            password: form["password"].value
        },
        contentType: "application/x-www-form-urlencoded",
        type: "POST",
        success: (response) => {
            if (response == "No") {
                alert("User doesn\'t exist");
                event.preventDefault();
            }
            localStorage.setItem("user", response);
        },
        async: false
    });
}

$(document).ready(() => {
    $("#login-form").on("submit", login);
})
