<?php
require_once "ControlMain.php";

class ControlForm
{
    public function handlerform()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $controlMain = new ControlMain();
            $data = $controlMain->cleanInputArray($_POST);
            $action = $data['action'] ?? 'global';

            // 🔐 Anti-spam ciblé par action
            if (!$controlMain->antiSpam($action)) {
                // Optionnel : redirige ou affiche immédiatement un message d'erreur
                exit;
            }

            switch ($action) {
                case "inscription":
                    // Appel de la classe ControlUser
                    $controlUser->inscription($data);
                    break;

                case "connexion":
                    // Appel de la classe ControlUser
                    $controlUser->connexion($data);
                    break;

                default:
                    $_SESSION['message'] = "Action invalide.";
                    break;
            }
        }
    }
}
