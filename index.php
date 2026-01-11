<?php
require_once "parts/header.php";
require_once "parts/nav.php";
require_once "parts/database_conn.php";
require_once "index_impl.php";
?>

    <style>
        .map-btn {
            font-weight: 600;
            text-transform: uppercase;
            color: #ffffff;
            background: #FD7979;
        }

        .map-btn:hover {
            background: #FEEAC9;
        }

        .scroll-section {
            opacity: 0;
            transform: translateY(40px) scale(0.96);
        }

        .hero-to-map-transition {
            position: relative;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: visible;
        }

        .transition-svg {
            width: 100%;
            height: 100%;
        }
    </style>

    <section class="container-fluid map-section px-3 py-5" style="width: 75%">
        <div class="row align-items-center">
            <!-- Left content -->
            <div class="col-lg-8 mb-4 mb-lg-0 pe-md-5">
                <div>
                    <h1 class="map-title display-4 fw-bold">Zbuloni fjalorin e artë Shqiptar</h1>
                    <p class="map-subtitle fs-3 text-muted my-4">
                        Fjalë të urta dhe proverba nga qytete të ndryshme të Shqipërisë. Mësoni kulturën
                        dhe mençurinë popullore të çdo rajoni dhe shijoni thëniet e vjetra që kanë kaluar brez pas
                        brezi.
                    </p>
                    <a href="article.php" class="btn btn-lg map-btn px-4 py-3">Shfleto Tani</a>
                </div>
            </div>

            <!-- Right map -->
            <div class="col-lg-4 text-center text-lg-end mt-5 mt-md-0 ps-md-5">
                <div class="map-wrapper">
                    <?php include 'images/albania_map_hero.svg'; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="hero-to-map-transition">
        <svg class="transition-svg" width="100%" height="50" viewBox="0 0 100 10" preserveAspectRatio="none">
            <defs>
                <mask id="maskLine">
                    <rect width="100%" height="100%" fill="black"/>
                    <path id="maskPathLine" d="M0,5 Q25,-3 50,5 T100,5"
                          fill="none" stroke="white" stroke-width="2" stroke-linecap="round"/>
                </mask>
            </defs>

            <path d="M0,5 Q25,-3 50,5 T100,5"
                  stroke="#FD7979"
                  stroke-width="10"
                  fill="transparent"
                  stroke-linecap="round"
                  stroke-dasharray="50 50"
                  vector-effect="non-scaling-stroke"
                  mask="url(#maskLine)"/>
        </svg>
    </section>

    <!-- Albania Map -->
<?php include 'maps/albania_map_section.php'; ?>

    <!-- Kosovo Map -->
<?php include 'maps/kosovo_map_section.php'; ?>

    <script src="node_modules/gsap/dist/gsap.min.js"></script>
    <script src="node_modules/gsap/dist/ScrollTrigger.min.js"></script>
    <script src="index_animation_gsap.js"></script>
    <script>
        gsap.utils.toArray(".scroll-section").forEach(section => {
            ScrollTrigger.create({
                trigger: section,
                start: "top 85%",
                onEnter: () => {
                    gsap.to(section, {
                        opacity: 1,
                        y: 0,
                        scale: 1,
                        duration: 0.8,
                        ease: "power3.out"
                    });
                },
                onLeaveBack: () => {
                    gsap.set(section, {
                        opacity: 0,
                        y: 40,
                        scale: 0.96
                    });
                }
            });
        });

        const maskLine = document.querySelector("#maskPathLine");
        const lengthLine = maskLine.getTotalLength();

        // set initial state
        maskLine.style.strokeDasharray = lengthLine;
        maskLine.style.strokeDashoffset = lengthLine;

        // animate on scroll
        gsap.to(maskLine, {
            strokeDashoffset: 0,
            duration: 1.5,
            ease: "power1.inOut",
            scrollTrigger: {
                trigger: ".hero-to-map-transition",
                start: "top bottom",
                end: "top center",
                scrub: 1
            }
        });

        document.addEventListener("DOMContentLoaded", () => {
            const locationDots = document.querySelectorAll('.location-dot');

            // Initial hidden state
            gsap.set(locationDots, { scale: 0, opacity: 0, transformOrigin: "center center" });

            ScrollTrigger.batch(locationDots, {
                start: "top 80%",
                onEnter: batch => {
                    gsap.to(batch, {
                        scale: 1,
                        opacity: 1,
                        duration: 0.6,
                        ease: "bounce.out",
                        stagger: 0.2
                    });
                },
                onLeaveBack: batch => {
                    // Reset dots when scrolling back up
                    gsap.set(batch, { scale: 0, opacity: 0 });
                }
            });
        });
    </script>

    <script>
        document.querySelectorAll('[data-city]').forEach(el => {
            el.style.cursor = 'pointer';

            el.addEventListener('click', () => {
                const city = el.dataset.city;

                // Read current URL params
                const params = new URLSearchParams(window.location.search);

                // Update ONLY Albania-related params
                params.set('city', city);
                params.set('page', 1);      // reset Albania pagination
                params.delete('search');    // optional: reset Albania search

                // Kosovo params remain untouched automatically
                window.location.search = params.toString();
            });
        });
    </script>

<?php require_once "parts/footer.php";