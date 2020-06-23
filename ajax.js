$(document).ready(function () {
    $("#btn-add-city").click(function (e) {
        e.preventDefault();

        var data = $("#form-city").serialize();

        $.ajax({
            dataType: "json",
            data: data,
            type: "post",
            url: "backend/save.php",
            success: function (data) {
                alert("Cidade adicionada com sucesso!");
                updateSelects(data);
            },
        }).done(function (result) {
            console.log(result);
        });
    });

    $("#btn-calculate-route").click(function (e) {
        e.preventDefault();

        var data = $("#form-city").serialize();

        $.ajax({
            dataType: "json",
            data: data,
            type: "post",
            url: "backend/save.php",
            success: function (data) {
                if (Boolean(data)) {
                    alert("Cidade adicionada com sucesso!");
                }
            },
        }).done(function (result) {
            console.log(result);
        });
    });
});

var updateSelects = function (cities) {
    console.log(cities);
    $(".select-city").each(function (i, $select) {
        console.log($select);
        cities.forEach(function (city) {
            var option = new Option(city.name, city.id);
            $select.append(option);
        });
    });
};
