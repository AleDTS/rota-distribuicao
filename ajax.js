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
                console.log(data);
                if (Boolean(data)) {
                    alert("Cidade adicionada com sucesso!");
                    updateSelects(data);
                }
            },
        });
    });

    $("#btn-calculate-route").click(function (e) {
        e.preventDefault();
    });
});

var updateSelects = function (cities) {
    $(".select-city option").each(function (i, $opt) {
        $opt.remove();
    });

    $(".select-city").each(function (i, $select) {
        cities.forEach(function (city) {
            var option = new Option(city.name, city.id);
            $select.append(option);
        });
    });
};
