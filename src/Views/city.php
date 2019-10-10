<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Country</th>
      <th scope="col">Population</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?=$city->getCityId()?></th>
      <td><?=$city->getName()?></td>
      <td><?=$city->getCountryCode()?></td>
      <td><?=$city->getPopulation()?></td>
    </tr>
  </tbody>
</table>
    
