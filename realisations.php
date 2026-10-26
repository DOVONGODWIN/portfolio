<?php
$pageTitle = "Réalisations - Godwin Dovon";
$pageDescription = "Projets web, applications PHP, React, sites WordPress et maquettes Figma réalisés par Godwin Dovon.";
include __DIR__ . '/includes/header.php';
?>
  <!-- Hero Section Projets -->
  <section class="projects-hero">
    <div class="projects-hero-background">
      <div class="projects-particles">
        <div class="project-particle"></div>
        <div class="project-particle"></div>
        <div class="project-particle"></div>
        <div class="project-particle"></div>
      </div>
    </div>
    <div class="projects-hero-content">
      <div class="projects-hero-text" data-aos="fade-up">
        <h1 class="projects-hero-title">
          Mes <span class="gradient-text">Réalisations</span>
        </h1>
        <p class="projects-hero-subtitle">
          Découvrez une sélection de mes projets en développement web, design et applications
        </p>
      </div>
    </div>
  </section>

  <!-- Filtres de projets -->
  <section class="projects-filters">
    <div class="container-modern">
      <div class="filters-container" data-aos="fade-up">
        <h3>Filtrer par technologie</h3>
        <div class="filter-buttons">
          <button class="filter-btn active" data-filter="all">
            <span>Tous</span>
            <div class="filter-glow"></div>
          </button>
          <button class="filter-btn" data-filter="csharp">
            <span>C# / .NET / Unity</span>
            <div class="filter-glow"></div>
          </button>
          <button class="filter-btn" data-filter="php">
            <span>PHP/SQL</span>
            <div class="filter-glow"></div>
          </button>
          <button class="filter-btn" data-filter="frontend">
            <span>Frontend</span>
            <div class="filter-glow"></div>
          </button>
          <button class="filter-btn" data-filter="wordpress">
            <span>WordPress</span>
            <div class="filter-glow"></div>
          </button>
          <button class="filter-btn" data-filter="react">
            <span>React</span>
            <div class="filter-glow"></div>
          </button>
          <button class="filter-btn" data-filter="design">
            <span>Design</span>
            <div class="filter-glow"></div>
          </button>
          <button class="filter-btn" data-filter="figma">
            <span>Figma</span>
            <div class="filter-glow"></div>
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- Grille de projets -->
  <section class="projects-showcase">
    <div class="container-modern">
      <div class="projects-grid" id="projectsGrid">

<!-- Projet PERJAM -->
        <div class="project-card" data-tech="csharp" data-aos="fade-up" data-aos-delay="600">
          <div class="project-image">
            <img loading="lazy" src="assets/images/projets/pepperjam.png" alt="Capture du jeu PepperJam">
            <div class="project-overlay">
              <div class="project-links">
                <a href="https://pepperjam.itch.io/pepperjam" class="project-link demo" target="_blank" rel="noopener noreferrer">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15,3 21,3 21,9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                  </svg>
                  <span>Démo</span>
                </a>
              </div>
            </div>
            <div class="project-tech-badge">C#/Unity</div>
          </div>
          <div class="project-content">
            <h3>Jeu PepperJam</h3>
            <p class="project-description">
              PepperJam est un jeu de plateforme 2D de type escape game développé en C# avec Unity, mettant en scène un personnage qui doit collecter des piments tout en évitant des obstacles.
            </p>
            <div class="project-features">
              <span class="feature-tag">🎮 Gameplay addictif</span>
              <span class="feature-tag">🕹️ Contrôles fluides</span>
              <span class="feature-tag">🎨 Graphismes colorés</span>
            </div>
            <div class="project-tech-stack">
              <span class="tech-item">C#</span>
              <span class="tech-item">Unity</span>
            </div>
          </div>
        </div>

      <!-- Projet Playa-Rent -->
        <div class="project-card" data-tech="csharp" data-aos="fade-up" data-aos-delay="600">
          <div class="project-image">
            <img loading="lazy" src="assets/images/projets/playa-rent.png" alt="Application de location Playa-Rent">
            <div class="project-overlay">
              <div class="project-links">
                <a href="https://jdevservices.francecentral.cloudapp.azure.com/QRCodeCustomerJourneyWebApp/home/C7723032-F1E8-48B0-81DE-E81704CEE68E" class="project-link demo" target="_blank" rel="noopener noreferrer">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15,3 21,3 21,9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                  </svg>
                  <span>Démo</span>
                </a>
              </div>
            </div>
            <div class="project-tech-badge">C# / ASP.NET / Blazor</div>
          </div>
          <div class="project-content">
            <h3>Playa-Rent</h3>
            <p class="project-description">
              Application de location de matériel de plage développée en C# avec ASP.NET et Blazor, offrant une interface utilisateur intuitive pour la réservation et la gestion des équipements.
            </p>
            <div class="project-features">
              <span class="feature-tag">🔐 Paiement sécurisé</span>
              <span class="feature-tag">📅 Gestion des locations</span>
            </div>
            <div class="project-tech-stack">
              <span class="tech-item">C#</span>
              <span class="tech-item">ASP.NET</span>
              <span class="tech-item">Blazor</span>
              <span class="tech-item">CSS</span>
              <span class="tech-item">JavaScript</span>
            </div>
          </div>
        </div>

