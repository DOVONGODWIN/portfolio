<?php
if (!defined('APP_ROUTER')) { header('Location: index.php?page=panier'); exit; }

require_once 'includes/cart_functions.php';
require_once 'includes/functions.php';

$cart_items = get_cart_items(getCartContents());
$total = calculate_cart_total($cart_items);
$paypal = app_config()['paypal'];
?>

<section class="panier">
    <div class="panier-container">
        <h2>Votre Panier</h2>
        <?php if (empty($cart_items)): ?>
            <div class="empty-cart">
                <i class="fas fa-shopping-cart"></i>
                <p>Votre panier est vide.</p>
            </div>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_items as $item): ?>
                    <tr>
                        <td data-label="Produit" class="product-name"><?php echo e($item['name']); ?></td>
                        <td data-label="Prix"><?php echo format_price($item['price']); ?></td>
                        <td data-label="Quantité">
                            <input type="number" value="<?php echo $item['quantity']; ?>" min="1" max="<?php echo MAX_CART_QUANTITY; ?>" data-id="<?php echo $item['id']; ?>" class="quantity-input">
                        </td>
                        <td data-label="Total"><?php echo format_price($item['price'] * $item['quantity']); ?></td>
                        <td data-label="Action">
                            <button class="remove-item" data-id="<?php echo $item['id']; ?>">Supprimer</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="total">
                Total : <span id="cart-total"><?php echo format_price($total); ?></span>
            </div>
            <button id="checkout-btn" class="btn-primary">Passer la commande</button>
            <div id="paypal-button-container" style="display: none;"></div>
        <?php endif; ?>
    </div>
</section>

<?php if (!empty($cart_items)): ?>
<script src="https://www.paypal.com/sdk/js?client-id=<?php echo urlencode($paypal['client_id']); ?>&amp;currency=<?php echo urlencode($paypal['currency']); ?>"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkoutBtn = document.getElementById('checkout-btn');
    const paypalContainer = document.getElementById('paypal-button-container');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    checkoutBtn.addEventListener('click', function() {
        // Vérifier si l'utilisateur a une adresse et un numéro de téléphone
        fetch('check_user_info.php')
            .then(response => response.json())
            .then(data => {
                if (data.hasInfo) {
                    checkoutBtn.style.display = 'none';
                    paypalContainer.style.display = 'block';
                } else {
                    window.location.href = 'index.php?page=profile&message=complete_info';
                }
            });
    });

    // Le montant est calculé côté serveur à partir du panier en session : rien n'est envoyé depuis la page
    paypal.Buttons({
        createOrder: function() {
            return fetch('create_paypal_order.php', {
                method: 'POST',
                headers: { 'X-CSRF-Token': csrfToken }
            }).then(function(res) {
                return res.json();
            }).then(function(orderData) {
                if (!orderData.id) {
                    throw new Error(orderData.message || 'Impossible de créer la commande');
                }
                return orderData.id;
            });
        },
        onApprove: function(data) {
            return fetch('capture_paypal_order.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': csrfToken
                },
                body: JSON.stringify({ orderID: data.orderID })
            }).then(function(res) {
                return res.json();
            }).then(function(orderData) {
                if (orderData.success) {
                    window.location.href = orderData.redirect;
                } else {
                    alert(orderData.message || 'Une erreur est survenue lors du traitement de votre commande.');
                }
            });
        },
        onError: function(err) {
            console.error(err);
            alert('Le paiement n\'a pas pu aboutir. Veuillez réessayer.');
        }
    }).render('#paypal-button-container');
});
</script>
<?php endif; ?>
