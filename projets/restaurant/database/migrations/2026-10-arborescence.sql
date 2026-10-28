-- Nouvelle arborescence : les images des plats sont dans uploads/plats/ et les photos de profil dans uploads/profils/.
-- À exécuter une seule fois sur une base existante :
--   mysql -u root -p resto_db < database/migrations/2026-10-arborescence.sql

UPDATE `menu_items` SET `image` = CASE `image`
    WHEN 'images/menu/Banane_malaxé.jpeg'                THEN 'uploads/plats/banane-malaxee.jpeg'
    WHEN 'images/menu/Chebakya.jpeg'                     THEN 'uploads/plats/chebakya.jpeg'
    WHEN 'images/menu/Conchap.jpeg'                      THEN 'uploads/plats/conchap.jpeg'
    WHEN 'images/menu/Eru.jpeg'                          THEN 'uploads/plats/eru.jpeg'
    WHEN 'images/menu/Ghryba.jpg'                        THEN 'uploads/plats/ghriba.jpg'
    WHEN 'images/menu/Okok_sucré.jpeg'                   THEN 'uploads/plats/okok-sucre.jpeg'
    WHEN 'images/menu/okok_salé.jpeg'                    THEN 'uploads/plats/okok-sale.jpeg'
    WHEN 'images/menu/Sanga.jpeg'                        THEN 'uploads/plats/sanga.jpeg'
    WHEN 'images/menu/couscous au poulet.png'            THEN 'uploads/plats/couscous-poulet.png'
    WHEN 'images/menu/image6.jpg'                        THEN 'uploads/plats/eru-water-fufu.jpg'
    WHEN 'images/menu/pastilla poisson.jpeg'             THEN 'uploads/plats/pastilla-poisson.jpeg'
    WHEN 'images/menu/pastilla poulet.jpg'               THEN 'uploads/plats/pastilla-poulet.jpg'
    WHEN 'images/menu/poisson_braisé.jpeg'               THEN 'uploads/plats/poisson-braise.jpeg'
    WHEN 'images/menu/tajine au poulet et legumes.png'   THEN 'uploads/plats/tajine-poulet-legumes.png'
    WHEN 'images/menu/backgrouncontact.jpg'              THEN 'assets/images/fonds/poulet-sauce-riz.jpg'
    WHEN 'images/menu/pile-fresh-vegetables.jpg'         THEN 'assets/images/fonds/legumes-frais.jpg'
    -- Images envoyées depuis le back-office (noms aléatoires) : seul le dossier change
    ELSE REPLACE(`image`, 'images/menu/', 'uploads/plats/')
END
WHERE `image` LIKE 'images/menu/%';

UPDATE `users`
SET `profile_image` = REPLACE(`profile_image`, 'upload/', 'uploads/profils/')
WHERE `profile_image` LIKE 'upload/%';
