@extends('front.layouts.master')
@section('title', $data->meta_title)
@section('keywords', $data->meta_keywords)
@section('description', $data->meta_description)
@section('logo', $data->image)
@section('header-section')
{!! $data->header_section !!}
@stop
<?php
error_reporting(0);
?>
@section('footer-section')
{!! $data->footer_section !!}
@stop
@section('container')
@php
$name = $insurance->name;
$bannerImage = asset('front/images/inner-banner.png');
if ($insurance->bannerImage) {
$bannerImage = asset($insurance->bannerImage);
}
@endphp

<!--========================inner banner section start =======================================-->

{{-- @include('front.layouts.banner') --}}

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

/* How to Choose css start  */

.insurance-section {
    padding: 50px 0;
    background: #f8fafc;
}

.section-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 16px;
    border-radius: 50px;
    background: #eef3ff;
    color: var(--primary);
    font-weight: 700;
    font-size: 14px;
    border: 1px solid #d0deff;
}

.section-title {
    font-family: 'Sora', sans-serif;
    font-weight: 800;
    font-size: clamp(2rem, 4vw, 3.5rem);
    line-height: 1.2;
    margin-top: 20px;
}

.section-title span {
    color: var(--primary);
}

.section-description {
    max-width: 750px;
    margin: auto;
    color: var(--text-muted);
    font-size: 17px;
    line-height: 1.8;
}

.insurance-card {
    background: #fff;
    border-radius: 24px;
    padding: 28px;
    border: 1px solid #e8edf7;
    height: 100%;
    position: relative;
    overflow: hidden;
    transition: all .35s ease;
    box-shadow: 0 10px 25px rgba(0, 0, 0, .04);
}

.insurance-card::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 5px;
    height: 100%;
    background: var(--card-color);
    transform: scaleY(0);
    transform-origin: top;
    transition: .35s;
}

.insurance-card:hover::before {
    transform: scaleY(1);
}

.insurance-card:hover {
    transform: translateY(-8px);
    border-color: var(--card-color);
    box-shadow: 0 20px 45px rgba(0, 0, 0, .08);
}

.step-number {
    width: 60px;
    height: 60px;
    min-width: 60px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 22px;
    color: var(--card-color);
    background: var(--card-bg);
    transition: .3s;
}

.insurance-card:hover .step-number {
    background: var(--card-color);
    color: #fff;
    transform: rotate(-5deg);
}

.card-title {
    font-family: 'Sora', sans-serif;
    font-weight: 700;
    font-size: 18px;
    margin-bottom: 10px;
}

.card-description {
    color: var(--text-muted);
    line-height: 1.7;
    font-size: 15px;
}



.check-icon {
    position: absolute;
    right: 20px;
    top: 20px;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: 2px solid #e5e7eb;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #cbd5e1;
    transition: .3s;
}

.insurance-card:hover .check-icon {
    background: var(--card-color);
    border-color: var(--card-color);
    color: #fff;
}

@media(max-width:768px) {

    .insurance-section {
        padding: 60px 0;
    }

    .insurance-card {
        padding: 22px;
    }

    .step-number {
        width: 50px;
        height: 50px;
        min-width: 50px;
        font-size: 18px;
    }

    .card-title {
        font-size: 16px;
    }

}

/* How to Choose css end */


/* claim process start  */
.claims-section {
    padding: 50px 0;
    background: #eff4ff;
}




.section-title {
    font-family: 'Sora', sans-serif;
    font-weight: 800;
    margin-top: 20px;
    margin-bottom: 15px;
    font-size: clamp(2rem, 4vw, 3.5rem);
}

.section-title span {
    color: #1040c4;
}

.section-description {
    max-width: 700px;
    margin: auto;
    color: #6c757d;
    line-height: 1.8;
}

.nav-pills .nav-link {
    border-radius: 50px;
    padding: 12px 24px;
    font-weight: 700;
    color: #1040c4;
    border: 1px solid #c3cff0;
}

.nav-pills .nav-link.active {
    background: #1040c4;
}

.nav-pills .nav-link.hover {
    background: #e3ebfd;
}

.claim-card {
    background: #fff;
    border-radius: 24px;
    padding: 30px 25px;
    text-align: center;
    height: 100%;
    border: 1px solid #e8edf7;
    transition: .35s;
    box-shadow: 0 10px 25px rgba(0, 0, 0, .04);
}

.claim-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(16, 64, 196, .12);
}

.icon-box {
    width: 80px;
    height: 80px;
    margin: auto;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    margin-bottom: 20px;
}

.bg-primary-subtle {
    background-color: #cfe2ff !important;
}

.bg-info-subtle {
    background-color: #cef3fb !important;
}

.bg-warning-subtle {
    background-color: #fdf1cb !important;
}

.bg-success-subtle {
    background-color: #cde3d9 !important;
}



.claim-card h5 {
    font-weight: 700;
    margin-bottom: 12px;
}

