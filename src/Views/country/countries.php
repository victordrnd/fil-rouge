<?php
include_once(dirname(__DIR__) . '/header.php');
?>
<div class="container my-5">
  <h2 class="text-center"><?= $title ?></h2>
  <?php
  if (Models\Facades\Auth::has(Models\Permission::CANCREATE)) :
    ?>
    <a href="/country/add" class="text-primary float-right mb-2">Ajouter un pays <i class="fa fa-plus"></i></a>
  <?php
  endif;
  ?>
  <table class="table table-striped mt-2">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Capitale</th>
        <th scope="col">Population</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($countries as $index => $country) :
        ?>
        <tr>
          <th scope="row">
            <img src="<?= $country->Image1 ?>" class="img-thumbnail p-0" width="30"></th>
          <td><a href="/country/show/<?= $country->Country_Id ?>"><?= $country->Name ?></a></td>
          <td><?= isset($country->capital) ? $country->capital->getName() : "Non spécifié" ?></td>
          <td><?= $country->Population ?></td>
        </tr>
      <?php
      endforeach
      ?>
    </tbody>
  </table>
</div>
<script>
  function deleteCountry(id) {
    console.log('executed');
    window.location = `/country/delete/${id}`;
  }
</script>