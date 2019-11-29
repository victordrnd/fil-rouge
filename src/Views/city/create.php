<?php
include_once(dirname(__DIR__) . '/header.php');
?>

<div class="container mt-5">
    <h2 class="text-center ">Enregistrement d'une nouvelle ville</h2>
    <form action="/city/add" method="post">
        <div class="row">
            <div class="col-8 mx-auto d-block font-weight-bold">
                <label>Nom : </label>
                <input required type="text" class="form-control" name="name">

                <label>Pays :</label>
                <input type="text" class="form-control" name="countrycode" maxlength="3" value="<?=$countryCode?>">

                <label>Region :</label>
                <input required type="text" class="form-control" name="district">

                <label>Population :</label>
                <input required type="number" name="population" class="form-control">

                <button class="btn btn-primary mt-3 float-right">Sauvegarder</button>

            </div>
        </div>
    </form>
</div>