.claim-card p {
    color: #6c757d;
    margin-bottom: 0;
    line-height: 1.7;
}



@media (max-width: 768px) {
    .claims-section {
        padding: 60px 0;
    }

    .claim-card {
        padding: 24px 20px;
    }

    .icon-box {
        width: 70px;
        height: 70px;
        font-size: 28px;
    }
}

.step-badge-claim {
    color: #1040c4 !important;
    background: #cfe2ff;
    padding: 5px 14px;
    border-radius: 24px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 500;
    display: inline-block;
}

/* claim process end  */

/* testimonial section css start  */

/* ── HEADER ── */
.eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--primary-pale);
    color: var(--primary);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.1px;
    text-transform: uppercase;
    padding: 5px 14px;
    border-radius: 30px;
    margin-bottom: 16px;
}

.section-title {
    font-size: clamp(28px, 4vw, 42px);
    font-weight: 800;
    line-height: 1.15;
    color: var(--text-dark);
    margin-bottom: 12px;
}

.section-title span {
    color: var(--primary);
}

.section-sub {
    color: var(--text-muted);
    font-size: 16px;
    font-weight: 400;
    max-width: 480px;
    line-height: 1.7;
}

/* ── MARQUEE WRAPPER ── */
.marquee-section {
    margin-top: 56px;
    position: relative;
}

/* Edge fade overlays */
.marquee-section::before,
.marquee-section::after {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    width: 220px;
    z-index: 10;
    pointer-events: none;
}

