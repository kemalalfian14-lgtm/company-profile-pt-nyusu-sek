@extends('layouts.frontend')

@section('title', 'PT. NYUSU SEK')

@section('content')

<!-- HERO -->
<section id="hero" class="hero">

    <div class="container">

        <div class="hero-content">

            <span class="badge">
                🚀 Digital Technology Company
            </span>

            <h1>
                Build Better <br>
                Digital Solutions.
            </h1>

            <p>
                PT. NYUSUSEK membantu perusahaan mengembangkan website,
                aplikasi mobile, dan solusi digital modern yang cepat,
                aman, serta scalable.
            </p>

            <div class="hero-btn">

                <a href="#services" class="btn-primary">
                    Get Started
                </a>

                <a href="#contact" class="btn-secondary">
                    Contact Us
                </a>

            </div>

        </div>

        <div class="hero-image">

            <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=900"
                 alt="Hero Illustration">

        </div>

    </div>

</section>

<!-- ABOUT -->
<section id="about" class="about">

    <div class="container">

        <div class="section-title">

            <span>ABOUT US</span>

            <h2>Solusi Digital yang Siap Membawa Bisnis Anda Berkembang</h2>

            <p>
                PT. NYUSUSEK merupakan perusahaan yang bergerak di bidang
                teknologi informasi dengan fokus pada pengembangan website,
                aplikasi, sistem informasi, dan transformasi digital bagi
                perusahaan maupun instansi.
            </p>

        </div>

        <div class="about-grid">

            <div class="about-card">

                <div class="icon">🚀</div>

                <h3>Inovatif</h3>

                <p>
                    Mengembangkan solusi digital modern mengikuti perkembangan
                    teknologi terkini.
                </p>

            </div>

            <div class="about-card">

                <div class="icon">🛡️</div>

                <h3>Aman</h3>

                <p>
                    Sistem dibangun dengan memperhatikan keamanan data dan
                    performa yang optimal.
                </p>

            </div>

            <div class="about-card">

                <div class="icon">🤝</div>

                <h3>Profesional</h3>

                <p>
                    Mengutamakan kualitas pelayanan, komunikasi, dan kepuasan
                    setiap klien.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- SERVICES -->
<section id="services" class="services">

    <div class="container">

        <div class="section-title">

            <span>OUR SERVICES</span>

            <h2>Layanan Profesional Kami</h2>

            <p>
                Kami menyediakan berbagai layanan teknologi informasi
                untuk membantu bisnis berkembang di era digital.
            </p>

        </div>

        <div class="services-grid">

            @forelse($services as $service)

                <div class="service-card">

                    <div class="service-icon">
                        {{ $service->icon }}
                    </div>

                    <h3>{{ $service->title }}</h3>

                    <p>
                        {{ $service->description }}
                    </p>

                </div>

            @empty

                <div class="service-card">

                    <div class="service-icon">
                        📌
                    </div>

                    <h3>Belum Ada Layanan</h3>

                    <p>
                        Data layanan belum tersedia.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>

<!-- GALLERY -->
<section id="gallery" class="gallery">

    <div class="container">

        <div class="section-title">

            <span>OUR PORTFOLIO</span>

            <h2>Project & Documentation</h2>

            <p>
                Beberapa dokumentasi dan hasil proyek yang telah kami
                kerjakan untuk berbagai kebutuhan digital.
            </p>

        </div>

       <div class="gallery-grid">

    @forelse($galleries as $gallery)

        <div class="gallery-card">

    <img src="{{ asset('gallery/' . $gallery->image) }}"
         alt="{{ $gallery->title }}">

    <div class="gallery-content">

        <h3>{{ $gallery->title }}</h3>

    </div>

</div>

    @empty

        <div class="gallery-card">

            <p class="text-center">
                Belum ada data gallery.
            </p>

        </div>

    @endforelse

</div>

    </div>

</section>

<!-- TEAM -->
<section id="team" class="team">

    <div class="container">

        <div class="section-title">

            <span>OUR TEAM</span>

            <h2>Meet Our Professional Team</h2>

            <p>
                Tim profesional PT. NYUSUSEK yang berkomitmen memberikan
                solusi teknologi terbaik bagi setiap klien.
            </p>

        </div>

        <div class="team-grid">

    @forelse($teams as $team)

        <div class="team-card">

            <img src="{{ asset('team/' . $team->photo) }}"
                 alt="{{ $team->name }}">

            <div class="team-info">

                <h3>{{ $team->name }}</h3>

                <h4>{{ $team->position }}</h4>

            </div>

        </div>

    @empty

        <div class="team-card">

            <div class="team-info">

                <h3>Belum Ada Team</h3>

                <p>Silakan tambahkan data melalui halaman admin.</p>

            </div>

        </div>

    @endforelse

</div>
            </div>

        </div>

    </div>

</section>

<!-- CONTACT -->
<section id="contact" class="contact">

    <div class="container">

        <div class="section-title">

            <span>CONTACT US</span>

            <h2>Let's Build Something Great Together</h2>

            <p>
                Hubungi kami untuk konsultasi maupun kerja sama dalam
                pengembangan solusi digital bagi bisnis Anda.
            </p>

        </div>

        <div class="contact-wrapper">

            <div class="contact-info">

                <div class="contact-item">
                    <h3>📍 Office</h3>
                    <p>Yogyakarta, Indonesia</p>
                </div>

                <div class="contact-item">
                    <h3>📞 Phone</h3>
                    <p>+62 895-1635-0108</p>
                </div>

                <div class="contact-item">
                    <h3>✉ Email</h3>
                    <p>info@ptnyususek.com</p>
                </div>

                <div class="contact-item">
                    <h3>🌐 Website</h3>
                    <p>www.ptnyususek.com</p>
                </div>

            </div>

            <div class="contact-form">

                <form>

                    <input type="text" placeholder="Your Name">

                    <input type="email" placeholder="Your Email">

                    <input type="text" placeholder="Subject">

                    <textarea rows="6" placeholder="Your Message"></textarea>

                    <button type="submit" class="btn-primary">
                        Send Message
                    </button>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection