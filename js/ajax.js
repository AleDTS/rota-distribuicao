$(document).ready(function () {
    $("#btn-add-city").click(function (e) {
        e.preventDefault();

        var data = $("#form-city").serialize();

        $.ajax({
            dataType: "json",
            data: data,
            type: "post",
            url: "backend/save.php",
            suucess: function (data) {
                console.log(data);
                alert("Cidade adicionada com sucesso!");
            },
        }).done(function (result) {
            console.log(result);
        });
    });
});
