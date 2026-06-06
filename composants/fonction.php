<?php
function champ_requis(string $valeur): bool
{
    return !empty(trim($valeur));
}

function nettoyer_champ(string $valeur): string
{
    return htmlspecialchars(trim($valeur));
}
function generer_token_csrf(): string
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verifier_token_csrf(string $token): bool
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
function enregistrer_visite(PDO $pdo, string $page): void
{
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'inconnue';
    $stmt = $pdo->prepare("INSERT INTO visites (adresse_ip, page) VALUES (?, ?)");
    $stmt->execute([$ip, $page]);
}
