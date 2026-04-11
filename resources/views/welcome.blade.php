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


    <link href="{{ asset('assets/css/homestyle.css') }}" rel="stylesheet">
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
        <!-- Search area -->
        <div class="d-flex flex-grow-1 align-items-center mx-lg-3 my-3 my-lg-0 search-bar">
          <select class="form-select w-auto me-2">
            <option>Categories</option>
            @foreach($categories as $category)
              <option>{{ $category->categoryName }}</option>
            @endforeach
          </select>

          <input class="form-control me-2" type="search" placeholder="Search for products, suppliers...">
          <button class="search-btn">Search</button>
        </div>

        <!-- Right side buttons -->
        <div class="d-flex align-items-center flex-wrap right-options">
          <a href="{{ route('user.login') }}"><button class="create-account-btn me-2 mb-2 mb-lg-0">Create Account</button></a>
          <a href="{{ route('user.login') }}" class="icon-btn"><i class="bi bi-person"></i></a>
          <a href="{{ route('user.login') }}" class="icon-btn"><i class="bi bi-cart3"></i></a>

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
    <a href="{{ route('user.login') }}">All Categories</a>
    <a href="#">Order Protection</a>
    <a href="#">Help Center</a>
    <a href="#">Become a Supplier</a>
    <a href="#">Who We Help</a>
    <a href="#">Learn</a>
  </div>
<!-- Hero Section -->
<section class="hero-section py-5 px-3 px-md-5">
  <div class="container">
    <div class="row align-items-center">
      
      <!-- Left Column -->
      <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
        <h1 class="fw-bold mb-3" style="color: #ff7b00;">
          Connecting Wholesalers and Retailers –
          <span class="text-white">Smarter, Faster, Easier</span>
        </h1>
        <p class="text-light mb-4">
          Grow your business by reaching verified buyers and trusted suppliers across the country.
        </p>
        <div class="d-flex justify-content-center justify-content-lg-start gap-3">
          <a href="{{ route('stores.index') }}" class="btn btn-warning fw-semibold px-4 py-2 rounded-3">Start Buying</a>
          <a href="/seller" class="btn btn-light fw-semibold px-4 py-2 rounded-3">Join as Wholesaler</a>
        </div>
      </div>

      <!-- Right Column -->
      <div class="col-lg-6 text-center">
            <h2 class="fw-bold mb-3">
              <span class="text-white">Pakistan's #1 Trusted</span><br>
              <span style="color: #ff7b00;">B2B Wholesale Marketplace</span>
            </h2>

        <img src="{{ asset('assets/images/shake.png') }}" alt="Wholesaler Network" class="img-fluid" style="max-height: 400px;">
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

<section class="how-it-works py-5">
  <div class="container text-center">

    <h2 class="fw-bold text-white">How It Works</h2>
    <p class="text-light mb-5">Start your wholesale journey in 3 simple steps</p>

    <div class="row g-4 justify-content-center">

      <!-- Step 1 -->
      <div class="col-12 col-md-4">
        <div class="how-card">
          <span class="step-number">01</span>
          <div class="icon-box">
            <i class="bi bi-search"></i>
          </div>
          <h5 class="fw-semibold text-white mt-3">Find Supplier</h5>
          <p class="text-secondary small">
            Browse thousands of verified suppliers and products in Pakistan
          </p>
        </div>
      </div>

      <!-- Step 2 -->
      <div class="col-12 col-md-4">
        <div class="how-card">
          <span class="step-number">02</span>
          <div class="icon-box">
            <i class="bi bi-shield-check"></i>
          </div>
          <h5 class="fw-semibold text-white mt-3">Secure Payment</h5>
          <p class="text-secondary small">
            Pay safely with our protected payment system
          </p>
        </div>
      </div>

      <!-- Step 3 -->
      <div class="col-12 col-md-4">
        <div class="how-card">
          <span class="step-number">03</span>
          <div class="icon-box">
            <i class="bi bi-truck"></i>
          </div>
          <h5 class="fw-semibold text-white mt-3">Get Delivery</h5>
          <p class="text-secondary small">
            Receive your bulk order at your doorstep nationwide
          </p>
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
<footer class="footer-section pt-5 pb-3">
    <div class="container">

        <div class="row">

            <!-- Left Column -->
            <div class="col-md-4 mb-4">
                <h4 class="footer-title">Hello Wholesaler</h4>
                <p class="footer-text">
                    Pakistan's most trusted B2B wholesale marketplace.  
                    Connect with verified suppliers and grow your business.
                </p>

                <!-- Social Icons -->
                <div class="footer-social mt-3">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <!-- Company -->
            <div class="col-md-2 mb-4">
                <h6 class="footer-heading">Company</h6>
                <ul class="footer-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Press</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div class="col-md-2 mb-4">
                <h6 class="footer-heading">Support</h6>
                <ul class="footer-links">
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Buyer Protection</a></li>
                    <li><a href="#">Report Issue</a></li>
                </ul>
            </div>

            <!-- Policies -->
            <div class="col-md-2 mb-4">
                <h6 class="footer-heading">Policies</h6>
                <ul class="footer-links">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Return Policy</a></li>
                    <li><a href="#">Payment Terms</a></li>
                </ul>
            </div>
        </div>

        <hr class="footer-divider">

        <!-- Newsletter Section -->
        <div class="newsletter-section mb-4">
            <h6 class="footer-heading">Subscribe to Our Newsletter</h6>
            <p class="footer-text">Get the latest deals and supplier updates delivered to your inbox</p>

            <div class="newsletter-input d-flex align-items-center">
                <input type="email" class="form-control footer-input" placeholder="Enter your email">
                <button class="btn btn-default ms-2">
                    <i class="bi bi-envelope"></i> Subscribe
                </button>
            </div>
        </div>

        <hr class="footer-divider">

        <!-- Copyright -->
        <div class="text-center pt-2 footer-copy">
            © 2024 Hello Wholesaler. All rights reserved.  
            Made with <span class="text-danger">❤</span> in Pakistan
        </div>

    </div>
</footer>

</body>
</html>
