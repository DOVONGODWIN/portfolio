<footer class="site-footer">
    <div class="footer-content">
      <!-- Logo -->
      <div class="footer-logo">
        <img src="assets/images/logo.png" alt="Logo" />
      </div>
  
      <!-- Navigation -->
      <ul class="footer-nav">
        <li><a href="./">Accueil</a></li>
        <li><a href="realisations.php">Réalisations</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
  
      <!-- Copyright -->
      <p class="footer-copy">© <?php echo date('Y'); ?> Godwin Dovon</p>
    </div>
  </footer>

  <style>
    .site-footer {
      background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(236, 72, 153, 0.1));
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      padding: 3rem 0;
      margin-top: 4rem;
    }

    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
      display: grid;
      grid-template-columns: 1fr 2fr 1fr;
      gap: 2rem;
      align-items: center;
    }

    .footer-logo img {
      height: 60px;
      width: auto;
      filter: brightness(0) invert(1);
      transition: transform 0.3s ease;
    }

    .footer-logo img:hover {
      transform: scale(1.1);
    }

    .footer-nav {
      list-style: none;
      display: flex;
      gap: 2rem;
      justify-content: center;
    }

    .footer-nav a {
      color: #9ca3af;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
      position: relative;
    }

    .footer-nav a:hover {
      color: #6366f1;
    }

    .footer-nav a::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 0;
      height: 2px;
      background: linear-gradient(90deg, #6366f1, #ec4899);
      transition: width 0.3s ease;
    }

    .footer-nav a:hover::after {
      width: 100%;
    }

    .footer-copy {
      color: #6b7280;
      text-align: right;
      font-size: 0.9rem;
    }

    @media (max-width: 768px) {
      .footer-content {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 1.5rem;
      }

      .footer-nav {
        flex-direction: column;
        gap: 1rem;
      }

      .footer-copy {
        text-align: center;
      }
    }
  </style>
</body>
</html>
