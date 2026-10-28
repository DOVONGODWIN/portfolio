-- Mise à jour d'une base resto_db existante (créée avec l'ancien resto_db.sql).
-- À exécuter une seule fois : mysql -u root -p resto_db < database/migrations/2026-10-securite.sql

ALTER TABLE `users`
  ADD COLUMN IF NOT EXISTS `phone` varchar(30) DEFAULT NULL,
  ADD COLUMN IF NOT EXISTS `address` varchar(255) DEFAULT NULL,
  ADD COLUMN IF NOT EXISTS `profile_image` varchar(255) DEFAULT NULL;

ALTER TABLE `menu_items`
  ADD COLUMN IF NOT EXISTS `original_price` decimal(10,2) DEFAULT NULL AFTER `price`,
  ADD COLUMN IF NOT EXISTS `popularity` int(11) NOT NULL DEFAULT 0;

ALTER TABLE `orders`
  ADD COLUMN IF NOT EXISTS `paypal_order_id` varchar(64) DEFAULT NULL,
  ADD UNIQUE KEY IF NOT EXISTS `paypal_order_id` (`paypal_order_id`);

CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Désactivation des comptes admin de démonstration (mot de passe en clair / hash public de "password").
-- Recréer un administrateur ensuite avec : php scripts/create_admin.php <nom> <email>
UPDATE `users` SET `password` = '!desactive'
WHERE `password` IN ('MOT_DE_PASSE_RETIRE', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
