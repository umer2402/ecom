<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hello Wholesaler</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700;800&display=swap" rel="stylesheet">


    <link href="{{ asset('assets/css/homestyle.css') }}" rel="stylesheet">
    <style>
      .animated-market-hero {
        --ahx-bg: #0a0a0b;
        --ahx-bg-2: #131318;
        --ahx-accent: #ff7a1a;
        --ahx-accent-soft: #ff9a4a;
        --ahx-text: #f5f5f7;
        --ahx-muted: #b2b2bc;
        --ahx-border: rgba(255,255,255,.08);
        position: relative;
        min-height: 780px;
        overflow: hidden;
        color: var(--ahx-text);
        background:
          radial-gradient(circle at 15% 20%, rgba(255, 122, 26, 0.18), transparent 28%),
          radial-gradient(circle at 80% 35%, rgba(255, 122, 26, 0.16), transparent 30%),
          linear-gradient(180deg, var(--ahx-bg) 0%, var(--ahx-bg-2) 100%);
        font-family: "Space Grotesk", "Plus Jakarta Sans", "Inter", sans-serif;
        padding-top: 84px;
        padding-bottom: 150px;
      }

      .animated-market-hero .container { position: relative; z-index: 4; }
      .ahx-radial, .ahx-starfield, .ahx-fade, .ahx-sphere-wrap, .ahx-shape { pointer-events: none; }
      .ahx-radial {
        position: absolute; inset: 0; z-index: 1;
        background: radial-gradient(ellipse 60% 50% at 50% 50%, rgba(255, 122, 26, 0.08) 0%, transparent 70%);
      }
      .ahx-starfield { position: absolute; inset: 0; z-index: 2; }
      .ahx-star {
        position: absolute; display: block; border-radius: 50%;
        background: rgba(255,255,255,.95); box-shadow: 0 0 6px rgba(255,255,255,.55);
        animation: ahx-twinkle ease-in-out infinite;
      }
      .navbar-custom .container-fluid {
        gap: 16px;
        padding: 14px 18px;
      }
      .navbar-custom .navbar-collapse {
        justify-content: flex-end;
      }
      .right-options {
        gap: 12px;
        margin-left: auto;
      }
      .right-options .form-select {
        width: auto;
        min-width: 96px;
      }
      .hero-search-band {
        position: relative;
        z-index: 8;
        margin-top: -74px;
        padding: 0 0 18px;
        background: transparent;
      }
      .hero-search-shell {
        max-width: 900px;
      }
      .hero-search-form,
      .hero-search-tags {
        position: relative;
        z-index: 1;
      }
      .hero-search-form {
        display: block;
      }
      .hero-search-pill {
        position: relative;
        display: grid;
        grid-template-columns: 196px minmax(0, 1fr) 152px;
        align-items: center;
        gap: 0;
        padding: 10px;
        border-radius: 28px;
        background: linear-gradient(180deg, rgba(255,255,255,0.99) 0%, rgba(248,245,241,0.99) 100%);
        border: 1px solid rgba(255,255,255,0.72);
        box-shadow:
          0 18px 42px rgba(0, 0, 0, 0.28),
          0 0 36px rgba(255, 122, 26, 0.22),
          inset 0 1px 0 rgba(255,255,255,0.96);
      }
      .hero-search-field {
        position: relative;
        min-width: 0;
      }
      .hero-search-select-wrap {
        padding-right: 8px;
      }
      .hero-search-select-wrap::after {
        content: "";
        position: absolute;
        top: 50%;
        right: 0;
        width: 1px;
        height: 34px;
        background: rgba(32, 21, 13, 0.12);
        transform: translateY(-50%);
      }
      .hero-search-select-caret {
        position: absolute;
        right: 22px;
        top: 50%;
        transform: translateY(-50%);
        color: #84808a;
        font-size: 16px;
        pointer-events: none;
      }
      .hero-search-input-wrap::before {
        content: "\F52A";
        font-family: bootstrap-icons;
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: #777d87;
        font-size: 18px;
        pointer-events: none;
      }
      .hero-search-select,
      .hero-search-input {
        width: 100%;
        height: 60px;
        border: none;
        border-radius: 18px;
        background: transparent;
        color: #202531;
        font-size: 16px;
        box-shadow: none;
        transition: background .2s ease;
      }
      .hero-search-select {
        appearance: none;
        font-weight: 700;
        padding: 0 42px 0 18px;
      }
      .hero-search-input {
        font-weight: 500;
        padding: 0 18px 0 52px;
      }
      .hero-search-select:focus,
      .hero-search-input:focus,
      .hero-search-pill:focus-within {
        outline: none;
        box-shadow: 0 0 0 4px rgba(255, 122, 26, 0.12);
      }
      .hero-search-button {
        height: 58px;
        border: none;
        border-radius: 20px;
        padding: 0 24px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: linear-gradient(135deg, #ff7a1a 0%, #ff9a43 100%);
        color: #fff;
        font-size: 16px;
        font-weight: 800;
        letter-spacing: .01em;
        box-shadow: 0 12px 26px rgba(255, 122, 26, 0.28);
        transition: transform .2s ease, box-shadow .2s ease, filter .2s ease;
      }
      .hero-search-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 18px 32px rgba(255, 122, 26, 0.34);
        filter: saturate(1.05);
      }
      .hero-search-tags {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px;
        margin-top: 18px;
      }
      .hero-search-tag-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: rgba(255,255,255,0.74);
        font-size: 13px;
        font-weight: 500;
      }
      .hero-search-tag {
        display: inline-flex;
        align-items: center;
        padding: 9px 16px;
        border-radius: 999px;
        background: rgba(33, 39, 53, 0.88);
        border: 1px solid rgba(255,255,255,0.08);
        color: rgba(255,255,255,0.92);
        font-size: 13px;
        font-weight: 500;
        text-decoration: none;
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.04);
        transition: transform .2s ease, border-color .2s ease, color .2s ease, background .2s ease;
      }
      .hero-search-tag:hover {
        transform: translateY(-2px);
        border-color: rgba(255, 122, 26, 0.34);
        background: rgba(40, 47, 63, 0.96);
        color: #fff;
      }
      .ahx-copy { position: relative; z-index: 5; }
      .ahx-trust-pill {
        display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,.05);
        border: 1px solid var(--ahx-border); padding: 8px 14px; border-radius: 999px;
        font-size: 13px; margin-bottom: 24px; backdrop-filter: blur(10px);
        animation: ahx-fade-up .7s ease-out .1s both;
      }
      .ahx-copy h1 {
        font-size: clamp(42px, 5vw, 72px); line-height: 1.02; letter-spacing: -.03em;
        color: #fff; margin-bottom: 20px; animation: ahx-fade-up .8s ease-out .2s both;
      }
      .ahx-copy p {
        color: var(--ahx-muted); font-size: 17px; line-height: 1.7; max-width: 560px;
        margin-bottom: 30px; animation: ahx-fade-up .8s ease-out .35s both;
      }
      .ahx-copy .btn { box-shadow: 0 14px 34px rgba(0, 0, 0, .22); }
      .ahx-chip-row {
        display: flex; flex-wrap: wrap; align-items: center; gap: 10px; margin-top: 22px;
        animation: ahx-fade-up .8s ease-out .55s both;
      }
      .ahx-chip-label {
        display: inline-flex; align-items: center; gap: 6px; font-size: 13px; color: var(--ahx-muted);
      }
      .ahx-chip {
        text-decoration: none; color: #fff; background: rgba(255,255,255,.04);
        border: 1px solid var(--ahx-border); padding: 8px 14px; border-radius: 999px;
        font-size: 13px; transition: all .2s ease;
      }
      .ahx-chip:hover {
        color: var(--ahx-accent); border-color: rgba(255, 122, 26, .45); background: rgba(255, 122, 26, .1);
      }
      .ahx-stats { display: flex; gap: 42px; margin-top: 52px; animation: ahx-fade-up .8s ease-out .7s both; }
      .ahx-stat-num { font-size: 30px; line-height: 1; font-weight: 800; color: #fff; }
      .ahx-stat-label { color: var(--ahx-muted); font-size: 11px; letter-spacing: .14em; margin-top: 8px; }
      .ahx-visual {
        position: relative;
        z-index: 5;
        min-height: 500px;
        display: flex;
        align-items: flex-end;
        justify-content: flex-end;
      }
      .ahx-visual-copy {
        position: relative;
        z-index: 5;
        max-width: 380px;
        margin: 360px 18px 0 auto;
        padding: 18px 22px 0;
        text-align: center;
      }
      .ahx-visual-copy h2 {
        font-size: clamp(26px, 2.6vw, 40px);
        line-height: 1.08;
        letter-spacing: -.03em;
        margin-bottom: 12px;
      }
      .ahx-visual-copy p {
        max-width: 320px;
        margin: 0 auto;
        color: rgba(245, 245, 247, 0.74);
        font-size: 14px;
        line-height: 1.65;
      }
      .ahx-sphere-wrap {
        position: absolute;
        right: 15px;
        top: 12px;
        width: 560px;
        height: 560px;
        z-index: 3;
        animation: ahx-sphere-float 10s ease-in-out infinite;
      }
      .ahx-sphere-wrap::before,
      .ahx-sphere-wrap::after {
        content: "";
        position: absolute;
        inset: 10%;
        border-radius: 50%;
      }
      .ahx-sphere-wrap::before {
        background: radial-gradient(circle, rgba(255, 122, 26, 0.2) 0%, rgba(255, 122, 26, 0.06) 45%, transparent 72%);
        filter: blur(16px);
        transform: scale(1.08);
      }
      .ahx-sphere-wrap::after {
        inset: 18%;
        border: 1px solid rgba(255, 122, 26, 0.12);
        animation: ahx-sphere-halo 14s linear infinite;
      }
      .ahx-sphere-svg {
        width: 100%;
        height: 100%;
        filter: drop-shadow(0 0 34px rgba(255, 122, 26, .25));
        overflow: visible;
      }
      .ahx-sphere-core,
      .ahx-sphere-shell,
      .ahx-sphere-latitudes,
      .ahx-sphere-outline,
      .ahx-sphere-outline-dashed {
        transform-box: fill-box;
        transform-origin: center;
      }
      .ahx-sphere-core {
        animation: ahx-sphere-breathe 8s ease-in-out infinite;
      }
      .ahx-sphere-shell {
        animation: ahx-sphere-spin 26s linear infinite;
      }
      .ahx-sphere-shell-secondary {
        animation-duration: 18s;
        animation-direction: reverse;
        opacity: 0.52;
      }
      .ahx-sphere-latitudes {
        animation: ahx-sphere-latitude 12s ease-in-out infinite;
      }
      .ahx-sphere-outline-dashed {
        animation: ahx-sphere-dash 11s linear infinite;
      }
      .ahx-info-card {
        position: absolute; z-index: 4; background: rgba(20, 20, 24, .78);
        border: 1px solid rgba(255, 122, 26, .25); border-radius: 16px; padding: 12px 16px;
        backdrop-filter: blur(14px); box-shadow: 0 12px 34px rgba(0,0,0,.35); text-align: left;
      }
      .ahx-info-card small {
        display: block; color: var(--ahx-muted); font-size: 11px; letter-spacing: .1em; margin-bottom: 4px;
      }
      .ahx-info-card strong { color: var(--ahx-accent-soft); font-size: 16px; font-weight: 700; }
      .ahx-info-supplier { top: 25%; left: 10%; min-width: 210px; animation: ahx-float-a 7s ease-in-out infinite; }
      .ahx-info-bulk { top: 15%; right: 8%; animation: ahx-float-b 6.5s ease-in-out infinite; }
      .ahx-info-live { bottom: 16%; left: 16%; animation: ahx-float-c 7.5s ease-in-out infinite; }
      .ahx-info-delivery { bottom: 22%; right: 2%; animation: ahx-float-d 6s ease-in-out infinite; }
      .ahx-live-dot {
        width: 7px; height: 7px; border-radius: 50%; display: inline-block; background: #22c55e;
        box-shadow: 0 0 9px rgba(34,197,94,.85); margin-right: 6px; animation: ahx-live 1.5s ease-in-out infinite;
      }
      .ahx-shape { position: absolute; z-index: 3; filter: drop-shadow(0 0 16px rgba(255,122,26,.4)); }
      .ahx-shape-diamond { top: 31%; left: 52%; width: 84px; height: 84px; animation: ahx-drift-1 12s ease-in-out infinite; }
      .ahx-shape-diamond::before {
        content: ""; position: absolute; inset: 0; transform: rotate(45deg); border-radius: 12px;
        background: linear-gradient(135deg, #ff8a3d 0%, #ff5a00 60%, #8b2e00 100%);
        box-shadow: inset 0 -10px 18px rgba(0,0,0,.25), inset 0 10px 16px rgba(255,255,255,.1);
      }
      .ahx-shape-ring {
        top: 64%; left: 57%; width: 72px; height: 72px; border-radius: 50%;
        border: 3px solid rgba(255, 122, 26, .9); box-shadow: 0 0 24px rgba(255,122,26,.45), inset 0 0 15px rgba(255,122,26,.15);
        animation: ahx-drift-2 11s ease-in-out infinite;
      }
      .ahx-shape-triangle { top: 21%; left: 69%; width: 64px; height: 64px; animation: ahx-drift-3 13s ease-in-out infinite; }
      .ahx-shape-triangle svg, .ahx-shape-hex svg { width: 100%; height: 100%; }
      .ahx-shape-hex { top: 58%; left: 45%; width: 72px; height: 72px; animation: ahx-drift-4 10s ease-in-out infinite; }
      .ahx-fade {
        position: absolute; left: 0; right: 0; bottom: 0; height: 160px; z-index: 4;
        background: linear-gradient(to bottom, rgba(10,10,11,0) 0%, rgba(10,10,11,.7) 52%, #ffffff 100%);
      }
      @keyframes ahx-twinkle { 0%, 100% { opacity: .15; transform: scale(.8); } 50% { opacity: .95; transform: scale(1.08); } }
      @keyframes ahx-fade-up { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: translateY(0); } }
      @keyframes ahx-sphere-spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
      @keyframes ahx-sphere-latitude { 0%, 100% { transform: rotate(0deg) scaleY(1); } 50% { transform: rotate(10deg) scaleY(.92); } }
      @keyframes ahx-sphere-breathe { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.03); } }
      @keyframes ahx-sphere-float { 0%, 100% { transform: translate3d(0, 0, 0); } 50% { transform: translate3d(10px, -18px, 0); } }
      @keyframes ahx-sphere-halo { from { transform: rotate(0deg) scale(1); } to { transform: rotate(360deg) scale(1.04); } }
      @keyframes ahx-sphere-dash { from { stroke-dashoffset: 0; } to { stroke-dashoffset: -120; } }
      @keyframes ahx-drift-1 { 0%, 100% { transform: translate(0,0) rotate(0deg); } 50% { transform: translate(20px,-20px) rotate(10deg); } }
      @keyframes ahx-drift-2 { 0%, 100% { transform: translate(0,0); } 50% { transform: translate(-18px,12px); } }
      @keyframes ahx-drift-3 { 0%, 100% { transform: translate(0,0) rotate(0deg); } 50% { transform: translate(12px,18px) rotate(120deg); } }
      @keyframes ahx-drift-4 { 0%, 100% { transform: translate(0,0) rotate(0deg); } 50% { transform: translate(-22px,18px) rotate(180deg); } }
      @keyframes ahx-float-a { 0%, 100% { transform: translate(0,0); } 50% { transform: translate(-6px,-12px); } }
      @keyframes ahx-float-b { 0%, 100% { transform: translate(0,0); } 50% { transform: translate(8px,-10px); } }
      @keyframes ahx-float-c { 0%, 100% { transform: translate(0,0); } 50% { transform: translate(8px,-8px); } }
      @keyframes ahx-float-d { 0%, 100% { transform: translate(0,0); } 50% { transform: translate(-10px,-12px); } }
      @keyframes ahx-live { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: .65; transform: scale(1.25); } }
      @media (max-width: 1199px) {
        .hero-search-pill {
          grid-template-columns: 184px minmax(0, 1fr) 144px;
        }
        .ahx-sphere-wrap { right: -40px; top: 8px; width: 480px; height: 480px; opacity: .55; }
        .ahx-visual-copy { max-width: 350px; margin-top: 310px; margin-right: 0; }
        .ahx-shape-diamond, .ahx-shape-ring, .ahx-shape-triangle, .ahx-shape-hex { opacity: .7; }
      }
      @media (max-width: 991.98px) {
        .hero-search-band {
          margin-top: -52px;
          padding-bottom: 14px;
        }
        .hero-search-shell {
          max-width: none;
        }
        .hero-search-pill {
          grid-template-columns: 1fr;
          gap: 8px;
          padding: 12px;
          border-radius: 24px;
        }
        .hero-search-button {
          width: 100%;
        }
        .animated-market-hero { min-height: auto; padding-top: 56px; padding-bottom: 110px; }
        .ahx-copy { text-align: center; }
        .ahx-copy p { margin-left: auto; margin-right: auto; }
        .ahx-chip-row, .ahx-stats { justify-content: center; }
        .ahx-visual { min-height: 460px; margin-top: 36px; justify-content: center; }
        .ahx-visual-copy { max-width: 420px; margin: 295px auto 0; padding-top: 0; }
        .ahx-sphere-wrap { right: 50%; transform: translateX(50%); top: 0; width: 420px; height: 420px; opacity: .38; }
        .ahx-info-card { display: none; }
      }
      @media (max-width: 767.98px) {
        .hero-search-band {
          margin-top: -26px;
          padding-bottom: 8px;
        }
        .navbar-custom .container-fluid {
          padding: 12px 14px;
        }
        .right-options {
          margin-left: 0;
          justify-content: flex-start;
        }
        .right-options .form-select {
          min-width: 88px;
        }
        .hero-search-shell {
          max-width: none;
        }
        .hero-search-select,
        .hero-search-input,
        .hero-search-button {
          height: 56px;
          border-radius: 16px;
        }
        .hero-search-pill {
          padding: 10px;
          border-radius: 22px;
        }
        .hero-search-select-wrap::after {
          display: none;
        }
        .hero-search-tags {
          gap: 8px;
        }
        .animated-market-hero { padding-left: 18px; padding-right: 18px; min-height: auto; }
        .ahx-stats { gap: 24px; flex-wrap: wrap; }
        .ahx-chip-row { gap: 8px; }
        .ahx-chip { font-size: 12px; padding: 7px 12px; }
        .ahx-visual { min-height: auto; margin-top: 20px; }
        .ahx-visual-copy { margin: 0 auto; padding: 0 10px; }
        .ahx-visual-copy h2 { font-size: clamp(24px, 7vw, 32px); }
        .ahx-sphere-wrap, .ahx-shape { display: none; }
      }

      .how-it-works-section {
        position: relative;
        overflow: hidden;
        padding: 110px 0;
        background:
          radial-gradient(circle at 12% 18%, rgba(255, 173, 94, 0.28), transparent 24%),
          radial-gradient(circle at 88% 16%, rgba(255, 209, 156, 0.55), transparent 26%),
          linear-gradient(135deg, #fff7ef 0%, #ffe3c1 48%, #ffc98b 100%);
      }

      .how-it-works-section::before,
      .how-it-works-section::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
      }

      .how-it-works-section::before {
        width: 340px;
        height: 340px;
        top: -120px;
        left: -90px;
        background: radial-gradient(circle, rgba(255,255,255,0.75) 0%, rgba(255,255,255,0) 72%);
      }

      .how-it-works-section::after {
        width: 420px;
        height: 420px;
        right: -180px;
        bottom: -180px;
        background: radial-gradient(circle, rgba(255, 122, 26, 0.18) 0%, rgba(255, 122, 26, 0) 72%);
      }

      .how-it-works-shell {
        position: relative;
        z-index: 2;
      }

      .how-it-works-kicker {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 999px;
        background: rgba(255,255,255,0.72);
        border: 1px solid rgba(255, 145, 44, 0.25);
        color: #bf5a00;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
        box-shadow: 0 14px 32px rgba(191, 90, 0, 0.08);
      }

      .how-it-works-heading {
        max-width: 720px;
        margin: 0 auto 26px;
      }

      .how-it-works-heading h2 {
        color: #1f140b;
        font-size: clamp(34px, 4vw, 54px);
        line-height: 1.05;
        letter-spacing: -.03em;
        margin: 18px 0 14px;
      }

      .how-it-works-heading p {
        color: #6e4a2d;
        font-size: 17px;
        line-height: 1.7;
        margin: 0 auto;
      }

      .how-steps-grid {
        position: relative;
        margin-top: 54px;
      }

      .how-steps-grid::before {
        content: "";
        position: absolute;
        left: 18%;
        right: 18%;
        top: 96px;
        height: 2px;
        background: linear-gradient(90deg, rgba(255,122,26,0.08), rgba(255,122,26,0.45), rgba(255,122,26,0.08));
        z-index: 1;
      }

      .how-step-card {
        position: relative;
        z-index: 2;
        height: 100%;
        padding: 34px 28px 28px;
        border-radius: 30px;
        background:
          linear-gradient(180deg, rgba(255,255,255,0.92) 0%, rgba(255,248,240,0.96) 100%);
        border: 1px solid rgba(255, 145, 44, 0.18);
        box-shadow:
          0 22px 48px rgba(129, 71, 14, 0.12),
          inset 0 1px 0 rgba(255,255,255,0.9);
        transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
      }

      .how-step-card:hover {
        transform: translateY(-8px);
        border-color: rgba(255, 122, 26, 0.4);
        box-shadow:
          0 28px 58px rgba(129, 71, 14, 0.18),
          inset 0 1px 0 rgba(255,255,255,0.95);
      }

      .how-step-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 58px;
        height: 34px;
        padding: 0 16px;
        border-radius: 999px;
        background: linear-gradient(135deg, #ff7a1a 0%, #ffb057 100%);
        color: #fff;
        font-size: 14px;
        font-weight: 800;
        letter-spacing: .14em;
        box-shadow: 0 14px 24px rgba(255, 122, 26, 0.24);
      }

      .how-step-icon {
        width: 78px;
        height: 78px;
        margin: 22px auto 18px;
        border-radius: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        color: #ff7a1a;
        background:
          radial-gradient(circle at 30% 30%, rgba(255,255,255,0.95), rgba(255,233,209,0.95) 58%, rgba(255,200,136,0.9) 100%);
        box-shadow:
          inset 0 1px 0 rgba(255,255,255,0.95),
          0 18px 26px rgba(255, 145, 44, 0.18);
      }

      .how-step-card h5 {
        color: #23160d;
        font-size: 24px;
        margin-bottom: 12px;
      }

      .how-step-card p {
        color: #6d4f37;
        font-size: 15px;
        line-height: 1.75;
        margin: 0;
      }

      .how-step-accent {
        width: 64px;
        height: 4px;
        margin: 20px auto 0;
        border-radius: 999px;
        background: linear-gradient(90deg, rgba(255,122,26,0.18), rgba(255,122,26,0.95), rgba(255,122,26,0.18));
      }

      @media (max-width: 991.98px) {
        .how-it-works-section {
          padding: 88px 0;
        }

        .how-steps-grid::before {
          display: none;
        }
      }

      @media (max-width: 767.98px) {
        .how-it-works-section {
          padding: 72px 0;
        }

        .how-step-card {
          padding: 28px 22px 24px;
          border-radius: 24px;
        }

        .how-step-card h5 {
          font-size: 22px;
        }
      }

      .market-footer {
        background: #191d26;
        color: rgba(255,255,255,0.82);
        padding: 72px 0 24px;
      }

      .market-footer a {
        color: rgba(255,255,255,0.82);
        text-decoration: none;
        transition: color .2s ease, opacity .2s ease, transform .2s ease;
      }

      .market-footer a:hover {
        color: #ff7a1a;
      }

      .market-footer-shell {
        position: relative;
      }

      .market-footer-top {
        display: grid;
        grid-template-columns: minmax(0, 1.05fr) minmax(340px, .95fr);
        gap: 48px;
        align-items: start;
      }

      .market-footer-brand {
        max-width: 620px;
      }

      .market-footer-logo {
        display: inline-flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 20px;
      }

      .market-footer-logo-badge {
        width: 42px;
        height: 42px;
        border-radius: 14px;
        background: linear-gradient(135deg, #ff7a1a 0%, #ff9f4d 100%);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: 800;
        font-size: 22px;
        box-shadow: 0 14px 30px rgba(255, 122, 26, 0.25);
      }

      .market-footer-logo-text {
        font-size: clamp(28px, 2.6vw, 38px);
        line-height: 1;
        font-weight: 800;
        letter-spacing: -.03em;
        color: #fff;
      }

      .market-footer-logo-text span {
        color: #ff7a1a;
      }

      .market-footer-description {
        max-width: 570px;
        margin: 0;
        color: rgba(255,255,255,0.74);
        font-size: 17px;
        line-height: 1.65;
      }

      .market-footer-socials {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 12px;
        margin-top: 28px;
      }

      .market-footer-social {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        border: 1px solid rgba(255,255,255,0.08);
        background: rgba(255,255,255,0.03);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: rgba(255,255,255,0.82);
        font-size: 18px;
      }

      .market-footer-social:hover {
        transform: translateY(-2px);
        border-color: rgba(255, 122, 26, 0.42);
        background: rgba(255, 122, 26, 0.10);
      }

      .market-footer-whatsapp {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 18px;
        border-radius: 999px;
        border: 1px solid rgba(255, 122, 26, 0.25);
        background: rgba(255, 122, 26, 0.08);
        color: #ff8d34 !important;
        font-weight: 600;
      }

      .market-footer-subscribe {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 24px;
        padding: 28px 28px 24px;
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.02);
      }

      .market-footer-subscribe h4 {
        color: #fff;
        margin-bottom: 8px;
        font-size: 18px;
        font-weight: 700;
      }

      .market-footer-subscribe p {
        color: rgba(255,255,255,0.66);
        margin-bottom: 22px;
        font-size: 15px;
        line-height: 1.6;
      }

      .market-footer-form {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 18px;
      }

      .market-footer-input {
        flex: 1;
        height: 46px;
        border-radius: 14px;
        border: 1px solid rgba(255,255,255,0.08);
        background: rgba(255,255,255,0.08);
        color: #fff;
        padding: 0 16px;
        outline: none;
        box-shadow: none;
      }

      .market-footer-input::placeholder {
        color: rgba(255,255,255,0.44);
      }

      .market-footer-feedback {
        margin: 0 0 16px;
        padding: 10px 14px;
        border-radius: 14px;
        font-size: 14px;
        line-height: 1.5;
      }

      .market-footer-feedback.is-success {
        background: rgba(34, 197, 94, 0.12);
        border: 1px solid rgba(34, 197, 94, 0.22);
        color: #b8f5ca;
      }

      .market-footer-feedback.is-warning {
        background: rgba(255, 184, 0, 0.10);
        border: 1px solid rgba(255, 184, 0, 0.22);
        color: #ffd98b;
      }

      .market-footer-field-error {
        margin-top: -8px;
        margin-bottom: 16px;
        color: #ffb6a6;
        font-size: 13px;
      }

      .market-footer-button {
        border: none;
        border-radius: 999px;
        padding: 12px 22px;
        background: linear-gradient(135deg, #ff7a1a 0%, #ff9b3f 100%);
        color: #fff;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 14px 26px rgba(255, 122, 26, 0.24);
      }

      .market-footer-button:hover {
        color: #fff;
        transform: translateY(-1px);
      }

      .market-footer-trust {
        display: flex;
        flex-wrap: wrap;
        gap: 18px 28px;
        margin: 0;
        padding: 0;
        list-style: none;
      }

      .market-footer-trust li {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: rgba(255,255,255,0.60);
        font-size: 14px;
      }

      .market-footer-trust i {
        color: #ff7a1a;
      }

      .market-footer-divider {
        margin: 44px 0;
        border: 0;
        border-top: 1px solid rgba(255,255,255,0.08);
      }

      .market-footer-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 40px;
      }

      .market-footer-column h5 {
        color: #fff;
        font-size: 17px;
        font-weight: 700;
        margin-bottom: 10px;
      }

      .market-footer-column p {
        color: rgba(255,255,255,0.58);
        font-size: 15px;
        line-height: 1.6;
        margin-bottom: 18px;
        max-width: 260px;
      }

      .market-footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        gap: 10px;
      }

      .market-footer-links a {
        font-size: 16px;
      }

      .market-footer-bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 18px;
        padding-top: 4px;
      }

      .market-footer-copy {
        margin: 0;
        color: rgba(255,255,255,0.52);
        font-size: 15px;
      }

      .market-footer-legal {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-end;
        gap: 22px;
      }

      .market-footer-legal a {
        color: rgba(255,255,255,0.56);
        font-size: 15px;
      }

      @media (max-width: 991.98px) {
        .market-footer {
          padding: 64px 0 24px;
        }

        .market-footer-top {
          grid-template-columns: 1fr;
        }

        .market-footer-grid {
          grid-template-columns: repeat(2, minmax(0, 1fr));
          gap: 30px;
        }

        .market-footer-bottom {
          flex-direction: column;
          align-items: flex-start;
        }

        .market-footer-legal {
          justify-content: flex-start;
        }
      }

      @media (max-width: 767.98px) {
        .market-footer {
          padding: 54px 0 22px;
        }

        .market-footer-subscribe {
          padding: 22px 18px 20px;
          border-radius: 20px;
        }

        .market-footer-form {
          flex-direction: column;
          align-items: stretch;
        }

        .market-footer-button {
          justify-content: center;
        }

        .market-footer-grid {
          grid-template-columns: 1fr;
        }

        .market-footer-trust {
          gap: 14px 18px;
        }
      }

      body.is-scroll-animations-ready .scroll-fx {
        opacity: 0;
        filter: blur(10px);
        transform: translate3d(0, 48px, 0) scale(0.985);
        transition:
          opacity 0.85s cubic-bezier(0.22, 1, 0.36, 1) var(--scroll-delay, 0ms),
          transform 0.95s cubic-bezier(0.22, 1, 0.36, 1) var(--scroll-delay, 0ms),
          filter 0.85s ease var(--scroll-delay, 0ms);
        will-change: opacity, transform, filter;
      }

      body.is-scroll-animations-ready .scroll-fx.scroll-fx-soft {
        filter: blur(6px);
        transform: translate3d(0, 28px, 0) scale(0.992);
      }

      body.is-scroll-animations-ready .scroll-fx.scroll-fx-up {
        transform: translate3d(0, 48px, 0) scale(0.985);
      }

      body.is-scroll-animations-ready .scroll-fx.scroll-fx-down {
        transform: translate3d(0, -48px, 0) scale(0.985);
      }

      body.is-scroll-animations-ready .scroll-fx.scroll-fx-left {
        transform: translate3d(-52px, 10px, 0) scale(0.985);
      }

      body.is-scroll-animations-ready .scroll-fx.scroll-fx-right {
        transform: translate3d(52px, 10px, 0) scale(0.985);
      }

      body.is-scroll-animations-ready .scroll-fx.is-visible {
        opacity: 1;
        filter: blur(0);
        transform: translate3d(0, 0, 0) scale(1);
      }

      @media (prefers-reduced-motion: reduce) {
        body.is-scroll-animations-ready .scroll-fx,
        body.is-scroll-animations-ready .scroll-fx.scroll-fx-soft,
        body.is-scroll-animations-ready .scroll-fx.scroll-fx-up,
        body.is-scroll-animations-ready .scroll-fx.scroll-fx-down,
        body.is-scroll-animations-ready .scroll-fx.scroll-fx-left,
        body.is-scroll-animations-ready .scroll-fx.scroll-fx-right {
          opacity: 1;
          filter: none;
          transform: none;
          transition: none;
        }
      }
    </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="{{ url('/') }}">Hello <span>Wholesaler</span></a>

      <!-- Toggle button -->
      <button class="navbar-toggler bg-dark text-white border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <i class="bi bi-list" style="font-size: 1.5rem; color: white;"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarContent">
        <!-- Right side buttons -->
        <div class="d-flex align-items-center flex-wrap right-options">
          <a href="{{ auth()->check() ? route('home') : route('user.login') }}"><button class="create-account-btn me-2 mb-2 mb-lg-0">Create Account</button></a>
          <a href="{{ route('home') }}" class="icon-btn"><i class="bi bi-person"></i></a>
          <a href="{{ route('cart.index') }}" class="icon-btn"><i class="bi bi-cart3"></i></a>

          <select class="form-select form-select-sm">
            <option>English</option>
            <option>Urdu</option>
          </select>

          <select class="form-select form-select-sm">
            <option>PKR</option>
            <option>USD</option>
          </select>

          <select class="form-select form-select-sm">
            <option>PK - Lahore</option>
            <option>PK - Karachi</option>
          </select>
        </div>
      </div>
    </div>
  </nav>

  <!-- Bottom navigation links -->
  <div class="bottom-nav d-flex justify-content-center flex-wrap">
    <a href="{{ route('stores.index') }}">All Categories</a>
    <a href="#">Order Protection</a>
    <a href="#">Help Center</a>
    <a href="#">Become a Supplier</a>
    <a href="#">Who We Help</a>
    <a href="#">Learn</a>
  </div>
