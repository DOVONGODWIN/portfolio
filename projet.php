<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mes Projets - Dovon Godwin</title>
  <link rel="stylesheet" href="style.css"/>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body>
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
        </div>
      </div>
    </div>
  </section>

  <!-- Grille de projets -->
  <section class="projects-showcase">
    <div class="container-modern">
      <div class="projects-grid" id="projectsGrid">
        <!-- Projet PHP/SQL -->
        <div class="project-card" data-tech="php" data-aos="fade-up" data-aos-delay="200">
          <div class="project-image">
            <img src="WhatsApp Image 2025-05-30 à 20.42.48_e8d3b8758.jpg" alt="Système de Login Restaurant">
            <div class="project-overlay">
              <div class="project-links">
                <a href="D1/accueil.php" class="project-link demo" target="_blank">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15,3 21,3 21,9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                  </svg>
                  <span>Démo</span>
                </a>
                <a href="https://github.com/DOVONGODWIN/restaurant-admin-reservation" class="project-link code" target="_blank">
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
            <h3>Système de Login Restaurant</h3>
            <p class="project-description">
              Tableau de bord de gestion complet pour restaurant avec authentification, réservations, avis clients et interface d'administration.
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
            <img src="Capture d'écran 2025-06-29 111644.png" alt="Landing Page Responsive">
            <div class="project-overlay">
              <div class="project-links">
                <a href="projet fil rouge/index 2 (1).html" class="project-link demo" target="_blank">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15,3 21,3 21,9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                  </svg>
                  <span>Démo</span>
                </a>
                <a href="https://github.com/DOVONGODWIN/TODO/blob/main/projet%20fil%20rouge/maison.js" class="project-link code" target="_blank">
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
            <h3>Landing Page Responsive</h3>
            <p class="project-description">
              Page d'accueil moderne et responsive avec liste dynamique, animations fluides et design adaptatif.
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

        <!-- Projet Frontend/PHP -->
        <div class="project-card" data-tech="frontend" data-aos="fade-up" data-aos-delay="400">
          <div class="project-image">
            <img src="WhatsApp Image 2025-05-29 à 17.10.24_c80291e9.jpg" alt="Site Vitrine Moderne">
            <div class="project-overlay">
              <div class="project-links">
                <a href="PARTIEL/ACCUEIL.php" class="project-link demo" target="_blank">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15,3 21,3 21,9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                  </svg>
                  <span>Démo</span>
                </a>
                <a href="https://github.com/DOVONGODWIN/Site-vitrine-moderne-en-HTML-CSS-JS-et-php-Formulaire-de-contact-" class="project-link code" target="_blank">
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
            <img src="WhatsApp Image 2025-05-29 à 09.59.05_f8e5a9ad.jpg" alt="Site Blog WordPress">
            <div class="project-overlay">
              <div class="project-links">
                <a href="https://www.messanhgodwin-dovon.mds-angers.yt/www.nikkicoachingtherapie.com/index.php/accueil/" class="project-link demo" target="_blank">
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

        <!-- Projet WordPress BDS -->
        <div class="project-card" data-tech="wordpress" data-aos="fade-up" data-aos-delay="600">
          <div class="project-image">
            <img src="WhatsApp Image 2025-05-29 à 16.56.54_e9c8c4ad.jpg" alt="Site BDS Win Sport School">
            <div class="project-overlay">
              <div class="project-links">
                <a href="https://www.messanhgodwin-dovon.mds-angers.yt/www.win-sport--school.com/index.php/accueil/" class="project-link demo" target="_blank">
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

        <!-- Projet WordPress Triple Gem -->
        <div class="project-card" data-tech="wordpress" data-aos="fade-up" data-aos-delay="700">
          <div class="project-image">
            <img src="WhatsApp Image 2025-05-29 à 17.05.56_e9c8c4ad.jpg" alt="Site Triple Gem">
            <div class="project-overlay">
              <div class="project-links">
                <a href="https://www.messanhgodwin-dovon.mds-angers.yt/wwwtriplegem.com/" class="project-link demo" target="_blank">
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

        <!-- Projet PHP Calculateur IMC -->
        <div class="project-card" data-tech="php" data-aos="fade-up" data-aos-delay="800">
          <div class="project-image">
            <img src="WhatsApp Image 2025-05-30 à 21.26.55_e9ae6d8e9.jpg" alt="Calculateur IMC">
            <div class="project-overlay">
              <div class="project-links">
                <a href="DEVOIR/phpd.php" class="project-link demo" target="_blank">
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
          <a href="contact-modern.php" class="btn-modern btn-primary">Me contacter</a>
          <a href="portfolio.php" class="btn-modern btn-secondary">Retour à l'accueil</a>
        </div>
      </div>
    </div>
  </section>

  <style>
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

  <?php include 'footer.php'; ?>
</body>
</html>
