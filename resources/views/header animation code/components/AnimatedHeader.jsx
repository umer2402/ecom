import React, { useMemo } from "react";
import {
  Search,
  ShieldCheck,
  Sparkles,
  TrendingUp,
  MapPin,
  ShoppingCart,
  Star,
} from "lucide-react";

/* Wireframe Geodesic Sphere built with SVG — slow 3D rotation */
const WireframeSphere = () => {
  const lats = [-60, -30, 0, 30, 60];
  const longs = [0, 22.5, 45, 67.5, 90, 112.5, 135, 157.5];

  return (
    <svg viewBox="-220 -220 440 440" className="sphere-svg">
      <defs>
        <radialGradient id="sphereGlow" cx="50%" cy="50%" r="50%">
          <stop offset="0%" stopColor="rgba(255,107,26,0.25)" />
          <stop offset="60%" stopColor="rgba(255,107,26,0.05)" />
          <stop offset="100%" stopColor="rgba(255,107,26,0)" />
        </radialGradient>
      </defs>

      <circle cx="0" cy="0" r="200" fill="url(#sphereGlow)" />

      <g className="sphere-rotate">
        {/* Longitude lines */}
        {longs.map((deg, i) => (
          <ellipse
            key={`lng-${i}`}
            cx="0"
            cy="0"
            rx={Math.abs(200 * Math.cos((deg * Math.PI) / 180))}
            ry="200"
            stroke="rgba(255,122,26,0.55)"
            strokeWidth="0.8"
            fill="none"
          />
        ))}
        {/* Latitude lines */}
        {lats.map((deg, i) => {
          const ry = Math.abs(200 * Math.sin((deg * Math.PI) / 180));
          const rx = Math.abs(200 * Math.cos((deg * Math.PI) / 180));
          return (
            <ellipse
              key={`lat-${i}`}
              cx="0"
              cy="0"
              rx={rx}
              ry={ry || 0.5}
              stroke="rgba(255,122,26,0.55)"
              strokeWidth="0.8"
              fill="none"
              transform={`translate(0, ${200 * Math.sin((deg * Math.PI) / 180)})`}
            />
          );
        })}
        {/* Outer circle */}
        <circle
          cx="0"
          cy="0"
          r="200"
          stroke="rgba(255,122,26,0.75)"
          strokeWidth="1"
          fill="none"
        />
      </g>
    </svg>
  );
};

/* Starfield with deterministic positions */
const Starfield = ({ count = 110 }) => {
  const stars = useMemo(() => {
    const arr = [];
    for (let i = 0; i < count; i++) {
      const x = (Math.sin(i * 12.9898) * 43758.5453) % 1;
      const y = (Math.sin(i * 78.233) * 43758.5453) % 1;
      const s = (Math.sin(i * 31.77) * 43758.5453) % 1;
      arr.push({
        left: `${Math.abs(x) * 100}%`,
        top: `${Math.abs(y) * 100}%`,
        size: 1 + Math.abs(s) * 2,
        delay: (Math.abs(s) * 5).toFixed(2),
        duration: (2 + Math.abs(x) * 4).toFixed(2),
      });
    }
    return arr;
  }, [count]);

  return (
    <div className="starfield" aria-hidden="true">
      {stars.map((st, i) => (
        <span
          key={i}
          className="star"
          style={{
            left: st.left,
            top: st.top,
            width: `${st.size}px`,
            height: `${st.size}px`,
            animationDelay: `${st.delay}s`,
            animationDuration: `${st.duration}s`,
          }}
        />
      ))}
    </div>
  );
};

