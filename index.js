const fillImages = (recievedData) => {
    let data = JSON.parse(recievedData);

    data.forEach(function(image) {
        $("#imagesWrapper").append(
            $("<a></a>").attr("href", "#").append(
                $("<img/>").attr("src", image.url)
                                                .on("click", (event) => {
                                                    $(".expanded-image img.source").attr("src", $(event.target).attr("src"));
                                                    $(".expanded-image .card-body #name").text("Name: " + image.name);
                                                    $(".expanded-image .card-body #author").text("Author: " + image.author);
                                                    $(".expanded-image").slideDown();
                                                })
            )
        );
    });
}

window.onload = () => {
    $.ajax({
        url: "http://localhost/foto-cartella/scripts/load_images.php",
        data: { 
            data: (window.location.href.includes("account")) ? JSON.parse(localStorage.getItem("user")).id : -1 
        },
        contentType: "application/x-www-form-urlencoded",
        type: "POST",
        success: (response) => {
            fillImages(response);
        },
        async: false
    });
};

const find = (event) => {
    event.preventDefault();
    $.ajax({
        url: "http://localhost/foto-cartella/scripts/load_images.php",
        data: {
            data: $("#search-input").val()
        },
        contentType: "application/x-www-form-urlencoded",
        type: "POST",
        success: (response) => {
            $("#imagesWrapper").empty();
            fillImages(response);  
            $("#imagesWrapper").justifiedGallery({
                rowHeight : 200,
                lastRow : 'nojustify',
                margins : 3
            });
        }
    });
}

$(document).ready(() => {
    $("#search-string").on("submit", find);
    $("#imagesWrapper").justifiedGallery({
        rowHeight : 200,
        lastRow : 'nojustify',
        margins : 3
    });
    $('.expanded-image').hide();
    $("#close-image-button").on("click", () => {
        $('.expanded-image').slideUp();
    });
});