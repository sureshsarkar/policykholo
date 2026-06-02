<?php $__env->startSection('title', $data->meta_title); ?>
<?php $__env->startSection('keywords', $data->meta_keywords); ?>
<?php $__env->startSection('description', $data->meta_description); ?>
<?php $__env->startSection('logo', $data->image); ?>
<?php $__env->startSection('header-section'); ?>
<?php echo $data->header_section; ?>

<?php $__env->stopSection(); ?>
<?php
error_reporting(0);
?>
<?php $__env->startSection('footer-section'); ?>
<?php echo $data->footer_section; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('container'); ?>
<?php
$name = $insurance->name;
$bannerImage = asset('front/images/inner-banner.png');
if ($insurance->bannerImage) {
$bannerImage = asset($insurance->bannerImage);
}
?>

<!--========================inner banner section start =======================================-->



<style>
:root {
    --primary: #1040c4;
    --primary-dark: #0a2d8f;
    --primary-light: #1a55e8;
    --accent: #f5c518;
    --accent2: #00d4aa;
    --white: #ffffff;
    --light-bg: #f0f4ff;
    --text-dark: #0d1b4b;
    --text-muted: #6b7a9e;
    --card-radius: 20px;
    --shadow: 0 20px 60px rgba(16, 64, 196, 0.15);

    --primary-pale: #eef3ff;
    --teal: #00b8a9;
    --orange: #f59c1a;
    --red: #e84545;
    --green: #2ecc71;
    --yellow: #f5c518;
    --text-mid: #3d4f7c;
    --bg-page: #f5f7fc;
    --shadow-sm: 0 4px 16px rgba(16, 64, 196, 0.10);
    --shadow-md: 0 10px 36px rgba(16, 64, 196, 0.14);

}


* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

#mainNav {
    background: #0e244c;
    position: relative;
}

/* ── MAIN BANNER WRAPPER ── */
.banner-wrapper {
    /* max-width: 1200px; */
    /* width: 100%; */
    /* background: var(--white); */
    /* background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 60%, #050f33 100%); */
    /* border-radius: 28px; */
    overflow: hidden;
    box-shadow: var(--shadow);
    position: relative;
    padding: 15px 10px;
}

.hero-quote {

    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 60%, #050f33 100%);

}

/* ── LEFT HERO SECTION ── */
.hero-section {
    /* background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 60%, #050f33 100%); */
    position: relative;
    overflow: hidden;
    padding: 50px 45px 40px;
    min-height: auto;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

/* Decorative circles */
.hero-section::before {
    content: '';
    position: absolute;
    width: 420px;
    height: 420px;
    /* border-radius: 50%; */
    background: rgba(255, 255, 255, 0.04);
    top: -120px;
    right: -120px;
    pointer-events: none;
}

.hero-section::after {
    content: '';
    position: absolute;
    width: 280px;
    height: 280px;
    /* border-radius: 50%; */
    background: rgba(255, 255, 255, 0.05);
    bottom: -80px;
    left: -60px;
    pointer-events: none;
}

/* Floating dots pattern */
.dots-bg {
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle, rgba(255, 255, 255, 0.06) 1px, transparent 1px);
    background-size: 30px 30px;
    pointer-events: none;
}

.hero-top {
    position: relative;
    z-index: 2;
}



.hero-heading {
    font-family: 'Playfair Display', serif;
    color: #fff;
    font-size: clamp(28px, 3.5vw, 40px);
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 10px;
}

.hero-heading .highlight {
    color: var(--accent);
}

.hero-sub {
    color: rgba(255, 255, 255, 0.72);
    font-size: 14px;
    font-weight: 400;
    margin-bottom: 28px;
    line-height: 1.6;
}

/* Tags row */
.tag-row {
    display: flex;
    gap: 10px;
    flex-direction: column;
    margin-bottom: 32px;
    align-items: flex-start;
}

.tag {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.15);
    color: #fff;
    font-size: 12px;
    font-weight: 500;
    padding: 6px 14px;
    border-radius: 30px;
    transition: background 0.2s;
}

.tag i {
    color: var(--accent);
    font-size: 11px;
}

/* Family image card */
.family-card {
    position: relative;
    z-index: 2;
    background: rgba(255, 255, 255, 0.10);
    border: 1px solid rgba(255, 255, 255, 0.18);
    backdrop-filter: blur(12px);
    border-radius: 18px;
    padding: 20px 22px;
    display: flex;
    align-items: center;
    gap: 16px;
}

.family-icon-wrap {
    width: 64px;
    height: 64px;
    min-width: 64px;
    background: linear-gradient(135deg, var(--accent) 0%, #ffaa00 100%);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
}

.family-card-text h5 {
    color: #fff;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 3px;
}

.family-card-text p {
    color: rgba(255, 255, 255, 0.6);
    font-size: 12px;
    margin: 0;
    line-height: 1.4;
}

.family-card .shield-badge {
    margin-left: auto;
    background: var(--accent2);
    color: #fff;
    font-size: 10px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 20px;
    white-space: nowrap;
    letter-spacing: 0.5px;
}

/* Stats row */
.stats-row {
    display: flex;
    gap: 0;
    background: rgba(255, 255, 255, 0.06);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 14px;
    overflow: hidden;
    margin-top: 22px;
    position: relative;
    z-index: 2;
}

.stat-item {
    flex: 1;
    text-align: center;
    padding: 16px 10px;
    border-right: 1px solid rgba(255, 255, 255, 0.1);
}

.stat-item:last-child {
    border-right: none;
}

.stat-item .stat-num {
    color: var(--accent);
    font-size: 28px;
    font-weight: 800;
    display: block;
    margin-bottom: 2px;
}

.stat-item .stat-label {
    color: rgba(255, 255, 255, 0.6);
    font-size: 13px;
    line-height: 1.3;
}

/* Trust strip */
.trust-strip {
    background: var(--light-bg);
    border-top: 1px solid #dce6f5;
    padding: 14px 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 32px;
    flex-wrap: wrap;
    margin-top: 10px;
}

.trust-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    color: var(--text-muted);
    font-weight: 500;
}

