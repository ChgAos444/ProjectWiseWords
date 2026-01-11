<?php
require_once "parts/header.php";
require_once "parts/nav.php";
?>

    <style>
        .carousel-inner {
            height: 400px;
        }

        @media (max-width: 1400px) {
            .carousel-inner {
                height: 300px;
            }
        }

        @media (max-width: 760px) {
            .carousel-inner {
                height: 260px;
            }
        }

        @media (max-width: 400px) {
            .carousel-inner {
                height: 170px;
            }
        }
    </style>

    <h1 class="map-title display-4 fw-bold text-center mt-3 my-md-5">Qytete të Arta: <br> Fakte Interesante</h1>

    <section class="container px-4 px-md-0 py-0 py-md-5">
        <div class="row align-items-center">
            <!-- Carousel -->
            <div class="col-md-7 mb-3 mb-md-0">
                <div id="articlesCarousel3" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                    <!-- Indicators -->
                    <div class="carousel-indicators mb-2">
                        <button type="button" data-bs-target="#articlesCarousel3" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#articlesCarousel3" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#articlesCarousel3" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#articlesCarousel3" data-bs-slide-to="3"
                                aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#articlesCarousel3" data-bs-slide-to="4"
                                aria-label="Slide 5"></button>
                    </div>

                    <div class="carousel-inner rounded-3 overflow-hidden shadow">
                        <div class="carousel-item active">
                            <img src="images/article_3/article_shkoder_1.jpg" class="d-block w-100" style="object-fit:cover;">
                        </div>
                        <div class="carousel-item">
                            <img src="images/article_3/article_shkoder_2.jpg" class="d-block w-100" style="object-fit:cover;">
                        </div>
                        <div class="carousel-item">
                            <img src="images/article_3/article_shkoder_3.jpg" class="d-block w-100" style="object-fit:cover;">
                        </div>
                        <div class="carousel-item">
                            <img src="images/article_3/article_shkoder_4.jpg" class="d-block w-100" style="object-fit:cover;">
                        </div>
                        <div class="carousel-item">
                            <img src="images/article_3/article_shkoder_5.jpg" class="d-block w-100" style="object-fit:cover;">
                        </div>
                    </div>

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#articlesCarousel3"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#articlesCarousel3"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <!-- Text -->
            <div class="col-md-5 mb-4 mb-md-0">
                <h1 class="fw-bold" id="article3-title">Gazeta Shkodrane</h1>
                <p id="article3-description" style="font-size: 25px">
                    Në vitin 1868 Shkodra botonte gazetën e parë shqiptare "Iskodra".
                </p>
            </div>
        </div>
    </section>

    <section class="container px-4 px-md-0 py-0 py-md-5">
        <div class="row align-items-center">
            <!-- Text for the article -->
            <div class="col-md-5 order-2 order-md-1 mb-4 mb-md-0">
                <div id="article-text">
                    <h1 class="fw-bold" id="article-title">Qyteti 2700+ vjeçar</h1>
                    <p id="article-description" style="font-size: 25px">
                        Durrësi u themelua në vitin 627 P.E.S. me emrin Epidamnos. Ai ka mbijetuar tërmete, pushtime dhe
                        perandori, por kurrë s'është zhdukur. Pak qytete në Europë kanë kaq shumë jetë në shpinë
                    </p>
                </div>
            </div>

            <!-- Carousel for images -->
            <div class="col-md-7 order-1 order-md-2 mb-3 mb-md-0">
                <div id="articlesCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                    <!-- Indicators -->
                    <div class="carousel-indicators mb-2">
                        <button type="button" data-bs-target="#articlesCarousel" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#articlesCarousel" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#articlesCarousel" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#articlesCarousel" data-bs-slide-to="3"
                                aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#articlesCarousel" data-bs-slide-to="4"
                                aria-label="Slide 5"></button>
                        <button type="button" data-bs-target="#articlesCarousel" data-bs-slide-to="5"
                                aria-label="Slide 6"></button>
                    </div>

                    <div class="carousel-inner rounded-3 overflow-hidden shadow">
                        <div class="carousel-item active">
                            <img src="images/article_1/article_durres_1.jpg" class="d-block w-100"
                                 style="object-fit: cover;" alt="Article 1">
                        </div>
                        <div class="carousel-item">
                            <img src="images/article_1/article_durres_2.jpg" class="d-block w-100"
                                 style="object-fit: cover;" alt="Article 2">
                        </div>
                        <div class="carousel-item">
                            <img src="images/article_1/article_durres_3.jpg" class="d-block w-100"
                                 style="object-fit: cover;" alt="Article 3">
                        </div>
                        <div class="carousel-item">
                            <img src="images/article_1/article_durres_4.jpg" class="d-block w-100"
                                 style="object-fit: cover;" alt="Article 3">
                        </div>
                        <div class="carousel-item">
                            <img src="images/article_1/article_durres_5.webp" class="d-block w-100"
                                 style="object-fit: cover;" alt="Article 3">
                        </div>
                        <div class="carousel-item">
                            <img src="images/article_1/article_durres_6.jpg" class="d-block w-100"
                                 style="object-fit: cover;" alt="Article 3">
                        </div>
                    </div>

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#articlesCarousel"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#articlesCarousel"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="container px-4 px-md-0 py-0 py-md-5">
        <div class="row align-items-center">
            <!-- Carousel -->
            <div class="col-md-7 mb-3 mb-md-0">
                <div id="articlesCarousel2" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                    <!-- Indicators -->
                    <div class="carousel-indicators mb-2">
                        <button type="button" data-bs-target="#articlesCarousel2" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#articlesCarousel2" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#articlesCarousel2" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#articlesCarousel2" data-bs-slide-to="3"
                                aria-label="Slide 4"></button>
                    </div>

                    <div class="carousel-inner rounded-3 overflow-hidden shadow">
                        <div class="carousel-item active">
                            <img src="images/article_2/article_miredite_1.jpg" class="d-block w-100" style="object-fit:;">
                        </div>
                        <div class="carousel-item">
                            <img src="images/article_2/article_miredite_2.jpg" class="d-block w-100" style="object-fit:cover;">
                        </div>
                        <div class="carousel-item">
                            <img src="images/article_2/article_miredite_3.webp" class="d-block w-100" style="object-fit:cover;">
                        </div>
                        <div class="carousel-item">
                            <img src="images/article_2/article_miredite_4.jpg" class="d-block w-100" style="object-fit:cover;">
                        </div>
                    </div>

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#articlesCarousel2"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#articlesCarousel2"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <!-- Text -->
            <div class="col-md-5 mb-4 mb-md-0">
                <h1 class="fw-bold" id="article2-title">Mirdita</h1>
                <p id="article2-description" style="font-size: 25px">
                    Mirdita është një ndër të vetmet qytete, ku feja katolike është një betim i përjetshëm, besa është fjala e Zotit e dialekti është dhurata më e çmueshme.
                </p>
            </div>
        </div>
    </section>


    <script>
        const articleData = [
            {
                title: "Qyteti 2700+ vjeçar",
                description: "Durrësi u themelua në vitin 627 P.E.S. me emrin Epidamnos. Ai ka mbijetuar tërmete, pushtime dhe perandori, por kurrë s'është zhdukur. Pak qytete në Europë kanë kaq shumë jetë në shpinë."
            },
            {
                title: "Amfiteatri Romak",
                description: "Amfiteatri i Durrësit është më i madhi në Ballkan, ndërtuar në shekullin II. Dikur mbushej me mbi 20 mijë spektatorë që shikonin gladiatorët. Sot, historia fshihet mes Shtëpive."
            },
            {
                title: "Muret e vjetra të qytetit",
                description: "Muret mbrojtëse të Durrësit u ndërtuan nga perandori Anastasi I. I lindur vetë në këtë qytet. Këto mure e bënë Durrësin një nga qytetet më të fortifikuara të kohës."
            },
            {
                title: "Plazhi i Durrësit",
                description: "Plazhi i Durrësit është ndër më të gjatët në Shqipëri. Rëra e imët dhe perëndimet e arta e bëjnë një nga vendet më të fotografuara çdo verë."
            },
            {
                title: "Porti i Durrësit",
                description: "Porti i Durrësit është porta detare kryesore e Shqipërisë. Prej shekujsh. Nga ky vend janë nisur tregtarë, edhëtarë dhe histori drejt Italisë dhe më gjerë."
            },
            {
                title: "Vila mbretërore",
                description: "Vila mbretërore u ndërtua për mbretin Zog i dhe ndodhet në një kodër me pamje unike. Thuhet se nga aty. Perëndimet janë nga më të bukurat në gjithë qytetin."
            }
        ];

        const carousel = document.getElementById('articlesCarousel');
        const titleEl = document.getElementById('article-title');
        const descEl = document.getElementById('article-description');

        carousel.addEventListener('slid.bs.carousel', (e) => {
            const index = e.to; // index of the current slide
            titleEl.textContent = articleData[index].title;
            descEl.textContent = articleData[index].description;
        });

        const article2Data = [
            {
                title: "Mirdita",
                description: "Mirdita është një ndër të vetmet qytete, ku feja katolike është një betim i përjetshëm, besa është fjala e Zotit e dialekti është dhurata më e çmueshme."
            },
            {
                title: "Kanuni i Mirditës",
                description: "Kanuni i Mirditës ka ekzistuar qindra vjet para shtetit modern dhe udhëhiqte jetën e njerëzve më shumë se ligjet zyrtare; përmes tij, nderi, mikpritja dhe drejtësia rregulloheshin në mënyrë të detyrueshme dhe një fjalë e dhëmë kishte forcë më të madhe se çdo gjykatë."
            },
            {
                title: "Mikpritja Mirditore",
                description: "Në Mirditë, mikpritja është ligj zemre e jo zakon. Miku quhet \"i Zotit\" dhe pritet me bukë, kripë e nder, pa u pyetur kush është e nga vjen. Edhe në ditë të vështira, mirditori ndan kafshatën e fundit, sepse turpi më i madh ka qenë gjithmonë mospritja e mikut. Kjo traditë, e rrënjosur në kanun, vazhdon të jetojë si krenari dhe identitet i Mirditës."
            },
            {
                title: "Kishat Mirditore",
                description: "Kishat mirditore janë ndër simbolet më të forta të besimit dhe identitetit të kësaj treve. Të ndërtuara kryesisht me gurë vendas dhe arkitekturë të thjeshtë, ato pasqyrojnë qëndrueshmërinë dhe shpirtin e fortë mirditor. Për shekuj me radhë, kto kisha kanë qenë jo vetëm vendje lutjeje, por edhe qendra ku është ruajtur gjuha, tradita dhe bashkimi komunitetit, duke e bërë Mirditën një nga zonat më të dalluara për besnikërinë ndaj fesë dhe historisë së saj."
            }
        ];

        const carousel2 = document.getElementById('articlesCarousel2');
        carousel2.addEventListener('slid.bs.carousel', e => {
            document.getElementById('article2-title').textContent = article2Data[e.to].title;
            document.getElementById('article2-description').textContent = article2Data[e.to].description;
        });

        const article3Data = [
            {
                title: "Gazeta Shkodrane",
                description: "Në vitin 1868 Shkodra botonte gazetën e parë shqiptare \"Iskodra\"."
            },
            {
                title: "Fotografi - Pjetër Marubi",
                description: "Marubi ishte një emigrant nga Italia i cili krijoi në Shkodër dinastinë më të madhe të shkrepjeve fotografike, duke kapur jo vetem poza, por edhe momente. Përveç se fotograf, ai ishte edhe skulptor, arkitekt dhe piktor."
            },
            {
                title: "Zoja e Shkodrës",
                description: "Piktura e zojës së Shkodrës daton që në shekullin e 19-të, duke e kthyer kështu në kryeveprën e artit shqiptar."
            },
            {
                title: "Kalaja e Rozafës",
                description: "Kalaja e Rozafës fsheh një legjendë të errët dhe unike: thuhet se Rozafa u muros e gjallë brenda mureve të kalasë, por kërkoi në fund që një sy, një dorë, një gji dhe një këmbë t\'i mbeteshin jashtë, që të vazhdonte të ushqente foshnjën e saj edhe pas vdekjes. Pikërisht për këtë arsye, muret e kalasë \"pikojnë qumësht\"."
            },
            {
                title: "Qyteti i Biçikletave",
                description: "Shkodra njihet si qyteti i biçikletave - një stil jetese, duke u kthyer jo në një trend, por në një traditë të përjetshme. Prej dekadash, shkodranët lëvizin me biçikletë për në shkolla, punë e kafe, duke e kthyer qytetin në një nga vendet më miqësore për biçikleta në Shqipëri."
            }
        ];

        const carousel3 = document.getElementById('articlesCarousel3');
        carousel3.addEventListener('slid.bs.carousel', e => {
            document.getElementById('article3-title').textContent = article3Data[e.to].title;
            document.getElementById('article3-description').textContent = article3Data[e.to].description;
        });
    </script>

<?php require_once "parts/footer.php";
