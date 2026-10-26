document.addEventListener('DOMContentLoaded', function() {
    // Sélecteurs
    const menuToggle = document.querySelector('.menu-toggle');
    const navbar = document.querySelector('.navbar');
    const header = document.querySelector('header');
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content ?? '';

    // Fonctions
    function toggleMenu() {
        navbar?.classList.toggle('active');
        menuToggle?.classList.toggle('active');
    }

    function toggleStickyHeader() {
        header?.classList.toggle('sticky', window.scrollY > 0);
    }

    function smoothScroll(e) {
        const href = this.getAttribute('href');
        if (href === '#') {
            return;
        }
        const targetElement = document.querySelector(href);
        if (targetElement) {
            e.preventDefault();
            targetElement.scrollIntoView({ behavior: 'smooth' });
        }
    }

    // Requête POST vers un endpoint PHP, avec le jeton CSRF de la page
    async function postForm(url, params) {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-CSRF-Token': csrfToken
            },
            body: new URLSearchParams(params)
        });
        return response.json();
    }

    async function addToCart(productId) {
        try {
            const data = await postForm('add_to_cart.php', { product_id: productId });
            if (!data.success) {
                throw new Error(data.message || 'Erreur lors de l\'ajout au panier');
            }
            alert('Produit ajouté au panier');
            updateCartCount();
        } catch (error) {
            console.error('Erreur:', error);
            alert(error.message);
        }
    }

    async function updateCartItemQuantity(productId, quantity) {
        try {
            const data = await postForm('update_cart_quantity.php', { product_id: productId, quantity: quantity });
            if (!data.success) {
                throw new Error(data.message || 'Erreur lors de la mise à jour de la quantité');
            }
            location.reload();
        } catch (error) {
            console.error('Erreur:', error);
            alert(error.message);
        }
    }

    async function removeCartItem(productId) {
        try {
            const data = await postForm('remove_from_cart.php', { product_id: productId });
            if (!data.success) {
                throw new Error(data.message || 'Erreur lors de la suppression de l\'article');
            }
            location.reload();
        } catch (error) {
            console.error('Erreur:', error);
            alert(error.message);
        }
    }

    async function deleteProduct(button) {
        if (!confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')) {
            return;
        }
        try {
            const data = await postForm('delete_product.php', { id: button.dataset.id });
            if (!data.success) {
                throw new Error(data.message || 'Erreur lors de la suppression du produit');
            }
            button.closest('.box')?.remove();
        } catch (error) {
            console.error('Erreur:', error);
            alert(error.message);
        }
    }

    async function updateCartCount() {
        const cartCountElement = document.getElementById('cart-count');
        if (!cartCountElement) {
            return;
        }
        try {
            const response = await fetch('get_cart_count.php');
            const data = await response.json();
            cartCountElement.textContent = data.count;
        } catch (error) {
            console.error('Erreur lors de la mise à jour du compteur du panier:', error);
        }
    }

    // Event Listeners
    menuToggle?.addEventListener('click', toggleMenu);
    window.addEventListener('scroll', toggleStickyHeader);

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', smoothScroll);
    });

    document.querySelectorAll('.acheter, .add-to-cart').forEach(button => {
        button.addEventListener('click', () => addToCart(button.dataset.id));
    });

    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', () => updateCartItemQuantity(input.dataset.id, input.value));
    });

    document.querySelectorAll('.remove-item').forEach(button => {
        button.addEventListener('click', () => removeCartItem(button.dataset.id));
    });

    document.querySelectorAll('.delete-product').forEach(button => {
        button.addEventListener('click', () => deleteProduct(button));
    });
});
