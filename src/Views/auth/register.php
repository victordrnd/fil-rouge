<?php
include_once(dirname(__DIR__) . '/header.php');
?>

<div class="container mt-5">
    <h2 class="text-center">Inscription</h2>
    <div class="row mt-5">
        <div class="col-md-8 col-12 mx-auto d-block">
            <?php
            if(isset($error)){
                echo "<div class='alert alert-danger' role='alert'>
                <i class='fas fa-exclamation-triangle'></i> $error
              </div>";
            }
            ?>
            <form method="post" action="/auth/register">
                <div class="card shadow p-4 border-0">

                    <label>Nom d'utilisateur :</label>
                    <input type="text" class="form-control rounded-0" name="login" placeholder="Nom d'utilisateur">

                    <label class="mt-3">Nom complet :</label>
                    <input type="text" class="form-control rounded-0" name="fullname" placeholder="Nom complet">

                    <label class="mt-3">Mot de passe : </label>
                    <input type="password" class="form-control rounded-0" name="password"placeholder="Mot de passe" >

                    <label class="mt-3">Resaisissez votre mot de passe :</label>
                    <input type="password" class="form-control rounded-0" name="password2" placeholder="Mot de passe">

                    
                </div>
                <button class="btn btn-primary w-100 rounded-0">Connexion</button>
            </form>
            <p class="text-center mt-2">Vous avez déjà un compte ? <a class="text-primary" href="/auth/register">Connectez vous</a></p>
        </div>

    </div>

</div>