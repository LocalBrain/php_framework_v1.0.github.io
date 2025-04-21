<?php
// ------------------------
// 🟡 Vérification si la session utilisateur est bien chargé
// ------------------------
if (empty($_SESSION["user"])) { ?>

    <h1><?= $h1; ?></h1>

    <form method="post">

        <input type="hidden" name="csrf_token" value="<?php echo $controlMain->generateCSRFToken(); ?>">
        <!-- Compare la valeur du token -->
        <input type="hidden" name="action" value="connexion"> <!-- Défini la valeur de $action -->

        <div>
            <input type="email" name="email" id="email" placeholder="email" required autocomplete="email">
        </div>

        <div>
            <input type="password" name="password" id="password" placeholder="password" required autocomplete="password">
        </div>

        <div>
            <input type="submit" value="connexion">
        </div>


    </form>

    <!-- Gestion des messages d'erreur ou de succès -->
    <?php if (!empty($flash_message)): ?>
        <div class="flash-message"><?= $flash_message ?></div>
    <?php endif; ?>


<?php } else {
    header("Location: ?url=profil");
    exit;
}  ?>