@php
  $headerStars = [];
  for ($i = 1; $i <= 70; $i++) {
      $x = fmod(abs(sin($i * 12.9898) * 43758.5453), 1) * 100;
      $y = fmod(abs(sin($i * 78.233) * 43758.5453), 1) * 100;
      $s = fmod(abs(sin($i * 31.77) * 43758.5453), 1);
      $headerStars[] = [
          'left' => round($x, 2),
          'top' => round($y, 2),
          'size' => round(1 + ($s * 2), 2),
          'delay' => round($s * 5, 2),
          'duration' => round(2 + ($x / 100) * 4, 2),
      ];
  }
@endphp
<!-- Hero Section -->
<section class="hero-section animated-market-hero px-3 px-md-5">
  <div class="ahx-radial"></div>
  <div class="ahx-starfield" aria-hidden="true">
    @foreach($headerStars as $star)
      <span class="ahx-star" style="left: {{ $star['left'] }}%; top: {{ $star['top'] }}%; width: {{ $star['size'] }}px; height: {{ $star['size'] }}px; animation-delay: {{ $star['delay'] }}s; animation-duration: {{ $star['duration'] }}s;"></span>
    @endforeach
  </div>
  <div class="ahx-shape ahx-shape-diamond" aria-hidden="true"></div>
  <div class="ahx-shape ahx-shape-ring" aria-hidden="true"></div>
  <div class="ahx-shape ahx-shape-triangle" aria-hidden="true">
    <svg viewBox="0 0 100 100">
      <polygon points="50,10 90,85 10,85" fill="none" stroke="rgba(255,122,26,0.82)" stroke-width="1.5"></polygon>
    </svg>
  </div>
  <div class="ahx-shape ahx-shape-hex" aria-hidden="true">
    <svg viewBox="0 0 100 100">
      <defs>
        <linearGradient id="welcomeHexGradient" x1="0" y1="0" x2="1" y2="1">
          <stop offset="0%" stop-color="#ff8a3d"></stop>
          <stop offset="100%" stop-color="#c44a00"></stop>
        </linearGradient>
      </defs>
      <polygon points="50,5 92,27 92,73 50,95 8,73 8,27" fill="url(#welcomeHexGradient)" stroke="rgba(255,122,26,0.92)" stroke-width="1.5"></polygon>
    </svg>
  </div>
  <div class="ahx-sphere-wrap" aria-hidden="true">
    <svg viewBox="-220 -220 440 440" class="ahx-sphere-svg">
      <defs>
        <radialGradient id="welcomeSphereGlow" cx="50%" cy="50%" r="50%">
          <stop offset="0%" stop-color="rgba(255,107,26,0.25)"></stop>
          <stop offset="60%" stop-color="rgba(255,107,26,0.05)"></stop>
          <stop offset="100%" stop-color="rgba(255,107,26,0)"></stop>
        </radialGradient>
      </defs>
      <circle cx="0" cy="0" r="200" fill="url(#welcomeSphereGlow)"></circle>
      <g class="ahx-sphere-core">
        <g class="ahx-sphere-shell">
          <ellipse cx="0" cy="0" rx="184.78" ry="200" stroke="rgba(255,122,26,0.55)" stroke-width=".8" fill="none"></ellipse>
          <ellipse cx="0" cy="0" rx="141.42" ry="200" stroke="rgba(255,122,26,0.55)" stroke-width=".8" fill="none"></ellipse>
          <ellipse cx="0" cy="0" rx="76.54" ry="200" stroke="rgba(255,122,26,0.55)" stroke-width=".8" fill="none"></ellipse>
          <ellipse cx="0" cy="0" rx=".5" ry="200" stroke="rgba(255,122,26,0.55)" stroke-width=".8" fill="none"></ellipse>
        </g>
        <g class="ahx-sphere-shell ahx-sphere-shell-secondary" transform="rotate(24)">
          <ellipse cx="0" cy="0" rx="194" ry="200" stroke="rgba(255,154,74,0.35)" stroke-width=".8" fill="none"></ellipse>
          <ellipse cx="0" cy="0" rx="156" ry="200" stroke="rgba(255,154,74,0.35)" stroke-width=".8" fill="none"></ellipse>
          <ellipse cx="0" cy="0" rx="110" ry="200" stroke="rgba(255,154,74,0.35)" stroke-width=".8" fill="none"></ellipse>
          <ellipse cx="0" cy="0" rx="38" ry="200" stroke="rgba(255,154,74,0.35)" stroke-width=".8" fill="none"></ellipse>
        </g>
        <g class="ahx-sphere-latitudes">
          <ellipse cx="0" cy="0" rx="173.21" ry="100" stroke="rgba(255,122,26,0.55)" stroke-width=".8" fill="none"></ellipse>
          <ellipse cx="0" cy="-100" rx="173.21" ry=".5" stroke="rgba(255,122,26,0.55)" stroke-width=".8" fill="none"></ellipse>
          <ellipse cx="0" cy="100" rx="173.21" ry=".5" stroke="rgba(255,122,26,0.55)" stroke-width=".8" fill="none"></ellipse>
          <ellipse cx="0" cy="-173.21" rx="100" ry=".5" stroke="rgba(255,122,26,0.55)" stroke-width=".8" fill="none"></ellipse>
          <ellipse cx="0" cy="173.21" rx="100" ry=".5" stroke="rgba(255,122,26,0.55)" stroke-width=".8" fill="none"></ellipse>
        </g>
        <circle cx="0" cy="0" r="200" class="ahx-sphere-outline" stroke="rgba(255,122,26,0.82)" stroke-width="1.2" fill="none"></circle>
        <circle cx="0" cy="0" r="188" class="ahx-sphere-outline-dashed" stroke="rgba(255,154,74,0.35)" stroke-width="1" stroke-dasharray="12 10" fill="none"></circle>
        <circle cx="0" cy="0" r="8" fill="rgba(255,154,74,0.75)"></circle>
      </g>
    </svg>
    <div class="ahx-info-card ahx-info-bulk">
      <small>Bulk Discount</small>
      <strong>Up to 60% OFF</strong>
    </div>
    <div class="ahx-info-card ahx-info-supplier">
      <small>Verified Supplier</small>
      <div class="text-white fw-semibold mb-1">Karachi Textiles Co.</div>
      <strong>Rs. 280 / piece</strong>
    </div>
    <div class="ahx-info-card ahx-info-live">
      <small><span class="ahx-live-dot"></span>Live Now</small>
      <strong>12,480 buyers</strong>
    </div>
    <div class="ahx-info-card ahx-info-delivery">
      <small>Nationwide Delivery</small>
      <strong>Fast & Protected</strong>
    </div>
  </div>
  <div class="container">
    <div class="row align-items-center">
      
      <!-- Left Column -->
      <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 ahx-copy">
        <div class="ahx-trust-pill">
          <i class="bi bi-shield-check text-warning"></i>
          Your Money &amp; Orders, Fully Protected
        </div>
        <h1 class="fw-bold mb-3">
          Connecting Wholesalers and Retailers –
          <span class="d-block" style="color: #ff7b00;">Smarter, Faster, Easier</span>
        </h1>
        <p class="mb-4">
          Grow your business by reaching verified buyers and trusted suppliers across the country.
        </p>
        <div class="d-flex justify-content-center justify-content-lg-start gap-3">
          <a href="{{ route('stores.index') }}" class="btn btn-warning fw-semibold px-4 py-2 rounded-3">Start Buying</a>
          <a href="/seller" class="btn btn-light fw-semibold px-4 py-2 rounded-3">Join as Wholesaler</a>
        </div>
        <div class="ahx-chip-row">
          <span class="ahx-chip-label">
            <i class="bi bi-graph-up-arrow text-warning"></i>
            Trending:
          </span>
          @foreach($categories->take(6) as $category)
            <a href="{{ route('categories.show', $category->categoryId) }}" class="ahx-chip">{{ $category->categoryName }}</a>
          @endforeach
        </div>
        <div class="ahx-stats justify-content-center justify-content-lg-start">
          <div>
            <div class="ahx-stat-num">50K+</div>
            <div class="ahx-stat-label">VERIFIED SUPPLIERS</div>
          </div>
          <div>
            <div class="ahx-stat-num">2M+</div>
            <div class="ahx-stat-label">BULK PRODUCTS</div>
          </div>
          <div>
            <div class="ahx-stat-num">100%</div>
            <div class="ahx-stat-label">TRADE ASSURANCE</div>
          </div>
        </div>
      </div>

      <!-- Right Column -->
      <div class="col-lg-6 text-center ahx-visual">
        <div class="ahx-visual-copy">
            <h2 class="fw-bold mb-3">
              <span class="text-white">Pakistan's #1 Trusted</span><br>
              <span style="color: #ff7b00;">B2B Wholesale Marketplace</span>
            </h2>
            <p class="text-light small mb-0">Verified suppliers, protected trade, and nationwide wholesale delivery.</p>
        </div>
      </div>

    </div>
  </div>
  <div class="ahx-fade"></div>
