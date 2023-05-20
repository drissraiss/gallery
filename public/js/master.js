$(".alert").click(function () {
    $(this).hide();
});
// s boc confirm
$(".form-remove-picture").on("submit", function (e) {
    e.preventDefault();
    $("#confirmation-box-picture").fadeIn();
    $("#body").addClass("body");
    $("#body").on("click", () => {
        $("#confirmation-box-picture").fadeOut(200, () =>
            $("#body").removeClass("body")
        );
    });
    $(".confirm-button").on("click", () => {
        this.submit();
    });
    $("#confirmation-box-picture .cancel-button").on("click", () => {
        $("#confirmation-box-picture").fadeOut(200, () =>
            $("#body").removeClass("body")
        );
    });
});
$("#form-remove-category").on("submit", function (e) {
    e.preventDefault();
    $("#confirmation-box-category").fadeIn();
    $("#body").addClass("body");
    $("#body").on("click", () => {
        $("#confirmation-box-category").fadeOut(200, () =>
            $("#body").removeClass("body")
        );
    });
    $(".confirm-button").on("click", () => {
        this.submit();
    });
    $("#confirmation-box-category .cancel-button").on("click", () => {
        $("#confirmation-box-category").fadeOut(200, () =>
            $("#body").removeClass("body")
        );
    });
});
$("#form-remove-account").on("submit", function (e) {
    e.preventDefault();
    $("#confirmation-box-account").fadeIn();
    $("#body").addClass("body");
    $("#body").on("click", () => {
        $("#confirmation-box-account").fadeOut(200, () =>
            $("#body").removeClass("body")
        );
    });
    $(".confirm-button").on("click", () => {
        this.submit();
    });
    $("#confirmation-box-account .cancel-button").on("click", () => {
        $("#confirmation-box-account").fadeOut(200, () =>
            $("#body").removeClass("body")
        );
    });
});
// e boc confirm
let add_category = document.querySelector("#add_category");
let text_add_category = document.querySelector("#text_add_category");
let form_add_category = document.querySelector("#form_add_category");
let input_add_category = document.querySelector("#input_add_category");
let input_text_custom = document.querySelectorAll(".input-text-custom");
add_category.onclick = () => {
    text_add_category.style.display = "none";
    form_add_category.style.display = "block";
    input_add_category.focus();
};
input_add_category.onblur = () => {
    text_add_category.style.display = "inline";
    form_add_category.style.display = "none";
};
input_text_custom.forEach((element) => {
    element.ondblclick = () => {
        element.removeAttribute("readonly");
    };
});

let picture = document.getElementById("picture");
let preview_img = document.getElementById("preview-img");
let preview_text = document.getElementById("preview-text");
picture.onchange = (e) => update_preview(e);

function update_preview(event) {
    preview_img.style.display = "block";
    preview_text.style.display = "none";
    let fileName = URL.createObjectURL(event.target.files[0]);
    preview_img.setAttribute("src", fileName);
}
