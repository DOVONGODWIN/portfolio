<?php

use PHPUnit\Framework\TestCase;

/**
 * Fonctions utilitaires du restaurant (affichage, prix, statuts, mots de passe)
 */
final class FonctionsTest extends TestCase
{
    public function testEchappeLeHtml(): void
    {
        $this->assertSame('&lt;script&gt;alert(&quot;x&quot;)&lt;/script&gt;', e('<script>alert("x")</script>'));
        $this->assertSame('l&#039;entrée', e("l'entrée"));
    }

    public function testFormatePrixEnEuros(): void
    {
        $this->assertSame('12,50 €', format_price(12.5));
        $this->assertSame('1 234,00 €', format_price('1234'));
    }

    public function testCalculeLeTotalDuPanier(): void
    {
        $articles = [
            ['price' => 12.50, 'quantity' => 2],
            ['price' => 3.10, 'quantity' => 3],
        ];
        $this->assertSame(34.3, calculate_cart_total($articles));
        $this->assertEquals(0, calculate_cart_total([]));
    }

    public function testTraduitLesStatutsDeCommande(): void
    {
        $this->assertSame('En attente', get_status_fr('pending'));
        $this->assertSame('Terminée', get_status_fr('completed'));
        $this->assertSame('Statut inconnu', get_status_fr('inexistant'));
    }

    public function testAccepteUnMotDePasseComplexe(): void
    {
        $this->assertTrue(is_password_complex('Restau2026!'));
    }

    public function testRefuseLesMotsDePasseFaibles(): void
    {
        $this->assertFalse(is_password_complex('Ab1!'), 'trop court');
        $this->assertFalse(is_password_complex('restau2026!'), 'sans majuscule');
        $this->assertFalse(is_password_complex('RESTAU2026!'), 'sans minuscule');
        $this->assertFalse(is_password_complex('Restaurant!'), 'sans chiffre');
        $this->assertFalse(is_password_complex('Restau2026'), 'sans caractère spécial');
    }
}