.trust-item i {
    color: var(--primary);
    font-size: 14px;
}

/* ── RESPONSIVE ── */
@media (max-width: 991px) {
    .hero-section {
        min-height: auto;
        padding: 36px 28px 30px;
    }

    .trust-strip {
        padding: 14px 20px;
        gap: 18px;
    }
}

@media (max-width: 767px) {
    .stats-row {
        flex-direction: column;
    }

    .stat-item {
        border-right: none;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .stat-item:last-child {
        border-bottom: none;
    }

    .input-group-custom {
        flex-direction: column;
        gap: 10px;
    }

    .members-grid {
        grid-template-columns: 1fr;
    }

    .trust-strip {
        gap: 14px;
    }
}

/* Animate in */
.banner-wrapper {
    animation: fadeUp 0.6s ease both;
}

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}



/* key features start  */
.key-feature-section {
    background: #ffffff;
    padding: 50px 0;
}

.section-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--primary-pale);
    color: var(--primary);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    padding: 6px 16px;
    border-radius: 30px;
    margin-bottom: 14px;
}

.section-eyebrow i {
    font-size: 12px;
}

.section-title {
    font-family: 'Sora', sans-serif;
    font-size: clamp(22px, 3vw, 32px);
    font-weight: 800;
    color: var(--text-dark);
    line-height: 1.2;
    margin-bottom: 12px;
}

.section-title span {
    color: var(--primary);
}

.section-desc {
    color: var(--text-muted);
    font-size: 15px;
    font-weight: 500;
    max-width: 640px;
    line-height: 1.7;
    margin-bottom: 0;
}

/* ─── FEATURES TRACK ─── */
.features-bg {
    background: linear-gradient(135deg, #eef3ff 0%, #f5f7fc 60%, #e8f6f4 100%);
    border-radius: 24px;
    padding: 40px 32px 36px;
    margin-top: 36px;
    position: relative;
    overflow: hidden;
}

.features-bg::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle, rgba(16, 64, 196, 0.04) 1px, transparent 1px);
    background-size: 28px 28px;
    pointer-events: none;
}

/* Connector line behind circles */
.features-track {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    gap: 0;
}

.features-track::before {
    content: '';
    position: absolute;
    top: 56px;
    /* center of circle */
    left: 80px;
    right: 80px;
    height: 3px;
    background: linear-gradient(90deg, var(--teal), var(--orange), var(--red), var(--primary));
    border-radius: 4px;
    z-index: 0;
}

/* Each feature node */
.feat-node {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    position: relative;
    z-index: 1;
    padding: 0 8px;
    cursor: pointer;
}

.feat-circle {
    width: 110px;
    height: 110px;
    border-radius: 50%;
    background: var(--white);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 36px;
    position: relative;
    transition: transform 0.28s cubic-bezier(.34, 1.56, .64, 1), box-shadow 0.28s;
    box-shadow: var(--shadow-sm);
    margin-bottom: 16px;
}

/* Coloured ring */
.feat-circle::before {
    content: '';
    position: absolute;
    inset: -5px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: var(--ring-color);
    border-right-color: var(--ring-color);
    transition: transform 0.4s;
}

.feat-node:hover .feat-circle {
    transform: translateY(-6px) scale(1.06);
    box-shadow: 0 16px 40px rgba(16, 64, 196, 0.18);
}

.feat-node:hover .feat-circle::before {
    transform: rotate(90deg);
}

/* Active / selected state */
.feat-node.active .feat-circle {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
    box-shadow: 0 10px 30px rgba(16, 64, 196, 0.35);
}

.feat-node.active .feat-circle .feat-emoji {
    filter: brightness(10);
}

.feat-emoji {
    font-size: 34px;
    line-height: 1;
    transition: filter 0.2s;
}

.feat-label {
    font-size: 13px;
    font-weight: 700;
    color: var(--text-dark);
    line-height: 1.4;
    max-width: 100px;
    transition: color 0.2s;
}

.feat-node:hover .feat-label,
.feat-node.active .feat-label {
    color: var(--primary);
}


/* Responsive */
@media (max-width: 768px) {
    .features-track {
        flex-wrap: wrap;
        gap: 20px;
    }

    .features-track::before {
        display: none;
    }

    .feat-node {
        flex: 0 0 calc(33.33% - 14px);
    }
}

@media (max-width: 480px) {
    .feat-node {
        flex: 0 0 calc(50% - 12px);
    }
}


/* key features end */
/* policy overview section start */
.policy-overview-section {
    padding: 50px 0;
    background: #eff4ff;
}

.policy-overview-section p {
    text-align: left;
}

/* policy overview section end */

.insurance-type-section .cat-card {
    background: #eff4ff;
    border: 1px solid #c8d7f9;
}


/* how it works css start  */


.how-it-works-section {
    padding: 50px 0;
    background: var(--white);
}





/* ── LAYOUT ── */
.hiw-layout {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 56px;
    align-items: center;
    margin-top: 50px;
}

/* ── ACCORDION STEPS ── */
.steps-list {
    display: flex;
    flex-direction: column;
    gap: 0;
}

