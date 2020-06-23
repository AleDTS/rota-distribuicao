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
                <input type="text" name="name">

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

        <div>
            <label for="city-A">Cidade A</label>
            <select id="select-city-A" class="select-city" name="city-A" required="true">Cidade A</select>
            <label for="city-B">Cidade B</label>
            <select id="select-city-B" class="select-city" name="city-B" required="true">Cidade B</select>
        </div>

        <button type="button" id="btn-calculate-route">Calcular Rota</button>
    </div>

</body>

</html>