</section>
<section class="hero-search-band">
  <div class="container">
    <div class="hero-search-shell">
      <form class="hero-search-form" id="heroSearchForm" action="{{ route('stores.index') }}" method="get">
        <div class="hero-search-pill">
          <div class="hero-search-field hero-search-select-wrap">
            <select class="hero-search-select" id="heroCategorySelect" aria-label="Browse by category">
              <option value="">Products</option>
              @foreach($categories as $category)
                <option value="{{ route('categories.show', $category->categoryId) }}">{{ $category->categoryName }}</option>
              @endforeach
            </select>
            <i class="bi bi-chevron-down hero-search-select-caret"></i>
          </div>

          <div class="hero-search-field hero-search-input-wrap">
            <input class="hero-search-input" type="search" name="q" placeholder="Search 2M+ products & suppliers...">
          </div>

          <button class="hero-search-button" type="submit">
            Search
            <i class="bi bi-arrow-right"></i>
          </button>
        </div>
      </form>

      <div class="hero-search-tags">
        <span class="hero-search-tag-label"><i class="bi bi-graph-up-arrow text-warning"></i> Trending:</span>
        @foreach($categories->take(6) as $category)
          <a href="{{ route('categories.show', $category->categoryId) }}" class="hero-search-tag">
            {{ \Illuminate\Support\Str::limit($category->categoryName, 20) }}
          </a>
        @endforeach
      </div>
    </div>
  </div>
