<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="FleetLink — profesjonalny system zarządzania flotą pojazdów GPS. Monitoruj, analizuj i optymalizuj swoją flotę w czasie rzeczywistym.">
    <title>FleetLink — System Zarządzania Flotą GPS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --primary:   #0d6efd;
            --primary-d: #0a58ca;
            --accent:    #0dcaf0;
            --dark:      #0b1120;
        }

        * { scroll-behavior: smooth; }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: #fff;
            color: #212529;
        }

        /* ── NAVBAR ── */
        .fl-navbar {
            background: rgba(11, 17, 32, 0.96);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            padding: 0.6rem 0;
            position: sticky;
            top: 0;
            z-index: 1050;
            box-shadow: 0 2px 12px rgba(0,0,0,.35);
        }

        .fl-navbar .navbar-brand {
            font-size: 1.6rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 0.45rem;
        }

        .fl-navbar .navbar-brand .brand-icon {
            color: var(--accent);
        }

        .fl-navbar .nav-link {
            color: rgba(255,255,255,.82) !important;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.5rem 0.85rem !important;
            border-radius: 6px;
            transition: color .2s, background .2s;
        }

        .fl-navbar .nav-link:hover,
        .fl-navbar .nav-link:focus {
            color: #fff !important;
            background: rgba(255,255,255,.08);
        }

        .btn-gps-login {
            background: var(--primary);
            color: #fff !important;
            border: none;
            padding: 0.42rem 1.1rem !important;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.88rem;
            transition: background .2s, transform .15s;
        }

        .btn-gps-login:hover {
            background: var(--primary-d);
            color: #fff !important;
            transform: translateY(-1px);
        }

        .btn-register-codes {
            background: transparent;
            color: var(--accent) !important;
            border: 1.5px solid var(--accent);
            padding: 0.38rem 1.1rem !important;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.88rem;
            transition: background .2s, color .2s, transform .15s;
        }

        .btn-register-codes:hover {
            background: var(--accent);
            color: #000 !important;
            transform: translateY(-1px);
        }

        /* ── HERO SLIDER ── */
        .hero-carousel {
            position: relative;
        }

        .hero-slide {
            min-height: 92vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-slide::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,.45);
        }

        .slide-1 { background: linear-gradient(135deg, #0d6efd 0%, #0b1120 60%); }
        .slide-2 { background: linear-gradient(135deg, #0b1120 0%, #0dcaf0 100%); }
        .slide-3 { background: linear-gradient(135deg, #1a2a4a 0%, #0d6efd 100%); }

        .hero-slide .slide-bg-pattern {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle at 20% 50%, rgba(13,202,240,.15) 0%, transparent 55%),
                              radial-gradient(circle at 80% 20%, rgba(13,110,253,.2) 0%, transparent 45%);
        }

        .hero-slide .slide-content {
            position: relative;
            z-index: 2;
            color: #fff;
        }

        .hero-slide .slide-eyebrow {
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 1rem;
        }

        .hero-slide h1 {
            font-size: clamp(2rem, 5vw, 3.4rem);
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 1.2rem;
        }

        .hero-slide h1 span {
            background: linear-gradient(90deg, var(--accent), #fff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-slide p {
            font-size: 1.1rem;
            color: rgba(255,255,255,.85);
            max-width: 560px;
            margin-bottom: 2rem;
            line-height: 1.7;
        }

        .hero-slide .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.9rem;
        }

        .btn-hero-primary {
            background: var(--primary);
            border: none;
            color: #fff;
            padding: 0.8rem 2rem;
            border-radius: 30px;
            font-weight: 700;
            font-size: 1rem;
            transition: background .2s, transform .15s, box-shadow .2s;
            box-shadow: 0 4px 20px rgba(13,110,253,.4);
        }

        .btn-hero-primary:hover {
            background: var(--primary-d);
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(13,110,253,.55);
            color: #fff;
        }

        .btn-hero-outline {
            background: transparent;
            border: 2px solid rgba(255,255,255,.6);
            color: #fff;
            padding: 0.78rem 1.8rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1rem;
            transition: border-color .2s, background .2s, transform .15s;
        }

        .btn-hero-outline:hover {
            border-color: #fff;
            background: rgba(255,255,255,.1);
            color: #fff;
            transform: translateY(-2px);
        }

        .hero-stats {
            display: flex;
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .hero-stat-item strong {
            display: block;
            font-size: 1.9rem;
            font-weight: 800;
            color: var(--accent);
        }

        .hero-stat-item span {
            font-size: 0.82rem;
            color: rgba(255,255,255,.7);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .carousel-indicators [data-bs-target] {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255,255,255,.5);
            border: none;
            margin: 0 5px;
        }

        .carousel-indicators .active {
            background: var(--accent);
            width: 28px;
            border-radius: 5px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
        }

        /* ── SECTION COMMONS ── */
        .section-eyebrow {
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .section-title {
            font-size: clamp(1.6rem, 3.5vw, 2.4rem);
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .section-lead {
            font-size: 1.05rem;
            color: #5c6878;
            max-width: 640px;
            line-height: 1.7;
        }

        /* ── FEATURES ── */
        .features-section {
            padding: 90px 0;
            background: #f7f9fc;
        }

        .feature-card {
            background: #fff;
            border-radius: 14px;
            padding: 2rem 1.6rem;
            height: 100%;
            box-shadow: 0 2px 12px rgba(0,0,0,.06);
            transition: transform .25s, box-shadow .25s;
            border: 1px solid #e8edf4;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 36px rgba(13,110,253,.12);
        }

        .feature-icon {
            width: 58px;
            height: 58px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.2rem;
        }

        .feature-icon-blue   { background: rgba(13,110,253,.12); color: var(--primary); }
        .feature-icon-cyan   { background: rgba(13,202,240,.15); color: #0aa2c0; }
        .feature-icon-green  { background: rgba(25,135,84,.12);  color: #198754; }
        .feature-icon-orange { background: rgba(253,126,20,.12); color: #fd7e14; }
        .feature-icon-purple { background: rgba(111,66,193,.12); color: #6f42c1; }
        .feature-icon-red    { background: rgba(220,53,69,.1);   color: #dc3545; }

        .feature-card h4 {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .feature-card p {
            font-size: 0.92rem;
            color: #697282;
            margin: 0;
            line-height: 1.65;
        }

        /* ── INDUSTRIES ── */
        .industries-section {
            padding: 90px 0;
            background: #fff;
        }

        .industry-card {
            border-radius: 14px;
            overflow: hidden;
            position: relative;
            height: 200px;
            cursor: default;
            transition: transform .25s;
        }

        .industry-card:hover {
            transform: scale(1.025);
        }

        .industry-card .industry-bg {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .ic-transport   { background: linear-gradient(135deg, #0d6efd, #0b1d40); }
        .ic-construction{ background: linear-gradient(135deg, #fd7e14, #7b3900); }
        .ic-logistics   { background: linear-gradient(135deg, #198754, #0a2e1c); }
        .ic-municipal   { background: linear-gradient(135deg, #6f42c1, #200b40); }
        .ic-agro        { background: linear-gradient(135deg, #20c997, #074737); }
        .ic-emergency   { background: linear-gradient(135deg, #dc3545, #4b0d12); }

        .industry-card .industry-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,.28);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            padding: 1.2rem;
        }

        .industry-card .industry-overlay i {
            font-size: 2.2rem;
            margin-bottom: 0.6rem;
            opacity: 0.9;
        }

        .industry-card .industry-overlay h5 {
            font-size: 1rem;
            font-weight: 700;
            margin: 0;
        }

        .industry-card .industry-overlay p {
            font-size: 0.8rem;
            color: rgba(255,255,255,.78);
            margin: 0.3rem 0 0;
        }

        /* ── SOLUTIONS ── */
        .solutions-section {
            padding: 90px 0;
            background: var(--dark);
        }

        .solutions-section .section-title,
        .solutions-section .section-eyebrow { color: #fff; }
        .solutions-section .section-lead { color: rgba(255,255,255,.65); }

        .solution-item {
            display: flex;
            gap: 1.2rem;
            align-items: flex-start;
            padding: 1.4rem;
            border-radius: 12px;
            background: rgba(255,255,255,.05);
            border: 1px solid rgba(255,255,255,.08);
            margin-bottom: 1rem;
            transition: background .2s;
        }

        .solution-item:hover {
            background: rgba(13,110,253,.18);
        }

        .solution-num {
            flex-shrink: 0;
            width: 42px;
            height: 42px;
            background: var(--primary);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 0.9rem;
        }

        .solution-text h5 {
            font-size: 1rem;
            font-weight: 700;
            color: #fff;
            margin: 0 0 0.3rem;
        }

        .solution-text p {
            font-size: 0.88rem;
            color: rgba(255,255,255,.62);
            margin: 0;
            line-height: 1.55;
        }

        .solutions-mockup {
            background: rgba(255,255,255,.04);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
        }

        .mockup-screen {
            background: #0d1b2e;
            border-radius: 10px;
            padding: 1.5rem 1rem;
            margin-bottom: 1rem;
        }

        .mockup-bar {
            height: 10px;
            border-radius: 5px;
            margin-bottom: 0.6rem;
        }

        /* ── CTA STRIP ── */
        .cta-section {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--primary) 0%, #0dcaf0 100%);
            text-align: center;
            color: #fff;
        }

        .cta-section h2 {
            font-size: clamp(1.6rem, 4vw, 2.6rem);
            font-weight: 800;
            margin-bottom: 0.8rem;
        }

        .cta-section p {
            font-size: 1.1rem;
            color: rgba(255,255,255,.88);
            margin-bottom: 2rem;
        }

        .btn-cta-white {
            background: #fff;
            color: var(--primary);
            border: none;
            padding: 0.85rem 2.2rem;
            border-radius: 30px;
            font-weight: 700;
            font-size: 1.05rem;
            transition: transform .15s, box-shadow .2s;
            box-shadow: 0 4px 18px rgba(0,0,0,.15);
        }

        .btn-cta-white:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(0,0,0,.25);
            color: var(--primary-d);
        }

        .btn-cta-outline-white {
            background: transparent;
            color: #fff;
            border: 2px solid rgba(255,255,255,.7);
            padding: 0.83rem 2rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.05rem;
            transition: border-color .2s, background .2s, transform .15s;
        }

        .btn-cta-outline-white:hover {
            border-color: #fff;
            background: rgba(255,255,255,.12);
            color: #fff;
            transform: translateY(-2px);
        }

        /* ── FOOTER ── */
        .fl-footer {
            background: #07101e;
            padding: 60px 0 24px;
            color: rgba(255,255,255,.55);
        }

        .fl-footer .footer-brand {
            font-size: 1.5rem;
            font-weight: 800;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            margin-bottom: 0.7rem;
        }

        .fl-footer .footer-brand .brand-icon { color: var(--accent); }

        .fl-footer .footer-tagline {
            font-size: 0.9rem;
            color: rgba(255,255,255,.45);
            margin-bottom: 1.4rem;
        }

        .fl-footer h6 {
            color: rgba(255,255,255,.85);
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1rem;
        }

        .fl-footer ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .fl-footer ul li {
            margin-bottom: 0.5rem;
        }

        .fl-footer ul li a {
            color: rgba(255,255,255,.5);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color .2s;
        }

        .fl-footer ul li a:hover { color: var(--accent); }

        .fl-footer .footer-divider {
            border-color: rgba(255,255,255,.08);
            margin: 2rem 0 1.2rem;
        }

        .fl-footer .footer-bottom {
            font-size: 0.82rem;
            color: rgba(255,255,255,.3);
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(255,255,255,.07);
            color: rgba(255,255,255,.55);
            font-size: 0.9rem;
            margin-right: 0.4rem;
            transition: background .2s, color .2s;
            text-decoration: none;
        }

        .social-links a:hover {
            background: var(--primary);
            color: #fff;
        }

        /* ── COUNTER STRIP ── */
        .counter-strip {
            background: #fff;
            border-top: 1px solid #e8edf4;
            border-bottom: 1px solid #e8edf4;
            padding: 2.2rem 0;
        }

        .counter-item { text-align: center; }

        .counter-item .counter-number {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--primary);
            display: block;
        }

        .counter-item .counter-label {
            font-size: 0.82rem;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 991.98px) {
            .fl-navbar .navbar-nav {
                padding: 0.8rem 0;
            }
            .btn-gps-login,
            .btn-register-codes {
                display: block;
                margin: 0.3rem 0;
                text-align: center;
            }
            .hero-stats { gap: 1.4rem; }
            .hero-stat-item strong { font-size: 1.5rem; }
        }

        @media (max-width: 575.98px) {
            .hero-slide { min-height: 80vh; }
            .hero-actions { flex-direction: column; }
        }
    </style>
</head>
<body>

<!-- ══════════════════════════════════════
     NAVBAR
══════════════════════════════════════ -->
<nav class="fl-navbar navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="fas fa-satellite-dish brand-icon"></i>
            Fleet<span style="color:var(--accent)">Link</span>
        </a>

        <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#navMain"
                aria-controls="navMain" aria-expanded="false" aria-label="Menu">
            <i class="fas fa-bars text-white"></i>
        </button>

        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav mx-auto gap-1">
                <li class="nav-item">
                    <a class="nav-link" href="#o-nas">
                        <i class="fas fa-info-circle me-1 opacity-50"></i>O nas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#branze">
                        <i class="fas fa-industry me-1 opacity-50"></i>Branże
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#rozwiazania">
                        <i class="fas fa-lightbulb me-1 opacity-50"></i>Rozwiązania
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#blog">
                        <i class="fas fa-newspaper me-1 opacity-50"></i>Blog
                    </a>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-2 mt-2 mt-lg-0">
                <a href="https://gps.fleetlink.pl/" class="nav-link btn-gps-login" target="_blank" rel="noopener">
                    <i class="fas fa-sign-in-alt me-1"></i>Logowanie GPS
                </a>
                <a href="https://kody.fleetlink.pl/" class="nav-link btn-register-codes" target="_blank" rel="noopener">
                    <i class="fas fa-qrcode me-1"></i>Rejestracja kodów
                </a>
            </div>
        </div>
    </div>
</nav>


<!-- ══════════════════════════════════════
     HERO CAROUSEL
══════════════════════════════════════ -->
<section class="hero-carousel">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5500">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slajd 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slajd 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slajd 3"></button>
        </div>

        <div class="carousel-inner">

            <!-- Slajd 1 -->
            <div class="carousel-item active">
                <div class="hero-slide slide-1">
                    <div class="slide-bg-pattern"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-xl-8">
                                <div class="slide-content">
                                    <p class="slide-eyebrow"><i class="fas fa-satellite-dish me-2"></i>Śledzenie GPS w czasie rzeczywistym</p>
                                    <h1>Miej swoją flotę <span>pod kontrolą</span> — zawsze i wszędzie</h1>
                                    <p>Monitoruj pojazdy na żywo, reaguj błyskawicznie i obniż koszty operacyjne nawet o 30%. FleetLink to kompletne narzędzie do zarządzania flotą każdej wielkości.</p>
                                    <div class="hero-actions">
                                        <a href="https://gps.fleetlink.pl/" class="btn btn-hero-primary" target="_blank" rel="noopener">
                                            <i class="fas fa-play-circle me-2"></i>Zaloguj do GPS
                                        </a>
                                        <a href="#o-nas" class="btn btn-hero-outline">
                                            <i class="fas fa-arrow-down me-2"></i>Dowiedz się więcej
                                        </a>
                                    </div>
                                    <div class="hero-stats">
                                        <div class="hero-stat-item">
                                            <strong>2 000+</strong>
                                            <span>Pojazdów online</span>
                                        </div>
                                        <div class="hero-stat-item">
                                            <strong>500+</strong>
                                            <span>Firm w Polsce</span>
                                        </div>
                                        <div class="hero-stat-item">
                                            <strong>99,9%</strong>
                                            <span>Dostępność systemu</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slajd 2 -->
            <div class="carousel-item">
                <div class="hero-slide slide-2">
                    <div class="slide-bg-pattern"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-xl-8">
                                <div class="slide-content">
                                    <p class="slide-eyebrow"><i class="fas fa-chart-line me-2"></i>Analityka i raporty</p>
                                    <h1>Dane, które <span>napędzają</span> Twój biznes</h1>
                                    <p>Szczegółowe raporty przejazdów, zużycia paliwa i stylu jazdy kierowców. Podejmuj decyzje oparte na faktach i eliminuj zbędne koszty floty.</p>
                                    <div class="hero-actions">
                                        <a href="#rozwiazania" class="btn btn-hero-primary">
                                            <i class="fas fa-chart-bar me-2"></i>Poznaj rozwiązania
                                        </a>
                                        <a href="https://kody.fleetlink.pl/" class="btn btn-hero-outline" target="_blank" rel="noopener">
                                            <i class="fas fa-qrcode me-2"></i>Rejestracja kodów
                                        </a>
                                    </div>
                                    <div class="hero-stats">
                                        <div class="hero-stat-item">
                                            <strong>-30%</strong>
                                            <span>Koszty paliwa</span>
                                        </div>
                                        <div class="hero-stat-item">
                                            <strong>24/7</strong>
                                            <span>Monitoring</span>
                                        </div>
                                        <div class="hero-stat-item">
                                            <strong>5 min</strong>
                                            <span>Czas wdrożenia</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slajd 3 -->
            <div class="carousel-item">
                <div class="hero-slide slide-3">
                    <div class="slide-bg-pattern"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-xl-8">
                                <div class="slide-content">
                                    <p class="slide-eyebrow"><i class="fas fa-shield-alt me-2"></i>Bezpieczeństwo i ochrona</p>
                                    <h1>Chroń swoje pojazdy przed <span>kradzieżą i nadużyciami</span></h1>
                                    <p>Geofencing, alerty SOS, historia tras i powiadomienia o nieautoryzowanym użyciu. Twoja flota jest bezpieczna z FleetLink.</p>
                                    <div class="hero-actions">
                                        <a href="#branze" class="btn btn-hero-primary">
                                            <i class="fas fa-industry me-2"></i>Poznaj branże
                                        </a>
                                        <a href="https://gps.fleetlink.pl/" class="btn btn-hero-outline" target="_blank" rel="noopener">
                                            <i class="fas fa-sign-in-alt me-2"></i>Panel GPS
                                        </a>
                                    </div>
                                    <div class="hero-stats">
                                        <div class="hero-stat-item">
                                            <strong>100%</strong>
                                            <span>Polska obsługa</span>
                                        </div>
                                        <div class="hero-stat-item">
                                            <strong>RODO</strong>
                                            <span>Zgodność</span>
                                        </div>
                                        <div class="hero-stat-item">
                                            <strong>ISO</strong>
                                            <span>Certyfikat</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.carousel-inner -->

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Poprzedni</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Następny</span>
        </button>

    </div>
</section>


<!-- ══════════════════════════════════════
     COUNTER STRIP
══════════════════════════════════════ -->
<div class="counter-strip">
    <div class="container">
        <div class="row g-3 justify-content-center text-center">
            <div class="col-6 col-md-3">
                <div class="counter-item">
                    <span class="counter-number" data-target="2000">0</span>
                    <span class="counter-label">Pojazdów monitorowanych</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="counter-item">
                    <span class="counter-number" data-target="500">0</span>
                    <span class="counter-label">Firm zaufało FleetLink</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="counter-item">
                    <span class="counter-number" data-target="15">0</span>
                    <span class="counter-label">Lat doświadczenia</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="counter-item">
                    <span class="counter-number" data-target="99">0</span>
                    <span class="counter-label">% zadowolonych klientów</span>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ══════════════════════════════════════
     O NAS
══════════════════════════════════════ -->
<section id="o-nas" class="features-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-7">
                <p class="section-eyebrow">Dlaczego FleetLink?</p>
                <h2 class="section-title">Wszystko, czego potrzebujesz do zarządzania flotą</h2>
                <p class="section-lead mx-auto">FleetLink to kompletna platforma GPS, która łączy śledzenie pojazdów, analizę danych i zarządzanie kierowcami w jednym miejscu.</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon feature-icon-blue"><i class="fas fa-map-marked-alt"></i></div>
                    <h4>Śledzenie GPS na żywo</h4>
                    <p>Pozycja każdego pojazdu aktualizowana co 10 sekund. Pełna mapa z historią tras i przebytymi kilometrami.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon feature-icon-cyan"><i class="fas fa-gas-pump"></i></div>
                    <h4>Kontrola paliwa</h4>
                    <p>Monitorowanie zużycia paliwa, wykrywanie kradzieży i analiza efektywności każdego pojazdu w Twojej flocie.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon feature-icon-green"><i class="fas fa-route"></i></div>
                    <h4>Optymalizacja tras</h4>
                    <p>Automatyczne planowanie najkrótszych tras, redukcja kosztów eksploatacji i czasu dojazdów kierowców.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon feature-icon-orange"><i class="fas fa-bell"></i></div>
                    <h4>Alerty i powiadomienia</h4>
                    <p>Natychmiastowe SMS i e-mail o przekroczeniu strefy, prędkości, wyłączeniu silnika lub próbie kradzieży.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon feature-icon-purple"><i class="fas fa-tools"></i></div>
                    <h4>Zarządzanie serwisem</h4>
                    <p>Automatyczne przypomnienia o przeglądach, badaniach technicznych i ubezpieczeniach. Zero zapomnień.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon feature-icon-red"><i class="fas fa-user-tie"></i></div>
                    <h4>Karta kierowcy</h4>
                    <p>Identyfikacja kierowców przez kody lub karty RFID. Statystyki stylu jazdy i rozliczanie czasu pracy.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════
     BRANŻE
══════════════════════════════════════ -->
<section id="branze" class="industries-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-7">
                <p class="section-eyebrow">Branże</p>
                <h2 class="section-title">Rozwiązania dla każdej branży</h2>
                <p class="section-lead mx-auto">FleetLink obsługuje firmy z różnych sektorów — od transportu, przez budownictwo, aż po służby miejskie i rolnictwo.</p>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-6 col-md-4 col-lg-2">
                <div class="industry-card">
                    <div class="industry-bg ic-transport"></div>
                    <div class="industry-overlay">
                        <i class="fas fa-truck"></i>
                        <h5>Transport</h5>
                        <p>Ciężarowy i kurierski</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="industry-card">
                    <div class="industry-bg ic-construction"></div>
                    <div class="industry-overlay">
                        <i class="fas fa-hard-hat"></i>
                        <h5>Budownictwo</h5>
                        <p>Maszyny i sprzęt</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="industry-card">
                    <div class="industry-bg ic-logistics"></div>
                    <div class="industry-overlay">
                        <i class="fas fa-boxes"></i>
                        <h5>Logistyka</h5>
                        <p>Dostawy last-mile</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="industry-card">
                    <div class="industry-bg ic-municipal"></div>
                    <div class="industry-overlay">
                        <i class="fas fa-city"></i>
                        <h5>Komunalne</h5>
                        <p>Służby miejskie</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="industry-card">
                    <div class="industry-bg ic-agro"></div>
                    <div class="industry-overlay">
                        <i class="fas fa-tractor"></i>
                        <h5>Rolnictwo</h5>
                        <p>Pojazdy i maszyny</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="industry-card">
                    <div class="industry-bg ic-emergency"></div>
                    <div class="industry-overlay">
                        <i class="fas fa-ambulance"></i>
                        <h5>Ratownictwo</h5>
                        <p>Pogotowie i straż</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════
     ROZWIĄZANIA
══════════════════════════════════════ -->
<section id="rozwiazania" class="solutions-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <p class="section-eyebrow">Rozwiązania</p>
                <h2 class="section-title mb-4">Jak FleetLink pomaga Twojej firmie?</h2>
                <p class="section-lead mb-4">Nasze rozwiązanie integruje się błyskawicznie z Twoją flotą i od pierwszego dnia dostarcza konkretne oszczędności.</p>

                <div class="solution-item">
                    <div class="solution-num">1</div>
                    <div class="solution-text">
                        <h5>Montaż lokalizatora GPS</h5>
                        <p>Profesjonalny montaż w dowolnym pojeździe — samochód, ciężarówka, maszyna budowlana. Czas instalacji: 30 minut.</p>
                    </div>
                </div>
                <div class="solution-item">
                    <div class="solution-num">2</div>
                    <div class="solution-text">
                        <h5>Dostęp do panelu online</h5>
                        <p>Zaloguj się przez przeglądarkę lub aplikację mobilną. Pełna historia tras, raporty i alerty w jednym miejscu.</p>
                    </div>
                </div>
                <div class="solution-item">
                    <div class="solution-num">3</div>
                    <div class="solution-text">
                        <h5>Rejestracja kodów kierowców</h5>
                        <p>Identyfikacja kierowców przez unikalne kody. Zawsze wiesz, kto prowadził pojazd i kiedy.</p>
                    </div>
                </div>
                <div class="solution-item">
                    <div class="solution-num">4</div>
                    <div class="solution-text">
                        <h5>Raportowanie i optymalizacja</h5>
                        <p>Automatyczne raporty miesięczne, analiza kosztów i rekomendacje oszczędnościowe dostosowane do Twojej floty.</p>
                    </div>
                </div>

                <div class="mt-4 d-flex gap-3 flex-wrap">
                    <a href="https://gps.fleetlink.pl/" class="btn btn-hero-primary" target="_blank" rel="noopener">
                        <i class="fas fa-sign-in-alt me-2"></i>Logowanie GPS
                    </a>
                    <a href="https://kody.fleetlink.pl/" class="btn btn-register-codes btn-hero-outline" target="_blank" rel="noopener"
                       style="border-color:var(--accent);color:var(--accent);">
                        <i class="fas fa-qrcode me-2"></i>Rejestracja kodów
                    </a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="solutions-mockup">
                    <div class="mockup-screen mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge rounded-pill" style="background:var(--primary);font-size:.75rem;">
                                <i class="fas fa-circle me-1" style="font-size:.5rem;color:#0f0"></i>Live GPS
                            </span>
                            <span style="font-size:.7rem;color:rgba(255,255,255,.4);">aktualizacja: 10s temu</span>
                        </div>
                        <div class="mockup-bar" style="background:linear-gradient(90deg,var(--primary),var(--accent));width:80%;"></div>
                        <div class="mockup-bar" style="background:rgba(255,255,255,.1);width:60%;"></div>
                        <div class="mockup-bar" style="background:rgba(255,255,255,.07);width:90%;"></div>
                        <div class="row mt-3 g-2">
                            <div class="col-4">
                                <div style="background:rgba(13,110,253,.25);border-radius:8px;padding:.7rem .5rem;text-align:center;">
                                    <i class="fas fa-truck" style="color:var(--accent);font-size:1.2rem;"></i>
                                    <div style="font-size:.65rem;color:rgba(255,255,255,.6);margin-top:.3rem;">24 pojazdy</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div style="background:rgba(25,135,84,.2);border-radius:8px;padding:.7rem .5rem;text-align:center;">
                                    <i class="fas fa-road" style="color:#20c997;font-size:1.2rem;"></i>
                                    <div style="font-size:.65rem;color:rgba(255,255,255,.6);margin-top:.3rem;">1 248 km</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div style="background:rgba(220,53,69,.18);border-radius:8px;padding:.7rem .5rem;text-align:center;">
                                    <i class="fas fa-bell" style="color:#f66;font-size:1.2rem;"></i>
                                    <div style="font-size:.65rem;color:rgba(255,255,255,.6);margin-top:.3rem;">2 alerty</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            <span style="background:rgba(255,255,255,.06);border-radius:8px;padding:.5rem 1rem;font-size:.82rem;color:rgba(255,255,255,.7);">
                                <i class="fas fa-mobile-alt me-1" style="color:var(--accent);"></i>iOS &amp; Android
                            </span>
                            <span style="background:rgba(255,255,255,.06);border-radius:8px;padding:.5rem 1rem;font-size:.82rem;color:rgba(255,255,255,.7);">
                                <i class="fas fa-desktop me-1" style="color:var(--accent);"></i>Panel WWW
                            </span>
                            <span style="background:rgba(255,255,255,.06);border-radius:8px;padding:.5rem 1rem;font-size:.82rem;color:rgba(255,255,255,.7);">
                                <i class="fas fa-plug me-1" style="color:var(--accent);"></i>API dostęp
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════
     BLOG
══════════════════════════════════════ -->
<section id="blog" class="features-section" style="padding:80px 0;">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-7">
                <p class="section-eyebrow">Blog</p>
                <h2 class="section-title">Aktualności i porady</h2>
                <p class="section-lead mx-auto">Praktyczna wiedza o zarządzaniu flotą, przepisach i nowoczesnych technologiach GPS.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card h-100">
                    <span class="badge mb-2" style="background:rgba(13,110,253,.12);color:var(--primary);font-size:.75rem;">Technologia</span>
                    <h4 class="mt-1" style="font-size:1rem;">Jak GPS obniża koszty floty o 30%?</h4>
                    <p>Analiza rzeczywistych oszczędności firm, które wdrożyły monitoring GPS w swoich flotach...</p>
                    <a href="#blog" class="btn btn-sm btn-outline-primary mt-2 rounded-pill">Czytaj więcej <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card h-100">
                    <span class="badge mb-2" style="background:rgba(25,135,84,.1);color:#198754;font-size:.75rem;">Przepisy</span>
                    <h4 class="mt-1" style="font-size:1rem;">Ustawa o tachografach 2024 — co musisz wiedzieć?</h4>
                    <p>Najważniejsze zmiany w przepisach dotyczących czasu pracy kierowców i rejestracji tras...</p>
                    <a href="#blog" class="btn btn-sm btn-outline-success mt-2 rounded-pill">Czytaj więcej <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card h-100">
                    <span class="badge mb-2" style="background:rgba(253,126,20,.1);color:#fd7e14;font-size:.75rem;">Poradnik</span>
                    <h4 class="mt-1" style="font-size:1rem;">5 sposobów na efektywne zarządzanie kierowcami</h4>
                    <p>Praktyczne wskazówki dla menedżerów floty — od stylu jazdy po rozliczanie czasu pracy...</p>
                    <a href="#blog" class="btn btn-sm btn-outline-warning mt-2 rounded-pill">Czytaj więcej <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════
     CTA
══════════════════════════════════════ -->
<section class="cta-section">
    <div class="container">
        <i class="fas fa-satellite-dish fa-3x mb-3 opacity-90"></i>
        <h2>Gotowy, żeby wziąć flotę pod kontrolę?</h2>
        <p>Zaloguj się do panelu GPS lub zarejestruj kod kierowcy już teraz — to zajmie mniej niż minutę.</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="https://gps.fleetlink.pl/" class="btn btn-cta-white" target="_blank" rel="noopener">
                <i class="fas fa-sign-in-alt me-2"></i>Logowanie do systemu GPS
            </a>
            <a href="https://kody.fleetlink.pl/" class="btn btn-cta-outline-white" target="_blank" rel="noopener">
                <i class="fas fa-qrcode me-2"></i>Rejestracja kodów
            </a>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════
     FOOTER
══════════════════════════════════════ -->
<footer class="fl-footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="footer-brand">
                    <i class="fas fa-satellite-dish brand-icon"></i>
                    Fleet<span style="color:var(--accent)">Link</span>
                </div>
                <p class="footer-tagline">Profesjonalny system zarządzania flotą pojazdów GPS. Monitoruj, analizuj i oszczędzaj.</p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-6">
                <h6>Firma</h6>
                <ul>
                    <li><a href="#o-nas">O nas</a></li>
                    <li><a href="#blog">Blog</a></li>
                    <li><a href="#">Kariera</a></li>
                    <li><a href="#">Kontakt</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 col-6">
                <h6>Branże</h6>
                <ul>
                    <li><a href="#branze">Transport</a></li>
                    <li><a href="#branze">Budownictwo</a></li>
                    <li><a href="#branze">Logistyka</a></li>
                    <li><a href="#branze">Komunalne</a></li>
                    <li><a href="#branze">Rolnictwo</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 col-6">
                <h6>Rozwiązania</h6>
                <ul>
                    <li><a href="#rozwiazania">Śledzenie GPS</a></li>
                    <li><a href="#rozwiazania">Raporty</a></li>
                    <li><a href="#rozwiazania">Geofencing</a></li>
                    <li><a href="#rozwiazania">Karta kierowcy</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 col-6">
                <h6>Konto</h6>
                <ul>
                    <li><a href="https://gps.fleetlink.pl/" target="_blank" rel="noopener">Logowanie GPS <i class="fas fa-external-link-alt ms-1" style="font-size:.7rem;"></i></a></li>
                    <li><a href="https://kody.fleetlink.pl/" target="_blank" rel="noopener">Rejestracja kodów <i class="fas fa-external-link-alt ms-1" style="font-size:.7rem;"></i></a></li>
                    <li><a href="#">Pomoc &amp; FAQ</a></li>
                    <li><a href="#">Kontakt z supportem</a></li>
                </ul>
            </div>
        </div>

        <hr class="footer-divider">
        <div class="row align-items-center footer-bottom">
            <div class="col-md-6 text-center text-md-start mb-1 mb-md-0">
                &copy; <?php echo date('Y'); ?> FleetLink. Wszelkie prawa zastrzeżone.
            </div>
            <div class="col-md-6 text-center text-md-end">
                <a href="#" style="color:rgba(255,255,255,.3);text-decoration:none;margin:0 .5rem;">Polityka prywatności</a>
                <a href="#" style="color:rgba(255,255,255,.3);text-decoration:none;margin:0 .5rem;">Regulamin</a>
                <a href="#" style="color:rgba(255,255,255,.3);text-decoration:none;margin:0 .5rem;">RODO</a>
            </div>
        </div>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// ── Animated counters on scroll ──
(function () {
    'use strict';

    function animateCounter(el) {
        var target = parseInt(el.getAttribute('data-target'), 10);
        var duration = 1800;
        var stepTime = 16;
        var steps = Math.ceil(duration / stepTime);
        var increment = target / steps;
        var current = 0;
        var timer = setInterval(function () {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            el.textContent = Math.floor(current).toLocaleString('pl-PL');
        }, stepTime);
    }

    var counters = document.querySelectorAll('.counter-number[data-target]');
    var animated = false;

    function checkScroll() {
        if (animated) return;
        var strip = document.querySelector('.counter-strip');
        if (!strip) return;
        var rect = strip.getBoundingClientRect();
        if (rect.top < window.innerHeight - 50) {
            animated = true;
            counters.forEach(animateCounter);
        }
    }

    window.addEventListener('scroll', checkScroll, { passive: true });
    checkScroll();
})();

// ── Navbar transparency on scroll ──
(function () {
    'use strict';
    var navbar = document.querySelector('.fl-navbar');
    window.addEventListener('scroll', function () {
        if (window.scrollY > 40) {
            navbar.style.boxShadow = '0 4px 20px rgba(0,0,0,.5)';
        } else {
            navbar.style.boxShadow = '0 2px 12px rgba(0,0,0,.35)';
        }
    }, { passive: true });
})();
</script>
</body>
</html>
