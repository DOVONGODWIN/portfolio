<?php
$pageTitle = 'Accueil';
include __DIR__ . '/includes/header.php';
?>
<div class="container">
        
        <div class="media">
            <a href="catalogue.php"><img src="assets/images/offres/voiture-nissan-gtr.jpg" alt="Location de véhicules de luxe" class="image">
            <div class="videot"><video src="assets/videos/bateau.mp4" class="video" muted loop autoplay></video></div></a>
            <div class="vc"><p>LOCATION</p></div>
        </div>
     <div class="fe">
        <div class="media1">
           <a href="catalogue.php"> <img src="assets/images/offres/villa-moderne.jpg" alt="Immobilier de prestige" class="image">
           <div class="videt"> <video src="assets/videos/immobilier.mp4" class="video" muted loop autoplay></video></div> 
           <div class="vcc"><p> IMMOBILIER</p></div></a>
        </div>
        <div class="media1">
            <a href="catalogue.php"><img src="assets/images/offres/jetski.jpg" alt="Activités nautiques" class="image">
            <div class="videt"><video src="assets/videos/jetski.mp4" class="video" muted loop autoplay></video></div>
            <div class="vcc"><p>ACTIVITES</p></div></a>
        </div>
     </div>
    </div>
    <div class="ll">
        <p class="yy">LAISSEZ-NOUS VOUS GUIDER</p>
    <div class="rp">
       <input class="pi" type="text" id="query"name="query" placeholder="   Un hôtel,un circuit,une destination..." >
       <button class="ui">
        <a class="re" href="catalogue.php">Toutes nos offres</a>
       </button>
       
    </div>
    <div class="containe">
        <div class="bloc">
            <img src="assets/images/icones/exception.jpg" alt="">
            <h2>EXCEPTION</h2>
            <br>
            <p>La confidentialité est notre priorité, Le Cercle garantit une prise en charge discrète et sécurisée, avec une équipe
                dédiée, formée pour anticiper vos besoins tout en respectant votre vie privée.</p>
        </div>
        <div class="bloc">
            <img src="assets/images/icones/boussole.jpg" alt="">
            <h2>EXPERTISE</h2>
            <br>
            <p>Notre équipe d'experts hautement qualifiés est à votre écoute 24h/24 pour orchestrer chaque détail de vos projets.
                Grâce à un réseau mondial, Le Cercle
                réalise vos demandes les plus complexes, où que vous soyez.</p>
        </div>
        <div class="bloc">
            <img src="assets/images/icones/exception.jpg" alt="">
            <h2>PRIVILEGE</h2>
            <br>
            <p>En tant que membre de "Le Cercle", vous bénéficiez d'un accès prioritaire aux services les plus exclusifs. Profitez des meilleures adresses, d'événements privés et de collaborations de prestige réservées à une clientèle d'élite.</p>
        </div>
        <div class="bloc">
            <img src="assets/images/icones/cadenas.png" alt="">
            <h2>DISCRETION</h2>
            <br>
            <p>La confidentialité est notre priorité. Le
                Cercle garantit une prise en charge discrète et sécurisée, avec une équipe
                dédiée, formée pour anticiper vos besoins tout en respectant votre vie privée.</p>
        </div>
        <div class="fd"><img src="assets/images/confiance-the-circle.png" alt=""></div>     
 <div class="tte">
    <div class="ml"><img src="assets/images/temoignages/temoignage-cote-azur.png" alt=""></div>
    <div class="ml" id="ff"><img src="assets/images/temoignages/temoignage-yacht.png" alt=""></div>
 </div>

<?php include __DIR__ . '/includes/footer.php'; ?>
