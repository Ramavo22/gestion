<main class="vh-100 d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <!-- <div class="card-header text-center"> -->
                    <!-- </div> -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 offset-4 rounded-5 border-4 border-dark pt-3 pb-3 text-center">
                                <img src="assets/img/manager.png" class="max-height max-width color-icon" alt="">
                            </div>
                        </div>
                        
                        <?php if(!empty($_GET["error"]) && isset($_GET["error"])): ?>
                            <p class="text-bg-danger text-center"><?php echo $_GET["error"] ?></p>
                        <?php endif ?>

                        <form action="<?php echo INDEX_TO_BACK."/connect/connection.php" ?>" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nom d'utilisateur</label>
                                <input type="text" class="form-control" id="username"
                                    placeholder="Entrez votre nom d'utilisateur" name="nom">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password"
                                    placeholder="Entrez votre mot de passe" name="password">
                            </div>
                            <div class="d-grid mb-3 mt-5">
                                <button type="submit" class="btn btn-primary">Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>