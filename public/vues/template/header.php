<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- 🧡 Informations sur la page -->
    <meta name="description"
        content="<?= isset($description) ? htmlspecialchars($description) : 'Description par défaut'; ?>">
    <meta name="keywords" content="<?= isset($keywords) ? htmlspecialchars($keywords) : 'Mots-clés par défaut'; ?>">
    <meta name="canonical"
        content="<?= isset($canonical) ? htmlspecialchars($canonical) : 'https://votresiteweb.com'; ?>">

    <!-- 💙 Informations sur l'entreprise -->
    <meta name="author" content="<?= isset($author) ? htmlspecialchars($author) : 'Nom de l\'entreprise'; ?>">
    <meta name="phone" content="Téléphone de l'entreprise">
    <meta name="email" content="Mail de l'entreprise">
    <meta name="address" content="Adresse de l'entreprise">

    <!-- 🟡 GEO ET OG -->
    <meta name="geo.country" content="FR">
    <meta name="geo.region" content="Region de l'entreprise">
    <meta name="geo.placename" content="Ville de l'entreprise">
    <meta name="geo.position" content="GPS de l'entreprise">
    <meta name="ICBM" content="GPS de l'entreprise">
    <meta property="og:description"
        content="<?= isset($description) ? htmlspecialchars($description) : 'Description par défaut'; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url"
        content="<?= isset($canonical) ? htmlspecialchars($canonical) : 'https://votresiteweb.com'; ?>">
    <meta property="og:title" content="<?= isset($title) ? htmlspecialchars($title) : 'Titre par défaut'; ?>">
    <meta property="og:image" content="Route vers le logo de l'entreprise">
    <meta property="og:locale" content="fr">

    <!-- 🟢 Le robots follow -->
    <meta name="robots" content="index, follow">

    <!-- 🔴 Le titre de la page -->
    <title><?= isset($title) ? htmlspecialchars($title) : 'Titre par défaut'; ?></title>

    <!-- 🔵 Les favicon -->
    <link rel="shortcut icon" href="Route vers le logo de l'entreprise" type="image/x-icon">
    <link rel="icon" href="Route vers le logo de l'entreprise" type="image/x-icon">

    <!-- 💚 Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-solid.css">

    <!-- 🟪 JSON-LD SEO -->
    <?php if (!empty($jsonLd) && is_array($jsonLd)): ?>
        <script type="application/ld+json">
            <?= json_encode($jsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
        </script>
    <?php endif; ?>
</head>

<body>