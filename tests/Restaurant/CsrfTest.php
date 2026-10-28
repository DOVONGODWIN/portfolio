<?php

use PHPUnit\Framework\TestCase;

/**
 * Protection anti-CSRF des formulaires
 */
final class CsrfTest extends TestCase
{
    protected function setUp(): void
    {
        $_SESSION = [];
        $_POST = [];
        unset($_SERVER['HTTP_X_CSRF_TOKEN']);
    }

    public function testLeJetonEstStableDansLaSession(): void
    {
        $jeton = csrf_token();
        $this->assertSame(64, strlen($jeton));
        $this->assertSame($jeton, csrf_token());
    }

    public function testLeChampCacheContientLeJeton(): void
    {
        $this->assertStringContainsString('value="' . csrf_token() . '"', csrf_field());
    }

    public function testAccepteLeBonJeton(): void
    {
        $_POST['csrf_token'] = csrf_token();
        $this->assertTrue(csrf_is_valid());
    }

    public function testAccepteLeJetonDansLEnTete(): void
    {
        $_SERVER['HTTP_X_CSRF_TOKEN'] = csrf_token();
        $this->assertTrue(csrf_is_valid());
    }

    public function testRefuseUnJetonAbsentOuFaux(): void
    {
        csrf_token();
        $this->assertFalse(csrf_is_valid());

        $_POST['csrf_token'] = 'jeton-invente';
        $this->assertFalse(csrf_is_valid());
    }
}