.step-item {
    border-left: 3px solid #dde6f5;
    padding: 20px 0 20px 24px;
    cursor: pointer;
    position: relative;
    transition: border-color 0.25s;
}

.step-item::before {
    /* Step number dot on the left border */
    content: attr(data-num);
    position: absolute;
    left: -14px;
    top: 20px;
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: #dde6f5;
    color: var(--text-muted);
    font-size: 11px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.25s, color 0.25s;
    line-height: 1;
    text-align: center;
    padding-top: 1px;
}

/* Active state */
.step-item.active {
    border-left-color: var(--primary);
}

.step-item.active::before {
    background: var(--primary);
    color: #fff;
}

.step-title-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
}

.step-title {
    font-family: 'Sora', sans-serif;
    font-size: 17px;
    font-weight: 700;
    color: var(--text-mid);
    transition: color 0.2s;
    margin: 0;
}

.step-item.active .step-title {
    color: var(--text-dark);
}

.step-arrow {
    width: 28px;
    height: 28px;
    min-width: 28px;
    border-radius: 50%;
    border: 2px solid #dde6f5;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-muted);
    font-size: 11px;
    transition: all 0.25s;
}

.step-item.active .step-arrow {
    background: var(--primary);
    border-color: var(--primary);
    color: #fff;
    transform: rotate(90deg);
}

/* Description – slide open */
.step-desc {
    font-size: 14px;
    color: var(--text-muted);
    font-weight: 500;
    line-height: 1.7;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.35s ease, opacity 0.3s ease, margin 0.3s;
    opacity: 0;
    margin-top: 0;
}

.step-item.active .step-desc {
    max-height: 120px;
    opacity: 1;
    margin-top: 10px;
}

/* Progress bar under active step */
.step-progress {
    height: 3px;
    background: #eef3ff;
    border-radius: 4px;
    margin-top: 14px;
    overflow: hidden;
    display: none;
}

.step-item.active .step-progress {
    display: block;
}

.step-progress-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--primary), var(--teal));
    border-radius: 4px;
    animation: fillBar 4s linear forwards;
}

@keyframes fillBar {
    from {
        width: 0;
    }

    to {
        width: 100%;
    }
}



/* ── RIGHT VISUAL PANEL ── */
.hiw-visual {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Big faint circle bg */
.visual-bg-circle {
    position: absolute;
    width: 380px;
    height: 380px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary-pale) 0%, #e0ecff 100%);
    z-index: 0;
}

/* Center card */
.visual-center-card {
    position: relative;
    z-index: 2;
    background: var(--white);
    border-radius: 24px;
    padding: 36px 32px;
    box-shadow: 0 20px 60px rgba(16, 64, 196, 0.14);
    width: 100%;
    max-width: 360px;
}

/* Active step indicator inside card */
.card-step-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--primary-pale);
    color: var(--primary);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1px;
    text-transform: uppercase;
    padding: 6px 14px;
    border-radius: 30px;
    margin-bottom: 20px;
    transition: all 0.3s;
}

.card-step-badge .badge-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--primary);
    animation: pulse 1.8s infinite;
}

@keyframes pulse {

    0%,
    100% {
        box-shadow: 0 0 0 0 rgba(16, 64, 196, 0.5);
    }

    50% {
        box-shadow: 0 0 0 7px rgba(16, 64, 196, 0);
    }
}

/* Big emoji in card */
.card-emoji-wrap {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
    border-radius: 22px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 38px;
    margin-bottom: 20px;
    box-shadow: 0 10px 28px rgba(16, 64, 196, 0.3);
    transition: all 0.3s;
}

.card-title {
    font-family: 'Sora', sans-serif;
    font-size: 18px;
    font-weight: 800;
    color: var(--text-dark);
    margin-bottom: 8px;
    transition: all 0.3s;
}

.card-desc {
    font-size: 13px;
    color: var(--text-muted);
    font-weight: 500;
    line-height: 1.65;
    margin-bottom: 22px;
    transition: all 0.3s;
}

/* Mini checklist inside card */
.card-checks {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.card-check-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 12px;
    font-weight: 600;
    color: var(--text-mid);
}

.card-check-item .chk {
    width: 20px;
    height: 20px;
    min-width: 20px;
    border-radius: 6px;
    background: #eef8f5;
    color: var(--teal);
    font-size: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

@keyframes float {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-8px);
    }
}

/* Steps dots nav */
.steps-nav {
    display: flex;
    gap: 8px;
    margin-top: 24px;
    justify-content: center;
}

.nav-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #dde6f5;
    cursor: pointer;
    transition: all 0.25s;
}

.nav-dot.active {
    width: 24px;
    border-radius: 4px;
    background: var(--primary);
}

