<?php
include_once ('header.php');
?>
<div class="container my-5">
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
          foreach($countries as $index => $country):
          ?>
        <tr>
          <th scope="row"><?=$country->Country_Id?></th>
          <td><a href="/public_html/country/show/<?=$country->Country_Id?>"><?=$country->Name?></a></td>
          <td><?=$capital[$index]->getName()?></td>
          <td><?=$country->Population?></td>
        </tr>
        <?php 
        endforeach
        ?>
      </tbody>
    </table>
</div>
    