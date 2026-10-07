<?php
$active = 'home';
$page_title = 'PACE Architects & Consulting Engineers — Architecture, Interiors & Turnkey Construction in Hyderabad';
$page_desc = 'Hyderabad architecture studio for villas, homes, offices & turnkey construction. Transparent pricing from ₹1699/sq.ft. Banjara Hills.';
include __DIR__ . '/includes/header.php';
?>

<?php
$hero_slides = [];
for ($i=1; $i<=13; $i++) {
    $hero_slides[] = "assets/media/walkthrough-$i.mp4";
}
?>
<section class="hero" data-slideshow="<?= implode('|', $hero_slides) ?>">
  <div class="hero-bg" aria-hidden="true"></div>
  <div class="hero-inner">
    <span class="hero-badge"><span class="pulse"><i class="fas fa-compass-drafting"></i></span> Banjara Hills • Hyderabad — since 2010</span>
    <h1>Spaces that feel <em>inevitable.</em> Built with precision.</h1>
    <p class="lead">PACE is a multidisciplinary studio for architecture, interiors and engineering — from first sketch to handover, with clear pricing and obsessive detailing.</p>
    <div class="hero-actions">
      <a href="contact.php" class="btn btn-gold">Get a free estimate <i class="fas fa-arrow-right"></i></a>
      <a href="projects.php" class="btn btn-ghost">View projects</a>
    </div>
    <div class="hero-meta">
      <div class="hero-chip"><i class="fas fa-award"></i><div><strong>15+ years</strong><small>Design + site experience</small></div></div>
      <div class="hero-chip"><i class="fas fa-helmet-safety"></i><div><strong>Turnkey delivery</strong><small>One team, end to end</small></div></div>
      <div class="hero-chip"><i class="fas fa-handshake"></i><div><strong>Transparent pricing</strong><small>No hidden extras</small></div></div>
    </div>
  </div>
  <div class="hero-dots" role="group" aria-label="Slideshow navigation"></div>
  <div class="hero-scroll">Scroll</div>
</section>

<div class="container price-strip">
  <div class="price-grid">
    <a class="price-card reveal" data-goto-contact href="contact.php" aria-label="Enquire about construction from ₹1,699 per sq.ft">
      <div class="price-icon gold"><i class="fas fa-hammer"></i></div>
      <div><small>Construction — starts from</small><br><strong>₹1,699 <span class="price-sub">/ sq.ft</span></strong><p>Structure + finishing • branded materials • site supervision</p></div>
    </a>
    <a class="price-card reveal reveal-d1" data-goto-contact href="contact.php" aria-label="Enquire about interiors from ₹1,200 per sq.ft">
      <div class="price-icon navy"><i class="fas fa-couch"></i></div>
      <div><small>Interiors — starts from</small><br><strong>₹1,200 <span class="price-sub">/ sq.ft</span></strong><p>Modular + custom furniture • lighting • turnkey styling</p></div>
    </a>
  </div>
</div>

<section class="section">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">What we do</span>
      <h2>One studio for <em>design, structure &amp; finish.</em></h2>
      <p>No juggling architects, contractors and carpenters. PACE owns the outcome — drawings, approvals, structure, interiors.</p>
    </div>
    <div class="grid-3">
      <article class="svc reveal"><span class="svc-num">01</span><div class="svc-icon"><i class="fas fa-drafting-compass"></i></div><h3>Architecture</h3><p>Villas, residences, apartments &amp; commercial blocks — climate-responsive plans, Vastu-aligned options, approval-ready drawings.</p><a class="link" href="services.php">Explore <i class="fas fa-arrow-right"></i></a></article>
      <article class="svc reveal reveal-d1"><span class="svc-num">02</span><div class="svc-icon"><i class="fas fa-couch"></i></div><h3>Interior Design</h3><p>Homes &amp; workplaces with layered lighting, honest materials and custom furniture that ages gracefully.</p><a class="link" href="services.php">Explore <i class="fas fa-arrow-right"></i></a></article>
      <article class="svc reveal reveal-d2"><span class="svc-num">03</span><div class="svc-icon"><i class="fas fa-helmet-safety"></i></div><h3>Engineering &amp; Turnkey</h3><p>Structural design, estimation, PMC and full construction — with weekly photo updates and stage-wise billing.</p><a class="link" href="services.php">Explore <i class="fas fa-arrow-right"></i></a></article>
    </div>
  </div>
</section>