/* Responsive */
@media (max-width: 900px) {
    .hiw-layout {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .hiw-visual {
        order: -1;
    }

    .visual-bg-circle {
        width: 280px;
        height: 280px;
    }
}

/* how it works css end */

/* key benefits start  */
.key-benefit-section {
    padding: 50px 0;
    background: #eff4ff;
}



    /* ─── CARDS GRID ─── */
    .benefits-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
    }

    /* Wide card spans 2 cols */
    .benefit-card.wide {
      grid-column: span 2;
    }

    .benefit-card {
      background: var(--white);
      border-radius: 20px;
      padding: 28px 26px;
      border: 2px solid #e5ecf8;
      position: relative;
      overflow: hidden;
      cursor: pointer;
      transition: transform .28s cubic-bezier(.34, 1.56, .64, 1),
        box-shadow .28s, border-color .28s;
    }

    .benefit-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 18px 48px rgba(16, 64, 196, .14);
      border-color: var(--card-color, var(--primary));
    }

    /* Top accent line */
    .benefit-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: var(--card-color, var(--primary));
      transform: scaleX(0);
      transform-origin: left;
      transition: transform .3s ease;
    }

    .benefit-card:hover::before {
      transform: scaleX(1);
    }

    /* Faint large icon watermark */
    .benefit-card::after {
      content: attr(data-emoji);
      position: absolute;
      bottom: -10px;
      right: 10px;
      font-size: 72px;
      opacity: .06;
      pointer-events: none;
      line-height: 1;
      transition: opacity .3s, transform .3s;
    }

    .benefit-card:hover::after {
      opacity: .10;
      transform: scale(1.1) rotate(-5deg);
    }

    /* Icon circle */
    .b-icon {
      width: 56px;
      height: 56px;
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 26px;
      margin-bottom: 18px;
      background: var(--icon-bg, var(--primary-pale));
      transition: transform .3s;
    }

    .benefit-card:hover .b-icon {
      transform: scale(1.1) rotate(-4deg);
    }

    .b-title {
      font-family: 'Sora', sans-serif;
      font-size: 16px;
      font-weight: 700;
      color: var(--text-dark);
      margin-bottom: 8px;
      line-height: 1.3;
    }

    .b-desc {
      font-size: 13px;
      color: var(--text-muted);
      font-weight: 500;
      line-height: 1.65;
    }

    /* Highlight chip inside card */
    .b-chip {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      background: var(--chip-bg, var(--primary-pale));
      color: var(--chip-txt, var(--primary));
      font-size: 11px;
      font-weight: 800;
      letter-spacing: .4px;
      padding: 4px 12px;
      border-radius: 20px;
      margin-top: 14px;
    }

    /* Wide card: horizontal layout */
    .benefit-card.wide .b-inner {
      display: flex;
      gap: 24px;
      align-items: flex-start;
    }

    .benefit-card.wide .b-icon {
      min-width: 56px;
    }

    .benefit-card.wide .b-text {
      flex: 1;
    }


    /* ─── ANIMATIONS ─── */
    .benefit-card {
      animation: fadeUp .5s both;
    }

    .benefit-card:nth-child(1) {
      animation-delay: .05s;
    }

    .benefit-card:nth-child(2) {
      animation-delay: .10s;
    }

    .benefit-card:nth-child(3) {
      animation-delay: .15s;
    }

    .benefit-card:nth-child(4) {
      animation-delay: .20s;
    }

    .benefit-card:nth-child(5) {
      animation-delay: .25s;
    }

    .benefit-card:nth-child(6) {
      animation-delay: .30s;
    }

    .benefit-card:nth-child(7) {
      animation-delay: .35s;
    }

    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(26px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* ─── RESPONSIVE ─── */
    @media (max-width: 1024px) {
      .benefits-grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .benefit-card.wide {
        grid-column: span 2;
      }
    }

    @media (max-width: 600px) {
      .benefits-grid {
        grid-template-columns: 1fr;
      }

      .benefit-card.wide {
        grid-column: span 1;
      }

      .benefit-card.wide .b-inner {
        flex-direction: column;
      }

      .stat-cell {
        border-right: none;
        border-bottom: 1px solid rgba(255, 255, 255, .12);
      }

      .stat-cell:last-child {
        border-bottom: none;
      }
    }
    
/* key benefits end */
</style>

<section class="hero-quote">
    <div class="container">
        <div class="banner-wrapper">
            <div class="row g-0">

                <!-- ══ LEFT HERO ══ -->
                <div class="col-lg-7">
                    <div class="hero-section">
                        <div class="dots-bg"></div>

                        <div class="hero-top">


                            <h2 class="hero-heading">
                                Compare the Best Health Insurance Plans in India in 60 Seconds<br />
                                
                            </h2>
                            

                            <!-- Tags -->
                            <div class="tag-row">
                                <span class="tag"><i class="fas fa-check-circle"></i> Get Up to ₹25 Lakh Health
                                    Cover</span>
                                <span class="tag"><i class="fas fa-shield-alt"></i>Premium Starting from just
                                    ₹18/day</span>
                                <span class="tag"><i class="fas fa-clock"></i> Save up to ₹75,000 in taxes under
                                    Section 80D</span>
                            </div>

                            <!-- Family card -->
                            
                        </div>

                        <!-- Stats -->
                        <div class="stats-row">
                            <div class="stat-item">
                                <span class="stat-num"><i class="fas fa-regular fa-house"></i></span>
                                <span class="stat-label">IRDAI-approved insurers</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-num"><i class="fa-solid fa-book-open-reader"></i></span>
                                <span class="stat-label">10,000+ cashless hospitals</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-num"><i class="fa-regular fa-newspaper"></i></span>
                                <span class="stat-label">Zero spam calls</span>
                            </div>
                        </div>

                    </div><!-- /hero-section -->
                </div>

                <!-- ══ RIGHT FORM ══ -->
                <div class="col-lg-5">
                    <div class="quote-card sr">
                        <div class="qc-header">
                            <div class="qc-header-tag"><i class="fas fa-bolt me-1"></i> Get Instant Quote</div>
                            <h3><?php echo e($insurance->name); ?></h3>
                            <div class="qc-header-sub">Fill in your details to view the best available plans</div>
                        </div>
                        <form id="getPolicyFromId" action="<?php echo e(route('contactPost')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="service" value="<?php echo e($insurance->id); ?>">
                            <div class="qc-body">
                                <!-- Name + Mobile -->
                                <div class="form-row-2">
                                    <div class="form-group">
                                        <div class="form-label-pl">
                                            <i class="fas fa-user"></i> Full Name <em>*</em>
                                        </div>
                                        <div class="input-wrap">
                                            <input class="form-input has-icon" type="text" placeholder="Rahul Sharma"
                                                name="name" required>
                                            <i class="fas fa-user input-icon"></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-pl">
                                            <i class="fas fa-mobile-screen"></i> Mobile <em>*</em>
                                        </div>
                                        <div class="input-wrap">
                                            <input class="form-input has-icon" type="tel" placeholder="+91 9999999999"
                                                name="mobile" required>
                                            <i class="fas fa-mobile-screen input-icon"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email + City -->
                                <div class="form-row-2">
                                    <div class="form-group">
                                        <div class="form-label-pl">
                                            <i class="fas fa-envelope"></i> Email Address (optional)
                                        </div>
                                        <div class="input-wrap">
                                            <input class="form-input has-icon" type="email" name="email"
                                                placeholder="rahul@email.com">
                                            <i class="fas fa-envelope input-icon"></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-pl">
                                            <i class="fas fa-location-dot"></i> City
                                        </div>
                                        <div class="input-wrap">
                                            <input class="form-input has-icon" type="text" name="city"
                                                placeholder="New Delhi">
                                            <i class="fas fa-location-dot input-icon"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- Message -->
                                <div class="form-group">
                                    <div class="form-label-pl">
                                        <i class="fa-regular fa-message"></i> Message
                                    </div>
                                    <div class="input-wrap">
                                        <input class="form-input has-icon" type="text" placeholder="Hello.."
                                            name="message">
                                        <i class="fa-regular fa-message input-icon"></i>
                                    </div>
                                </div>


                                <!-- Checkbox -->
                                

                                <!-- Submit -->
                                <button class="btn-submit">
                                    Submit
                                    <i class="fas fa-arrow-right fa-sm"></i>
                                </button>

                                <div class="qc-footer">
                                    <i class="fas fa-lock"></i>
                                    Your data is safe &amp; encrypted · No spam, ever
                                </div>

                            </div>

                        </form>
                    </div>
                </div>

            </div><!-- /row -->

            <!-- Trust Strip -->
            <div class="trust-strip">
                <div class="trust-item"><i class="fas fa-lock"></i> 100% Secure & Safe</div>
                <div class="trust-item"><i class="fas fa-headset"></i> 24/7 Customer Support</div>
                <div class="trust-item"><i class="fas fa-bolt"></i> Instant Policy Issuance</div>
                <div class="trust-item"><i class="fas fa-hospital"></i> 22,100+ Cashless Hospitals</div>
            </div>

        </div><!-- /banner-wrapper -->
    </div>
    <section />


    <!--========================inner banner section end =======================================-->


    <!-- ═══════════════════════════════════════  SECTION 1 – HERO QUOTE ═══════════════════════════════════════ -->


    <?php
    $Keyfeature = App\Models\KeyFeature::where('publish', 'published')->orderBy('ordering')->get();
    ?>
    <?php if($Keyfeature->count() > 0): ?>
    <!-- ═══ BENEFITS ═══ -->
    <section class="benefits" id="benefits">
        <div class="container">
            <div class="text-center mb-5 sr">
                <?php echo $data->mediumDescription; ?>

            </div>
            <div class="row g-4">
                <?php $__currentLoopData = $Keyfeature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-6 col-lg-3 sr sr-d1">
                    <div class="benefit-card bc1">
                        <i class="<?php echo e($f->icon_class); ?>"></i>
                        <h5><?php echo e($f->title); ?></h5>
                        <p><?php echo e($f->descreption); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>





    

    <section class="key-feature-section">
        <div class="container">
            
            

            <div class="text-center mb-5 sr">
                <?php echo $data->longDescription; ?>

            </div>



            <div class="features-bg">
                <div class="features-track">

                    <div class="feat-node active" onclick="setActive(this)">
                        <div class="feat-circle"><span class="feat-emoji">🏥</span></div>
                        <div class="feat-label">Best Value Plan</div>
                    </div>

                    <div class="feat-node" onclick="setActive(this)">
                        <div class="feat-circle"><span class="feat-emoji">💊</span></div>
                        <div class="feat-label">Most Comprehensive Plan </div>
                    </div>

                    <div class="feat-node" onclick="setActive(this)">
                        <div class="feat-circle"><span class="feat-emoji">🛡️</span></div>
                        <div class="feat-circle" style="display:none"></div>
                        <div class="feat-circle" style="display:none"></div>
                        <!-- fix: only one circle per node -->
                        <div class="feat-label">Lowest Premium Plan </div>
                    </div>

                    <div class="feat-node" onclick="setActive(this)">
                        <div class="feat-circle"><span class="feat-emoji">📈</span></div>
                        <div class="feat-label">Lowest Premium Plan </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    


    <!-- ═══════════════════════════════════════  SECTION 3 – POLICY DESCRIPTION  ═══════════════════════════════════════ -->
    <section class="policy-overview-section">
        <div class="container">

            <div class="text-center mb-5 sr">
                <div class="section-eyebrow"><i class="fas fa-star"></i> Policy Overview</div>

                <h2 class="sec-h mb-3">What is <em><?php echo e($insurance->name); ?>?</em></h2>
                <p>Health insurance is a structured financial safeguard that covers medical expenses arising from
                    hospitalization, illnesses, and emergencies—helping you avoid high out-of-pocket costs during
                    critical situations.</p>
                <p>By paying a fixed premium, you get access to some of the best health insurance plans in India,
                    including benefits like cashless treatment at network hospitals, pre- and post-hospitalization
                    coverage, and reimbursement for eligible medical expenses.</p>
                <p>A well-chosen health insurance policy for individuals and families ensures timely access to quality
                    healthcare without financial strain, whether planned or unexpected.</p>
                <p>With rising healthcare costs, choosing the right health insurance plan with maximum coverage and
                    benefits is essential to protect both your health and long-term financial stability.</p>

            </div>
        </div>
    </section>


    
    <section class="categories insurance-type-section" id="categories">
        <div class="container">
            <div class="text-center mb-5 sr in">
                <div class="section-eyebrow"><i class="fas fa-star"></i> Policy Types</div>
                <h2 class="section-h mb-3">Types of <em><?php echo e($insurance->name); ?></em> Plans</h2>
                <p class="section-p mx-auto">Choose the right type of plan based on your needs, family size, and
                    coverage goals.</p>
            </div>

            <div class="cat-grid">
                <div class="cat-card sr sr-d1 in">
                    
                    <div class="cat-name">Individual Health Insurance</div>
                    <div class="cat-desc">Covers a single person with a dedicated sum insured.</div>
                    <div class="cat-desc"><b>Best for:</b> Individuals who want personal coverage without sharing
                        benefits.</div>
                </div>

                <div class="cat-card sr sr-d1 in">
                    <div class="cat-name">Family Floater Plans</div>
                    <div class="cat-desc">One sum insured is shared across all family members.</div>
                    <div class="cat-desc"><b>Best for:</b>Families looking for cost-effective health insurance coverage.
                    </div>
                </div>

                <div class="cat-card sr sr-d1 in">
                    <div class="cat-name">Senior Citizen Health Insurance</div>
                    <div class="cat-desc">Designed for individuals aged 60 and above with age-specific benefits</div>
                    <div class="cat-desc"><b>Best for:</b>Parents and elderly members needing higher medical support.
                    </div>
                </div>

                <div class="cat-card sr sr-d1 in">
                    <div class="cat-name">Group Health Insurance</div>
                    <div class="cat-desc">Provided by employers for employees.</div>
                    <div class="cat-desc"><b>Best for:</b>Corporate coverage (may not be sufficient alone).</div>
                </div>
            </div>
            <p class="section-p text-center mt-3">Not sure which plan suits you? Get expert guidance instantly on
                WhatsApp and find the right plan in minutes.</p>
        </div>
    </section>
    



    
    <section class="policy-overview-section">
        <div class="container">

            <div class="text-center mb-5 sr in">
                <div class="section-eyebrow"><i class="fas fa-star"></i> Top Insurers</div>

                <h2 class="sec-h mb-3">Compare <em><?php echo e($insurance->name); ?></em>Plans from Top Insurers</h2>
                <p class="section-p mx-auto text-center ">Get real-time quotes on WhatsApp and compare health insurance
                    plans online in India based on:</p>

                <div class="partners-section sr in">
                    <div class="slider--">
                        <div class="slide-track">
                            <div class="client">
                                <img src="http://localhost/laravel-projects/policykholo/uploads/our-clients/69de37a44f482.jpg"
                                    alt="Care Health">
                            </div>
                            <div class="client">
                                <img src="http://localhost/laravel-projects/policykholo/uploads/our-clients/69de379458cff.jpg"
                                    alt="sdds">
                            </div>
                            <div class="client">
                                <img src="http://localhost/laravel-projects/policykholo/uploads/our-clients/69de361f222da.jpg"
                                    alt="ICIC">
                            </div>
                            <div class="client">
                                <img src="http://localhost/laravel-projects/policykholo/uploads/our-clients/69de3638ea678.jpg"
                                    alt="Royal Sundaram">
                            </div>
                            <div class="client">
                                <img src="http://localhost/laravel-projects/policykholo/uploads/our-clients/69de364871cd9.jpg"
                                    alt="HDFC">
                            </div>
                            <div class="client">
                                <img src="http://localhost/laravel-projects/policykholo/uploads/our-clients/69de3659d6a94.jpg"
                                    alt="Future General">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--  Top Insurers end  -->

    <!-- how it works start  -->

    <section class="how-it-works-section">
        <div class="container">
            <!-- Header -->
            <div class="text-center">
                <div class="section-eyebrow"><i class="fas fa-star"></i> How It Works</div>
                <h2 class="sec-h mb-3">Getting insured is simple and takes just a <em>few minutes</em></h2>
                <p class="section-p mx-auto text-center ">Get real-time quotes on WhatsApp and compare health insurance
                    plans online in India based on</p>
            </div>

            <div class="hiw-layout">
                <!-- LEFT: Steps -->
                <div>
                    <div class="steps-list" id="stepsList">

                        <div class="step-item active" data-num="1" data-step="0" onclick="activateStep(this)">
                            <div class="step-title-row">
                                <h3 class="step-title">Choose Your Health Cover</h3>
                                <span class="step-arrow"><i class="fas fa-chevron-right"></i></span>
                            </div>
                            <div class="step-desc">
                                Select from Individual, Family Floater, or Senior Citizen plans.
                                Customise your sum insured — from ₹3 Lakh to ₹1 Crore — based on your family's needs and
                                budget.
                            </div>
                            <div class="step-progress">
                                <div class="step-progress-fill"></div>
                            </div>
                        </div>

                        <div class="step-item" data-num="2" data-step="1" onclick="activateStep(this)">
                            <div class="step-title-row">
                                <h3 class="step-title">Add Your Members & Details</h3>
                                <span class="step-arrow"><i class="fas fa-chevron-right"></i></span>
                            </div>
                            <div class="step-desc">
                                Enter basic details for each family member — name, age, and any pre-existing conditions.
                                No lengthy paperwork. Just a quick form that takes under 2 minutes to fill.
                            </div>
                            <div class="step-progress">
                                <div class="step-progress-fill"></div>
                            </div>
                        </div>

                        <div class="step-item" data-num="3" data-step="2" onclick="activateStep(this)">
                            <div class="step-title-row">
                                <h3 class="step-title">Compare & Select Your Plan</h3>
                                <span class="step-arrow"><i class="fas fa-chevron-right"></i></span>
                            </div>
                            <div class="step-desc">
                                We instantly show you the best matching plans with transparent pricing.
                                Compare coverage, add-ons, hospital networks, and claim settlement ratios side-by-side.
                            </div>
                            <div class="step-progress">
                                <div class="step-progress-fill"></div>
                            </div>
                        </div>

                        <div class="step-item" data-num="4" data-step="3" onclick="activateStep(this)">
                            <div class="step-title-row">
                                <h3 class="step-title">Pay & Get Instant Policy</h3>
                                <span class="step-arrow"><i class="fas fa-chevron-right"></i></span>
                            </div>
                            <div class="step-desc">
                                Pay securely online via UPI, Net Banking, or Card. Your policy document is emailed
                                instantly. Coverage begins within 24 hours — no waiting, no surprises.
                            </div>
                            <div class="step-progress">
                                <div class="step-progress-fill"></div>
                            </div>
                        </div>

                    </div><!-- /steps-list -->


                </div>
                <!-- /LEFT -->

                <!-- RIGHT: Visual -->
                <div class="hiw-visual">
                    <div class="visual-bg-circle"></div>
                    <!-- Central info card -->
                    <div class="visual-center-card" id="visualCard">
                        <div class="card-step-badge">
                            <div class="badge-dot"></div>
                            <span id="cardStepLabel">Step 1 of 4</span>
                        </div>
                        <div class="card-emoji-wrap" id="cardEmoji">🏥</div>
                        <div class="card-title" id="cardTitle">Choose Your Health Cover</div>
                        <div class="card-desc" id="cardDesc">
                            Pick from Individual, Family Floater, or Senior Citizen plans with sum insured from ₹3L to
                            ₹1Cr.
                        </div>
                        <div class="card-checks" id="cardChecks">
                            <div class="card-check-item"><span class="chk"><i class="fas fa-check"></i></span>
                                Individual
                                Plans</div>
                            <div class="card-check-item"><span class="chk"><i class="fas fa-check"></i></span> Family
                                Floater Plans</div>
                            <div class="card-check-item"><span class="chk"><i class="fas fa-check"></i></span> Senior
                                Citizen Plans</div>
                        </div>
                    </div>

                    <!-- Dot nav -->
                    <div class="steps-nav" id="stepsNav">
                        <div class="nav-dot active" onclick="goToStep(0)"></div>
                        <div class="nav-dot" onclick="goToStep(1)"></div>
                        <div class="nav-dot" onclick="goToStep(2)"></div>
                        <div class="nav-dot" onclick="goToStep(3)"></div>
                    </div>
                </div>
                <!-- /RIGHT -->

            </div>
        </div>
    </section>
    <!-- how it works end -->


    <!-- Key benefits start  -->
    <section class="key-benefit-section">
        <div class="container">
            <!-- Header -->
            <div class="text-center">
                <div class="section-eyebrow"><i class="fas fa-star"></i> Key benefits</div>
                <h2 class="sec-h mb-3">Key Benefits of <em><?php echo e($insurance->name); ?></em></h2>
                <p class="section-p mx-auto text-center ">A good health insurance plan does far more than pay hospital
                    bills. Here's everything you're protected against — from day one.</p>
            </div>

            <!-- Benefits Grid -->
            <div class="benefits-grid">
                <!-- 2: Daycare Procedures -->
                <div class="benefit-card" data-emoji="💉" style="--card-color:#00b8a9; --icon-bg:#e6faf8;">
                    <div class="b-icon">💉</div>
                    <div class="b-title">500+ Daycare Procedures</div>
                    <div class="b-desc">
                        Modern treatments like cataract, dialysis, and chemotherapy that need less than 24 hrs are fully
                        covered.
                    </div>
                    <span class="b-chip" style="--chip-bg:#e6faf8; --chip-txt:#007a6e;">
                        <i class="fas fa-check" style="font-size:10px;"></i> No 24-hr Admission Needed
                    </span>
                </div>

                <!-- 3: Pre & Post Hospitalisation -->
                <div class="benefit-card" data-emoji="📋" style="--card-color:#7c3aed; --icon-bg:#f3eeff;">
                    <div class="b-icon">📋</div>
                    <div class="b-title">Pre & Post Hospitalisation</div>
                    <div class="b-desc">
                        Expenses 30 days before and 60 days after discharge — doctor visits, tests, medicines — all
                        covered.
                    </div>
                    <span class="b-chip" style="--chip-bg:#f3eeff; --chip-txt:#7c3aed;">
                        <i class="fas fa-calendar-check" style="font-size:10px;"></i> 30 + 60 Day Cover
                    </span>
                </div>



                <!-- 5: Free Health Checkup -->
                <div class="benefit-card" data-emoji="🩺" style="--card-color:#f59c1a; --icon-bg:#fff7e6;">
                    <div class="b-icon">🩺</div>
                    <div class="b-title">Free Annual Health Check-up</div>
                    <div class="b-desc">
                        Preventive care matters. Get a free comprehensive health check every year — at no extra cost to
                        you.
                    </div>
                    <span class="b-chip" style="--chip-bg:#fff7e6; --chip-txt:#c47a00;">
                        <i class="fas fa-gift" style="font-size:10px;"></i> Complimentary Every Year
                    </span>
                </div>



                <!-- 7: Tax Savings -->
                <div class="benefit-card" data-emoji="💰" style="--card-color:#e84545; --icon-bg:#fef0f0;">
                    <div class="b-icon">💰</div>
                    <div class="b-title">Tax Savings Under Sec 80D</div>
                    <div class="b-desc">
                        Save up to ₹75,000 in taxes annually on your health insurance premiums. Smart coverage that also
                        saves money.
                    </div>
                    <span class="b-chip" style="--chip-bg:#fef0f0; --chip-txt:#c0392b;">
                        <i class="fas fa-indian-rupee-sign" style="font-size:10px;"></i> Up to ₹75,000 Saved
                    </span>
                </div>

            </div>

        </div>
    </section>
    <!-- Key benefits end -->

    <!-- ═══════════════════════════════════════  SECTION 3 – POLICY DESCRIPTION  ═══════════════════════════════════════ -->
    <section class="policy-desc-section">
        <div class="container">

            <div class="text-center mb-5 sr">
                <div class="eyebrow"><span class="dot"></span> Policy Overview</div>
                <h2 class="sec-h mb-3">Understanding <em><?php echo e($insurance->name); ?></em></h2>
                <?php echo $insurance->shortDescription; ?>

            </div>
        </div>
    </section>


    <!-- Scripts -->
    <script>
    /* Car plate input formatting */
    let plateInput = document.querySelector('.car-input');
    if (plateInput) {
        plateInput.addEventListener('input', function() {
            this.value = this.value.toUpperCase().replace(/[^A-Z0-9\s]/g, '');
        });
    }
    </script>


    <script>
    // Member card toggle
    document.querySelectorAll('.member-card').forEach(card => {
        card.addEventListener('click', () => {
            card.classList.toggle('active');
        });
    });

    // Pincode validation visual
    const pincodeInput = document.querySelector('input[maxlength="6"]');
    const errMsg = document.querySelector('.error-msg');
    pincodeInput.addEventListener('input', () => {
        if (pincodeInput.value.length === 6 && /^\d+$/.test(pincodeInput.value)) {
            errMsg.style.display = 'none';
            pincodeInput.style.borderColor = '#00d4aa';
        } else {
            errMsg.style.display = 'flex';
            pincodeInput.style.borderColor = '';
        }
    });
    </script>




    <script>
    const stepData = [{
            emoji: '🏥',
            label: 'Step 1 of 4',
            title: 'Choose Your Health Cover',
            desc: 'Pick from Individual, Family Floater, or Senior Citizen plans with sum insured from ₹3L to ₹1Cr.',
            //   checks: ['Individual Plans', 'Family Floater Plans', 'Senior Citizen Plans']
        },
        {
            emoji: '📝',
            label: 'Step 2 of 4',
            title: 'Add Members & Details',
            desc: 'Enter basic info for each family member in under 2 minutes. No lengthy paperwork required.',
            //   checks: ['Name & Age', 'Pre-existing Conditions', 'Pincode & Contact']
        },
        {
            emoji: '🔍',
            label: 'Step 3 of 4',
            title: 'Compare & Select Plan',
            desc: 'Side-by-side comparison of top plans — coverage, premiums, hospital network & claim ratios.',
            //   checks: ['Coverage Comparison', 'Hospital Network', 'Claim Settlement Ratio']
        },
        {
            emoji: '🎉',
            label: 'Step 4 of 4',
            title: 'Pay & Get Instant Policy',
            desc: 'Pay via UPI, Card or Net Banking. Policy document emailed instantly. Coverage starts in 24hrs.',
            //   checks: ['UPI / Card / Net Banking', 'Instant Email Delivery', 'Coverage in 24 Hours']
        }
    ];

    function updateCard(idx) {
        const d = stepData[idx];
        document.getElementById('cardStepLabel').textContent = d.label;
        document.getElementById('cardEmoji').textContent = d.emoji;
        document.getElementById('cardTitle').textContent = d.title;
        document.getElementById('cardDesc').textContent = d.desc;

        const checksEl = document.getElementById('cardChecks');
        checksEl.innerHTML = d.checks.map(c =>
            `<div class="card-check-item"><span class="chk"><i class="fas fa-check"></i></span> ${c}</div>`
        ).join('');

        // nav dots
        document.querySelectorAll('.nav-dot').forEach((dot, i) => {
            dot.classList.toggle('active', i === idx);
        });

        // card pop
        const card = document.getElementById('visualCard');
        card.style.transform = 'scale(0.97)';
        setTimeout(() => {
            card.style.transform = 'scale(1)';
            card.style.transition = 'transform 0.25s';
        }, 50);
    }

    function activateStep(el) {
        document.querySelectorAll('.step-item').forEach(s => s.classList.remove('active'));
        el.classList.add('active');

        // restart progress bar animation
        const bar = el.querySelector('.step-progress-fill');
        bar.style.animation = 'none';
        bar.offsetHeight;
        bar.style.animation = 'fillBar 4s linear forwards';

        const idx = parseInt(el.dataset.step);
        updateCard(idx);
    }

    function goToStep(idx) {
        const steps = document.querySelectorAll('.step-item');
        activateStep(steps[idx]);
    }

    // Auto-advance every 4s
    let current = 0;
    setInterval(() => {
        current = (current + 1) % 4;
        goToStep(current);
    }, 4500);
    </script>



    <?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\installed-softwares\xampp-8.2.12\htdocs\laravel-projects\policykholo\projects\resources\views/front/static/policy-detail.blade.php ENDPATH**/ ?>