<?php
session_start();

// Check if dark mode is enabled and set session variable
if (!isset($_SESSION['dark_mode'])) {
    $_SESSION['dark_mode'] = 'false'; // default to light mode
}

if (isset($_GET['toggle_dark_mode'])) {
    $_SESSION['dark_mode'] = ($_SESSION['dark_mode'] == 'true') ? 'false' : 'true';
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$darkModeClass = $_SESSION['dark_mode'] == 'true' ? 'dark' : 'light';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/style.css">
  <title>ArmWrestler</title>
</head>

<body class="<?= $darkModeClass ?>">

  <!-- Header -->
  <header class="header <?= $darkModeClass ?>">
    <div class="logo">
      <h1>ArmWrestler</h1>
    </div>

    <button class="nav-toggle-button" onclick="document.querySelector('.nav-container').classList.toggle('open')">
      <span class="burger-icon <?= $darkModeClass ?>">&#9776;</span> <!-- Burger icon character -->
    </button>

    <div class="nav-container">
      <nav class="nav <?= $darkModeClass ?>">
        <a href="home.php" class="nav-link">Home</a>
        <a href="details.php" class="nav-link">Details</a>
        <a href="register.php" class="nav-link">Register</a>
        <a href="login.html" class="nav-link">Login</a>
        <a href="?toggle_dark_mode=true" class="toggle-button">
          <?= $_SESSION['dark_mode'] == 'true' ? '🌙' : '☀️' ?>
        </a>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="main-content">
    <section class="hero <?= $darkModeClass ?>">
      <h2>Welcome to Our Arm Wrestling Sport Event</h2>
      <p>Be Healthy, Stay Positive, Strong Arm, Strong Mind.</p>
      <button class="cta-button">Get Started</button>
    </section>

    <section class="hero <?= $darkModeClass ?>">
      <h2>Welcome to Our Arm Wrestling Sport Event</h2>
      <p>
      Arm wrestling is a competitive sport that tests strength, technique, and endurance, pitting two opponents against each other in a contest of raw power. The goal is simple: force your opponent's hand and wrist to touch the surface, usually a table, with the arm locked in a specific position. While it may appear to be just about brute strength, arm wrestling also involves leverage, body mechanics, and strategy. Proper technique can often overcome pure muscle power, as skilled athletes know how to use their body to generate force and position their opponent for weakness. The sport is popular in many countries, with both professional competitions and casual matches held in various settings, from local bars to global tournaments. Arm wrestling has a unique appeal, blending athleticism with a personal challenge, where each match feels like a test of will and determination.
      </p>
    </section>
  </main>

  <!-- Footer -->
  <footer class="footer <?= $darkModeClass ?>">
    <p>&copy; 2024 ArmWrestler. All Rights Reserved.</p>
  </footer>

  <script>
    // JavaScript to handle responsive navigation toggle
    document.querySelector('.nav-toggle-button').addEventListener('click', function () {
      document.querySelector('.nav-container').classList.toggle('open');
    });
  </script>

</body>

</html>
