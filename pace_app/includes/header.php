<?php
// Shared header. Expects: $page_title, $page_desc, $active (home|about|services|projects|contact)
$active = $active ?? 'home';
$page_title = $page_title ?? 'PACE Architects & Consulting Engineers — Hyderabad';
$page_desc = $page_desc ?? 'PACE Architects & Consulting Engineers, Banjara Hills Hyderabad — architecture, interiors, engineering, turnkey construction.';
if (!function_exists('navCls')) { function navCls($k, $active) { return $k === $active ? 'active' : ''; } }
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($page_title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($page_desc) ?>">
  <meta name="theme-color" content="#060D26">
  <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($page_desc) ?>">
  <meta property="og:type" content="website">
  <meta property="og:image" content="assets/images/villa.jpg">
  <link rel="icon" type="image/jpeg" href="assets/images/logo.jpeg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;1,9..144,400;1,9..144,500&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>
<div class="topbar">
  <div class="container">
    <div class="topbar-left">
      <span><i class="fas fa-location-dot"></i> Banjara Hills, Hyderabad — 500 034</span>
      <span class="dot">•</span>
      <a href="mailto:pacearceng20@gmail.com"><i class="fas fa-envelope"></i> pacearceng20@gmail.com</a>
    </div>
    <div class="topbar-right">
      <a href="tel:+917981458681"><i class="fas fa-phone"></i> +91 79814 58681</a>
      <a href="https://instagram.com/pacearceeng" target="_blank" rel="noopener"><i class="fab fa-instagram"></i> @pacearceeng</a>
    </div>
  </div>
</div>

<header class="site-header">
  <div class="container header-inner">
    <a class="brand" href="index.php" aria-label="PACE home">
      <img class="brand-logo" src="assets/images/logo.jpeg" alt="PACE logo">
      <span class="brand-text"><strong>PACE</strong><span>Architects &amp; Engineers</span></span>
    </a>
    <nav class="main-nav" id="primary-menu" aria-label="Primary">
      <ul class="nav-links">
        <li><a class="<?= navCls('home',$active) ?>" href="index.php">Home</a></li>
        <li><a class="<?= navCls('about',$active) ?>" href="about.php">About</a></li>
        <li><a class="<?= navCls('services',$active) ?>" href="services.php">Services</a></li>
        <li><a class="<?= navCls('projects',$active) ?>" href="projects.php">Projects</a></li>
        <li><a class="<?= navCls('contact',$active) ?>" href="contact.php">Contact</a></li>
      </ul>
    </nav>
    <div class="header-cta">
      <a href="contact.php" class="btn btn-navy btn-sm">Get a Quote <i class="fas fa-arrow-right"></i></a>
      <button type="button" class="menu-btn" aria-label="Toggle menu" aria-expanded="false" aria-controls="primary-menu"><span></span><span></span><span></span></button>
    </div>
  </div>
</header>
<main id="main">