</section>
<!-- ISO Certified Section -->
<section class="iso-section py-5 bg-light text-center">
  <div class="container">

    <span class="badge bg-white text-dark border px-3 py-2 mb-3">
      <i class="bi bi-shield-check me-1 text-success"></i> Certified & Trusted
    </span>

    <h2 class="fw-bold mb-2 text-dark">ISO Certified Platform</h2>
    <p class="text-muted mb-5">
      Hello Wholesaler maintains the highest international standards for quality, security, and customer satisfaction
    </p>

    <div class="row g-4">
      <!-- Card -->
      <div class="col-6 col-md-4 col-lg-3">
        <div class="iso-card p-4 rounded-4 shadow-sm bg-white">
          <div class="fs-3 text-primary mb-2">🏅</div>
          <h6 class="fw-bold mb-1">ISO 9001</h6>
          <small class="text-muted">Quality Management</small>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-3">
        <div class="iso-card p-4 rounded-4 shadow-sm bg-white">
          <div class="fs-3 text-purple mb-2">🔒</div>
          <h6 class="fw-bold mb-1">ISO 27001</h6>
          <small class="text-muted">Information Security</small>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-3">
        <div class="iso-card p-4 rounded-4 shadow-sm bg-white">
          <div class="fs-3 text-danger mb-2">⚖️</div>
          <h6 class="fw-bold mb-1">ISO 37001</h6>
          <small class="text-muted">Anti-Bribery Management</small>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-3">
        <div class="iso-card p-4 rounded-4 shadow-sm bg-white">
          <div class="fs-3 text-success mb-2">😊</div>
          <h6 class="fw-bold mb-1">ISO 10002</h6>
          <small class="text-muted">Customer Satisfaction</small>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-3">
        <div class="iso-card p-4 rounded-4 shadow-sm bg-white">
          <div class="fs-3 text-success mb-2">🌿</div>
          <h6 class="fw-bold mb-1">ISO 14001</h6>
          <small class="text-muted">Environmental Management</small>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-3">
        <div class="iso-card p-4 rounded-4 shadow-sm bg-white">
          <div class="fs-3 text-pink mb-2">💖</div>
          <h6 class="fw-bold mb-1">ISO 45001</h6>
          <small class="text-muted">Health & Safety</small>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-3">
        <div class="iso-card p-4 rounded-4 shadow-sm bg-white">
          <div class="fs-3 text-warning mb-2">🛡️</div>
          <h6 class="fw-bold mb-1">ISO 22301</h6>
          <small class="text-muted">Business Continuity</small>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-3">
        <div class="iso-card p-4 rounded-4 shadow-sm bg-white">
          <div class="fs-3 text-warning mb-2">⚠️</div>
          <h6 class="fw-bold mb-1">ISO 31000</h6>
          <small class="text-muted">Risk Management</small>
        </div>
      </div>
    </div>

  </div>
</section>
<section class="py-5 bg-white text-center category-section">
  <div class="container">

    <h2 class="fw-bold mb-5 text-dark">Browse by Category</h2>

    <div class="row g-4">

      @forelse($categories as $category)
        <div class="col-6 col-md-3">
          <a href="{{ route('categories.show', $category->categoryId) }}" class="text-decoration-none text-reset">
            <div class="cat-card p-4 bg-white rounded-4 shadow-sm h-100">
              <div class="cat-icon mb-3">
                @if(!empty($category->categoryImg))
                  <img
                    src="{{ asset($category->categoryImg) }}"
                    alt="{{ $category->categoryName }}"
                    style="width: 60px; height: 60px; object-fit: cover; border-radius: 12px;"
                  >
                @else
                  <i class="bi bi-grid"></i>
                @endif
              </div>
              <h6 class="fw-semibold">{{ $category->categoryName }}</h6>
              @if(!empty($category->categoryDesc))
                <p class="small text-muted mb-0">{{ \Illuminate\Support\Str::limit($category->categoryDesc, 60) }}</p>
              @endif
            </div>
          </a>
        </div>
      @empty
        <div class="col-12">
          <p class="text-muted">No categories available right now.</p>
        </div>
      @endforelse

    </div>

  </div>
