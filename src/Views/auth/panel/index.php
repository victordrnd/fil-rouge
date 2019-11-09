<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/src/Views/header.php');
?>
<div class="container mt-5">
  <h2 class="text-center">Administration des utilisateurs</h2>
  <div class="mt-3">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Nom d'utilisateur</th>
          <th scope="col">Roles <small class="text-muted">(CTRL + click)</small></th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($users as $user) :
          ?>
          <tr>
            <form action="/public_html/admin/user/update/<?= $user->getUserId() ?>" method="post">
              <th scope="row"><?= $user->getUserId() ?></th>
              <td><?= $user->getNom() ?></td>
              <td><?= $user->getLogin() ?></td>
              <td><select multiple class="form-control" name="roles[]">
                  <?php
                    foreach ($roles as $role) :
                      if (in_array($role, $user->roles())) :
                        ?>
                      <option value="<?=$role->getRoleId()?>" selected><?= $role->getLibelle() ?></option>
                    <?php
                        else :
                          ?>
                      <option value="<?=$role->getRoleId()?>"><?= $role->getLibelle() ?></option>
                  <?php
                      endif;
                    endforeach;
                    ?>
                </select></td>
              <td>
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <button class="btn text-primary"><i class="fa fa-save"></i></button>
                  </li>
                </ul>
              </td>
            </form>
          </tr>
        <?php
        endforeach;
        ?>
      </tbody>
    </table>
  </div>
</div>