<!-- MODERN ARCHITECT SHOWCASE -->
<section class="architect-showcase">
  <div class="arch-glow"></div>
  <div class="container">
    <div class="architect-layout">
      <div class="architect-content reveal">
        <span class="eyebrow">Specially For Architects & Visionaries</span>
        <h2>Form follows <em>function &amp; feeling.</em></h2>
        <p>Architecture as an immersive discipline — parametrically driven forms, climate-responsive facades and honest structure, detailed to the last joint.</p>
        <a href="about.php" class="btn btn-gold btn-arch">Explore Our Philosophy <i class="fas fa-arrow-right"></i></a>
      </div>
      <div class="architect-visuals reveal reveal-d1">
        <div class="arch-card tall">
          <img src="assets/images/office.jpg" alt="Parametric office facade" loading="lazy" decoding="async">
        </div>
        <div class="arch-card arch-offset">
          <img src="assets/images/apartment.jpg" alt="Modernist luxury apartment" loading="lazy" decoding="async">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-tight">
  <div class="container">
    <div class="split">
      <div class="split-media reveal">
        <img class="main" src="assets/images/villa.jpg" alt="Modern villa designed by PACE" loading="lazy" decoding="async">
        <img class="small" src="assets/images/bungalow.jpg" alt="Compact modern home" loading="lazy" decoding="async">
        <div class="exp-badge"><strong><span data-count="15">15</span>+</strong><br><small>Years of practice</small></div>
      </div>
      <div class="reveal reveal-d1">
        <span class="eyebrow">Why PACE</span>
        <div class="section-head mb-18">
          <h2>Calm process. <em>Sharp detailing.</em> Zero guesswork.</h2>
          <p>We design what can actually be built — and then build what we drew. Every line is costed, every material is sampled, every slab is supervised.</p>
        </div>
        <ul class="check-list">
          <li><i class="fas fa-circle-check"></i> Approval-ready drawings, structural safety &amp; soil-aware foundations</li>
          <li><i class="fas fa-circle-check"></i> Branded materials, stage-wise payments, photo-tracked progress</li>
          <li><i class="fas fa-circle-check"></i> Vastu, ventilation &amp; light studied before 3D views — not after</li>
        </ul>
        <div class="stat-row">
          <div class="stat"><strong><span data-count="120">120</span>+</strong><span>Projects delivered</span></div>
          <div class="stat"><strong><span data-count="98" data-suffix="%">98%</span></strong><span>On-time handover</span></div>
          <div class="stat"><strong><span data-count="4.9">4.9</span>★</strong><span>Client rating</span></div>
        </div>
        <div class="split-actions">
          <a href="about.php" class="btn btn-navy">Our story</a>
          <a href="contact.php" class="btn btn-outline">Talk to an architect</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head section-head-split reveal">
      <div><span class="eyebrow">Selected work</span><h2>Recent projects, <em>real sites.</em></h2><p>A glimpse of villas, residences and workplaces across Hyderabad &amp; Telangana.</p></div>
      <a href="projects.php" class="btn btn-outline">All projects <i class="fas fa-arrow-right"></i></a>
    </div>
    <div class="work-grid">
      <article class="work reveal"><img src="assets/images/villa.jpg" alt="Hillside luxury villa" loading="lazy" decoding="async"><a class="work-arrow" href="projects.php" aria-label="View"><i class="fas fa-arrow-up-right"></i></a><div class="work-body"><span class="work-tag">Residential</span><h3>Hillside Luxury Villa</h3><p>Jubilee Hills • 6,200 sq.ft • Turnkey</p></div></article>
      <article class="work reveal reveal-d1"><img src="assets/images/office.jpg" alt="Corporate office building" loading="lazy" decoding="async"><a class="work-arrow" href="projects.php" aria-label="View"><i class="fas fa-arrow-up-right"></i></a><div class="work-body"><span class="work-tag">Commercial</span><h3>Corporate HQ Facade</h3><p>HITEC City • Architecture + Interiors</p></div></article>
      <article class="work reveal reveal-d2" id="overview-card">
        <div id="overview-media-container" style="width: 100%; height: 100%; position: absolute; inset: 0;">
          <video id="overview-video" src="assets/media/walkthrough-1.mp4" preload="none" muted playsinline style="width: 100%; height: 100%; object-fit: cover; background: #000;"></video>
          <img id="overview-img" src="" alt="Overview" style="width: 100%; height: 100%; object-fit: cover; display: none;">
        </div>
        <a class="work-arrow" href="projects.php" aria-label="View"><i class="fas fa-arrow-up-right"></i></a>
        <div class="work-body">
          <span class="work-tag">Site Update</span>
          <h3>Sites overview</h3>
          <p>Real-time progress • Quality check</p>
        </div>
        <?php
          $pl = [];
          for($i=1; $i<=13; $i++) $pl[] = ['type'=>'video', 'src'=>"assets/media/walkthrough-$i.mp4"];
          for($i=1; $i<=3; $i++) $pl[] = ['type'=>'image', 'src'=>"assets/media/project-image-$i.jpeg"];
        ?>
        <script>
          document.addEventListener('DOMContentLoaded', () => {
            const playlist = <?= json_encode($pl) ?>;
            let currentIdx = 0;
            const vid = document.getElementById('overview-video');
            const img = document.getElementById('overview-img');
            let imgTimer = null;

            function playNext() {
              currentIdx = (currentIdx + 1) % playlist.length;
              playCurrent();
            }

            function playCurrent() {
              const item = playlist[currentIdx];
              if (item.type === 'video') {
                img.style.display = 'none';
                vid.style.display = 'block';
                vid.src = item.src;
                vid.play().catch(e => {
                  // If autoplay fails, skip to next after 2s
                  setTimeout(playNext, 2000);
                });
              } else {
                vid.style.display = 'none';
                vid.pause();
                img.style.display = 'block';
                img.src = item.src;
                clearTimeout(imgTimer);
                imgTimer = setTimeout(playNext, 3500); // show image for 3.5 seconds
              }
            }

            vid.addEventListener('ended', playNext);
            
            // start initial
            vid.addEventListener('error', playNext); // skip if error
          });
        </script>
      </article>
    </div>
  </div>