</section>
<section class="py-5 text-center why-section" style="background:#f7f7f7;">

  <div class="container">

    <h2 class="fw-bold text-dark">Why Choose Hello Wholesaler?</h2>
    <p class="text-muted mb-5">
      Pakistan's most trusted B2B marketplace with complete buyer protection
    </p>

    <div class="row g-4">

      <!-- Card 1 -->
      <div class="col-12 col-md-3">
        <div class="why-card p-4 bg-white rounded-4 shadow-sm">
          <div class="why-icon mb-3">
            <i class="bi bi-shield-check"></i>
          </div>
          <h5 class="fw-semibold">Trade Assurance</h5>
          <p class="text-muted small">Your orders are protected from payment to delivery</p>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-12 col-md-3">
        <div class="why-card p-4 bg-white rounded-4 shadow-sm">
          <div class="why-icon mb-3">
            <i class="bi bi-patch-check"></i>
          </div>
          <h5 class="fw-semibold">Verified Sellers</h5>
          <p class="text-muted small">All suppliers are thoroughly vetted and verified</p>
        </div>
      </div>

      <!-- Card 3 (Highlighted Card) -->
      <div class="col-12 col-md-3">
        <div class="why-card highlight-card p-4 rounded-4">
          <div class="why-icon mb-3">
            <i class="bi bi-cash-stack"></i>
          </div>
          <h5 class="fw-semibold">Lowest Wholesale Prices</h5>
          <p class="text-muted small">
            Competitive bulk pricing for maximum profit margins
          </p>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-12 col-md-3">
        <div class="why-card p-4 bg-white rounded-4 shadow-sm">
          <div class="why-icon mb-3">
            <i class="bi bi-truck"></i>
          </div>
          <h5 class="fw-semibold">Nationwide Delivery</h5>
          <p class="text-muted small">Fast and reliable shipping all over Pakistan</p>
        </div>
      </div>

    </div>

  </div>
</section>

<section class="how-it-works-section">
  <div class="container how-it-works-shell text-center">
    <span class="how-it-works-kicker">
      <i class="bi bi-stars"></i>
      Wholesale Flow
    </span>
    <div class="how-it-works-heading">
      <h2 class="fw-bold">How It Works</h2>
      <p>Start your wholesale journey in 3 simple steps</p>
    </div>

    <div class="row g-4 justify-content-center how-steps-grid">
      <div class="col-12 col-md-4">
        <div class="how-step-card text-center">
          <span class="how-step-badge">01</span>
          <div class="how-step-icon">
            <i class="bi bi-search"></i>
          </div>
          <h5 class="fw-bold">Find Supplier</h5>
          <p>Browse thousands of verified suppliers and products in Pakistan</p>
          <div class="how-step-accent"></div>
        </div>
      </div>

      <div class="col-12 col-md-4">
        <div class="how-step-card text-center">
          <span class="how-step-badge">02</span>
          <div class="how-step-icon">
            <i class="bi bi-shield-check"></i>
          </div>
          <h5 class="fw-bold">Secure Payment</h5>
          <p>Pay safely with our protected payment system</p>
          <div class="how-step-accent"></div>
        </div>
      </div>

      <div class="col-12 col-md-4">
        <div class="how-step-card text-center">
          <span class="how-step-badge">03</span>
          <div class="how-step-icon">
            <i class="bi bi-truck"></i>
          </div>
          <h5 class="fw-bold">Get Delivery</h5>
          <p>Receive your bulk order at your doorstep nationwide</p>
          <div class="how-step-accent"></div>
        </div>
      </div>
    </div>
  </div>
