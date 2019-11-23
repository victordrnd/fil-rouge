<?php
include_once ('header.php');
?>

<div class="text-center">
<a href="/public_html/country/delete/<?=$country->Country_Id?>" class="btn btn-danger btn-lg " role="button" aria-disabled="true">delete</a>
</div>

<div class="container my-5">
    <a href="../continent/<?=$country->Continent?>">Retour à la liste des pays du continent</a>
    <div class="card border-0 shadow-sm">
        <div class="row mt-5 mx-5">
            <div class="col-12">
                <h1 class="text-center"><?= $country->Name ?> - <?= $country->Code ?></h1>
            </div>
            
            <div class="col-6">
                <h3>Informations complémentaires:</h3>
                <ul class="list-unstyled">
                    <li class="list-item">ID : <?= $country->Country_Id ?></li>
                    <li class="list-item">Nom : <?= $country->Name ?></li>
                    <li class="list-item">Region : <?= $country->Region ?></li>
                    <li class="list-item">Population : <?= $country->Population?></li>
                    <li class="list-item">Date d'indépendance : <?= $country->IndepYear ?></li>
                    <li class="list-item">Capital : <?= $capital->getName() ?></li>
                    <li class="list-item">Continent : <?= $country->Continent ?></li>
                </ul>
            </div>
            <div class="col-6">
                <img src="https://loremflickr.com/g/500/240/<?=$country->Name?>">
            </div>
        </div>
    </div>
</div>


<div class="container my-5">
    <h2 class="text-center">Liste des villes du pays</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Country</th>
          <th scope="col">Population</th>
        </tr>
      </thead>
      <tbody>
          <?php
          foreach($cities as $city):
          ?>
        <tr>
          <th scope="row"><?=$city->getCityId()?></th>
          <td><a href="/public_html/city/<?=$city->getCityId()?>"><?=$city->getName()?></a></td>
          <td><?=$city->getCountryCode()?></td>
          <td><?=$city->getPopulation()?></td>
        </tr>
        <?php 
        endforeach
        ?>
      </tbody>
    </table>
</div>
    