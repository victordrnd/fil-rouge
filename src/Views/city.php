<!-- <th scope="row"><?= $city->getCityId() ?></th>
<td><?= $city->getName() ?></td>
<td><?= $city->getCountryCode() ?></td>
<td><?= $city->getPopulation() ?></td> -->

<div class="container my-5">

    <div class="card border-0 shadow-sm">
        <div class="row mt-5 mx-5">
            <div class="col-12">
                <h1 class="text-center"><?= $city->getName() ?> - <?= $city->getCountryCode() ?></h1>
            </div>
            <div class="col">
                <h3>Informations complémentaires:</h3>
                <ul class="list-unstyled">
                    <li class="list-item">ID : <?= $city->getCityId() ?></li>
                    <li class="list-item">Nom : <?= $city->getName() ?></li>
                    <li class="list-item">Région : <?= $city->getDistrict() ?></li>
                    <li class="list-item">Population : <?= $city->getPopulation() ?> habitants</li>
                </ul>
            </div>
        </div>
    </div>

</div>