-- Données de démonstration : carte du restaurant (images présentes dans uploads/plats/).
-- Import : mysql -u root -p resto_db < database/demo_data.sql

USE `resto_db`;

INSERT INTO `menu_items` (`name`, `description`, `price`, `image`, `category`) VALUES
('Eru', 'Légumes-feuilles d''eru mijotés à l''huile de palme, viande fumée et poisson séché. Spécialité camerounaise.', 14.50, 'uploads/plats/eru.jpeg', 'Plats'),
('Eru & water fufu', 'L''eru traditionnel servi avec son water fufu de manioc.', 16.00, 'uploads/plats/eru-water-fufu.jpg', 'Plats'),
('Okok salé', 'Feuilles d''okok pilées, pâte d''arachide et poisson fumé.', 13.50, 'uploads/plats/okok-sale.jpeg', 'Plats'),
('Poisson braisé', 'Poisson entier mariné aux épices et braisé au feu de bois, accompagné de bâtons de manioc.', 17.00, 'uploads/plats/poisson-braise.jpeg', 'Plats'),
('Riz au poisson', 'Riz cuisiné à la tomate, légumes fondants et poisson entier.', 15.50, 'uploads/plats/riz-au-poisson.jpeg', 'Plats'),
('Couscous au poulet', 'Semoule fine, poulet fermier et légumes du marché.', 15.00, 'uploads/plats/couscous-poulet.png', 'Plats'),
('Tajine poulet & légumes', 'Poulet mijoté au citron confit, olives et légumes de saison.', 16.50, 'uploads/plats/tajine-poulet-legumes.png', 'Plats'),
('Pastilla au poulet', 'Feuilleté sucré-salé au poulet, amandes et cannelle.', 13.00, 'uploads/plats/pastilla-poulet.jpg', 'Entrées'),
('Pastilla au poisson', 'Feuilleté aux fruits de mer, vermicelles et épices douces.', 14.00, 'uploads/plats/pastilla-poisson.jpeg', 'Entrées'),
('Sanga', 'Maïs frais, feuilles de morelle et jus de noix de palme.', 11.00, 'uploads/plats/sanga.jpeg', 'Entrées'),
('Okok sucré', 'Okok préparé au jus de noix de palme et sucre, servi avec du manioc.', 7.50, 'uploads/plats/okok-sucre.jpeg', 'Desserts'),
('Banane malaxée', 'Banane plantain écrasée et mijotée, recette familiale.', 8.00, 'uploads/plats/banane-malaxee.jpeg', 'Desserts'),
('Chebakya', 'Pâtisserie marocaine au miel et sésame.', 4.50, 'uploads/plats/chebakya.jpeg', 'Desserts'),
('Ghriba', 'Biscuits fondants aux amandes.', 4.00, 'uploads/plats/ghriba.jpg', 'Desserts');