<!-- Projet WordPress BDS -->
        <div class="project-card" data-tech="wordpress" data-aos="fade-up" data-aos-delay="600">
          <div class="project-image">
            <img loading="lazy" src="assets/images/projets/win-sport-school.png" alt="Site BDS Win Sport School">
            <div class="project-overlay">
              <div class="project-links">
                <a href="https://www.messanhgodwin-dovon.mds-angers.yt/www.win-sport--school.com/index.php/accueil/" class="project-link demo" target="_blank" rel="noopener noreferrer">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15,3 21,3 21,9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                  </svg>
                  <span>Démo</span>
                </a>
              </div>
            </div>
            <div class="project-tech-badge">WordPress</div>
          </div>
          <div class="project-content">
            <h3>Site BDS Win Sport School</h3>
            <p class="project-description">
              Site institutionnel privé avec connexion sécurisée pour le Bureau des Sports, gestion des accès restreints et communication interne.
            </p>
            <div class="project-features">
              <span class="feature-tag">🔐 Connexion sécurisée</span>
              <span class="feature-tag">📄 Pages privées</span>
              <span class="feature-tag">💬 Actualités</span>
              <span class="feature-tag">📧 Formulaires</span>
            </div>
            <div class="project-tech-stack">
              <span class="tech-item">WordPress</span>
              <span class="tech-item">Elementor</span>
              <span class="tech-item">HTML</span>
              <span class="tech-item">CSS</span>
              <span class="tech-item">PHP</span>
            </div>
          </div>
        </div>
        <!-- Projet WordPress BDS -->
        <div class="project-card" data-tech="wordpress" data-aos="fade-up" data-aos-delay="600">
          <div class="project-image">
            <img loading="lazy" src="assets/images/projets/win-sport-school.png" alt="Site BDS Win Sport School - résultats sportifs">
            <div class="project-overlay">
              <div class="project-links">
                <a href="https://www.godwin-messanhdovon.espl-angers.yt/index.php/accueil/" class="project-link demo" target="_blank" rel="noopener noreferrer">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15,3 21,3 21,9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                  </svg>
                  <span>Démo</span>
                </a>
              </div>
            </div>
            <div class="project-tech-badge">WordPress</div>
          </div>
          <div class="project-content">
            <h3>Site BDS Win Sport School - Résultats sportifs</h3>
            <p class="project-description">
              Seconde version du site du Bureau des Sports, centrée sur l'affichage des résultats par équipe, avec un back-office pour la mise à jour des contenus.
            </p>
            <div class="project-features">
              <span class="feature-tag">🏆 Affichage de score de matchs par équipe et catégorie</span>
              <span class="feature-tag">⚙️ Gestion depuis le back-office sans toucher au code</span>
              <span class="feature-tag">💬 Actualités et calendrier</span>
              <span class="feature-tag">📧 Formulaires</span>
            </div>
            <div class="project-tech-stack">
              <span class="tech-item">WordPress</span>
              <span class="tech-item">CPT UI - ACF</span>
              <span class="tech-item">Elementor</span>
              <span class="tech-item">HTML</span>
              <span class="tech-item">CSS</span>
              <span class="tech-item">PHP</span>
            </div>
          </div>
        </div>
        <!-- Projet PHP/SQL -->
        <div class="project-card" data-tech="php" data-aos="fade-up" data-aos-delay="200">
          <div class="project-image">
            <img loading="lazy" src="assets/images/projets/restaurant.png" alt="Application de gestion de restaurant">
            <div class="project-overlay">
              <div class="project-links">
                <a href="projets/restaurant/" class="project-link demo" target="_blank" rel="noopener noreferrer">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15,3 21,3 21,9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                  </svg>
                  <span>Démo</span>
                </a>
                <a href="https://github.com/DOVONGODWIN/restaurant-admin-reservation" class="project-link code" target="_blank" rel="noopener noreferrer">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-1.94-2.61c-.9-.38-1.5-.58-1.5-.58a4.5 4.5 0 0 0-1.5.58A3.37 3.37 0 0 0 9 19.13V22m0 0h6m-6 0h6"/>
                  </svg>
                  <span>Code</span>
                </a>
              </div>
            </div>
            <div class="project-tech-badge">PHP/SQL</div>
          </div>
          <div class="project-content">
            <h3>Application Restaurant</h3>
            <p class="project-description">
              Application de restaurant : menu en ligne, panier, paiement PayPal (sandbox), réservations, avis clients et tableau de bord d'administration.
            </p>
            <div class="project-features">
              <span class="feature-tag">🔐 Authentification</span>
              <span class="feature-tag">📅 Réservations</span>
              <span class="feature-tag">⭐ Avis clients</span>
              <span class="feature-tag">💳 Paiements</span>
            </div>
            <div class="project-tech-stack">
              <span class="tech-item">HTML</span>
              <span class="tech-item">CSS</span>
              <span class="tech-item">JavaScript</span>
              <span class="tech-item">PHP</span>
              <span class="tech-item">SQL</span>
            </div>
          </div>
        </div>

        <!-- Projet Frontend -->
        <div class="project-card" data-tech="frontend" data-aos="fade-up" data-aos-delay="300">
          <div class="project-image">
            <img loading="lazy" src="assets/images/projets/todo-javascript.png" alt="Application Todo List en JavaScript">
            <div class="project-overlay">
              <div class="project-links">
                <a href="projets/todo-javascript/" class="project-link demo" target="_blank" rel="noopener noreferrer">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15,3 21,3 21,9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                  </svg>
                  <span>Démo</span>
                </a>
                <a href="https://github.com/DOVONGODWIN/TODO/blob/main/projet%20fil%20rouge/maison.js" class="project-link code" target="_blank" rel="noopener noreferrer">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-1.94-2.61c-.9-.38-1.5-.58-1.5-.58a4.5 4.5 0 0 0-1.5.58A3.37 3.37 0 0 0 9 19.13V22m0 0h6m-6 0h6"/>
                  </svg>
                  <span>Code</span>
                </a>
              </div>
            </div>
            <div class="project-tech-badge">Frontend</div>
          </div>
          <div class="project-content">
            <h3>Todo List JavaScript</h3>
            <p class="project-description">
              Gestionnaire de tâches en JavaScript natif : ajout, recherche et suppression de tâches, avec une interface responsive.
            </p>
            <div class="project-features">
              <span class="feature-tag">📱 Responsive</span>
              <span class="feature-tag">✨ Animations</span>
              <span class="feature-tag">📋 Liste dynamique</span>
            </div>
            <div class="project-tech-stack">
              <span class="tech-item">HTML</span>
              <span class="tech-item">CSS</span>
              <span class="tech-item">JavaScript</span>
            </div>
          </div>
        </div>
        <!-- Projet Frontend react -->
        <div class="project-card" data-tech="react" data-aos="fade-up" data-aos-delay="300">
          <div class="project-image">
            <img loading="lazy" src="assets/images/projets/todo-react.png" alt="Todo List en React">
            <div class="project-overlay">
              <div class="project-links">
                <a href="projets/todo-react/demo/" class="project-link demo" target="_blank" rel="noopener noreferrer">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15,3 21,3 21,9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                  </svg>
                  <span>Démo</span>
                </a>
              </div>
            </div>
            <div class="project-tech-badge">React</div>
          </div>
          <div class="project-content">
            <h3>Todo List React</h3>
            <p class="project-description">
              Application de liste de tâches développée avec React et TypeScript, construite avec Vite.
            </p>
            <div class="project-features">
              <span class="feature-tag">📱 Responsive</span>
              <span class="feature-tag">✨ Animations</span>
              <span class="feature-tag">📋 Liste dynamique</span>
            </div>
            <div class="project-tech-stack">
              <span class="tech-item">React</span>
              <span class="tech-item">TypeScript</span>
              <span class="tech-item">Vite</span>
            </div>
          </div>
        </div>


        <!-- Projet Frontend/PHP -->
        <div class="project-card" data-tech="frontend" data-aos="fade-up" data-aos-delay="400">
          <div class="project-image">
            <img loading="lazy" src="assets/images/projets/site-vitrine.jpg" alt="Site Vitrine Moderne">
            <div class="project-overlay">
              <div class="project-links">
                <a href="projets/site-vitrine/" class="project-link demo" target="_blank" rel="noopener noreferrer">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15,3 21,3 21,9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                  </svg>
                  <span>Démo</span>
                </a>
                <a href="https://github.com/DOVONGODWIN/Site-vitrine-moderne-en-HTML-CSS-JS-et-php-Formulaire-de-contact-" class="project-link code" target="_blank" rel="noopener noreferrer">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-1.94-2.61c-.9-.38-1.5-.58-1.5-.58a4.5 4.5 0 0 0-1.5.58A3.37 3.37 0 0 0 9 19.13V22m0 0h6m-6 0h6"/>
                  </svg>
                  <span>Code</span>
                </a>
              </div>
            </div>
            <div class="project-tech-badge">Frontend/PHP</div>
          </div>
          <div class="project-content">
            <h3>Site Vitrine Moderne</h3>
            <p class="project-description">
              Site vitrine professionnel avec formulaire de contact fonctionnel, design moderne et expérience utilisateur optimisée.
            </p>
            <div class="project-features">
              <span class="feature-tag">🎨 Design moderne</span>
              <span class="feature-tag">📧 Formulaire contact</span>
              <span class="feature-tag">📱 Responsive</span>
            </div>
            <div class="project-tech-stack">
              <span class="tech-item">HTML</span>
              <span class="tech-item">CSS</span>
              <span class="tech-item">JavaScript</span>
              <span class="tech-item">PHP</span>
            </div>
          </div>
        </div>

        <!-- Projet WordPress -->
        <div class="project-card" data-tech="wordpress" data-aos="fade-up" data-aos-delay="500">
          <div class="project-image">
            <img loading="lazy" src="assets/images/projets/blog-wordpress.jpg" alt="Site Blog WordPress">
            <div class="project-overlay">
              <div class="project-links">
                <a href="https://www.messanhgodwin-dovon.mds-angers.yt/www.nikkicoachingtherapie.com/index.php/accueil/" class="project-link demo" target="_blank" rel="noopener noreferrer">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15,3 21,3 21,9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                  </svg>
                  <span>Démo</span>
                </a>
              </div>
            </div>
            <div class="project-tech-badge">WordPress</div>
          </div>
          <div class="project-content">
            <h3>Site Blog WordPress</h3>
            <p class="project-description">
              Site web WordPress complet avec Elementor, réalisé en stage chez Ohana Entreprise. Design responsive et fonctionnalités avancées.
            </p>
            <div class="project-features">
              <span class="feature-tag">📧 Formulaire contact</span>
              <span class="feature-tag">📰 Newsletter</span>
              <span class="feature-tag">📱 Responsive</span>
              <span class="feature-tag">🎨 Elementor</span>
            </div>
            <div class="project-tech-stack">
              <span class="tech-item">WordPress</span>
              <span class="tech-item">Elementor</span>
              <span class="tech-item">HTML</span>
              <span class="tech-item">CSS</span>
              <span class="tech-item">PHP</span>
            </div>
          </div>
        </div>


        <!-- Projet WordPress Triple Gem -->
        <div class="project-card" data-tech="wordpress" data-aos="fade-up" data-aos-delay="700">
          <div class="project-image">
            <img loading="lazy" src="assets/images/projets/triple-gem.jpg" alt="Site Triple Gem">
            <div class="project-overlay">
              <div class="project-links">
                <a href="https://www.messanhgodwin-dovon.mds-angers.yt/wwwtriplegem.com/" class="project-link demo" target="_blank" rel="noopener noreferrer">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15,3 21,3 21,9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                  </svg>
                  <span>Démo</span>
                </a>
              </div>
            </div>
            <div class="project-tech-badge">WordPress</div>
          </div>
          <div class="project-content">
            <h3>Site Triple Gem</h3>
            <p class="project-description">
              Site web WordPress Elementor avec design moderne et fonctionnalités avancées.
            </p>
            <div class="project-features">
              <span class="feature-tag">🎨 Design moderne</span>
              <span class="feature-tag">📱 Responsive</span>
              <span class="feature-tag">⚡ Performance</span>
            </div>
            <div class="project-tech-stack">
              <span class="tech-item">WordPress</span>
              <span class="tech-item">Elementor</span>
              <span class="tech-item">HTML</span>
              <span class="tech-item">CSS</span>
            </div>
          </div>
        </div>




         <!-- Projet Figma2 -->
        <div class="project-card" data-tech="figma" data-aos="fade-up" data-aos-delay="700">
          <div class="project-image">
            <img loading="lazy" src="assets/images/projets/maquette-figma-nexaa.png" alt="Maquette e-commerce Nexaa sur Figma">
            <div class="project-overlay">
              <div class="project-links">
                <a href="https://www.figma.com/proto/0tapNLbFrgAV6nEOj8woJv/Untitled?page-id=0%3A1&node-id=139-3444&viewport=1425%2C-1747%2C0.5&t=15wY5Jr3jSBmUSnd-1&scaling=scale-down&content-scaling=fixed&starting-point-node-id=104%3A820" class="project-link demo" target="_blank" rel="noopener noreferrer">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15,3 21,3 21,9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                  </svg>
                  <span>Démo</span>
                </a>
              </div>
            </div>
            <div class="project-tech-badge">Figma</div>
          </div>
          <div class="project-content">
            <h3>Maquette e-commerce Nexaa</h3>
            <p class="project-description">
              Maquette Figma d'un site e-commerce, avec prototype interactif et motion design.
            </p>
            <div class="project-features">
              <span class="feature-tag">🎨 Design moderne</span>
              <span class="feature-tag">📱 Responsive</span>
              <span class="feature-tag">⚡ Performance</span>
            </div>
            <div class="project-tech-stack">
              <span class="tech-item">Figma</span>
              <span class="tech-item">Illustrator</span>
              <span class="tech-item">Photoshop</span>
            </div>
          </div>
        </div>



 <!-- Projet PhotoShop -->
        <div class="project-card" data-tech="design" data-aos="fade-up" data-aos-delay="700">
          <div class="project-image">
            <img loading="lazy" src="assets/images/projets/magazine-bazzar-vog.png" alt="Couverture de magazine Bazzar Vog">
            <div class="project-tech-badge">Photoshop</div>
          </div>
          <div class="project-content">
            <h3>Couverture de magazine Bazzar Vog</h3>
            <p class="project-description">
             Design de couverture de magazine avec Photoshop, mettant en avant des compétences en retouche photo, composition et création visuelle.
            </p>
            <div class="project-features">
              <span class="feature-tag">🎨 Design moderne</span>

            </div>
            <div class="project-tech-stack">
              <span class="tech-item">Illustrator</span>
              <span class="tech-item">Photoshop</span>
            </div>
          </div>
        </div>




        <!-- Projet PHP Calculateur IMC -->
        <div class="project-card" data-tech="php" data-aos="fade-up" data-aos-delay="800">
          <div class="project-image">
            <img loading="lazy" src="assets/images/projets/calculateur-imc.png" alt="Calculateur IMC">
            <div class="project-overlay">
              <div class="project-links">
                <a href="projets/calculateur-imc/" class="project-link demo" target="_blank" rel="noopener noreferrer">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15,3 21,3 21,9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                  </svg>
                  <span>Démo</span>
                </a>
              </div>
            </div>
            <div class="project-tech-badge">PHP</div>
          </div>
          <div class="project-content">
            <h3>Calculateur d'IMC</h3>
            <p class="project-description">
              Application web simple pour calculer l'Indice de Masse Corporelle avec interface utilisateur intuitive.
            </p>
            <div class="project-features">
              <span class="feature-tag">🧮 Calcul automatique</span>
              <span class="feature-tag">📊 Résultats clairs</span>
              <span class="feature-tag">💻 Interface simple</span>
            </div>
            <div class="project-tech-stack">
              <span class="tech-item">HTML</span>
              <span class="tech-item">CSS</span>
              <span class="tech-item">PHP</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  
 
  

  <!-- Section CTA -->
  <section class="projects-cta">
    <div class="container-modern">
      <div class="projects-cta-content" data-aos="fade-up">
        <h2>Intéressé par l'un de ces projets ?</h2>
        <p>Discutons de vos besoins et de la façon dont je peux vous aider à réaliser votre vision</p>
        <div class="projects-cta-buttons">
          <a href="contact.php" class="btn-modern btn-primary">Me contacter</a>
          <a href="./" class="btn-modern btn-secondary">Retour à l'accueil</a>
        </div>
      </div>
    </div>
  </section>

  <style>
    .image-container{
      display: flex;
    }
    .image-container {
      width: 300px;
      cursor: pointer;
    }

    .image-container img {
      width: 100%;
      border-radius: 8px;
      transition: 0.3s;
    }

    

    /* Reset et base */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      color: #ffffff;
      background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%);
      overflow-x: hidden;
    }

    /* Hero Section Projets */
    .projects-hero {
      min-height: 60vh;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .projects-hero-background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(circle at 30% 70%, rgba(99, 102, 241, 0.2) 0%, transparent 50%),
                  radial-gradient(circle at 70% 30%, rgba(236, 72, 153, 0.2) 0%, transparent 50%);
    }

    .projects-particles {
      position: absolute;
      width: 100%;
      height: 100%;
    }

    .project-particle {
      position: absolute;
      width: 6px;
      height: 6px;
      background: #6366f1;
      border-radius: 50%;
      animation: projectParticleFloat 10s infinite linear;
    }

    .project-particle:nth-child(1) {
      top: 20%;
      left: 10%;
      animation-delay: 0s;
    }

    .project-particle:nth-child(2) {
      top: 60%;
      right: 20%;
      animation-delay: 2.5s;
    }

    .project-particle:nth-child(3) {
      bottom: 30%;
      left: 30%;
      animation-delay: 5s;
    }

    .project-particle:nth-child(4) {
      top: 40%;
      right: 40%;
      animation-delay: 7.5s;
    }

    @keyframes projectParticleFloat {
      0% {
        transform: translateY(0px) rotate(0deg);
        opacity: 0;
      }
      10% {
        opacity: 1;
      }
      90% {
        opacity: 1;
      }
      100% {
        transform: translateY(-150px) rotate(360deg);
        opacity: 0;
      }
    }

    .projects-hero-content {
      text-align: center;
      max-width: 800px;
      margin: 0 auto;
      padding: 0 2rem;
      position: relative;
      z-index: 2;
    }

    .projects-hero-title {
      font-size: clamp(2.5rem, 6vw, 4rem);
      font-weight: 800;
      line-height: 1.1;
      margin-bottom: 1rem;
    }

    .gradient-text {
      background: linear-gradient(135deg, #6366f1, #ec4899);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .projects-hero-subtitle {
      font-size: 1.3rem;
      color: #9ca3af;
      line-height: 1.6;
      max-width: 600px;
      margin: 0 auto;
    }

    /* Filtres de projets */
    .projects-filters {
      padding: 3rem 0;
      background: rgba(255, 255, 255, 0.02);
    }

    .container-modern {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
    }

    .filters-container {
      text-align: center;
    }

    .filters-container h3 {
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 1.5rem;
      color: #e5e7eb;
    }

    .filter-buttons {
      display: flex;
      gap: 1rem;
      justify-content: center;
      flex-wrap: wrap;
    }

    .filter-btn {
      position: relative;
      padding: 0.75rem 1.5rem;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 12px;
      color: #9ca3af;
      font-weight: 500;
      cursor: pointer;
      overflow: hidden;
      transition: all 0.3s ease;
      backdrop-filter: blur(10px);
    }

    .filter-btn:hover,
    .filter-btn.active {
      background: linear-gradient(135deg, #6366f1, #8b5cf6);
      color: white;
      border-color: transparent;
      transform: translateY(-2px);
    }

    .filter-glow {
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s;
    }

    .filter-btn:hover .filter-glow {
      left: 100%;
    }

    /* Grille de projets */
    .projects-showcase {
      padding: 4rem 0;
    }

    .projects-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
      gap: 2rem;
    }

    .project-card {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      overflow: hidden;
      backdrop-filter: blur(10px);
      transition: all 0.3s ease;
    }

    .project-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
      border-color: rgba(99, 102, 241, 0.3);
    }

    .project-image {
      position: relative;
      height: 250px;
      overflow: hidden;
    }

    .project-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s ease;
    }

    .project-card:hover .project-image img {
      transform: scale(1.05);
    }

    .project-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.8);
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .project-card:hover .project-overlay {
      opacity: 1;
    }

    .project-links {
      display: flex;
      gap: 1rem;
    }

    .project-link {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.5rem;
      padding: 1rem;
      background: rgba(99, 102, 241, 0.9);
      color: white;
      text-decoration: none;
      border-radius: 12px;
      transition: all 0.3s ease;
    }

    .project-link:hover {
      background: rgba(99, 102, 241, 1);
      transform: translateY(-2px);
    }

    .project-link svg {
      width: 24px;
      height: 24px;
    }

    .project-link span {
      font-size: 0.9rem;
      font-weight: 500;
    }

    .project-tech-badge {
      position: absolute;
      top: 1rem;
      right: 1rem;
      padding: 0.5rem 1rem;
      background: rgba(99, 102, 241, 0.9);
      color: white;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 500;
    }

    .project-content {
      padding: 2rem;
    }

    .project-content h3 {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 1rem;
      color: #e5e7eb;
    }

    .project-description {
      color: #9ca3af;
      line-height: 1.6;
      margin-bottom: 1.5rem;
    }

    .project-features {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      margin-bottom: 1.5rem;
    }

    .feature-tag {
      padding: 0.25rem 0.75rem;
      background: rgba(99, 102, 241, 0.1);
      color: #6366f1;
      border: 1px solid rgba(99, 102, 241, 0.2);
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 500;
    }

    .project-tech-stack {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
    }

    .tech-item {
      padding: 0.25rem 0.75rem;
      background: rgba(255, 255, 255, 0.1);
      color: #e5e7eb;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 500;
    }

    /* Section CTA */
    .projects-cta {
      padding: 6rem 0;
      background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(236, 72, 153, 0.1));
    }

    .projects-cta-content {
      text-align: center;
      max-width: 800px;
      margin: 0 auto;
    }

    .projects-cta-content h2 {
      font-size: clamp(2rem, 5vw, 3rem);
      font-weight: 700;
      margin-bottom: 1rem;
      color: #e5e7eb;
    }

    .projects-cta-content p {
      font-size: 1.2rem;
      color: #9ca3af;
      margin-bottom: 2rem;
    }

    .projects-cta-buttons {
      display: flex;
      gap: 1rem;
      justify-content: center;
      flex-wrap: wrap;
    }

    .btn-modern {
      position: relative;
      padding: 1rem 2rem;
      border: none;
      border-radius: 12px;
      font-weight: 600;
      font-size: 1rem;
      text-decoration: none;
      cursor: pointer;
      overflow: hidden;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    .btn-primary {
      background: linear-gradient(135deg, #6366f1, #8b5cf6);
      color: white;
      box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
    }

    .btn-secondary {
      background: rgba(255, 255, 255, 0.1);
      color: white;
      border: 1px solid rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
    }

    .btn-modern:hover {
      transform: translateY(-2px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    /* Responsive */
    @media (max-width: 1024px) {
      .projects-grid {
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      }
    }

    @media (max-width: 768px) {
      .projects-hero {
        min-height: 50vh;
      }

      .projects-grid {
        grid-template-columns: 1fr;
      }

      .filter-buttons {
        flex-direction: column;
        align-items: center;
      }

      .filter-btn {
        width: 100%;
        max-width: 200px;
      }

      .projects-cta-buttons {
        flex-direction: column;
        align-items: center;
      }

      .btn-modern {
        width: 100%;
        max-width: 300px;
      }

      .container-modern {
        padding: 0 1rem;
      }
    }
  </style>

  <script>
    // Initialisation AOS
    AOS.init({
      duration: 1000,
      once: true,
      offset: 100
    });

    // Animation des particules
    const projectParticles = document.querySelectorAll('.project-particle');
    projectParticles.forEach((particle, index) => {
      particle.style.animationDelay = `${index * 2.5}s`;
    });

    // Système de filtrage des projets
    const filterButtons = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');

    filterButtons.forEach(button => {
      button.addEventListener('click', () => {
        // Suppression de la classe active de tous les boutons
        filterButtons.forEach(btn => btn.classList.remove('active'));
        
        // Ajout de la classe active au bouton cliqué
        button.classList.add('active');
        
        // Récupération du filtre
        const filter = button.getAttribute('data-filter');
        
        // Filtrage des projets
        projectCards.forEach(card => {
          const tech = card.getAttribute('data-tech');
          
          if (filter === 'all' || tech === filter) {
            card.style.display = 'block';
            card.style.animation = 'fadeIn 0.5s ease forwards';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });

    // Animation d'apparition des projets
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -100px 0px'
    };

    const projectObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
        }
      });
    }, observerOptions);

    projectCards.forEach(card => {
      card.style.opacity = '0';
      card.style.transform = 'translateY(30px)';
      card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      projectObserver.observe(card);
    });

    // Parallax effect pour les particules
    window.addEventListener('scroll', () => {
      const scrolled = window.pageYOffset;
      const particles = document.querySelector('.projects-particles');
      if (particles) {
        const speed = scrolled * 0.2;
        particles.style.transform = `translateY(${speed}px)`;
      }
    });

    // Animation des cartes au survol
    projectCards.forEach(card => {
      card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-10px) scale(1.02)';
      });
      
      card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
      });
    });

    // Smooth scroll pour les ancres
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });
  </script>

  <?php include __DIR__ . '/includes/footer.php'; ?>
