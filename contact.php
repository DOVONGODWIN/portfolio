<?php
$pageTitle = "Contact - Godwin Dovon";
$pageDescription = "Contactez Godwin Dovon, développeur full-stack, pour discuter de votre projet web ou design.";
include __DIR__ . '/includes/header.php';
?>
  <!-- Hero Section Contact -->
  <section class="contact-hero">
    <div class="contact-hero-background">
      <div class="contact-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
      </div>
    </div>
    <div class="contact-hero-content">
      <div class="contact-hero-text" data-aos="fade-up">
        <h1 class="contact-hero-title">
          <span class="gradient-text">Discutons</span> de votre projet
        </h1>
        <p class="contact-hero-subtitle">
          Prêt à transformer vos idées en réalité ? Contactez-moi pour discuter de vos besoins en développement web et design.
        </p>
      </div>
    </div>
  </section>

  <!-- Section Contact Principale -->
  <section class="contact-main">
    <div class="container-modern">
      <div class="contact-grid">
        <!-- Informations de contact -->
        <div class="contact-info" data-aos="fade-right">
          <div class="contact-info-header">
            <h2>Mes Coordonnées</h2>
            <p>N'hésitez pas à me contacter par l'un de ces moyens</p>
          </div>
          
          <div class="contact-methods">
            <div class="contact-method" data-aos="fade-up" data-aos-delay="200">
              <div class="contact-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                </svg>
              </div>
              <div class="contact-details">
                <h3>Téléphone</h3>
                <p>+33 6 29 53 65 12</p>
              </div>
            </div>

            <div class="contact-method" data-aos="fade-up" data-aos-delay="300">
              <div class="contact-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                  <polyline points="22,6 12,13 2,6"/>
                </svg>
              </div>
              <div class="contact-details">
                <h3>Email</h3>
                <p>godwindovon@gmail.com</p>
              </div>
            </div>

            <div class="contact-method" data-aos="fade-up" data-aos-delay="400">
              <div class="contact-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/>
                  <rect x="8" y="2" width="8" height="4" rx="1" ry="1"/>
                </svg>
              </div>
              <div class="contact-details">
                <h3>Formation</h3>
                <p>My Digital School</p>
              </div>
            </div>
          </div>

          <div class="social-links" data-aos="fade-up" data-aos-delay="500">
            <h3>Suivez-moi et Télécharger mon CV</h3>
            <div class="social-icons">
              <a href="https://www.linkedin.com/in/godwin-dovon-mess656/" class="social-icon linkedin" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                <svg viewBox="0 0 24 24" fill="currentColor">
                  <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                </svg>
              </a>
              <a href="https://github.com/DOVONGODWIN" class="social-icon github" target="_blank" rel="noopener noreferrer" aria-label="GitHub">
                <svg viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                </svg>
              </a>
              <a href="assets/documents/cv-godwin-dovon-2026.pdf" download class="social-icon cv" aria-label="Télécharger mon CV (PDF)">
  <svg viewBox="0 0 24 24" fill="currentColor">
    <path d="M12 16l4-5h-3V4h-2v7H8l4 5zm8 2v2H4v-2h16z"/>
  </svg>
