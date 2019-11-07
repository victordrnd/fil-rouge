<?php
include_once(dirname(__DIR__) .'/header.php');
?>
<div class="container my-5">
  <?php
    if($caller = "search"):
  ?>
  <p>Résultats de recherche pour : <?=$name?> (<?=count($cities)?> résultats)</p>
  <?php
  endif
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
          foreach($cities as $city):
          ?>
        <tr>
          <th scope="row"><?=$city->getCityId()?></th>
          <td><a href="/public_html/city/show/<?=$city->getCityId()?>"><?=$city->getName()?></a></td>
          <td><?=$city->getCountryCode()?></td>
          <td><?=$city->getPopulation()?></td>
        </tr>
        <?php 
        endforeach
        ?>
      </tbody>
    </table>
</div>
    