<?php
// ------------------------
// 🟡 Vérification si la session utilisateur est bien chargé
// ------------------------
if (!empty($_SESSION["user"])) {
?>
    <h1><?= $h1; ?></h1>

    <form method="post">

        <input type="hidden" name="csrf_token" value="<?php echo $controlMain->generateCSRFToken(); ?>">
        <!-- Compare la valeur du token -->
        <input type="hidden" name="action" value="inscription"> <!-- Défini la valeur de $action -->

        <div>
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" placeholder="Pseudo" required autocomplete="pseudo">
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" placeholder="Email" required autocomplete="email">
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" placeholder="Mot de passe" required autocomplete="password">
        </div>
        <div>
            <input type="submit" value="ajouter client">
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