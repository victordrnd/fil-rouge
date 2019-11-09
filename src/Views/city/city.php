<?php
include_once(dirname(__DIR__) . '/header.php');
$disabled = Models\Facades\Auth::has(Models\Permission::CANUPDATE) ? "" : "disabled";
?>

<div class="my-5">
    <div class="row">
        <div class="offset-2 col">
            <a href="/public_html/country/show/<?= $country->Country_Id ?>"><i class="fa fa-chevron-left"></i> Afficher le pays</a>
            <?php
            if (Models\Facades\Auth::has(Models\Permission::CANDELETE)) :
                ?>
                <a href="/public_html/city/delete/<?= $city->getCityId() ?>" class="btn btn-danger  float-right">Supprimer <i class="fa fa-trash"></i></a>
            <?php
            endif;
            ?>
            <div class="card border-0 shadow p-2 my-4">
                <div class="row mt-5 mx-5">
                    <div class="col-12">
                        <h1 class="text-center"><?= $city->getName() ?> - <?= $city->getCountryCode() ?></h1>
                    </div>
                    <div class="col">
                        <h3>Informations générales:</h3>
                        <form method="post" action="/public_html/city/update/<?= $city->getCityId() ?>">
                            <div class="row p-3">
                                <div class="col-6 mt-3">
                                    <label>Identifiant</label>
                                    <input type="text" class="form-control disabled" value="<?= $city->getCityId() ?>" disabled>
                                </div>

                                <div class="col-6 mt-3">
                                    <label>Nom</label>
                                    <input type="text" name="name" class="form-control disabled" value="<?= $city->getName() ?>" onkeyup="this.value = this.value.toUpperCase();" <?= $disabled ?>>
                                </div>

                                <div class="col-6 mt-3">
                                    <label>Région</label>
                                    <input type="text" name="district" class="form-control" value="<?= $city->getDistrict() ?>" <?= $disabled ?>>
                                </div>

                                <div class="col-6 mt-3">
                                    <label>Population</label>
                                    <input type="number" name="population" class="form-control" value="<?= $city->getPopulation() ?>" <?= $disabled ?>>
                                </div>

                                <div class="col-6 mt-3">
                                    <label>Code Pays</label>
                                    <input type="text" name="countryCode" class="form-control" value="<?= $city->getCountryCode() ?>" maxlength="3" <?= $disabled ?>>
                                </div>
                            </div>
                            <?php
                            if (Models\Facades\Auth::has(Models\Permission::CANUPDATE)) :
                                ?>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary mt-4 float-right">Enregistrer <i class="fa fa-save"></i></button>
                                    </div>
                                </div>
                            <?php
                            endif;
                            ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pt-2">
            <div class="card border-0 shadow my-5 p-3">
                <h2 class="text-center font-weight-bold"><?= $country->Name ?></h2>
                <img src="<?= $country->Image1 ?>" class="w-75 d-block mx-auto">
                <ul class="list-group mt-4 list-group-flush">
                    <li class="list-group-item"><span class="font-weight-bold">Region :</span> <?= $country->Region ?></li>
                    <li class="list-group-item"><span class="font-weight-bold">Chef d'état :</span> <?= $country->HeadOfState ?></li>
                    <li class="list-group-item"><span class="font-weight-bold">Continent :</span> <?= $country->Continent ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>