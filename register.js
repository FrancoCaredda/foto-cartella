const register = (e) => {
    let form = document.forms["register-form"];

    $.ajax({
        url: "http://localhost/foto-cartella/scripts/register.php",
        data: {
            name: form["name"].value,
            email: form["email"].value,
            password: form["password"].value,
            birthday: form["date"].value.toString()
        },
        contentType: "application/x-www-form-urlencoded",
        type: "POST",
        success: (response) => {
            localStorage.setItem("user", response);
            window.location.href = "http://localhost/foto-cartella/";
        },
        async: false
    }).done(() => {
        alert("Sucess");
    }).fail(() => {
        alert("Error");
    });
}

$(document).ready(() => {
    $("#register-form").on("submit", register);
});