</section>

<section class="section-tight">
  <div class="container">
    <div class="process reveal">
      <div class="process-inner">
        <span class="eyebrow eyebrow-dark">How we work</span>
        <div class="section-head on-dark mb-28"><h2>From plot to <em>keys</em> in 4 steps.</h2></div>
        <div class="steps">
          <div class="step"><span class="n">01</span><h4>Discover</h4><p>Site study, brief, budget &amp; Vastu inputs. Feasibility in 48 hours.</p></div>
          <div class="step"><span class="n">02</span><h4>Design</h4><p>Plans, 3Ds, structure &amp; BOQ — revised with you, not for you.</p></div>
          <div class="step"><span class="n">03</span><h4>Build</h4><p>Supervised execution, branded materials, weekly photo reports.</p></div>
          <div class="step"><span class="n">04</span><h4>Handover</h4><p>Snag-free finish, warranties, maintenance guide &amp; support.</p></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head center reveal"><span class="eyebrow">Clients</span><h2>Loved by families <em>&amp; founders.</em></h2></div>
    <div class="quotes">
      <div class="quote reveal"><div class="stars">★★★★★</div><p>“PACE gave us three plan options with costs attached. No drama, no escalation — slab by slab on WhatsApp.”</p><div class="quote-foot"><div class="avatar">R</div><div><strong>Ravi K.</strong><small>Villa owner, Gandipet</small></div></div></div>
      <div class="quote reveal reveal-d1"><div class="stars">★★★★★</div><p>“Their interiors feel quiet and premium. Lighting and woodwork detailing is a level above what we saw elsewhere.”</p><div class="quote-foot"><div class="avatar">S</div><div><strong>Sruthi M.</strong><small>Apartment interior, Financial District</small></div></div></div>
      <div class="quote reveal reveal-d2"><div class="stars">★★★★★</div><p>“Structural clarity + PMC discipline. They flagged a soil issue early and saved us lakhs. Highly professional.”</p><div class="quote-foot"><div class="avatar">A</div><div><strong>Anand &amp; team</strong><small>Commercial client, Begumpet</small></div></div></div>
    </div>

    <div class="section-head center reveal mt-28">
      <span class="eyebrow">Real Progress</span>
      <h2>Site <em>Walkthroughs.</em></h2>
      <p>Raw, unedited glimpses into our ongoing sites and finished structures.</p>
    </div>
    <div class="work-grid" style="margin-top: 2rem;">
<?php
      $walkthroughs = 13;
      for ($i = 1; $i <= $walkthroughs; $i++):
        $delay = ($i % 3 == 1) ? '' : (($i % 3 == 2) ? ' reveal-d1' : ' reveal-d2');
?>
      <article class="work reveal<?= $delay ?>" data-cat="walkthrough">
        <video src="assets/media/walkthrough-<?= $i ?>.mp4" preload="none" muted loop playsinline style="width: 100%; height: 100%; object-fit: cover; background: #000;"></video>
        <div class="work-body">
          <span class="work-tag">Site Progress</span>
          <h3>Walkthrough <?= $i ?></h3>
        </div>
      </article>
<?php endfor; ?>
      <article class="work reveal" data-cat="walkthrough">
        <img src="assets/media/project-image-1.jpeg" alt="Recent site update" loading="lazy" decoding="async">
        <div class="work-body">
          <span class="work-tag">Update</span>
          <h3>Site Image 1</h3>
        </div>
      </article>
      <article class="work reveal reveal-d1" data-cat="walkthrough">
        <img src="assets/media/project-image-2.jpeg" alt="Recent site update" loading="lazy" decoding="async">
        <div class="work-body">
          <span class="work-tag">Update</span>
          <h3>Site Image 2</h3>
        </div>
      </article>
      <article class="work reveal reveal-d2" data-cat="walkthrough">
        <img src="assets/media/project-image-3.jpeg" alt="Recent site update" loading="lazy" decoding="async">
        <div class="work-body">
          <span class="work-tag">Update</span>
          <h3>Site Image 3</h3>
        </div>
      </article>
    </div>

    <div class="cta reveal mt-28">
      <div><h2>Have a plot or floor plan? <em>Let's sketch it right.</em></h2><p>Share your site location on WhatsApp or book a 20-minute studio consult. Estimate within 48 hours.</p></div>
      <div class="cta-actions"><a href="contact.php" class="btn btn-gold">Start your project</a><a href="tel:+917981458681" class="btn btn-ghost"><i class="fas fa-phone"></i> +91 79814 58681</a></div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
