<?php
// Accès à l'API REST PayPal : les identifiants sont lus dans includes/config.php (jamais dans le code)
require_once __DIR__ . '/db.php';

if (basename($_SERVER['SCRIPT_FILENAME']) === basename(__FILE__)) {
    http_response_code(404);
    exit;
}

//get token
function getPayPalAccessToken() {
    $paypal = app_config()['paypal'];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $paypal['api_base'] . "/v1/oauth2/token");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
    curl_setopt($ch, CURLOPT_USERPWD, $paypal['client_id'] . ":" . $paypal['secret']);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Accept: application/json",
        "Content-Type: application/x-www-form-urlencoded",
    ]);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        throw new Exception('Error:' . curl_error($ch));
    }
    curl_close($ch);

    $result = json_decode($result, true);

    if (isset($result['access_token'])) {
        return $result['access_token'];
    } else {
        throw new Exception('Failed to get access token');
    }
}

/**
 * Appel authentifié à l'API PayPal
 *
 * @param string $path Chemin de l'API (ex. /v2/checkout/orders)
 * @param array|null $payload Corps JSON de la requête
 * @return array Réponse décodée
 */
function paypal_post($path, $payload = null) {
    $paypal = app_config()['paypal'];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $paypal['api_base'] . $path);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload === null ? '{}' : json_encode($payload));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Bearer " . getPayPalAccessToken(),
    ]);

    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    if ($err) {
        throw new Exception('Error: ' . $err);
    }

    return json_decode($response, true) ?: [];
}
