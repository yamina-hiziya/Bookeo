<?php

/**
 * Loader simple pour charger le fichier .env
 * À inclure au début de ton index.php ou config.php
 */

function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new Exception("Le fichier .env est introuvable : " . $path);
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        // Ignorer les commentaires
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Parser la ligne KEY=VALUE
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);

            // Définir les variables d'environnement
            if (!array_key_exists($key, $_ENV)) {
                $_ENV[$key] = $value;
                putenv("$key=$value");
            }
        }
    }
}

// Charger le fichier .env
loadEnv(ROOT_PATH . '/.env');

// Maintenant tu peux accéder aux variables avec getenv() ou $_ENV
// Exemple : $dbHost = getenv('DB_HOST');