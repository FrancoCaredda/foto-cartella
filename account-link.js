$(document).ready(() => {
    if (localStorage.getItem("user") == null)
        $("#account-link").addClass("blocked-link");
    else
        $("#account-link").removeClass("blocked-link");

    $(".blocked-link").on("click", (e) => {
        e.preventDefault();
    });
});