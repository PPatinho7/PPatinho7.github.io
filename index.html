<?php
// Lecture des noms dans le fichier noms.txt
$noms = file("noms.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
if (!$noms) {
    die("Erreur : impossible de lire le fichier noms.txt");
}

// Mélanger les noms pour le secret santa
$associations = $noms;
shuffle($associations);

// Associer chaque participant à une personne différente
do {
    shuffle($associations);
} while (array_intersect_assoc($noms, $associations));

$mapping = array_combine($noms, $associations);

// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = isset($_POST['nom']) ? $_POST['nom'] : null;

    if ($nom && isset($mapping[$nom])) {
        // Gestion des confirmations
        session_start();
        if (!isset($_SESSION['confirmation_step'])) {
            $_SESSION['confirmation_step'] = 0;
        }

        if ($_SESSION['confirmation_step'] < 3) {
            $warnings = array(
                "Avertissement : êtes-vous sûr de ne pas tricher ?",
                "Attention : vous certifiez être $nom ?",
                "Dernier avertissement : tricher ruinerait la magie de Noël !"
            );
            echo "<p>" . $warnings[$_SESSION['confirmation_step']] . "</p>";
            $_SESSION['confirmation_step']++;
            echo '<form method="post">
                    <input type="hidden" name="nom" value="' . htmlspecialchars($nom) . '">
                    <button type="submit">Confirmer</button>
                  </form>';
            exit;
        } else {
            session_destroy(); // Réinitialiser les étapes pour d'autres participants
            $destinataire = $mapping[$nom];
            echo "<p>Vous devez offrir un cadeau à : <strong>$destinataire</strong>.</p>";
            echo "<p>Rappel : la valeur du cadeau ne doit pas dépasser 30 euros.</p>";
            exit;
        }
    } else {
        echo "<p>Erreur : Nom non trouvé ou invalide.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret Santa - Marine et Julien 2024</title>
</head>
<body>
    <h1>Bienvenue au Secret Santa de Marine et Julien 2024 !</h1>
    <form method="post">
        <label for="nom">Sélectionnez votre nom :</label>
        <select name="nom" id="nom" required>
            <option value="" disabled selected>-- Choisissez votre nom --</option>
            <?php foreach ($noms as $nom): ?>
                <option value="<?= htmlspecialchars($nom) ?>"><?= htmlspecialchars($nom) ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Valider</button>
    </form>
</body>
</html>
