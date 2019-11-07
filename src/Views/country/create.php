<?php
include_once(dirname(__DIR__) . '/header.php');
?>

<div class="container mt-5">
    <h2 class="text-center ">Enregistrement d'un nouveau pays</h2>
    <form action="/public_html/country/add" method="post">
        <div class="row">
            <div class="col-8 font-weight-bold">
                <label>Code du pays : <small class="text-muted">(max : 3 caractères)</small></label>
                <input required type="text" class="form-control" placeholder="FRA" name="code" maxlength="3">

                <label>Nom : </label>
                <input required type="text" class="form-control" name="name">

                <label>Continent :</label>
                <select class="form-control" name="continent">
                    <option value="Asia">Asia</option>
                    <option value="Europe">Europe</option>
                    <option value="North America">North America</option>
                    <option value="Africa">Africa</option>
                    <option value="Oceania">Oceania</option>
                    <option value="Antarctica">Antarctica</option>
                    <option value="South America">South America</option>
                </select>

                <label>Region :</label>
                <input required type="text" class="form-control" name="region">

                <label>Surface en m² :</label>
                <input required type="number" class="form-control" name="surface">

                <label>Date d'indépendance : </label>
                <input required type="number" class="form-control" name="dateindep" placeholder="1910">

                <label>Population :</label>
                <input required type="number" name="population" class="form-control">

                <label>Nom local :</label>
                <input required type="text" class="form-control" name="localname">

                <label>Forme de gouvernement :</label>
                <input required type="text" class="form-control" name="governmentform">

                <label>Code n°2 : <small class="text-muted">(max : 2 caractères)</small> </label>
                <input required type="text" class="form-control" maxlength="2" name="code2">

                <input type="hidden" name="flag" id="flag" value="">
                <button class="btn btn-primary mt-3 float-right">Sauvegarder</button>

            </div>
            <div class="col">
                <div class="card shadow border-0 p-2">
                    <h4 class="text-center">Upload d'image</h4>
                    <img src="" id="image" class="image-thumbnail mx-auto d-block" width="250">
                    <div class="input-group my-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept="image/*" onchange="preview(event)">
                            <label class="custom-file-label">Parcourir</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script type='text/javascript'>
    function preview(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('image');
            const flag =  document.getElementById('flag');
            output.src = reader.result;
            flag.value = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>