</section> 
<section class="py-5 bg-light">
    <div class="container my-5">
    
        <h2 class="fw-bold text-dark">Featured Suppliers</h2>
        <p class="text-muted">Top-rated wholesale suppliers from across Pakistan</p>
    
        <div class="row g-4">
    
            <!-- Card 1 -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                    <div class="supplier-img">     <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASIAAACuCAMAAAClZfCTAAAANlBMVEXMzMyTk5PPz8+SkpLLy8uWlpbFxcWbm5vIyMjBwcGlpaWioqKsrKycnJy9vb2fn5+qqqq2trYQwOZhAAAEr0lEQVR4nO2Z23akOAxFy3djwMD//+xIsgCTpKfykJ4Vrzn7KcZG3TpYF7teLwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD4n2OZ5/AHXrTft/PrsBdtnPfg1uOaPVYTSvyGczbugZZO9hyWYLbejgt7/Nn/+n+EPZIyZx5H8jMEs+vsLqMwvTdU24vhaBpNbbioYkVGaUyNRAT+/68i0Up/phBc87Q6GYXVvzOT9cVgRIac1E6V2aPZMdtfdOTvcUoUtsx7ypg925qCCObJ72r9YszxJtT4xSXbvLQNKENvK1nlWRIsTTYX4+qA+cjPrss0fjYzbRhbjeHPX50Rn4rZ3mwju5mZV1Jksrh+M+UldhzHKAnGOUqfjgYFSL5HlInad57Nbl92adKQp+HOIldi70tUTrrR2tIpiDQsCmUjW8wsLxym/8dGIYd+g9DukRE5w+lnO9MtRdq5xC57ET/9si/Xq6RtS+nZuShxZttiFsef+mWjuWkooit3B0OuaUKtXH3yqh7Z+SpNPOUWfladuzPUlFJWe7SLWJk2VR3FXUxaEmlTvUtqv5DqlrindZk0k2iyiFTobQyuxRc/v10rEkvkbr//fPubt1/myNq19rsU7RTOOC2d1KNALs3JSD/zarulPfeGShllFHWcktLt2mRIMI6lj0FDe7Em3mJ2PXdLdiQ15ScVc+mlHgRyPhjnnAlcj0kidc2TACyRPVd1EvE70yv1j9rzY5mDJObPEunSISUq1AhF6mdMoGRyu2ZZIso6V45KnWuZttHRFzm1tZHS0l3bcNlxVO6PU6Kn1KNQQjtrSNzY7Y8Srf2RdDHd2aJ7PG9Bap9NV1r+KNE8nkQ5apqgttjelesMtDb38evz8eKL85a1fpo5CD8Hmq4YMdAuRAUKO03XWdN1PicfX1/OF1/6ajNvL3s1VE2icKbrfWiJON2QFFr0J0o1NqbWI3dFvMFn1ucu8vlsAFgFWl++LPrzgEXfaz8jXSNX8rUNqXXMpITGi322fJ9zkV1S6dLNFZhslVtH7Q/8OmDrWGeNoNYdTs5IaLGPr/uj+2cP5IMp5VHR7ozcYokOMqdVbgLW+wDyjZunX0Z12kB7qdPxLEVJjp+LSXKMPZ6XYbSJIh3K+rRSrwOqvBm16rfTLQmVXmpnvGMsaUJntJdcG/EHLiSGlXTMoyhZ2VLA9ZcYUTLybsz0sCMb7my6ZzqHiMZyw1blwoly23mbORKUWMNe41SCXBTx4WKb8hGCjPg4tmQq5I84azEm4j7sLDGTHbk54AuneeILNlnjN2op87Q9VB2GyHep3BW31MKu8lBzBp3bedSue5QpSGfAO6S7Q6SqZcSOvrmpnWa1qp0hS77Ve/gr2dCWCddFrD149nnnmFzrlnxwXWaxer2fVDYqXnw4rld7zlZ7pQfCxqPM5bic9TRc7uQcF5rsFfIx6myOsZ/4dzsT2alvfyT4rXz8FfDT6Cd+anyN+0sjAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAr38AAykkNjw18qYAAAAASUVORK5CYII=" alt=""> </div>
                    <div class="card-body">
                        <span class="badge bg-orange mb-2">Top Seller</span>
    
                        <h6 class="fw-bold mb-1">Premium Cotton T-Shirts</h6>
                        <p class="text-muted small mb-1">Textile Mills Pakistan</p>
    
                        <p class="text-muted small mb-1">
                            <i class="bi bi-geo-alt"></i> Faisalabad
                        </p>
    
                        <p class="small mb-3">
                            <i class="bi bi-star-fill text-warning"></i> 4.8
                        </p>
    
                        <div class="d-flex justify-content-between small">
                            <span class="text-muted">Price:</span>
                            <span class="fw-bold">PKR 200/piece</span>
                        </div>
    
                        <div class="d-flex justify-content-between small">
                            <span class="text-muted">Min Order:</span>
                            <span class="fw-bold">500 pieces</span>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Card 2 -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                    <div class="supplier-img">     <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASIAAACuCAMAAAClZfCTAAAANlBMVEXMzMyTk5PPz8+SkpLLy8uWlpbFxcWbm5vIyMjBwcGlpaWioqKsrKycnJy9vb2fn5+qqqq2trYQwOZhAAAEr0lEQVR4nO2Z23akOAxFy3djwMD//+xIsgCTpKfykJ4Vrzn7KcZG3TpYF7teLwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD4n2OZ5/AHXrTft/PrsBdtnPfg1uOaPVYTSvyGczbugZZO9hyWYLbejgt7/Nn/+n+EPZIyZx5H8jMEs+vsLqMwvTdU24vhaBpNbbioYkVGaUyNRAT+/68i0Up/phBc87Q6GYXVvzOT9cVgRIac1E6V2aPZMdtfdOTvcUoUtsx7ypg925qCCObJ72r9YszxJtT4xSXbvLQNKENvK1nlWRIsTTYX4+qA+cjPrss0fjYzbRhbjeHPX50Rn4rZ3mwju5mZV1Jksrh+M+UldhzHKAnGOUqfjgYFSL5HlInad57Nbl92adKQp+HOIldi70tUTrrR2tIpiDQsCmUjW8wsLxym/8dGIYd+g9DukRE5w+lnO9MtRdq5xC57ET/9si/Xq6RtS+nZuShxZttiFsef+mWjuWkooit3B0OuaUKtXH3yqh7Z+SpNPOUWfladuzPUlFJWe7SLWJk2VR3FXUxaEmlTvUtqv5DqlrindZk0k2iyiFTobQyuxRc/v10rEkvkbr//fPubt1/myNq19rsU7RTOOC2d1KNALs3JSD/zarulPfeGShllFHWcktLt2mRIMI6lj0FDe7Em3mJ2PXdLdiQ15ScVc+mlHgRyPhjnnAlcj0kidc2TACyRPVd1EvE70yv1j9rzY5mDJObPEunSISUq1AhF6mdMoGRyu2ZZIso6V45KnWuZttHRFzm1tZHS0l3bcNlxVO6PU6Kn1KNQQjtrSNzY7Y8Srf2RdDHd2aJ7PG9Bap9NV1r+KNE8nkQ5apqgttjelesMtDb38evz8eKL85a1fpo5CD8Hmq4YMdAuRAUKO03XWdN1PicfX1/OF1/6ajNvL3s1VE2icKbrfWiJON2QFFr0J0o1NqbWI3dFvMFn1ucu8vlsAFgFWl++LPrzgEXfaz8jXSNX8rUNqXXMpITGi322fJ9zkV1S6dLNFZhslVtH7Q/8OmDrWGeNoNYdTs5IaLGPr/uj+2cP5IMp5VHR7ozcYokOMqdVbgLW+wDyjZunX0Z12kB7qdPxLEVJjp+LSXKMPZ6XYbSJIh3K+rRSrwOqvBm16rfTLQmVXmpnvGMsaUJntJdcG/EHLiSGlXTMoyhZ2VLA9ZcYUTLybsz0sCMb7my6ZzqHiMZyw1blwoly23mbORKUWMNe41SCXBTx4WKb8hGCjPg4tmQq5I84azEm4j7sLDGTHbk54AuneeILNlnjN2op87Q9VB2GyHep3BW31MKu8lBzBp3bedSue5QpSGfAO6S7Q6SqZcSOvrmpnWa1qp0hS77Ve/gr2dCWCddFrD149nnnmFzrlnxwXWaxer2fVDYqXnw4rld7zlZ7pQfCxqPM5bic9TRc7uQcF5rsFfIx6myOsZ/4dzsT2alvfyT4rXz8FfDT6Cd+anyN+0sjAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAr38AAykkNjw18qYAAAAASUVORK5CYII=" alt=""> </div>
                    <div class="card-body">
                        <span class="badge bg-orange mb-2">Verified</span>
    
                        <h6 class="fw-bold mb-1">Mobile Phone Cases</h6>
                        <p class="text-muted small mb-1">Tech Accessories Hub</p>
    
                        <p class="text-muted small mb-1">
                            <i class="bi bi-geo-alt"></i> Karachi
                        </p>
    
                        <p class="small mb-3">
                            <i class="bi bi-star-fill text-warning"></i> 4.6
                        </p>
    
                        <div class="d-flex justify-content-between small">
                            <span class="text-muted">Price:</span>
                            <span class="fw-bold">PKR 50/piece</span>
                        </div>
    
                        <div class="d-flex justify-content-between small">
                            <span class="text-muted">Min Order:</span>
                            <span class="fw-bold">1000 pieces</span>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Card 3 -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                    <div class="supplier-img">     <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASIAAACuCAMAAAClZfCTAAAANlBMVEXMzMyTk5PPz8+SkpLLy8uWlpbFxcWbm5vIyMjBwcGlpaWioqKsrKycnJy9vb2fn5+qqqq2trYQwOZhAAAEr0lEQVR4nO2Z23akOAxFy3djwMD//+xIsgCTpKfykJ4Vrzn7KcZG3TpYF7teLwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD4n2OZ5/AHXrTft/PrsBdtnPfg1uOaPVYTSvyGczbugZZO9hyWYLbejgt7/Nn/+n+EPZIyZx5H8jMEs+vsLqMwvTdU24vhaBpNbbioYkVGaUyNRAT+/68i0Up/phBc87Q6GYXVvzOT9cVgRIac1E6V2aPZMdtfdOTvcUoUtsx7ypg925qCCObJ72r9YszxJtT4xSXbvLQNKENvK1nlWRIsTTYX4+qA+cjPrss0fjYzbRhbjeHPX50Rn4rZ3mwju5mZV1Jksrh+M+UldhzHKAnGOUqfjgYFSL5HlInad57Nbl92adKQp+HOIldi70tUTrrR2tIpiDQsCmUjW8wsLxym/8dGIYd+g9DukRE5w+lnO9MtRdq5xC57ET/9si/Xq6RtS+nZuShxZttiFsef+mWjuWkooit3B0OuaUKtXH3yqh7Z+SpNPOUWfladuzPUlFJWe7SLWJk2VR3FXUxaEmlTvUtqv5DqlrindZk0k2iyiFTobQyuxRc/v10rEkvkbr//fPubt1/myNq19rsU7RTOOC2d1KNALs3JSD/zarulPfeGShllFHWcktLt2mRIMI6lj0FDe7Em3mJ2PXdLdiQ15ScVc+mlHgRyPhjnnAlcj0kidc2TACyRPVd1EvE70yv1j9rzY5mDJObPEunSISUq1AhF6mdMoGRyu2ZZIso6V45KnWuZttHRFzm1tZHS0l3bcNlxVO6PU6Kn1KNQQjtrSNzY7Y8Srf2RdDHd2aJ7PG9Bap9NV1r+KNE8nkQ5apqgttjelesMtDb38evz8eKL85a1fpo5CD8Hmq4YMdAuRAUKO03XWdN1PicfX1/OF1/6ajNvL3s1VE2icKbrfWiJON2QFFr0J0o1NqbWI3dFvMFn1ucu8vlsAFgFWl++LPrzgEXfaz8jXSNX8rUNqXXMpITGi322fJ9zkV1S6dLNFZhslVtH7Q/8OmDrWGeNoNYdTs5IaLGPr/uj+2cP5IMp5VHR7ozcYokOMqdVbgLW+wDyjZunX0Z12kB7qdPxLEVJjp+LSXKMPZ6XYbSJIh3K+rRSrwOqvBm16rfTLQmVXmpnvGMsaUJntJdcG/EHLiSGlXTMoyhZ2VLA9ZcYUTLybsz0sCMb7my6ZzqHiMZyw1blwoly23mbORKUWMNe41SCXBTx4WKb8hGCjPg4tmQq5I84azEm4j7sLDGTHbk54AuneeILNlnjN2op87Q9VB2GyHep3BW31MKu8lBzBp3bedSue5QpSGfAO6S7Q6SqZcSOvrmpnWa1qp0hS77Ve/gr2dCWCddFrD149nnnmFzrlnxwXWaxer2fVDYqXnw4rld7zlZ7pQfCxqPM5bic9TRc7uQcF5rsFfIx6myOsZ/4dzsT2alvfyT4rXz8FfDT6Cd+anyN+0sjAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAr38AAykkNjw18qYAAAAASUVORK5CYII=" alt=""> </div>
                    <div class="card-body">
                        <span class="badge bg-orange mb-2">Top Seller</span>
    
                        <h6 class="fw-bold mb-1">Beauty Products Set</h6>
                        <p class="text-muted small mb-1">Beauty Wholesale Co.</p>
    
                        <p class="text-muted small mb-1">
                            <i class="bi bi-geo-alt"></i> Lahore
                        </p>
    
                        <p class="small mb-3">
                            <i class="bi bi-star-fill text-warning"></i> 4.9
                        </p>
    
                        <div class="d-flex justify-content-between small">
                            <span class="text-muted">Price:</span>
                            <span class="fw-bold">PKR 300/set</span>
                        </div>
    
                        <div class="d-flex justify-content-between small">
                            <span class="text-muted">Min Order:</span>
                            <span class="fw-bold">200 sets</span>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Card 4 -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                    <div class="supplier-img">     <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASIAAACuCAMAAAClZfCTAAAANlBMVEXMzMyTk5PPz8+SkpLLy8uWlpbFxcWbm5vIyMjBwcGlpaWioqKsrKycnJy9vb2fn5+qqqq2trYQwOZhAAAEr0lEQVR4nO2Z23akOAxFy3djwMD//+xIsgCTpKfykJ4Vrzn7KcZG3TpYF7teLwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD4n2OZ5/AHXrTft/PrsBdtnPfg1uOaPVYTSvyGczbugZZO9hyWYLbejgt7/Nn/+n+EPZIyZx5H8jMEs+vsLqMwvTdU24vhaBpNbbioYkVGaUyNRAT+/68i0Up/phBc87Q6GYXVvzOT9cVgRIac1E6V2aPZMdtfdOTvcUoUtsx7ypg925qCCObJ72r9YszxJtT4xSXbvLQNKENvK1nlWRIsTTYX4+qA+cjPrss0fjYzbRhbjeHPX50Rn4rZ3mwju5mZV1Jksrh+M+UldhzHKAnGOUqfjgYFSL5HlInad57Nbl92adKQp+HOIldi70tUTrrR2tIpiDQsCmUjW8wsLxym/8dGIYd+g9DukRE5w+lnO9MtRdq5xC57ET/9si/Xq6RtS+nZuShxZttiFsef+mWjuWkooit3B0OuaUKtXH3yqh7Z+SpNPOUWfladuzPUlFJWe7SLWJk2VR3FXUxaEmlTvUtqv5DqlrindZk0k2iyiFTobQyuxRc/v10rEkvkbr//fPubt1/myNq19rsU7RTOOC2d1KNALs3JSD/zarulPfeGShllFHWcktLt2mRIMI6lj0FDe7Em3mJ2PXdLdiQ15ScVc+mlHgRyPhjnnAlcj0kidc2TACyRPVd1EvE70yv1j9rzY5mDJObPEunSISUq1AhF6mdMoGRyu2ZZIso6V45KnWuZttHRFzm1tZHS0l3bcNlxVO6PU6Kn1KNQQjtrSNzY7Y8Srf2RdDHd2aJ7PG9Bap9NV1r+KNE8nkQ5apqgttjelesMtDb38evz8eKL85a1fpo5CD8Hmq4YMdAuRAUKO03XWdN1PicfX1/OF1/6ajNvL3s1VE2icKbrfWiJON2QFFr0J0o1NqbWI3dFvMFn1ucu8vlsAFgFWl++LPrzgEXfaz8jXSNX8rUNqXXMpITGi322fJ9zkV1S6dLNFZhslVtH7Q/8OmDrWGeNoNYdTs5IaLGPr/uj+2cP5IMp5VHR7ozcYokOMqdVbgLW+wDyjZunX0Z12kB7qdPxLEVJjp+LSXKMPZ6XYbSJIh3K+rRSrwOqvBm16rfTLQmVXmpnvGMsaUJntJdcG/EHLiSGlXTMoyhZ2VLA9ZcYUTLybsz0sCMb7my6ZzqHiMZyw1blwoly23mbORKUWMNe41SCXBTx4WKb8hGCjPg4tmQq5I84azEm4j7sLDGTHbk54AuneeILNlnjN2op87Q9VB2GyHep3BW31MKu8lBzBp3bedSue5QpSGfAO6S7Q6SqZcSOvrmpnWa1qp0hS77Ve/gr2dCWCddFrD149nnnmFzrlnxwXWaxer2fVDYqXnw4rld7zlZ7pQfCxqPM5bic9TRc7uQcF5rsFfIx6myOsZ/4dzsT2alvfyT4rXz8FfDT6Cd+anyN+0sjAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAr38AAykkNjw18qYAAAAASUVORK5CYII=" alt=""> </div>
                    <div class="card-body">
                        <span class="badge bg-orange mb-2">Verified</span>
    
                        <h6 class="fw-bold mb-1">Kitchen Utensils Bulk</h6>
                        <p class="text-muted small mb-1">Home Essentials Ltd</p>
    
                        <p class="text-muted small mb-1">
                            <i class="bi bi-geo-alt"></i> Islamabad
                        </p>
    
                        <p class="small mb-3">
                            <i class="bi bi-star-fill text-warning"></i> 4.7
                        </p>
    
                        <div class="d-flex justify-content-between small">
                            <span class="text-muted">Price:</span>
                            <span class="fw-bold">PKR 150/piece</span>
                        </div>
    
                        <div class="d-flex justify-content-between small">
                            <span class="text-muted">Min Order:</span>
                            <span class="fw-bold">300 pieces</span>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
</section>

