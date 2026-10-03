<?php
$active = 'projects';
$page_title = 'Projects — Villas, Homes & Workplaces | PACE Hyderabad';
$page_desc = 'Selected architecture and interior projects by PACE — villas, apartments, offices across Hyderabad.';
include __DIR__ . '/includes/header.php';
?>
<section class="page-hero">
  <div class="page-hero-bg" style="background-image:url('assets/images/bungalow.jpg')"></div>
  <div class="container">
    <div class="crumbs"><a href="index.php">Home</a> &nbsp;/&nbsp; Projects</div>
    <h1>Work that <em>holds light well.</em></h1>
    <p>Filter by type — every image is a real PACE design direction. Full case studies shared on consult.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="filters reveal">
      <button class="on" data-filter="all">All</button>
      <button data-filter="residential">Residential</button>
      <button data-filter="commercial">Commercial</button>
      <button data-filter="housing">Housing</button>
      <button data-filter="interior">Interiors</button>
    </div>
    <div class="work-grid">
      <article class="work reveal" data-cat="residential"><img src="assets/images/villa.jpg" alt="Luxury villa" loading="lazy" decoding="async"><span class="work-arrow" aria-hidden="true"><i class="fas fa-arrow-up-right"></i></span><div class="work-body"><span class="work-tag">Residential</span><h3>Hillside Luxury Villa</h3><p>Jubilee Hills • 6,200 sq.ft • Design + Build</p></div></article>
      <article class="work reveal reveal-d1" data-cat="commercial"><img src="assets/images/office.jpg" alt="Office tower" loading="lazy" decoding="async"><span class="work-arrow" aria-hidden="true"><i class="fas fa-arrow-up-right"></i></span><div class="work-body"><span class="work-tag">Commercial</span><h3>Corporate HQ</h3><p>HITEC City • Facade + Workplace</p></div></article>
      <article class="work reveal reveal-d2" data-cat="housing"><img src="assets/images/apartment.jpg" alt="Apartment tower" loading="lazy" decoding="async"><span class="work-arrow" aria-hidden="true"><i class="fas fa-arrow-up-right"></i></span><div class="work-body"><span class="work-tag">Housing</span><h3>The Novo Residences</h3><p>Kokapet • 42 units • Architecture</p></div></article>
      <article class="work reveal" data-cat="residential"><img src="assets/images/bungalow.jpg" alt="Courtyard bungalow" loading="lazy" decoding="async"><span class="work-arrow" aria-hidden="true"><i class="fas fa-arrow-up-right"></i></span><div class="work-body"><span class="work-tag">Residential</span><h3>Courtyard Bungalow</h3><p>Shamshabad • 3,400 sq.ft • Vastu-aligned</p></div></article>
      <article class="work reveal reveal-d1" data-cat="interior"><img src="assets/images/banner.jpeg" alt="Warm minimal home interior detail" loading="lazy" decoding="async"><span class="work-arrow" aria-hidden="true"><i class="fas fa-arrow-up-right"></i></span><div class="work-body"><span class="work-tag">Interiors</span><h3>Warm Minimal Home</h3><p>Financial District • 2,100 sq.ft • Full home</p></div></article>
      <article class="work reveal reveal-d2" data-cat="interior"><img src="assets/images/office.jpg" alt="Office interior" loading="lazy" decoding="async"><span class="work-arrow" aria-hidden="true"><i class="fas fa-arrow-up-right"></i></span><div class="work-body"><span class="work-tag">Interiors</span><h3>Studio Workplace</h3><p>Banjara Hills • 4,800 sq.ft • Fit-out</p></div></article>
    </div>
    <div class="cta reveal mt-28">
      <div><h2>Like this language? <em>Let's adapt it to your plot.</em></h2><p>Share site photos + requirements. Moodboards and fee proposal within 48 hours.</p></div>
      <div class="cta-actions"><a href="contact.php" class="btn btn-gold">Discuss your site</a></div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