</a>

            

   </div>
          </div>
        </div>

        
      </div>
    </div>
   
  </section>

  <!-- Section CTA -->
  <section class="contact-cta">
    <div class="container-modern">
      <div class="contact-cta-content" data-aos="fade-up">
        <h2>Prêt à démarrer votre projet ?</h2>
        <p>Découvrez mes réalisations et discutons de vos besoins</p>
        <div class="contact-cta-buttons">
          <a href="realisations.php" class="btn-modern btn-primary">Voir mes projets</a>
          <a href="./" class="btn-modern btn-secondary">Retour à l'accueil</a>
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

    /* Hero Section Contact */
    .contact-hero {
      min-height: 60vh;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .contact-hero-background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(circle at 30% 70%, rgba(99, 102, 241, 0.2) 0%, transparent 50%),
                  radial-gradient(circle at 70% 30%, rgba(236, 72, 153, 0.2) 0%, transparent 50%);
    }

    .contact-particles {
      position: absolute;
      width: 100%;
      height: 100%;
    }

    .particle {
      position: absolute;
      width: 4px;
      height: 4px;
      background: #6366f1;
      border-radius: 50%;
      animation: particleFloat 8s infinite linear;
    }

    .particle:nth-child(1) {
      top: 20%;
      left: 10%;
      animation-delay: 0s;
    }

    .particle:nth-child(2) {
      top: 60%;
      right: 20%;
      animation-delay: 2s;
    }

    .particle:nth-child(3) {
      bottom: 30%;
      left: 30%;
      animation-delay: 4s;
    }

    .particle:nth-child(4) {
      top: 40%;
      right: 40%;
      animation-delay: 6s;
    }

    .particle:nth-child(5) {
      bottom: 20%;
      right: 10%;
      animation-delay: 1s;
    }

    @keyframes particleFloat {
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
        transform: translateY(-100px) rotate(360deg);
        opacity: 0;
      }
    }

    .contact-hero-content {
      text-align: center;
      max-width: 800px;
      margin: 0 auto;
      padding: 0 2rem;
      position: relative;
      z-index: 2;
    }

    .contact-hero-title {
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

    .contact-hero-subtitle {
      font-size: 1.3rem;
      color: #9ca3af;
      line-height: 1.6;
      max-width: 600px;
      margin: 0 auto;
    }

    /* Section Contact Principale */
    .contact-main {
      padding: 6rem 0;
      justify-content: center;
    }

    .container-modern {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
    }

    .contact-grid {
      max-width: 720px;
      margin: 0 auto;
    }

    /* Informations de contact */
    .contact-info {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      padding: 2.5rem;
      backdrop-filter: blur(10px);
      width: 100%;
    }

    .contact-info-header {
      margin-bottom: 2.5rem;
    }

    .contact-info-header h2 {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
      color: #e5e7eb;
    }

    .contact-info-header p {
      color: #9ca3af;
      line-height: 1.6;
    }

    .contact-methods {
      margin-bottom: 2.5rem;
    }

    .contact-method {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1.5rem;
      padding: 1rem;
      background: rgba(255, 255, 255, 0.03);
      border-radius: 12px;
      border: 1px solid rgba(255, 255, 255, 0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .contact-method:hover {
      transform: translateX(5px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .contact-icon {
      width: 50px;
      height: 50px;
      background: linear-gradient(135deg, #6366f1, #8b5cf6);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .contact-icon svg {
      width: 24px;
      height: 24px;
      color: white;
    }

    .contact-details h3 {
      font-size: 1.1rem;
      font-weight: 600;
      margin-bottom: 0.25rem;
      color: #e5e7eb;
    }

    .contact-details p {
      color: #9ca3af;
      font-size: 0.95rem;
    }

    .social-links h3 {
      font-size: 1.2rem;
      font-weight: 600;
      margin-bottom: 1rem;
      color: #e5e7eb;
    }

    .social-icons {
      display: flex;
      gap: 1rem;
    }

    .social-icon {
      width: 50px;
      height: 50px;
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
      text-decoration: none;
      color: #e5e7eb;
    }

    .social-icon:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .social-icon.linkedin:hover {
      background: #0077b5;
      border-color: #0077b5;
    }

    .social-icon.github:hover {
      background: #333;
      border-color: #333;
    }

    .social-icon svg {
      width: 24px;
      height: 24px;
    }

    /* Section CTA */
    .contact-cta {
      padding: 6rem 0;
      background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(236, 72, 153, 0.1));
    }

    .contact-cta-content {
      text-align: center;
      max-width: 800px;
      margin: 0 auto;
    }

    .contact-cta-content h2 {
      font-size: clamp(2rem, 5vw, 3rem);
      font-weight: 700;
      margin-bottom: 1rem;
      color: #e5e7eb;
    }

    .contact-cta-content p {
      font-size: 1.2rem;
      color: #9ca3af;
      margin-bottom: 2rem;
    }

    .contact-cta-buttons {
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
    @media (max-width: 768px) {
      .contact-hero {
        min-height: 50vh;
      }

      .contact-cta-buttons {
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

      .contact-info {
        padding: 1.5rem;
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
    const particles = document.querySelectorAll('.particle');
    particles.forEach((particle, index) => {
      particle.style.animationDelay = `${index * 1.5}s`;
    });

    // Parallax effect pour les particules
    window.addEventListener('scroll', () => {
      const scrolled = window.pageYOffset;
      const particles = document.querySelector('.contact-particles');
      if (particles) {
        const speed = scrolled * 0.3;
        particles.style.transform = `translateY(${speed}px)`;
      }
    });
  </script>

  <?php include __DIR__ . '/includes/footer.php'; ?>
