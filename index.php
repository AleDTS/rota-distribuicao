<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="ajax.js"></script>
    <title>Distribuição</title>
</head>

</header>

<body>

    <div>
        <h1>Cadastro de Cidade</h1>

        <form id="form-city" action="javascript:void(0);" method="post">
            <h3>Preencha as informações</h3>
            <div>
                <label for="name">Nome:</label>
                <input type="text" name="name" maxlength="1">

                <label for="latitude">Latitude:</label>
                <input type="number" step="any" min="-90" max="90" name="latitude">

                <label for="longitude">Longitude:</label>
                <input type="number" step="any" min="-180" max="180" name="longitude">
            </div>
            <button type="submit" id="btn-add-city">Enviar</button>
        </form>
    </div>

    <div>
        <h1>Melhor Rota</h1>
        <h3>Selecione as cidades de partida (A) e destino (B)</h3>

        <form id="form-route" action="javascript:void(0);" method="get">
            <label for="cityA">Cidade A</label>
            <select class="select-city" name="cityA" required="true">Cidade A</select>
            <label for="cityB">Cidade B</label>
            <select class="select-city" name="cityB" required="true">Cidade B</select>
            <button type="submit" id="btn-calculate-route">Calcular Rota</button>
        </form>
        <p><span id="route-response"></span></p>
    </div>

</body>

</html>