<div class="container my-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">
            🔥 Top Deals 🔥
        </h2>
        <p class="text-muted">
            Limited time wholesale offers – Grab them before they’re gone!
        </p>
    </div>

    <div class="row g-4">

        <!-- Deal Card 1 -->
        <div class="col-md-3">
            <div class="deal-card shadow-sm rounded-4 overflow-hidden bg-white">
                <div class="deal-img">
                    <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b" alt="">
                    <span class="deal-badge-left">⏰ 2 days left</span>
                    <span class="deal-badge-right">40% OFF</span>
                </div>

                <div class="p-3">
                    <h6 class="fw-bold text-dark">Wholesale T-Shirt Pack</h6>
                    <p class="text-muted small mb-1">Garment Galaxy</p>

                    <p class="small mb-1">
                        <del class="text-muted">PKR 200</del>
                        <span class="fw-bold text-orange">PKR 120</span>
                    </p>

                    <p class="small mb-3 text-dark">MOQ: 100 pcs</p>

                    <button class="btn btn-orange w-100 rounded-pill">
                        <i class="bi bi-tag"></i> Grab Deal
                    </button>
                </div>
            </div>
        </div>

        <!-- Deal Card 2 -->
        <div class="col-md-3">
            <div class="deal-card shadow-sm rounded-4 overflow-hidden bg-white">
                <div class="deal-img">
                    <img src="https://images.unsplash.com/photo-1523475496153-3d6ccf5f3f03" alt="">
                    <span class="deal-badge-left">⏰ 1 day left</span>
                    <span class="deal-badge-right">40% OFF</span>
                </div>

                <div class="p-3">
                    <h6 class="fw-bold text-dark">Smart Watch Wholesale</h6>
                    <p class="text-muted small mb-1">Tech Traders</p>

                    <p class="small mb-1">
                        <del class="text-muted">PKR 3000</del>
                        <span class="fw-bold text-orange">PKR 1800</span>
                    </p>

                    <p class="small mb-3 text-dark">MOQ: 50 pcs</p>

                    <button class="btn btn-orange w-100 rounded-pill">
                        <i class="bi bi-tag"></i> Grab Deal
                    </button>
                </div>
            </div>
        </div>

        <!-- Deal Card 3 -->
        <div class="col-md-3">
            <div class="deal-card shadow-sm rounded-4 overflow-hidden bg-white">
                <div class="deal-img">
                    <img src="https://images.unsplash.com/photo-1601050690597-df6b0ec9cb99" alt="">
                    <span class="deal-badge-left">⏰ 3 days left</span>
                    <span class="deal-badge-right">40% OFF</span>
                </div>

                <div class="p-3">
                    <h6 class="fw-bold text-dark">Beauty Products Bundle</h6>
                    <p class="text-muted small mb-1">Cosmetics Plus</p>

                    <p class="small mb-1">
                        <del class="text-muted">PKR 800</del>
                        <span class="fw-bold text-orange">PKR 480</span>
                    </p>

                    <p class="small mb-3 text-dark">MOQ: 200 pcs</p>

                    <button class="btn btn-orange w-100 rounded-pill">
                        <i class="bi bi-tag"></i> Grab Deal
                    </button>
                </div>
            </div>
        </div>

        <!-- Deal Card 4 -->
        <div class="col-md-3">
            <div class="deal-card shadow-sm rounded-4 overflow-hidden bg-white">
                <div class="deal-img">
                    <img src="https://images.unsplash.com/photo-1507089947368-19c1da9775ae" alt="">
                    <span class="deal-badge-left">⏰ 5 days left</span>
                    <span class="deal-badge-right">40% OFF</span>
                </div>

                <div class="p-3">
                    <h6 class="fw-bold text-dark">Kitchen Items Set</h6>
                    <p class="text-muted small mb-1">Home Essentials</p>

                    <p class="small mb-1">
                        <del class="text-muted">PKR 1500</del>
                        <span class="fw-bold text-orange">PKR 900</span>
                    </p>

                    <p class="small mb-3 text-dark">MOQ: 80 pcs</p>

                    <button class="btn btn-orange w-100 rounded-pill">
                        <i class="bi bi-tag"></i> Grab Deal
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

<section class="new-arrivals-section py-5">
    <div class="container">

        <!-- Heading -->
        <div class="text-center mb-4">
            <h2 class="fw-bold display-6 text-dark">✨ New Arrivals ✨</h2>
            <p class="text-muted">Fresh products from verified suppliers, just added this week</p>
        </div>

        <div class="row gy-4">

            <!-- Card 1 -->
            <div class="col-lg-3 col-md-6">
                <div class="arrival-card shadow-sm rounded-4 overflow-hidden bg-white">
                    <div class="arrival-img">
                        <img src="https://images.unsplash.com/photo-1585386959984-a4155228f276" alt="">
                        <span class="arrival-badge">⚡ Just Landed</span>
                    </div>

                    <div class="p-3">
                        <h6 class="fw-bold text-dark">Premium Wireless Earbuds</h6>
                        <p class="small text-muted mb-2">Audio Pro PK</p>

                        <p class="fw-bold fs-5 mb-1 text-dark">PKR 1200</p>

                        <p class="small text-dark mb-3">MOQ: 50 pcs</p>

                        <button class="btn btn-dark w-100 rounded-pill">
                            <i class="bi bi-box-arrow-up-right"></i> View Details
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-3 col-md-6">
                <div class="arrival-card shadow-sm rounded-4 overflow-hidden bg-white">
                    <div class="arrival-img">
                        <img src="https://images.unsplash.com/photo-1609941068060-942a6d0bbf93" alt="">
                        <span class="arrival-badge">🆕 New</span>
                    </div>

                    <div class="p-3">
                        <h6 class="fw-bold text-dark">Eco-Friendly Water Bottles</h6>
                        <p class="small text-muted mb-2">Green Supplies</p>

                        <p class="fw-bold fs-5 mb-1 text-dark">PKR 250</p>

                        <p class="small text-dark mb-3">MOQ: 100 pcs</p>

                        <button class="btn btn-dark w-100 rounded-pill">
                            <i class="bi bi-box-arrow-up-right"></i> View Details
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-3 col-md-6">
                <div class="arrival-card shadow-sm rounded-4 overflow-hidden bg-white">
                    <div class="arrival-img">
                        <img src="https://images.unsplash.com/photo-1600185365483-26d7d3e94a28" alt="">
                        <span class="arrival-badge">🔥 Trending</span>
                    </div>

                    <div class="p-3">
                        <h6 class="fw-bold text-dark">Designer Handbags</h6>
                        <p class="small text-muted mb-2">Fashion Forward</p>

                        <p class="fw-bold fs-5 mb-1 text-dark">PKR 800</p>

                        <p class="small text-dark mb-3">MOQ: 30 pcs</p>

                        <button class="btn btn-dark w-100 rounded-pill">
                            <i class="bi bi-box-arrow-up-right"></i> View Details
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-lg-3 col-md-6">
                <div class="arrival-card shadow-sm rounded-4 overflow-hidden bg-white">
                    <div class="arrival-img">
                        <img src="https://images.unsplash.com/photo-1598555393420-6b63f5f5c0be" alt="">
                        <span class="arrival-badge">🔥 Hot</span>
                    </div>

                    <div class="p-3">
                        <h6 class="fw-bold text-dark">Smart LED Strips</h6>
                        <p class="small text-muted mb-2">Light Masters</p>

                        <p class="fw-bold fs-5 mb-1 text-dark">PKR 400</p>

                        <p class="small text-dark mb-3">MOQ: 60 pcs</p>

                        <button class="btn btn-dark w-100 rounded-pill">
                            <i class="bi bi-box-arrow-up-right"></i> View Details
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="trusted-section py-5">
    <div class="container text-center">

        <!-- Top Badge -->
        <div class="badge-wrapper mb-3">
            <span class="badge-powered">⚡ Powered & Partnered With</span>
        </div>

        <!-- Heading -->
        <h2 class="fw-bold mb-2">Trusted by Industry Leaders</h2>

        <!-- Subtext -->
        <p class="text-muted mb-5">
            We collaborate with Pakistan's and world's leading organizations 
            to deliver the best B2B experience
        </p>

        <!-- Logos Grid -->
        <div class="row g-4 justify-content-center">
            
            <!-- Single Item -->
            <div class="col-6 col-md-4 col-lg-2">
                <div class="brand-box">
                    <i class="bi bi-building"></i>
                    <h6 class="mt-2 mb-0 text-dark">Google Partner</h6>
                    <small class="text-muted">Technology</small>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-2">
                <div class="brand-box">
                    <i class="bi bi-building"></i>
                    <h6 class="mt-2 mb-0 text-dark">Payoneer</h6>
                    <small class="text-muted">Payments</small>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-2">
                <div class="brand-box">
                    <i class="bi bi-building"></i>
                    <h6 class="mt-2 mb-0 text-dark">Faysal Bank</h6>
                    <small class="text-muted">Banking</small>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-2">
                <div class="brand-box">
                    <i class="bi bi-building"></i>
                    <h6 class="mt-2 mb-0 text-dark">UBL Bank</h6>
                    <small class="text-muted">Banking</small>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-2">
                <div class="brand-box">
                    <i class="bi bi-building"></i>
                    <h6 class="mt-2 mb-0 text-dark">HBL Bank</h6>
                    <small class="text-muted">Banking</small>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-2">
                <div class="brand-box">
                    <i class="bi bi-building"></i>
                    <h6 class="mt-2 mb-0 text-dark">Meezan Bank</h6>
                    <small class="text-muted">Banking</small>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-2">
                <div class="brand-box">
                    <i class="bi bi-building"></i>
                    <h6 class="mt-2 mb-0 text-dark">Visa</h6>
                    <small class="text-muted">Payments</small>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-2">
                <div class="brand-box">
                    <i class="bi bi-building"></i>
                    <h6 class="mt-2 mb-0 text-dark">MasterCard</h6>
                    <small class="text-muted">Payments</small>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-2">
                <div class="brand-box">
                    <i class="bi bi-building"></i>
                    <h6 class="mt-2 mb-0 text-dark">UnionPay</h6>
                    <small class="text-muted">Payments</small>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-2">
                <div class="brand-box">
                    <i class="bi bi-building"></i>
                    <h6 class="mt-2 mb-0 text-dark">JazzCash</h6>
                    <small class="text-muted">Mobile Money</small>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-2">
                <div class="brand-box">
                    <i class="bi bi-building"></i>
                    <h6 class="mt-2 mb-0 text-dark">Easypaisa</h6>
                    <small class="text-muted">Mobile Money</small>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-2">
                <div class="brand-box">
                    <i class="bi bi-building"></i>
                    <h6 class="mt-2 mb-0 text-dark">TCS</h6>
                    <small class="text-muted">Logistics</small>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="media-exhibition-section py-5">
    <div class="container">

        <!-- Heading -->
        <div class="text-center mb-4">
            <h2 class="fw-bold text-dark">Media & Exhibitions</h2>
            <p class="text-muted">
                Hello Wholesaler has been featured in leading Pakistani media and prestigious trade exhibitions
            </p>
        </div>

        <!-- Two Column Box -->
        <div class="row g-4">
            
            <!-- Media Coverage Box -->
            <div class="col-md-6">
                <div class="info-card p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-newspaper me-2 icon-lg"></i>
                        <h5 class="fw-bold mb-0">Media Coverage</h5>
                    </div>

                    <ul class="list-group list-group-flush custom-list">
                        <li class="list-group-item">Dawn News <span class="badge-type">Media</span></li>
                        <li class="list-group-item">The News International <span class="badge-type">Media</span></li>
                        <li class="list-group-item">Geo Business <span class="badge-type">Media</span></li>
                        <li class="list-group-item">ARY News <span class="badge-type">Media</span></li>
                        <li class="list-group-item">Business Recorder <span class="badge-type">Media</span></li>
                        <li class="list-group-item">TechJuice.pk <span class="badge-type">Media</span></li>
                        <li class="list-group-item">ProPakistani <span class="badge-type">Media</span></li>
                    </ul>
                </div>
            </div>

            <!-- Exhibitions Box -->
            <div class="col-md-6">
                <div class="info-card p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-award me-2 icon-lg text-warning"></i>
                        <h5 class="fw-bold mb-0">Exhibitions & Events</h5>
                    </div>

                    <ul class="list-group list-group-flush custom-list">
                        <li class="list-group-item">Lahore Expo Center <span class="badge-type-2">Exhibition</span></li>
                        <li class="list-group-item">Karachi Expo Center <span class="badge-type-2">Exhibition</span></li>
                        <li class="list-group-item">Islamabad Chamber of Commerce <span class="badge-type-2">Chamber</span></li>
                        <li class="list-group-item">International Trade Shows <span class="badge-type-2">Trade Show</span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="success-stories-section py-5">
    <div class="container">

        <!-- Heading -->
        <div class="text-center mb-4">
            <h2 class="fw-bold text-dark">Success Stories from Pakistan</h2>
            <p class="text-muted">
                Hear from thousands of successful businesses across Pakistan
            </p>
        </div>

        <!-- Ratings Cards -->
        <div class="row g-4">
            
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="story-card p-4">
                    <div class="d-flex justify-content-between">
                        <div class="stars text-warning mb-2">
                            ★★★★★
                        </div>
                        <i class="bi bi-quote quote-icon"></i>
                    </div>

                    <p class="review-text">
                        "Hello Wholesaler ne meri business ko transform kar diya. Verified suppliers aur best wholesale rates mil gaye. 
                        Highly recommended!"
                    </p>

                    <hr>

                    <h6 class="fw-bold mb-0 text-dark">Ahmed Khan</h6>
                    <small class="text-muted">Retail Store Owner, Karachi</small>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="story-card p-4">
                    <div class="d-flex justify-content-between">
                        <div class="stars text-warning mb-2">
                            ★★★★★
                        </div>
                        <i class="bi bi-quote quote-icon"></i>
                    </div>

                    <p class="review-text">
                        "Best B2B platform in Pakistan! Payment security aur fast delivery se main bahut satisfied hoon.
                        My orders always arrive on time."
                    </p>

                    <hr>

                    <h6 class="fw-bold mb-0 text-dark">Fatima Malik</h6>
                    <small class="text-muted">Boutique Owner, Lahore</small>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="story-card p-4">
                    <div class="d-flex justify-content-between">
                        <div class="stars text-warning mb-2">
                            ★★★★★
                        </div>
                        <i class="bi bi-quote quote-icon"></i>
                    </div>

                    <p class="review-text">
                        "Bulk ordering itni easy kabhi nahi thi. Great variety of products and excellent customer service.
                        5 star experience!"
                    </p>

                    <hr>

                    <h6 class="fw-bold mb-0 text-dark">Bilal Ahmed</h6>
                    <small class="text-muted">Electronics Retailer, Islamabad</small>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="cta-section my-5">
    <div class="cta-overlay">
        <div class="container text-center py-5">
            <h2 class="fw-bold display-5 text-white mb-3">Ready to get started?</h2>
            <p class="text-white-50 mb-4 fs-5">
                Explore millions of products from trusted suppliers by signing up today!
            </p>

            <button class="btn btn-cta px-5 py-2 rounded-pill">
                Sign up
            </button>
        </div>
    </div>
