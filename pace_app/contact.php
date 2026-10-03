<?php
require_once 'database.php';

$message_status = "";
$status_type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $topic = trim($_POST['topic'] ?? 'General enquiry');
    $message = trim($_POST['message'] ?? '');

    if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($message)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO messages (name, email, phone, message) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $email, $phone, "[$topic] " . $message]);
            $message_status = "Thank you, " . htmlspecialchars($name) . ". Your message has been received — we'll reply within one working day.";
            $status_type = "ok";
        } catch (PDOException $e) {
            $message_status = "Something went wrong while sending your message. Please call us directly.";
            $status_type = "err";
        }
    } else {
        $message_status = "Please add your name, a valid email and a short message so we can respond helpfully.";
        $status_type = "warn";
    }
}

$active = 'contact';
$page_title = 'Contact — Get a Quote | PACE Architects';
$page_desc = 'Contact PACE Architects Hyderabad for architecture, interiors and construction quotes. Banjara Hills studio, quick response.';
require __DIR__ . '/includes/header.php';

if (!function_exists('old')) {
function old($k) {
    global $status_type;
    if ($status_type === 'ok') return '';
    return htmlspecialchars($_POST[$k] ?? '');
}
}
?>

<section class="page-hero">
  <div class="page-hero-bg" style="background-image:url('assets/images/bungalow.jpg')"></div>
  <div class="container">
    <div class="crumbs"><a href="index.php">Home</a> &nbsp;/&nbsp; Contact</div>
    <h1>Tell us about <em>your project.</em></h1>
    <p>Share a few details and we'll respond with next steps, a consultation slot and a realistic budget range.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="grid-3 reveal mb-20">
      <div class="svc svc--static"><div class="svc-icon"><i class="fas fa-location-dot"></i></div><h3>Visit the studio</h3><p>Protons Parkside Residency, Apt B1, 8-2-468/A/1, Road #5, Banjara Hills, Hyderabad — 500 034</p></div>
      <div class="svc svc--static reveal-d1"><div class="svc-icon"><i class="fas fa-phone"></i></div><h3>Call us</h3><p><a class="link" href="tel:+917981458681">+91 79814 58681</a><br><a class="link" href="tel:+919399946436">+91 93999 46436</a><br><span class="inline-form-note">Mon–Sat, 10am–7pm</span></p></div>
      <div class="svc svc--static reveal-d2"><div class="svc-icon"><i class="fas fa-envelope"></i></div><h3>Write to us</h3><p><a class="link" href="mailto:pacearceng20@gmail.com">pacearceng20@gmail.com</a><br><a class="link" href="https://instagram.com/pacearceeng" target="_blank" rel="noopener">@pacearceeng on Instagram</a></p></div>
    </div>

    <div class="contact-grid reveal">
      <div class="info-card">
        <h3>What happens next?</h3>
        <p>No pushy sales. We listen, assess feasibility and suggest the leanest scope that meets your goal.</p>
        <div class="info-row"><i class="fas fa-clock"></i><div><strong>Response within 24 hours</strong><span>On working days, usually much faster.</span></div></div>
        <div class="info-row"><i class="fas fa-ruler-combined"></i><div><strong>Bring what you have</strong><span>Plot dimensions, floor plan, photos or reference links — all useful.</span></div></div>
        <div class="info-row"><i class="fas fa-indian-rupee-sign"></i><div><strong>Honest budget guidance</strong><span>Construction from ₹1,699/sq.ft · Interiors from ₹1,200/sq.ft.</span></div></div>
      </div>

      <div class="form-card">
        <h3>Request a callback</h3>
        <p>Fields marked * are required. The more context you share, the sharper our reply.</p>
        <?php if ($message_status): ?>
          <div class="alert <?= $status_type ?>" role="status"><?= $message_status ?></div>
        <?php endif; ?>
        <form action="contact.php" method="POST" novalidate>
          <div class="f-grid">
            <div class="field">
              <label for="name">Full name *</label>
              <input type="text" id="name" name="name" required autocomplete="name" placeholder="e.g. Ananya Reddy" value="<?= old('name') ?>">
            </div>
            <div class="field">
              <label for="phone">Phone</label>
              <input type="tel" id="phone" name="phone" autocomplete="tel" placeholder="+91 …" value="<?= old('phone') ?>">
            </div>
          </div>
          <div class="f-grid">
            <div class="field">
              <label for="email">Email *</label>
              <input type="email" id="email" name="email" required autocomplete="email" placeholder="you@example.com" value="<?= old('email') ?>">
            </div>
            <div class="field">
              <label for="topic">I'm interested in</label>
              <select id="topic" name="topic">
                <?php
                $topics = ['New villa / house','Apartment interiors','Office / commercial','Turnkey construction','General enquiry'];
                $sel = $_POST['topic'] ?? 'General enquiry';
                foreach ($topics as $t) {
                    $s = ($sel === $t) ? ' selected' : '';
                    echo '<option value="' . htmlspecialchars($t) . '"' . $s . '>' . htmlspecialchars($t) . '</option>';
                }
                ?>
              </select>
            </div>
          </div>
          <div class="field">
            <label for="message">About your project *</label>
            <textarea id="message" name="message" rows="5" required placeholder="Location, size (e.g. 200 sq.yd plot / 3BHK), timeline, budget range…"><?= old('message') ?></textarea>
          </div>
          <button class="btn btn-navy btn-full" type="submit">Send message <i class="fas fa-paper-plane"></i></button>
          <p class="form-note">By submitting, you agree to be contacted about your enquiry. We never share your details.</p>
        </form>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
