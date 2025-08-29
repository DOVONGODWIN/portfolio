<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Portfolio de Dovon Godwin</title>
  <link rel="stylesheet" href="style.css"/>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body>
  <!-- Hero Section avec Parallax -->
  <section class="hero-modern">
    <div class="hero-background">
      <div class="floating-elements">
        <div class="floating-circle"></div>
        <div class="floating-square"></div>
        <div class="floating-triangle"></div>
      </div>
    </div>
    <div class="hero-content">
      <div class="hero-text" data-aos="fade-up" data-aos-duration="1000">
        <h1 class="hero-title">
          <span class="gradient-text">Dovon</span>
          <span class="gradient-text-alt">Godwin</span>
        </h1>
        <h2 class="hero-subtitle">Développeur Full-Stack Créatif</h2>
        <p class="hero-description">Étudiant en licence, actuellement en stage de développement</p>
        <div class="hero-buttons">
          <a href="projet.php" class="btn-modern btn-primary" data-aos="fade-up" data-aos-delay="200">
            <span>Voir mes projets</span>
            <div class="btn-glow"></div>
          </a>
          <a href="contact-modern.php" class="btn-modern btn-secondary" data-aos="fade-up" data-aos-delay="400">
            <span>Me contacter</span>
            <div class="btn-glow"></div>
          </a>
        </div>
      </div>
      <div class="hero-visual" data-aos="fade-left" data-aos-duration="1000">
        <div class="code-animation">
          <div class="code-line">const developer = {</div>
          <div class="code-line">  name: "Dovon Godwin",</div>
          <div class="code-line">  skills: ["Full-Stack", "Design"],</div>
          <div class="code-line">  passion: "Innovation"</div>
          <div class="code-line">};</div>
        </div>
      </div>
    </div>
    <div class="scroll-indicator">
      <div class="scroll-arrow"></div>
    </div>
  </section>

  <!-- Section Expérience et Éducation -->
  <section class="resume-section-modern">
    <div class="container-modern">
      <div class="section-header" data-aos="fade-up">
        <h2 class="section-title">Mon Parcours</h2>
        <p class="section-subtitle">Expérience et formation</p>
      </div>
      
      <div class="resume-grid-modern">
        <!-- Expérience -->
        <div class="resume-block-modern" data-aos="fade-up" data-aos-delay="200">
          <div class="block-header">
            <div class="block-icon">💼</div>
            <h3>Mes Expériences</h3>
          </div>
          
          <div class="timeline">
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="300">
              <div class="timeline-marker"></div>
              <div class="timeline-content">
                <div class="timeline-date">Mars 2025 - Présent</div>
                <h4>Stage de développeur chez Ohana entreprise</h4>
                <p>Participation à un projet de marketplace, suivi de la conception de sites internet pour des clients.</p>
                <a href="projet.php" class="timeline-link">Voir les réalisations →</a>
              </div>
            </div>
            
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="400">
              <div class="timeline-marker"></div>
              <div class="timeline-content">
                <div class="timeline-date">2024 - 2025</div>
                <h4>Développeur Web Freelance</h4>
                <p>Conception de projets freelance (marketplace, Site Web)</p>
                <a href="projet.php" class="timeline-link">Voir les réalisations →</a>
              </div>
            </div>
            
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="500">
              <div class="timeline-marker"></div>
              <div class="timeline-content">
                <div class="timeline-date">2024</div>
                <h4>Gestion de base de données (en milieu industriel)</h4>
                <p>Structuration, maintenance et optimisation des données pour le suivi des activités de l'usine.</p>
              </div>
            </div>
            
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="600">
              <div class="timeline-marker"></div>
              <div class="timeline-content">
                <div class="timeline-date">2024 - 2025</div>
                <h4>Junior Graphics Designer</h4>
                <p>Compétences en design graphique : création de logos, illustrations originales et visuels sur mesure. Bonne maîtrise de la suite Adobe Creative Cloud.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Éducation -->
        <div class="resume-block-modern" data-aos="fade-up" data-aos-delay="400">
          <div class="block-header">
            <div class="block-icon">🎓</div>
            <h3>Ma Formation</h3>
          </div>
          
          <div class="timeline">
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="500">
              <div class="timeline-marker"></div>
              <div class="timeline-content">
                <div class="timeline-date">2024-2025</div>
                <h4>My Digital School</h4>
                <p>Formation Bachelor – compétences de développeur, en communication digitale, design graphique, stratégie marketing et production multimédia</p>
              </div>
            </div>
            
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="600">
              <div class="timeline-marker"></div>
              <div class="timeline-content">
                <div class="timeline-date">2023-2024</div>
                <h4>Université d'Angers</h4>
                <p>Parcours initial en santé. Première année de médecine puis prépa pharmacie à l'IPSEM Angers, avant de me réorienter vers le digital</p>
              </div>
            </div>
            
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="700">
              <div class="timeline-marker"></div>
              <div class="timeline-content">
                <div class="timeline-date">2022-2023</div>
                <h4>Lycée</h4>
                <p>Baccalauréat général (Spécialité MATHS-PC-SVT)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section Compétences -->
  <section class="skills-section-modern">
    <div class="container-modern">
      <div class="section-header" data-aos="fade-up">
        <h2 class="section-title">Mes Compétences</h2>
        <p class="section-subtitle">Technologies et outils que je maîtrise</p>
      </div>
      
      <div class="skills-grid-modern">
        <div class="skill-card-modern" data-aos="zoom-in" data-aos-delay="200">
          <div class="skill-icon">
            <img src="ef7357f8edafba5276df1698801ce94a-removebg-preview.png" alt="HTML/CSS/JS">
          </div>
          <h3>HTML, CSS & JS</h3>
          <div class="skill-bar">
            <div class="skill-progress" style="width: 90%"></div>
          </div>
          <span class="skill-percentage">90%</span>
        </div>
        
        <div class="skill-card-modern" data-aos="zoom-in" data-aos-delay="300">
          <div class="skill-icon">
            <img src="b1ae239e57d0569868ec86c7a7b53c79-removebg-preview.png" alt="PHP/SQL">
          </div>
          <h3>PHP & SQL</h3>
          <div class="skill-bar">
            <div class="skill-progress" style="width: 90%"></div>
          </div>
          <span class="skill-percentage">90%</span>
        </div>
        
        <div class="skill-card-modern" data-aos="zoom-in" data-aos-delay="400">
          <div class="skill-icon">
            <img src="nodejs-white-web-story.png" alt="Adobe">
          </div>
          <h3>Node JS </h3>
          <div class="skill-bar">
            <div class="skill-progress" style="width: 85%"></div>
          </div>
          <span class="skill-percentage">85%</span>
        </div>
        
        <div class="skill-card-modern" data-aos="zoom-in" data-aos-delay="500">
          <div class="skill-icon">
            <img src="react.png" alt="WordPress">
          </div>
          <h3>React</h3>
          <div class="skill-bar">
            <div class="skill-progress" style="width: 90%"></div>
          </div>
          <span class="skill-percentage">90%</span>
        </div>
        
        <div class="skill-card-modern" data-aos="zoom-in" data-aos-delay="600">
          <div class="skill-icon">
            <img src="9730c7b997bdc91dd083ff2a61383815-removebg-preview.png" alt="Git">
          </div>
          <h3>Git et GitHub</h3>
          <div class="skill-bar">
            <div class="skill-progress" style="width: 90%"></div>
          </div>
          <span class="skill-percentage">90%</span>
        </div>
        
        <div class="skill-card-modern" data-aos="zoom-in" data-aos-delay="700">
          <div class="skill-icon">
            <img src="phython.png" alt="Figma">
          </div>
          <h3>python</h3>
          <div class="skill-bar">
            <div class="skill-progress" style="width: 90%"></div>
          </div>
          <span class="skill-percentage">70%</span>
        </div>
      </div>
    </div>
  </section>

  <!-- Section CTA -->
  <section class="cta-section-modern">
    <div class="container-modern">
      <div class="cta-content" data-aos="fade-up">
        <h2>Prêt à collaborer sur votre prochain projet ?</h2>
        <p>Découvrez mes réalisations et discutons de vos besoins</p>
        <div class="cta-buttons">
          <a href="projet.php" class="btn-modern btn-primary">Voir mes projets</a>
          <a href="contact-modern.php" class="btn-modern btn-secondary">Me contacter</a>
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

    /* Hero Section */
    .hero-modern {
      min-height: 100vh;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .hero-background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                  radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                  radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
    }

    .floating-elements {
      position: absolute;
      width: 100%;
      height: 100%;
    }

    .floating-circle, .floating-square, .floating-triangle {
      position: absolute;
      opacity: 0.1;
      animation: float 6s ease-in-out infinite;
    }

    .floating-circle {
      width: 100px;
      height: 100px;
      border: 2px solid #6366f1;
      border-radius: 50%;
      top: 20%;
      left: 10%;
      animation-delay: 0s;
    }

    .floating-square {
      width: 80px;
      height: 80px;
      border: 2px solid #ec4899;
      top: 60%;
      right: 15%;
      animation-delay: 2s;
    }

    .floating-triangle {
      width: 0;
      height: 0;
      border-left: 50px solid transparent;
      border-right: 50px solid transparent;
      border-bottom: 86px solid #3b82f6;
      bottom: 20%;
      left: 20%;
      animation-delay: 4s;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(180deg); }
    }

    .hero-content {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 4rem;
      align-items: center;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
      position: relative;
      z-index: 2;
    }

    .hero-text {
      text-align: left;
    }

    .hero-title {
      font-size: clamp(3rem, 8vw, 5rem);
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

    .gradient-text-alt {
      background: linear-gradient(135deg, #3b82f6, #10b981);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .hero-subtitle {
      font-size: clamp(1.5rem, 4vw, 2rem);
      font-weight: 600;
      margin-bottom: 1rem;
      color: #e5e7eb;
    }

    .hero-description {
      font-size: 1.2rem;
      color: #9ca3af;
      margin-bottom: 2rem;
      line-height: 1.6;
    }

    .hero-buttons {
      display: flex;
      gap: 1rem;
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

    .btn-glow {
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s;
    }

    .btn-modern:hover .btn-glow {
      left: 100%;
    }

    .hero-visual {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .code-animation {
      background: rgba(0, 0, 0, 0.3);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 12px;
      padding: 2rem;
      backdrop-filter: blur(10px);
      font-family: 'Fira Code', monospace;
      font-size: 1rem;
      line-height: 1.6;
    }

    .code-line {
      color: #e5e7eb;
      margin-bottom: 0.5rem;
      opacity: 0;
      animation: codeAppear 0.5s ease forwards;
    }

    .code-line:nth-child(1) { animation-delay: 0.5s; }
    .code-line:nth-child(2) { animation-delay: 1s; }
    .code-line:nth-child(3) { animation-delay: 1.5s; }
    .code-line:nth-child(4) { animation-delay: 2s; }
    .code-line:nth-child(5) { animation-delay: 2.5s; }

    @keyframes codeAppear {
      to {
        opacity: 1;
        transform: translateX(0);
      }
      from {
        opacity: 0;
        transform: translateX(-20px);
      }
    }

    .scroll-indicator {
      position: absolute;
      bottom: 2rem;
      left: 50%;
      transform: translateX(-50%);
      animation: bounce 2s infinite;
    }

    .scroll-arrow {
      width: 20px;
      height: 20px;
      border-right: 2px solid #6366f1;
      border-bottom: 2px solid #6366f1;
      transform: rotate(45deg);
    }

    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
      40% { transform: translateX(-50%) translateY(-10px); }
      60% { transform: translateX(-50%) translateY(-5px); }
    }

    /* Sections générales */
    .container-modern {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
    }

    .section-header {
      text-align: center;
      margin-bottom: 4rem;
    }

    .section-title {
      font-size: clamp(2.5rem, 6vw, 3.5rem);
      font-weight: 700;
      margin-bottom: 1rem;
      background: linear-gradient(135deg, #6366f1, #ec4899);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .section-subtitle {
      font-size: 1.2rem;
      color: #9ca3af;
      max-width: 600px;
      margin: 0 auto;
    }

    /* Section Resume */
    .resume-section-modern {
      padding: 6rem 0;
      background: rgba(255, 255, 255, 0.02);
    }

    .resume-grid-modern {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 4rem;
    }

    .resume-block-modern {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      padding: 2rem;
      backdrop-filter: blur(10px);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .resume-block-modern:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .block-header {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 2rem;
    }

    .block-icon {
      font-size: 2rem;
    }

    .block-header h3 {
      font-size: 1.5rem;
      font-weight: 600;
      color: #e5e7eb;
    }

    .timeline {
      position: relative;
    }

    .timeline::before {
      content: '';
      position: absolute;
      left: 20px;
      top: 0;
      bottom: 0;
      width: 2px;
      background: linear-gradient(to bottom, #6366f1, #ec4899);
    }

    .timeline-item {
      position: relative;
      margin-bottom: 2rem;
      padding-left: 3rem;
    }

    .timeline-marker {
      position: absolute;
      left: 11px;
      top: 0;
      width: 20px;
      height: 20px;
      background: #6366f1;
      border-radius: 50%;
      border: 3px solid #1a1a2e;
    }

    .timeline-content {
      background: rgba(255, 255, 255, 0.03);
      border-radius: 12px;
      padding: 1.5rem;
      border: 1px solid rgba(255, 255, 255, 0.05);
    }

    .timeline-date {
      font-size: 0.9rem;
      color: #6366f1;
      font-weight: 600;
      margin-bottom: 0.5rem;
    }

    .timeline-content h4 {
      font-size: 1.1rem;
      font-weight: 600;
      margin-bottom: 0.5rem;
      color: #e5e7eb;
    }

    .timeline-content p {
      color: #9ca3af;
      line-height: 1.6;
      margin-bottom: 1rem;
    }

    .timeline-link {
      color: #6366f1;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .timeline-link:hover {
      color: #ec4899;
    }

    /* Section Skills */
    .skills-section-modern {
      padding: 6rem 0;
    }

    .skills-grid-modern {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
    }

    .skill-card-modern {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      padding: 2rem;
      text-align: center;
      backdrop-filter: blur(10px);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .skill-card-modern:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .skill-icon {
      width: 80px;
      height: 80px;
      margin: 0 auto 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .skill-icon img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    .skill-card-modern h3 {
      font-size: 1.2rem;
      font-weight: 600;
      margin-bottom: 1rem;
      color: #e5e7eb;
    }

    .skill-bar {
      width: 100%;
      height: 8px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 4px;
      margin-bottom: 0.5rem;
      overflow: hidden;
    }

    .skill-progress {
      height: 100%;
      background: linear-gradient(90deg, #6366f1, #ec4899);
      border-radius: 4px;
      transition: width 1.5s ease;
    }

    .skill-percentage {
      font-size: 0.9rem;
      color: #6366f1;
      font-weight: 600;
    }

    /* Section CTA */
    .cta-section-modern {
      padding: 6rem 0;
      background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(236, 72, 153, 0.1));
    }

    .cta-content {
      text-align: center;
      max-width: 800px;
      margin: 0 auto;
    }

    .cta-content h2 {
      font-size: clamp(2rem, 5vw, 3rem);
      font-weight: 700;
      margin-bottom: 1rem;
      color: #e5e7eb;
    }

    .cta-content p {
      font-size: 1.2rem;
      color: #9ca3af;
      margin-bottom: 2rem;
    }

    .cta-buttons {
      display: flex;
      gap: 1rem;
      justify-content: center;
      flex-wrap: wrap;
    }

    /* Responsive */
    @media (max-width: 1024px) {
      .hero-content {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 2rem;
      }

      .resume-grid-modern {
        grid-template-columns: 1fr;
        gap: 2rem;
      }

      .skills-grid-modern {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      }
    }

    @media (max-width: 768px) {
      .hero-buttons {
        flex-direction: column;
        align-items: center;
      }

      .btn-modern {
        width: 100%;
        max-width: 300px;
      }

      .cta-buttons {
        flex-direction: column;
        align-items: center;
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

    // Animation des barres de compétences
    const observerOptions = {
      threshold: 0.5
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const skillBars = entry.target.querySelectorAll('.skill-progress');
          skillBars.forEach(bar => {
            const width = bar.style.width;
            bar.style.width = '0%';
            setTimeout(() => {
              bar.style.width = width;
            }, 200);
          });
        }
      });
    }, observerOptions);

    document.querySelectorAll('.skills-grid-modern').forEach(section => {
      observer.observe(section);
    });

    // Parallax effect
    window.addEventListener('scroll', () => {
      const scrolled = window.pageYOffset;
      const parallax = document.querySelector('.hero-background');
      if (parallax) {
        const speed = scrolled * 0.5;
        parallax.style.transform = `translateY(${speed}px)`;
      }
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