const AnimatedHeader = () => {
  return (
    <header className="ah-root">
      {/* Top promo bar */}
      <div className="ah-promo">
        <div className="ah-promo-inner">
          <span className="ah-promo-left">
            <Sparkles size={14} className="ah-promo-icon" />
            Pakistan's most trusted B2B wholesale marketplace — Trade Assurance on every order
          </span>
          <span className="ah-promo-right">
            <a href="#whatsapp" className="ah-promo-link">WhatsApp</a>
            <a href="#livechat" className="ah-promo-link">Live Chat</a>
          </span>
        </div>
      </div>

      {/* Main nav */}
      <nav className="ah-nav">
        <div className="ah-nav-inner">
          <div className="ah-brand">
            <div className="ah-brand-badge">H</div>
            <div className="ah-brand-text">
              <div className="ah-brand-title">
                Hello<span className="ah-accent">Wholesaler</span>
              </div>
              <div className="ah-brand-sub">B2B MARKETPLACE</div>
            </div>
          </div>

          <div className="ah-nav-actions">
            <button className="ah-pill">
              <MapPin size={14} /> PK · Lahore
            </button>
            <button className="ah-pill">EN · PKR</button>
            <button className="ah-icon-btn">
              <ShoppingCart size={18} />
              <span className="ah-badge">0</span>
            </button>
            <button className="ah-cta-outline">
              <Star size={14} /> Become a Supplier
            </button>
            <button className="ah-cta">Sign In</button>
          </div>
        </div>

        <div className="ah-subnav">
          <a className="ah-subnav-link ah-accent" href="#all">All Categories</a>
          <a className="ah-subnav-link" href="#order">Order Protection</a>
          <a className="ah-subnav-link" href="#who">Who We Help</a>
          <a className="ah-subnav-link" href="#help">Help Center</a>
          <a className="ah-subnav-link" href="#learn">Learn</a>
        </div>
      </nav>

      {/* Hero with animations */}
      <section className="ah-hero">
        <div className="ah-bg-radial" aria-hidden="true" />
        <Starfield count={110} />

        {/* Floating geometric shapes */}
        <div className="shape shape-diamond shape-d1" aria-hidden="true">
          <div className="shape-diamond-inner" />
        </div>
        <div className="shape shape-hex shape-h1" aria-hidden="true">
          <svg viewBox="0 0 100 100">
            <defs>
              <linearGradient id="hexGrad1" x1="0" x2="1" y1="0" y2="1">
                <stop offset="0%" stopColor="#ff8a3d" />
                <stop offset="100%" stopColor="#c44a00" />
              </linearGradient>
            </defs>
            <polygon
              points="50,5 92,27 92,73 50,95 8,73 8,27"
              fill="url(#hexGrad1)"
              stroke="rgba(255,122,26,0.9)"
              strokeWidth="1.5"
            />
          </svg>
        </div>
        <div className="shape shape-ring shape-r1" aria-hidden="true" />
        <div className="shape shape-cube shape-c1" aria-hidden="true">
          <div className="shape-diamond-inner small" />
        </div>
        <div className="shape shape-tri shape-t1" aria-hidden="true">
          <svg viewBox="0 0 100 100">
            <polygon
              points="50,10 90,85 10,85"
              fill="none"
              stroke="rgba(255,122,26,0.8)"
              strokeWidth="1.5"
            />
          </svg>
        </div>

        {/* Wireframe sphere on right */}
        <div className="sphere-wrap" aria-hidden="true">
          <WireframeSphere />

          <div className="info-card card-bulk">
            <div className="info-card-label">Bulk discount</div>
            <div className="info-card-value ah-accent">Up to 60% OFF</div>
          </div>

          <div className="info-card card-supplier">
            <div className="info-chip">
              <Sparkles size={12} />
              TRADE ASSURANCE
            </div>
            <div className="info-subtle">VERIFIED SUPPLIER</div>
            <div className="info-card-title">Karachi Textiles Co.</div>
            <div className="info-row">
              <span className="ah-accent big">₨ 280</span>
              <span className="info-meta">
                / piece · MOQ<br />100
              </span>
            </div>
          </div>

          <div className="info-card card-delivery">
            <div className="info-card-label">Free delivery</div>
            <div className="info-card-value ah-accent">Nationwide 🇵🇰</div>
          </div>

          <div className="info-card card-live">
            <div className="info-card-label">
              <span className="live-dot" /> Live now
            </div>
            <div className="info-card-value ah-accent">12,480 buyers</div>
          </div>
        </div>

        {/* Left content */}
        <div className="ah-hero-content">
          <div className="ah-trust-pill">
            <ShieldCheck size={14} className="ah-accent" />
            Your Money &amp; Orders, Fully Protected
          </div>

          <h1 className="ah-h1">
            Pakistan's <span className="hash">#1</span>{" "}
            <span className="ah-accent">B2B</span>
            <br />
            Wholesale Marketplace
          </h1>

          <p className="ah-sub">
            Buy in bulk, pay securely, get delivered to your doorstep. Connect
            with 50,000+ verified suppliers across Pakistan and beyond.
          </p>

          <div className="ah-search">
            <select className="ah-search-select">
              <option>Products</option>
              <option>Suppliers</option>
              <option>Categories</option>
            </select>
            <div className="ah-search-divider" />
            <Search size={18} className="ah-search-icon" />
            <input
              type="text"
              className="ah-search-input"
              placeholder="Search 2M+ products & suppliers…"
            />
            <button className="ah-search-btn">
              Search <span aria-hidden>→</span>
            </button>
          </div>

          <div className="ah-trending">
            <span className="ah-trending-label">
              <TrendingUp size={14} className="ah-accent" /> Trending:
            </span>
            {["iPhone Cases", "T-Shirts", "Lipstick", "LED Bulbs", "Water Bottles", "Sneakers"].map(
              (t) => (
                <button key={t} className="ah-chip">
                  {t}
                </button>
              )
            )}
          </div>

          <div className="ah-stats">
            <div className="ah-stat">
              <div className="ah-stat-num">50K+</div>
              <div className="ah-stat-label">VERIFIED SUPPLIERS</div>
            </div>
            <div className="ah-stat">
              <div className="ah-stat-num">2M+</div>
              <div className="ah-stat-label">BULK PRODUCTS</div>
            </div>
            <div className="ah-stat">
              <div className="ah-stat-num">100%</div>
              <div className="ah-stat-label">TRADE ASSURANCE</div>
            </div>
          </div>
        </div>

        <div className="ah-bottom-fade" aria-hidden="true" />
      </section>
    </header>
  );
};

export default AnimatedHeader;