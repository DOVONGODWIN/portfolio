<?php

use PHPUnit\Framework\TestCase;

/**
 * Panier stocké en session (identifiants et quantités uniquement, jamais les prix)
 */
final class PanierTest extends TestCase
{
    protected function setUp(): void
    {
        emptyCart();
    }

    public function testAjouteUnProduit(): void
    {
        addToCart(3);
        addToCart(3, 2);
        $this->assertSame([3 => 3], getCartContents());
    }

    public function testLimiteLaQuantiteMaximale(): void
    {
        addToCart(1, 1000);
        $this->assertSame(MAX_CART_QUANTITY, getCartContents()[1]);
    }

    public function testUneQuantiteNulleRetireLeProduit(): void
    {
        addToCart(5, 2);
        updateCartQuantity(5, 0);
        $this->assertSame([], getCartContents());
    }

    public function testIgnoreLaMiseAJourDunProduitAbsent(): void
    {
        updateCartQuantity(42, 3);
        $this->assertSame([], getCartContents());
    }

    public function testRetireUnProduit(): void
    {
        addToCart(1);
        addToCart(2);
        removeFromCart(1);
        $this->assertSame([2 => 1], getCartContents());
    }
}
