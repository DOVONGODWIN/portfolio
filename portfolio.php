<?php include 'header.php'; ?>

<style>
  .butt{
    background-color: none;
    border: 1px solid #ffffff; 
    border-radius:  3px;
    width: 10vw;
    text-decoration:none;
  
   
  }
  .paragraphe animate{
    font-size: 12px;
  }
  /* Responsive tablette */
@media screen and (max-width: 1024px) {
  .resume-grid {
    display: flex;
    flex-direction: column;
    gap: 30px;
  }

  .skill-card {
    width: 45%;
    margin: auto;
  }

  .skills-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 15px;
  }

  .butt {
    width: 40vw;
  }
}
.profil {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.resume-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 30px;
}


/* Responsive mobile */
@media screen and (max-width: 768px) {
  .profil {
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .txt.animate {
    margin-bottom: 10px;
  }

  .image.animate img {
    width: 60%;
  }

  .resume-grid {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  .card {
    padding: 15px;
    margin: 10px;
  }

  .skills-grid {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
  }

  .skill-card {
    width: 80%;
  }

  .butt {
    width: 60vw;
    font-size: 14px;
  }

  h2, h3 {
    font-size: 18px;
  }

  .paragraphe.animate {
    font-size: 14px;
  }
}

  
</style>
<div class="profil animate" class="profilanimate" >
    <div class="txt animate">
        <p class="paragraphe animate">
    Développeur Junior   <br>et créateur&nbsp;  de contenus <br>numériques
        </p>
    </div>
    <div class="image animate">
        <img src="Sans titre - 1_Plan de travail 1-02.png" alt="Logo">
    </div>
</div>









<section class="resume-section animate">
  <div class="containers animate">
    <div class="resume-grid animate">
      <!-- Experience -->
      <div class="resume-block animate">
        <h2><span>💼</span> Mes Experience</h2>
        <div class="card animate">
          <p class="date animate">Mars 2025 - Present</p>
          <h3>Stage de développeur chez Ohana entreprise </h3>
          <p>participation à un projet de marketplace, suivi de la conception de sites internet pour des clients. Projets consultables dans la section "Réalisations".</p>
         <a href="projet.php" ><button class="butt">réalisation</button></a>
        </div>
        <div class="card animate">
          <p class="date animate">2024 - 2025</p>
          <h3>Développeur Web</h3>
          <p>Conception de projets freelance (marketplace, Site Web)</p>
           <a href="projet.php" ><button class="butt">réalisation</button></a>
        </div>
        <div class="card animate">
          <p class="date animate">2024</p>
          <h3>Gestion de base de données (en milieu industriel)</h3>
          <p> structuration, maintenance et optimisation des données pour le suivi des activités de l’usine.</p>
        </div>
        <div class="card animate">
          <p class="date animate">2024 - 2025</p>
          <h3>Junior Graphics Designer</h3>
          <p>Compétences en design graphique : création de logos, illustrations originales et visuels sur mesure. Bonne maîtrise de la suite Adobe Creative Cloud (Photoshop, Illustrator, InDesign). </p>
        </div>
      </div>

      <!-- Education -->
      <div class="resume-block animate">
        <h2><span>🎓</span> Mes Education</h2>
        <div class="card animate">
          <p class="date animate">2024-2025</p>
          <h3>My Digital School</h3>
          <p>Formation Bachelor – compétences de développeur,en communication digitale, design graphique, stratégie marketing et production multimédia

</p>
        </div>
        <div class="card animate">
          <p class="date animate">2023-2024  </p>
          <h3> Université d’Angers</h3>
          <p>Parcours initial en santé
Première année de médecine puis prépa pharmacie à l’IPSEM Angers, avant de me réorienter vers le digital </p>
        </div>
        <div class="card animate">
          <p class="date animate">2022-2023</p>
          <h3>Lycée</h3>
          <p> Baccalauréat général (Spécialité MATHS-PC-SVT)</p>
        </div>
      </div>
    </div>

    <!-- Skills -->
    <div class="skills-section">
      <h2>🧠 Mes Skills</h2>
      <p>Voici quelques logiciels et technologies que je maîtrise :</p>
      <div class="skills-grid animate">
        <div class="skill-card"><img src="ef7357f8edafba5276df1698801ce94a-removebg-preview.png" alt=""><br>HTML,CSS & JS<br><span>90%</span></div>
        <div class="skill-card"><img src="b1ae239e57d0569868ec86c7a7b53c79-removebg-preview.png" alt=""><br>PHP & SQL <br><span>90%</span></div>
        <div class="skill-card"><img src="f5f89263917abf52bbce45da7ba811be-removebg-preview.png" alt=""><br>Adobe créative cloud<br><span>85%</span></div>
        <div class="skill-card"><img src="4392b765c2f8e3f8961f409f39eca1f8-removebg-preview.png" alt=""><br>WordPress<br><span>90%</span></div>
        <div class="skill-card"><img src="9730c7b997bdc91dd083ff2a61383815-removebg-preview.png" alt=""><br>Git et github<br><span>100%</span></div>
        <div class="skill-card"><img src="28d3af8d16005feace7bee0ecee2afe8-removebg-preview.png" alt=""><br>Figma<br><span>90%</span></div>
      </div>
    </div>
  </div>
</section>
<?php include 'footer.php'; ?>




  <script src="js.js"> </script>
  
</body>
</html>