.marquee-section::before {
    left: 0;
    background: linear-gradient(to right, #fff 0%, transparent 100%);
}

.marquee-section::after {
    right: 0;
    background: linear-gradient(to left, #fff 0%, transparent 100%);
}

/* Row container — hides overflow */
.marquee-row {
    overflow: hidden;
    margin-bottom: 20px;
}

.marquee-row:last-child {
    margin-bottom: 0;
}

/* The scrolling track */
.marquee-track {
    display: flex;
    gap: 20px;
    width: max-content;
    will-change: transform;
}

/* Row 1: left */
.marquee-row-1 .marquee-track {
    animation: scrollLeft 55s linear infinite;
}

/* Row 2: right */
.marquee-row-2 .marquee-track {
    animation: scrollRight 60s linear infinite;
}

/* Pause on hover */
.marquee-row:hover .marquee-track {
    animation-play-state: paused;
}

@keyframes scrollLeft {
    0% {
        transform: translateX(0);
    }

    100% {
        transform: translateX(-50%);
    }
}

@keyframes scrollRight {
    0% {
        transform: translateX(-50%);
    }

    100% {
        transform: translateX(0);
    }
}

/* ── TESTIMONIAL CARD ── */
.t-card {
    width: 340px;
    min-width: 340px;
    background: #fff;
    border: 1.5px solid var(--card-border);
    border-radius: 20px;
    padding: 22px 22px 18px;
    box-shadow: var(--card-shadow);
    transition: transform .3s ease, box-shadow .3s ease, border-color .3s;
    cursor: default;
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.t-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--card-shadow-hover);
    border-color: #dde9ff;
}

/* Card top row */
.t-card-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.t-user {
    display: flex;
    align-items: center;
    gap: 11px;
}

/* Avatar */
.t-avatar {
    width: 42px;
    height: 42px;
    min-width: 42px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    font-weight: 700;
    background: var(--avatar-bg);
    color: var(--avatar-txt);
    letter-spacing: .5px;
}

.t-name {
    font-size: 14px;
    font-weight: 700;
    color: var(--text-dark);
    line-height: 1.2;
    margin-bottom: 1px;
}

.t-handle {
    font-size: 12px;
    color: var(--text-muted);
    font-weight: 400;
}

/* X icon */
.x-icon {
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.x-icon svg {
    width: 18px;
    height: 18px;
    fill: #000;
    opacity: .75;
}

/* Quote text */
.t-text {
    font-size: 14px;
    color: var(--text-mid);
    line-height: 1.7;
    font-weight: 400;
    flex: 1;
}

.t-text .mention {
    color: var(--primary);
    font-weight: 500;
}

/* Stars */
.t-stars {
    color: #f5c518;
    font-size: 13px;
    letter-spacing: 1px;
}

/* Date */
.t-date {
    font-size: 11px;
    color: var(--text-muted);
    font-weight: 400;
    padding-top: 4px;
    border-top: 1px solid #f5f5f5;
}

/* ── BOTTOM TRUST BAR ── */
.trust-bar {
    margin-top: 56px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    gap: 32px;
}

.trust-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    font-weight: 600;
    color: var(--text-muted);
}

.trust-item .t-num {
    font-size: 20px;
    font-weight: 800;
    color: var(--text-dark);
}

.trust-divider {
    width: 1px;
    height: 32px;
    background: #e5e7eb;
}

/* Avatar colour variants */
.av-blue {
    background: #dbeafe;
    color: #1d4ed8;
}

.av-teal {
    background: #ccfbf1;
    color: #0f766e;
}

.av-purple {
    background: #ede9fe;
    color: #7c3aed;
}

.av-green {
    background: #dcfce7;
    color: #15803d;
}

.av-orange {
    background: #ffedd5;
    color: #c2410c;
}

.av-pink {
    background: #fce7f3;
    color: #be185d;
}

.av-indigo {
    background: #e0e7ff;
    color: #4338ca;
}

.av-amber {
    background: #fef9c3;
    color: #b45309;
}

/* testimonial section css end  */
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
                                {{-- <span class="highlight">Health Insurance</span> --}}
                            </h2>
                            {{-- <p class="hero-sub">
            Save <strong style="color:#fff">18%</strong> with Zero GST &nbsp;•&nbsp;
            Up to <strong style="color:#fff">30%</strong> Renewal Discount**
          </p> --}}

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
                            {{-- <div class="family-card">
                                    <div class="family-icon-wrap">🛡️</div>
                                    <div class="family-card-text">
                                    <h5>Complete Family Coverage</h5>
                                    <p>Self · Spouse · Son · Daughter<br/>& More Relationships</p>
                                    </div>
                                    <span class="shield-badge">IRDAI Approved</span>
                                </div> --}}
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
                            <h3>{{ $insurance->name }}</h3>
                            <div class="qc-header-sub">Fill in your details to view the best available plans</div>
                        </div>
                        <form id="getPolicyFromId" action="{{ route('contactPost') }}" method="post">
                            @csrf
                            <input type="hidden" name="service" value="{{ $insurance->id }}">
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
                                {{-- <label class="check-wrap">
                                    <input type="checkbox" checked>
                                    <span class="check-label">
                                        I accept to receive notifications on <strong>SMS, emails, and WhatsApp</strong>
                                        about my
                                        insurance plans and policy updates.
                                    </span>
                                </label> --}}

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


    @php
    $Keyfeature = App\Models\KeyFeature::where('publish', 'published')->orderBy('ordering')->get();
    @endphp
    @if ($Keyfeature->count() > 0)
    <!-- ═══ BENEFITS ═══ -->
    <section class="benefits" id="benefits">
        <div class="container">
            <div class="text-center mb-5 sr">
                {!! $data->mediumDescription !!}
            </div>
            <div class="row g-4">
                @foreach ($Keyfeature as $f)
                <div class="col-sm-6 col-lg-3 sr sr-d1">
                    <div class="benefit-card bc1">
                        <i class="{{ $f->icon_class }}"></i>
                        <h5>{{ $f->title }}</h5>
                        <p>{{ $f->descreption }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif





    {{-- Key features start --}}

    <section class="key-feature-section">
        <div class="container">
            {{-- <div class="section-eyebrow"><i class="fas fa-star"></i> Key Features</div> --}}
            {{-- <h2 class="section-title">Features of a <span>Health Insurance</span> Policy</h2>
                <p class="section-desc">
                    Health insurance is the most essential financial safety net for your family.
                    Here are the key features every plan should have — know them before you buy.
                </p> --}}

            <div class="text-center mb-5 sr">
                {!! $data->longDescription !!}
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

    {{-- Key features end --}}


    <!-- ═══════════════════════════════════════  SECTION 3 – POLICY DESCRIPTION  ═══════════════════════════════════════ -->
    <section class="policy-overview-section">
        <div class="container">

            <div class="text-center mb-5 sr">
                <div class="section-eyebrow"><i class="fas fa-star"></i> Policy Overview</div>

                <h2 class="sec-h mb-3">What is <em>{{ $insurance->name }}?</em></h2>
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


    {{-- insurance types section start --}}
    <section class="categories insurance-type-section" id="categories">
        <div class="container">
            <div class="text-center mb-5 sr in">
                <div class="section-eyebrow"><i class="fas fa-star"></i> Policy Types</div>
                <h2 class="section-h mb-3">Types of <em>{{ $insurance->name }}</em> Plans</h2>
                <p class="section-p mx-auto">Choose the right type of plan based on your needs, family size, and
                    coverage goals.</p>
            </div>

            <div class="cat-grid">
                <div class="cat-card sr sr-d1 in">
                    {{-- <div class="cat-icon-bg"><i class="fas fa-car"></i></div> --}}
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
    {{-- insurance types section end --}}



    {{-- Top Insurers start  --}}
    <section class="policy-overview-section">
        <div class="container">

            <div class="text-center mb-5 sr in">
                <div class="section-eyebrow"><i class="fas fa-star"></i> Top Insurers</div>

                <h2 class="sec-h mb-3">Compare <em>{{ $insurance->name }}</em>Plans from Top Insurers</h2>
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
                <h2 class="sec-h mb-3">Key Benefits of <em>{{$insurance->name}}</em></h2>
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


    <!-- How to Choose start  -->

    <section class="insurance-section">

        <div class="container">

            <div class="text-center mb-5">

                <div class="section-badge">
                    <i class="fas fa-compass"></i>
                    Buyer's Guide
                </div>

                <h2 class="sec-h mb-3">
                    How to Choose the
                    Right <em>{{ $insurance->name }} Plan </em>
                </h2>

                <p class="section-description">
                    Picking the wrong plan can cost you thousands when you need it most.
                    Follow these 6 expert-backed steps to make a smart, confident decision.
                </p>

            </div>

            <div class="row g-4">

                <!-- Card 1 -->
                <div class="col-lg-6">
                    <div class="insurance-card" style="--card-color:#1040c4; --card-bg:#eef3ff;">
                        <div class="check-icon">
                            <i class="fas fa-check"></i>
                        </div>

                        <div class="d-flex">
                            <div class="step-number">1</div>

                            <div class="ms-3">
                                <h5 class="card-title">
                                    Choose Adequate Coverage Amount
                                </h5>

                                <p class="card-description">
                                    Opt for at least ₹10–20 lakh sum insured. Metro cities like Delhi and Mumbai often
                                    require ₹25L+ coverage because hospital costs are significantly higher.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-lg-6">
                    <div class="insurance-card" style="--card-color:#00b8a9; --card-bg:#e8fffc;">
                        <div class="check-icon">
                            <i class="fas fa-check"></i>
                        </div>

                        <div class="d-flex">
                            <div class="step-number">2</div>

                            <div class="ms-3">
                                <h5 class="card-title">
                                    Check the Hospital Network
                                </h5>

                                <p class="card-description">
                                    A large hospital network means easier cashless treatment. Verify your preferred
                                    hospitals are included in the insurer’s network.
                                </p>


                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-lg-6">
                    <div class="insurance-card" style="--card-color:#27ae60; --card-bg:#edfff4;">
                        <div class="check-icon">
                            <i class="fas fa-check"></i>
                        </div>

                        <div class="d-flex">
                            <div class="step-number">3</div>

                            <div class="ms-3">
                                <h5 class="card-title">
                                    Compare Claim Settlement Ratio
                                </h5>

                                <p class="card-description">
                                    A high claim settlement ratio indicates better reliability. Look for insurers with
                                    95% or higher claim settlement records.
                                </p>


                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-lg-6">
                    <div class="insurance-card" style="--card-color:#7c3aed; --card-bg:#f5efff;">
                        <div class="check-icon">
                            <i class="fas fa-check"></i>
                        </div>

                        <div class="d-flex">
                            <div class="step-number">4</div>

                            <div class="ms-3">
                                <h5 class="card-title">
                                    Review Waiting Periods
                                </h5>

                                <p class="card-description">
                                    Check waiting periods for pre-existing diseases such as diabetes or hypertension.
                                    Shorter waiting periods are generally better.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="col-lg-6">
                    <div class="insurance-card" style="--card-color:#f59c1a; --card-bg:#fff7e8;">
                        <div class="check-icon">
                            <i class="fas fa-check"></i>
                        </div>

                        <div class="d-flex">
                            <div class="step-number">5</div>

                            <div class="ms-3">
                                <h5 class="card-title">
                                    Understand Room Rent Limits
                                </h5>

                                <p class="card-description">
                                    Plans with room rent caps can increase out-of-pocket expenses. Prefer plans with no
                                    room rent restrictions.
                                </p>


                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="col-lg-6">
                    <div class="insurance-card" style="--card-color:#e74c3c; --card-bg:#fff1ef;">
                        <div class="check-icon">
                            <i class="fas fa-check"></i>
                        </div>

                        <div class="d-flex">
                            <div class="step-number">6</div>

                            <div class="ms-3">
                                <h5 class="card-title">
                                    Avoid High Co-payment Clauses
                                </h5>

                                <p class="card-description">
                                    Co-payment clauses require you to bear part of every claim. Choose plans with zero
                                    or minimal co-payment requirements.
                                </p>


                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>
    <!-- How to Choose end -->

    <!-- Claim process start  -->
    <section class="claims-section">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-badge">
                    <i class="fas fa-file-medical"></i>
                    Claims Guide
                </div>

                <h2 class="sec-h mb-3">
                    {{ $insurance->name }} <em> Claims Process</em>
                </h2>

                <p class="section-description">
                    Filing a claim is simple when you know the steps.
                    Follow the process below for cashless or reimbursement claims.
                </p>
            </div>

            <!-- Tabs -->

            <ul class="nav nav-pills justify-content-center mb-5 gap-3">

                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#cashless">
                        <i class="fas fa-hospital me-2"></i>
                        Cashless Claim
                    </button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#reimbursement">
                        <i class="fas fa-file-invoice-dollar me-2"></i>
                        Reimbursement Claim
                    </button>
                </li>

            </ul>

            <div class="tab-content">

                <!-- CASHLESS -->

                <div class="tab-pane fade show active" id="cashless">

                    <div class="row g-4">

                        <div class="col-lg-3 col-md-6">
                            <div class="claim-card">

                                <div class="icon-box bg-primary-subtle text-primary">
                                    <i class="fas fa-hospital"></i>
                                </div>

                                <h5>Visit Network Hospital</h5>

                                <p>
                                    Go to any empanelled cashless hospital in the insurer's network.
                                </p>

                                <p class="step-badge-claim">
                                    Step 1</p>

                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="claim-card">

                                <div class="icon-box text-info bg-info-subtle">
                                    <i class="fas fa-id-card"></i>
                                </div>

                                <h5>Show Health Card</h5>

                                <p>
                                    Present your health card or policy details at the hospital desk.
                                </p>

                                <p class="step-badge-claim">
                                    Step 2</p>

                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="claim-card">

                                <div class="icon-box bg-warning-subtle text-warning">
                                    <i class="fas fa-handshake"></i>
                                </div>

                                <h5>Insurer Approval</h5>

                                <p>
                                    Hospital sends a pre-authorization request for insurer approval.
                                </p>

                                <p class="step-badge-claim">
                                    Step 3
                                </p>

                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="claim-card">

                                <div class="icon-box bg-success-subtle text-success">
                                    <i class="fas fa-circle-check"></i>
                                </div>

                                <h5>Bill Settled</h5>

                                <p>
                                    Insurer directly settles eligible bills with the hospital.
                                </p>

                                <p class="step-badge-claim">
                                    Step 4
                                </p>

                            </div>
                        </div>

                    </div>


                </div>

                <!-- REIMBURSEMENT -->

                <div class="tab-pane fade" id="reimbursement">

                    <div class="row g-4">

                        <div class="col-lg-3 col-md-6">
                            <div class="claim-card">

                                <div class="icon-box bg-primary-subtle text-primary">
                                    <i class="fas fa-hospital-user"></i>
                                </div>

                                <h5>Get Treatment</h5>

                                <p>
                                    Visit any hospital of your choice for treatment.
                                </p>

                                <span class="step-badge bg-primary-subtle text-primary">
                                    Step 1
                                </span>

                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="claim-card">

                                <div class="icon-box bg-secondary-subtle text-secondary">
                                    <i class="fas fa-file-invoice"></i>
                                </div>

                                <h5>Pay Bills</h5>

                                <p>
                                    Pay hospital expenses and collect all original documents.
                                </p>

                                <span class="step-badge bg-secondary-subtle text-secondary">
                                    Step 2
                                </span>

                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="claim-card">

                                <div class="icon-box bg-warning-subtle text-warning">
                                    <i class="fas fa-upload"></i>
                                </div>

                                <h5>Submit Documents</h5>

                                <p>
                                    Submit bills, reports and discharge summary to the insurer.
                                </p>

                                <span class="step-badge bg-warning-subtle text-warning">
                                    Step 3
                                </span>

                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="claim-card">

                                <div class="icon-box bg-success-subtle text-success">
                                    <i class="fas fa-money-bill-transfer"></i>
                                </div>

                                <h5>Receive Payment</h5>

                                <p>
                                    Approved claim amount is credited directly to your bank account.
                                </p>

                                <span class="step-badge bg-success-subtle text-success">
                                    Step 4
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Claim process end -->

    <!-- testimonial section start  -->

    <section class="policy-desc-section">
        <div class="container">
            <div class="text-center mb-5 sr">
                <div class="eyebrow">⭐ Customer Stories</div>
                <h2 class="sec-h mb-3">Trusted by <em>1,00,000+</em>Happy Families</h2>
                <p class="section-sub mx-auto">Real people. Real experiences. See what our customers say about their
                    health insurance journey with us.</p>
            </div>


            <!-- ══════════════════════════════
     MARQUEE SECTION
══════════════════════════════ -->
            <div class="marquee-section mt-5">

                <!-- ROW 1 — scrolls left -->
                <div class="marquee-row marquee-row-1">
                    <div class="marquee-track">

                        <!-- ─ Original set ─ -->
                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-blue">H</div>
                                    <div>
                                        <div class="t-name">Harsh Shah</div>
                                        <div class="t-handle">@05harsh</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">This one is for the guys at <span class="mention">@insure</span>. Before
                                any formal interaction with them, their content and newsletter intrigued me for a long
                                time. Absolutely world-class service!</div>
                            <div class="t-date">12:28 AM · Sep 25, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-teal">A</div>
                                    <div>
                                        <div class="t-name">Arpit Mishra</div>
                                        <div class="t-handle">@mishraarpit01</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">Buying health insurance in India is not only difficult but confusing as
                                well. But <span class="mention">@insure</span> has made it really simple. The advisor
                                took time to explain every clause clearly. Highly recommend!</div>
                            <div class="t-date">10:00 PM · Sep 21, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-purple">G</div>
                                    <div>
                                        <div class="t-name">Gaurav Agarwal</div>
                                        <div class="t-handle">@AGAURAV711</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">Spoke to their advisor and there were many things I didn't understand
                                about my health insurance. They took time to explain everything — no rush, no jargon.
                                Completely sorted now!</div>
                            <div class="t-date">1:14 PM · Aug 19, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-pink">S</div>
                                    <div>
                                        <div class="t-name">Simran Kaur</div>
                                        <div class="t-handle">@jr_sachdeva</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★☆</div>
                            <div class="t-text">Called their support with a bunch of questions, read a little more on
                                their blog, and everything got sorted! Loved how patient they were. My family finally
                                has the right plan.</div>
                            <div class="t-date">7:43 AM · Aug 7, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-green">R</div>
                                    <div>
                                        <div class="t-name">Rahul Verma</div>
                                        <div class="t-handle">@rahulv_fin</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">Got a cashless claim settled in less than 2 hours at the hospital. Zero
                                hassle, zero calls needed. The team was proactive and handled everything on our behalf.
                                10/10 experience.</div>
                            <div class="t-date">3:20 PM · Jul 14, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-orange">N</div>
                                    <div>
                                        <div class="t-name">Neha Joshi</div>
                                        <div class="t-handle">@nehajoshi_mum</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">Finally understood what co-payment and room rent limits actually mean!
                                Their advisor was incredibly clear and honest — didn't upsell me. Got exactly the plan I
                                needed at the right price.</div>
                            <div class="t-date">9:05 AM · Jun 30, 2023</div>
                        </div>

                        <!-- ─ Duplicate set for seamless loop ─ -->
                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-blue">H</div>
                                    <div>
                                        <div class="t-name">Harsh Shah</div>
                                        <div class="t-handle">@05harsh</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">This one is for the guys at <span class="mention">@insure</span>. Before
                                any formal interaction with them, their content and newsletter intrigued me for a long
                                time. Absolutely world-class service!</div>
                            <div class="t-date">12:28 AM · Sep 25, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-teal">A</div>
                                    <div>
                                        <div class="t-name">Arpit Mishra</div>
                                        <div class="t-handle">@mishraarpit01</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">Buying health insurance in India is not only difficult but confusing as
                                well. But <span class="mention">@insure</span> has made it really simple. The advisor
                                took time to explain every clause clearly. Highly recommend!</div>
                            <div class="t-date">10:00 PM · Sep 21, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-purple">G</div>
                                    <div>
                                        <div class="t-name">Gaurav Agarwal</div>
                                        <div class="t-handle">@AGAURAV711</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">Spoke to their advisor and there were many things I didn't understand
                                about my health insurance. They took time to explain everything — no rush, no jargon.
                                Completely sorted now!</div>
                            <div class="t-date">1:14 PM · Aug 19, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-pink">S</div>
                                    <div>
                                        <div class="t-name">Simran Kaur</div>
                                        <div class="t-handle">@jr_sachdeva</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★☆</div>
                            <div class="t-text">Called their support with a bunch of questions, read a little more on
                                their blog, and everything got sorted! Loved how patient they were. My family finally
                                has the right plan.</div>
                            <div class="t-date">7:43 AM · Aug 7, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-green">R</div>
                                    <div>
                                        <div class="t-name">Rahul Verma</div>
                                        <div class="t-handle">@rahulv_fin</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">Got a cashless claim settled in less than 2 hours at the hospital. Zero
                                hassle, zero calls needed. The team was proactive and handled everything on our behalf.
                                10/10 experience.</div>
                            <div class="t-date">3:20 PM · Jul 14, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-orange">N</div>
                                    <div>
                                        <div class="t-name">Neha Joshi</div>
                                        <div class="t-handle">@nehajoshi_mum</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">Finally understood what co-payment and room rent limits actually mean!
                                Their advisor was incredibly clear and honest — didn't upsell me. Got exactly the plan I
                                needed at the right price.</div>
                            <div class="t-date">9:05 AM · Jun 30, 2023</div>
                        </div>

                    </div><!-- /marquee-track row1 -->
                </div><!-- /marquee-row-1 -->


                <!-- ROW 2 — scrolls right -->
                <div class="marquee-row marquee-row-2">
                    <div class="marquee-track">

                        <!-- ─ Original set ─ -->
                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-indigo">K</div>
                                    <div>
                                        <div class="t-name">Karan Sharma</div>
                                        <div class="t-handle">@kkarrran</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">You guys are awesome! I appreciate what you are doing in the insurance
                                industry. It was long overdue — someone finally making insurance simple and transparent
                                for everyday Indians.</div>
                            <div class="t-date">5:08 PM · May 11, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-teal">P</div>
                                    <div>
                                        <div class="t-name">Palash Nigam</div>
                                        <div class="t-handle">@palash2504</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">Bought health insurance through <span class="mention">@insure</span> and
                                had an amazing experience. They actually follow through on their promise of no spam and
                                no cold calls. Pure advice, nothing else.</div>
                            <div class="t-date">5:57 PM · Aug 19, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-amber">A</div>
                                    <div>
                                        <div class="t-name">AMD Babu</div>
                                        <div class="t-handle">@amdbabu</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text"><span class="mention">@insure</span> are insurance consultants, not
                                agents. They provide well-informed and customised insurance advice that matches your
                                actual needs — not their commission targets.</div>
                            <div class="t-date">7:56 PM · Aug 17, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-purple">S</div>
                                    <div>
                                        <div class="t-name">Saurabh Dandade</div>
                                        <div class="t-handle">@ItsSaurabhD</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">Bought a health insurance policy with their help. Great experience
                                overall. Answered every query that I had, helped with documentation, and the policy
                                arrived in my inbox within 10 minutes!</div>
                            <div class="t-date">11:03 AM · Aug 11, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-green">M</div>
                                    <div>
                                        <div class="t-name">Meera Pillai</div>
                                        <div class="t-handle">@meerapillai_k</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">As someone who knows nothing about insurance, I was nervous. But the
                                advisor was so patient and clear. By the end of the call I understood what I was buying
                                and why. That's rare.</div>
                            <div class="t-date">2:30 PM · Oct 3, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-pink">D</div>
                                    <div>
                                        <div class="t-name">Divya Reddy</div>
                                        <div class="t-handle">@divya_insured</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">Switched from my old insurer after they rejected my claim on a
                                technicality. The new plan I got here has zero co-payment and no room rent cap. Should
                                have done this years ago!</div>
                            <div class="t-date">6:15 PM · Nov 8, 2023</div>
                        </div>

                        <!-- ─ Duplicate set for seamless loop ─ -->
                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-indigo">K</div>
                                    <div>
                                        <div class="t-name">Karan Sharma</div>
                                        <div class="t-handle">@kkarrran</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">You guys are awesome! I appreciate what you are doing in the insurance
                                industry. It was long overdue — someone finally making insurance simple and transparent
                                for everyday Indians.</div>
                            <div class="t-date">5:08 PM · May 11, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-teal">P</div>
                                    <div>
                                        <div class="t-name">Palash Nigam</div>
                                        <div class="t-handle">@palash2504</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">Bought health insurance through <span class="mention">@insure</span> and
                                had an amazing experience. They actually follow through on their promise of no spam and
                                no cold calls. Pure advice, nothing else.</div>
                            <div class="t-date">5:57 PM · Aug 19, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-amber">A</div>
                                    <div>
                                        <div class="t-name">AMD Babu</div>
                                        <div class="t-handle">@amdbabu</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text"><span class="mention">@insure</span> are insurance consultants, not
                                agents. They provide well-informed and customised insurance advice that matches your
                                actual needs — not their commission targets.</div>
                            <div class="t-date">7:56 PM · Aug 17, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-purple">S</div>
                                    <div>
                                        <div class="t-name">Saurabh Dandade</div>
                                        <div class="t-handle">@ItsSaurabhD</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">Bought a health insurance policy with their help. Great experience
                                overall. Answered every query that I had, helped with documentation, and the policy
                                arrived in my inbox within 10 minutes!</div>
                            <div class="t-date">11:03 AM · Aug 11, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-green">M</div>
                                    <div>
                                        <div class="t-name">Meera Pillai</div>
                                        <div class="t-handle">@meerapillai_k</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">As someone who knows nothing about insurance, I was nervous. But the
                                advisor was so patient and clear. By the end of the call I understood what I was buying
                                and why. That's rare.</div>
                            <div class="t-date">2:30 PM · Oct 3, 2023</div>
                        </div>

                        <div class="t-card">
                            <div class="t-card-top">
                                <div class="t-user">
                                    <div class="t-avatar av-pink">D</div>
                                    <div>
                                        <div class="t-name">Divya Reddy</div>
                                        <div class="t-handle">@divya_insured</div>
                                    </div>
                                </div>
                                <div class="x-icon"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.258 5.63 5.906-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg></div>
                            </div>
                            <div class="t-stars">★★★★★</div>
                            <div class="t-text">Switched from my old insurer after they rejected my claim on a
                                technicality. The new plan I got here has zero co-payment and no room rent cap. Should
                                have done this years ago!</div>
                            <div class="t-date">6:15 PM · Nov 8, 2023</div>
                        </div>

                    </div><!-- /marquee-track row2 -->
                </div><!-- /marquee-row-2 -->

            </div><!-- /marquee-section -->


            <!-- ── TRUST BAR ── -->
            <div class="container">
                <div class="trust-bar">
                    <div class="trust-item">
                        <div>
                            <div class="t-num">1,00,000+</div>
                            <div style="font-size:12px;">Happy Customers</div>
                        </div>
                    </div>
                    <div class="trust-divider"></div>
                    <div class="trust-item">
                        <div>
                            <div class="t-num">4.8 ★</div>
                            <div style="font-size:12px;">Average Rating</div>
                        </div>
                    </div>
                    <div class="trust-divider"></div>
                    <div class="trust-item">
                        <div>
                            <div class="t-num">98.5%</div>
                            <div style="font-size:12px;">Claim Settlement</div>
                        </div>
                    </div>
                    <div class="trust-divider"></div>
                    <div class="trust-item">
                        <div>
                            <div class="t-num">30+</div>
                            <div style="font-size:12px;">Insurer Partners</div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- testimonial section end -->



    <!-- faq start  -->
    <section class="faq-section">
        <div class="container">


            <div class="row mb-4 sr in">
                <div class="col-12 text-center">
                    <h2 class="section-h">Frequently Asked <em>Questions</em></h2>
                </div>
            </div>



            <div class="faq-panels-wrap">
                <div class="faq-panel active" id="faq-panel-0">
                    <div class="faq-item open">
                        <div class="faq-q" onclick="toggleFaq(this)">
                            <span class="faq-q-text">What is covered under a health insurance plan?</span>
                            <div class="faq-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-a">
                            <p>A standard health insurance policy covers in-patient hospitalisation (room rent, ICU
                                charges, surgeon and anaesthesiologist fees, medicines during admission), day-care
                                procedures that do not require 24-hour admission, pre and post-hospitalisation expenses
                                typically for 30 to 60 days, and ambulance charges. Comprehensive plans also cover
                                domiciliary treatment, AYUSH therapies, and organ donor expenses. Always check
                                sub-limits on room rent and specific illness caps before you buy.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-q" onclick="toggleFaq(this)">
                            <span class="faq-q-text">What is the waiting period in health insurance and how does it
                                affect my claim?</span>
                            <div class="faq-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-a">
                            <p>A waiting period is the time after policy purchase during which certain claims are not
                                payable. The initial waiting period is typically 30 days for all illnesses except
                                accidents. Pre-existing diseases (like diabetes or hypertension) generally have a
                                waiting period of 2 to 4 years depending on the insurer. Specific illnesses such as
                                cataracts, hernia, or knee replacement often have a 1 to 2 year waiting period. Choosing
                                a policy with shorter waiting periods is often worth the slightly higher premium,
                                especially if you have pre-existing conditions.
                            </p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-q" onclick="toggleFaq(this)">
                            <span class="faq-q-text">What is Claim Settlement Ratio (CSR) and why should I check it
                                before buying?</span>
                            <div class="faq-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-a">
                            <p>The Claim Settlement Ratio is the percentage of total claims an insurer paid out in a
                                financial year. For example, a CSR of 98% means 98 out of every 100 claims were settled.
                                It is one of the most important indicators of insurer reliability, a cheap premium from
                                an insurer with a poor CSR is a false economy. IRDAI publishes annual CSR data for all
                                registered insurers. On Policy Kholo, we display the CSR of every recommended insurer
                                upfront so you can compare it alongside the premium.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-q" onclick="toggleFaq(this)">
                            <span class="faq-q-text">Can I include my family in a single health insurance plan?</span>
                            <div class="faq-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-a">
                            <p>Yes. A Family Floater health insurance plan covers you, your spouse, and dependent
                                children under a single sum insured, which is typically more cost-effective than buying
                                individual plans for each member. However, the entire sum insured is shared, so if one
                                member makes a large claim, others have reduced cover for that year. For senior citizen
                                parents, a separate senior citizen health plan is usually recommended as it offers more
                                relevant benefits at an appropriate premium.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-q" onclick="toggleFaq(this)">
                            <span class="faq-q-text">Is health insurance premium eligible for tax deduction in
                                India?</span>
                            <div class="faq-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-a">
                            <p>Yes. Under Section 80D of the Income Tax Act, you can claim a deduction of up to ₹25,000
                                per year on premiums paid for yourself, your spouse, and dependent children. An
                                additional deduction of up to ₹25,000 (or ₹50,000 if they are senior citizens) is
                                available for premiums paid for your parents. This means a total potential deduction of
                                ₹75,000 if your parents are senior citizens, making health insurance both a protection
                                tool and a meaningful tax-saving instrument.</p>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>
    <!-- faq end -->

    <!-- ═══════════════════════════════════════  SECTION 3 – POLICY DESCRIPTION  ═══════════════════════════════════════ -->
    <section class="policy-desc-section">
        <div class="container">

            <div class="text-center mb-5 sr">
                <div class="eyebrow"><span class="dot"></span> Policy Overview</div>
                <h2 class="sec-h mb-3">Compare the Best <em>{{ $insurance->name }} </em> Plans Today</h2>
                {!! $insurance->shortDescription !!}
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



    @stop