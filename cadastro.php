<?php
$title_header = "Cadastro Cidade";
include("header.php");
?>

<h1>Cadastro de Cidade</h1>

<form id="form-city" action="javascript:void(0);" method="post">
    <h2>Informações</h2>
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

<?php include("footer.php"); ?>