$(document).ready(function () {
    $.ajax({
        dataType: "json",
        type: "get",
        url: "backend/read.php",
        success: function (data) {
            if (Boolean(data)) {
                updateSelects(data);
            }
        },
    });

    $("#btn-add-city").click(function (e) {
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
                    updateSelects(data);
                }
            },
        });
    });

    $("#btn-calculate-route").click(function (e) {
        e.preventDefault();

        var data = $("#form-route").serialize();

        $.ajax({
            dataType: "json",
            data: data,
            type: "get",
            url: "backend/calcula.php",
            success: function (data) {
                console.log(data);
                var response = data.response;
                if (Boolean(response)) {
                    $("#route-response").text(
                        "Custo ≈ " +
                            response.cost.toFixed(3) +
                            ". Percurso: " +
                            response.route.toString()
                    );
                } else {
                    $("#route-response").text(
                        "Não foi possíevel calcular a rota."
                    );
                }
            },
        });
    });
});

var updateSelects = function (cities) {
    $(".select-city option").each(function (i, $opt) {
        $opt.remove();
    });

    $(".select-city").each(function (i, $select) {
        cities.forEach(function (city) {
            var option = new Option(city.name, city.name);
            $select.append(option);
        });
    });
};
