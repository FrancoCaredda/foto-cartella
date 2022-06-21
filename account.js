const publish = (e) => {
    e.preventDefault();

    const userData = JSON.parse(localStorage.getItem("user"));

    let imageData = {
        name: document.forms["publish-form"]["name"].value,
        author: userData.name,
        authorId: userData.id,
        url: document.forms["publish-form"]["url"].value,
        hashtag: document.forms["publish-form"]["hashtag"].value,
        role: userData.role
    }

    $.ajax({
        url: "http://localhost/foto-cartella/scripts/post_photo.php",
        data: imageData,
        contentType: "application/x-www-form-urlencoded",
        type: "POST",
        success: (response) => {
            console.log(response);
        },
        async: false
    });

    window.location.reload();
}

const deleteUser = (e) => {
    let row = $(e.target).parent().parent();
    let id = row.find(">:first-child").text();

    $.ajax({
        url: "http://localhost/foto-cartella/scripts/delete_user.php",
        data: {role: JSON.parse(localStorage.getItem("user")).role,
                id: id},
        contentType: "application/x-www-form-urlencoded",
        type: "POST",
        success: (response) => {
            window.location.reload();
        },
        async: false
    });
}

$(document).ready(() => {
    let data = localStorage.getItem("user");

    let role = JSON.parse(data).role;
    if (role == "3") {
        $("table#users").show();

        $.ajax({
            url: "http://localhost/foto-cartella/scripts/load_users.php",
            data: {role: role},
            contentType: "application/x-www-form-urlencoded",
            type: "POST",
            success: (response) => {
                if (response != "Error") {
                    users = JSON.parse(response);

                    users.forEach(function(user) {
                        if (user.role != 3) {
                            let table = $("table#users tbody");
                            let row = $("<tr></tr>");
                            row.append($("<td></td>").text(user.id));
                            row.append($("<td></td>").text(user.name));
                            row.append($("<td></td>").text(user.email));
                            row.append($("<td></td>").text(user.password));
                            row.append($("<td></td>").text(user.birthday));
                            row.append($("<td></td>").text(user.role));
                            row.append($("<td></td>").append($("<button></button>").addClass("delete-btn btn btn-primary").on("click", deleteUser).text("X")));
                            table.append(row);
                        }
                    });
                }
            },
            async: false
        });


    } else {
        $("table#users").hide();
    }

    console.log(data);

    if (data != null) {   
        $("div#main-title h2").text(JSON.parse(data).name + "'s posts");
    } else {
        $("div.title h2").text("Nothing");
    }

    $("#publish-form").on("submit", publish);
});