</section>
<section class="faq-section my-5 bg-light">
    <div class="container">

        <div class="text-center mb-4">
            <h2 class="fw-bold faq-title text-dark">FAQ</h2>
            <div class="faq-underline mx-auto"></div>
        </div>

        <div class="faq-box p-4">

            <!-- FAQ Item 1 -->
            <div class="faq-item d-flex align-items-center py-3">
                <span class="faq-number">1</span>
                <p class="mb-0 ms-3 faq-text">What is Lorem Ipsum?</p>
            </div>
            <hr class="faq-line">

            <!-- FAQ Item 2 -->
            <div class="faq-item d-flex align-items-center py-3">
                <span class="faq-number">2</span>
                <p class="mb-0 ms-3 faq-text">Where does it come from?</p>
            </div>
            <hr class="faq-line">

            <!-- FAQ Item 3 -->
            <div class="faq-item d-flex align-items-center py-3">
                <span class="faq-number">3</span>
                <p class="mb-0 ms-3 faq-text">Why do we use it?</p>
            </div>
            <hr class="faq-line">

            <!-- FAQ Item 4 -->
            <div class="faq-item d-flex align-items-center py-3">
                <span class="faq-number">4</span>
                <p class="mb-0 ms-3 faq-text">Where can I get some?</p>
            </div>
            <hr class="faq-line">

            <!-- FAQ Item 5 -->
            <div class="faq-item d-flex align-items-center py-3">
                <span class="faq-number">5</span>
                <p class="mb-0 ms-3 faq-text">What is Lorem Ipsum?</p>
            </div>

        </div>
    </div>
</section>
<footer class="market-footer">
    <div class="container market-footer-shell">
        <div class="market-footer-top">
            <div class="market-footer-brand">
                <div class="market-footer-logo">
                    <span class="market-footer-logo-badge">H</span>
                    <div class="market-footer-logo-text">Hello<span>Wholesaler</span></div>
                </div>
                <p class="market-footer-description">
                    The trusted B2B sourcing marketplace. Connect with verified suppliers,
                    import safely with Trade Assurance, and grow your online business backed by
                    real support.
                </p>
                <div class="market-footer-socials">
                    <a href="#" class="market-footer-social" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="market-footer-social" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="market-footer-social" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="market-footer-social" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="market-footer-whatsapp"><i class="bi bi-whatsapp"></i> WhatsApp Channel</a>
                </div>
            </div>

            <div class="market-footer-subscribe" id="footer-subscribe">
                <h4>Stay ahead of the market</h4>
                <p>Weekly winning products, sourcing tips and supplier deals straight to your inbox.</p>
                @if(session('newsletter_success'))
                    <div class="market-footer-feedback is-success">{{ session('newsletter_success') }}</div>
                @endif
                @if(session('newsletter_status'))
                    <div class="market-footer-feedback is-warning">{{ session('newsletter_status') }}</div>
                @endif
                <form action="{{ route('newsletter.subscribe') }}" method="post">
                    @csrf
                    <div class="market-footer-form">
                        <input
                            type="email"
                            name="newsletter_email"
                            class="market-footer-input"
                            placeholder="you@business.com"
                            value="{{ old('newsletter_email') }}"
                        >
                        <button type="submit" class="market-footer-button">
                            <i class="bi bi-envelope"></i>
                            Subscribe
                        </button>
                    </div>
                </form>
                @error('newsletter_email')
                    <div class="market-footer-field-error">{{ $message }}</div>
                @enderror
                <ul class="market-footer-trust">
                    <li><i class="bi bi-shield-check"></i> Trade Assurance</li>
                    <li><i class="bi bi-lock"></i> Secure Escrow</li>
                    <li><i class="bi bi-credit-card"></i> Safe Payments</li>
                    <li><i class="bi bi-truck"></i> Tracked Delivery</li>
                </ul>
            </div>
        </div>

        <hr class="market-footer-divider">

        <div class="market-footer-grid">
            <div class="market-footer-column">
                <h5>Marketplace</h5>
                <p>Discover millions of wholesale products from verified suppliers across every category.</p>
                <ul class="market-footer-links">
                    <li><a href="{{ route('stores.index') }}">Browse Products</a></li>
                    <li><a href="{{ route('stores.index') }}">Browse Suppliers</a></li>
                    <li><a href="{{ route('stores.index') }}">All Categories</a></li>
                    <li><a href="{{ route('stores.index') }}">Request for Quotation</a></li>
                    <li><a href="{{ route('stores.index') }}">Wholesale Deals</a></li>
                </ul>
            </div>

            <div class="market-footer-column">
                <h5>For Buyers</h5>
                <p>Source confidently with Trade Assurance, escrow payments and verified inspections.</p>
                <ul class="market-footer-links">
                    <li><a href="{{ route('stores.index') }}">Order Protection</a></li>
                    <li><a href="{{ route('stores.index') }}">Verified Suppliers</a></li>
                    <li><a href="{{ route('stores.index') }}">Quality Inspection</a></li>
                    <li><a href="{{ route('orders.index') }}">Refund & Returns</a></li>
                    <li><a href="{{ route('orders.index') }}">Track Your Order</a></li>
                </ul>
            </div>

            <div class="market-footer-column">
                <h5>For Sellers</h5>
                <p>Reach high-intent buyers, manage orders and grow your wholesale business.</p>
                <ul class="market-footer-links">
                    <li><a href="{{ url('/seller') }}">Become a Supplier</a></li>
                    <li><a href="{{ url('/seller') }}">Start Dropshipping</a></li>
                    <li><a href="{{ url('/seller') }}">Seller Guide</a></li>
                    <li><a href="{{ url('/seller') }}">Profit Calculator</a></li>
                    <li><a href="{{ url('/seller') }}">Supplier Help Center</a></li>
                </ul>
            </div>

            <div class="market-footer-column">
                <h5>Support & Company</h5>
                <p>Real humans, real answers — across help center, live chat and seller onboarding.</p>
                <ul class="market-footer-links">
                    <li><a href="{{ route('user.login') }}">Help Center</a></li>
                    <li><a href="{{ route('user.login') }}">Contact Us</a></li>
                    <li><a href="{{ route('user.login') }}">About Us</a></li>
                    <li><a href="{{ route('user.login') }}">Careers</a></li>
                    <li><a href="{{ route('user.login') }}">Privacy & Terms</a></li>
                </ul>
            </div>
        </div>

        <hr class="market-footer-divider">

        <div class="market-footer-bottom">
            <p class="market-footer-copy">&copy; {{ now()->year }} Hello Wholesaler. All rights reserved.</p>
            <div class="market-footer-legal">
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
                <a href="#">Cookies</a>
                <a href="#">IP Policy</a>
            </div>
        </div>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const heroSearchForm = document.getElementById('heroSearchForm');
  const heroCategorySelect = document.getElementById('heroCategorySelect');

  if (heroSearchForm && heroCategorySelect) {
    heroSearchForm.addEventListener('submit', function (event) {
      const selectedCategoryUrl = heroCategorySelect.value;
      const searchInput = heroSearchForm.querySelector('input[name="q"]');
      const searchTerm = searchInput ? searchInput.value.trim() : '';

      if (selectedCategoryUrl && searchTerm === '') {
        event.preventDefault();
        window.location.href = selectedCategoryUrl;
      }
    });
  }

  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) {
    return;
  }

  document.body.classList.add('is-scroll-animations-ready');

  const toArray = (items) => Array.from(items || []).filter(Boolean);

  const registerTargets = (elements, options = {}) => {
    const {
      effect = 'up',
      delayStep = 0,
      baseDelay = 0,
      soft = false
    } = options;

    Array.from(new Set(elements)).forEach((element, index) => {
      if (!(element instanceof HTMLElement) || element.dataset.scrollFxBound === '1') {
        return;
      }

      const selectedEffect = typeof effect === 'function' ? effect(element, index) : effect;

      element.dataset.scrollFxBound = '1';
      element.classList.add('scroll-fx', 'scroll-fx-' + (selectedEffect || 'up'));

      if (soft) {
        element.classList.add('scroll-fx-soft');
      }

      element.style.setProperty('--scroll-delay', Math.min(baseDelay + ((index % 6) * delayStep), 420) + 'ms');
    });
  };

  registerTargets(
    toArray(document.querySelectorAll(
      'section:not(.animated-market-hero) > .container, ' +
      'section:not(.animated-market-hero) > .container-fluid, ' +
      '.cta-section > .cta-overlay, ' +
      'footer.market-footer > .container'
    )),
    {
      effect: function (_, index) {
        return index % 2 === 0 ? 'up' : 'down';
      },
      soft: true
    }
  );

  registerTargets(
    toArray(document.querySelectorAll('section:not(.animated-market-hero) .row > [class*="col-"] > *')),
    {
      effect: function (_, index) {
        return index % 2 === 0 ? 'up' : 'down';
      },
      delayStep: 55,
      baseDelay: 70
    }
  );

  registerTargets(
    toArray(document.querySelectorAll('.faq-item, .market-footer-brand, .market-footer-subscribe, .market-footer-column')),
    {
      effect: function (_, index) {
        const effects = ['left', 'right', 'up', 'down'];
        return effects[index % effects.length];
      },
      delayStep: 70,
      baseDelay: 90
    }
  );

  const observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
      } else {
        entry.target.classList.remove('is-visible');
      }
    });
  }, {
    threshold: 0.14,
    rootMargin: '0px 0px -8% 0px'
  });

  toArray(document.querySelectorAll('.scroll-fx')).forEach(function (target) {
    observer.observe(target);
  });
});
</script>

</body>
</html>
