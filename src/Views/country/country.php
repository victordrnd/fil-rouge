<?php
include_once(dirname(__DIR__) . '/header.php');
$disabled = Models\Facades\Auth::has(Models\Permission::CANUPDATE) ? "" : "disabled";
?>
<div class="container my-5">
  <a href="/public_html/continent/<?= $country->Continent ?>"><i class="fa fa-chevron-left"></i> Retour à la liste des pays du continent</a>
  <?php
  if (Models\Facades\Auth::has(Models\Permission::CANDELETE)) :
    ?>
    <a href="/public_html/country/delete/<?= $country->Country_Id ?>" class="btn btn-danger text-white float-right pointer">Supprimer <i class="fa fa-trash"></i></a>
  <?php
  endif;
  ?>
  <div class="card border-0 shadow-sm my-4">
    <div class="row my-5 mx-5">
      <div class="col-12">
        <h1 class="text-center"><?= $country->Name ?> - <?= $country->Code ?></h1>
      </div>
      <div class="col-6">
        <h3>Informations complémentaires:</h3>
        <form class="list-unstyled shadow-sm py-4" method="post" action="/public_html/country/update/<?= $country->Country_Id ?>">
          <div class="px-4">
            <label class="list-item">ID :</label>
            <input type="text" class="form-control rounded-0 disabled" disabled value="<?= $country->Country_Id ?>" <?= $disabled ?>>
            <label class="list-item">Nom : </label>
            <input type="text" name="name" class="form-control rounded-0 " value="<?= $country->Name ?>" <?= $disabled ?>>
            <label class="list-item">Region : </label>
            <input type="text" name="region" class="form-control rounded-0" value="<?= $country->Region ?>" <?= $disabled ?>>
            <label class="list-item">Population : </label>
            <input type="text" name="population" class="form-control rounded-0" value="<?= $country->Population ?>" <?= $disabled ?>>
            <label class="list-item">Date d'indépendance : </label>
            <input type="text" name="indepyear" class="form-control rounded-0" value="<?= $country->IndepYear ?>" <?= $disabled ?>>
            <label class="list-item">Capital : </label>
            <select class="form-control rounded-0" name="capital" <?= $disabled ?>>
              <?php
              if ($capital) :
                ?>
                <option value="<?= $capital->getCityId() ?>"><?= $capital->getName() ?></option>
              <?php
              endif;
              ?>
              <option value="0">Non spécifié</option>
              <?php
              foreach ($cities as $city) :
                ?>

                <option value="<?= $city->getCityId() ?>"><?= $city->getName() ?></option>
              <?php
              endforeach;
              ?>
            </select>
            <label class="list-item">Continent :</label>
            <select name="continent" class="form-control rounded-0" <?= $disabled ?>>
              <option selected value="<?= $country->Continent ?>"><?= $country->Continent ?></option>
              <option value="Asia">Asia</option>
              <option value="Europe">Europe</option>
              <option value="North America">North America</option>
              <option value="Africa">Africa</option>
              <option value="Oceania">Oceania</option>
              <option value="Antarctica">Antarctica</option>
              <option value="South America">South America</option>
            </select>
          </div>
          <?php
          if (Models\Facades\Auth::has(Models\Permission::CANUPDATE)) :
            ?>
            <button class="btn btn-primary  w-100 rounded-0 mt-4 py-2">Enregistrer</button>
          <?php
          endif;
          ?>
        </form>
      </div>
      <div class="col-6">
        <img class="w-100 rounded border" src="<?= $country->Image1 ?>">
        <h3 class="text-center mt-2">Répartition des langages : </h3>
        <div class="row my-4">
          <div class="col-12 mx-auto d-block">
            <canvas id="chart" class="chartjs " width="385" height="192" style="display: block; width: 385px; height: 192px;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container my-5">
  <h2 class="text-center">Liste des villes du pays</h2>
  <?php
  if (Models\Facades\Auth::has(Models\Permission::CANCREATE)) :
    ?>
    <a href="/public_html/city/add/<?= $country->Code ?>" class="text-primary pointer float-right mb-2">Ajouter une ville <i class="fa fa-plus"></i></a>
  <?php
  endif;
  ?>
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
      foreach ($cities as $city) :
        ?>
        <tr>
          <th scope="row"><?= $city->getCityId() ?></th>
          <td><a href="/public_html/city/show/<?= $city->getCityId() ?>"><?= $city->getName() ?></a></td>
          <td><?= $city->getCountryCode() ?></td>
          <td><?= $city->getPopulation() ?></td>
        </tr>
      <?php
      endforeach
      ?>
    </tbody>
  </table>
</div>
<div class="container">

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
  const ctx = document.getElementById('chart');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: <?= json_encode($languageLabels) ?>,
      datasets: [{
        label: 'Répartition des langues',
        data: <?= json_encode($percentages) ?>,
        backgroundColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1,
        weight: 0.5
      }]
    },
    options: {
      cutoutPercentage: 70,
    }
  });
</script>