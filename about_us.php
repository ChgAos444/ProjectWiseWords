<?php
require_once "parts/header.php";
require_once "parts/nav.php";
?>

    <style>
        .image-container {
            position: relative;
            aspect-ratio: 1/1;
        }

        .image-container img:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: box-shadow 0.3s ease;

        }
    </style>

    <section class="py-5">
        <div class="container">
            <div class="row gx-4 align-items-center justify-content-between">
                <div class="col-md-5 order-2 order-md-1">
                    <div class="mt-5 mt-md-0">
                        <span class="text-muted">Historia jonë</span>
                        <h2 class="display-5 fw-bold">Rreth Nesh</h2>
                        <p class="lead"> Urta e Artë është një faqe që merret me fjalët e urta dhe shprehjet
                            frazeologjike, duke i shpjeguar ato në mënyrë të qartë dhe të kuptueshme për të gjithë. Kjo
                            faqe u krijua sepse vumë re se në internet mungonte një vend i mirëfilltë ku këto pasuri të
                            gjuhës sonë të mblidheshin dhe të shpjegoheshin si duhet. Qëllimi ynë është të ruajmë dhe të
                            përcjellim mençurinë popullore, duke treguar jo vetëm kuptimin e fjalëve të urta, por edhe
                            mesazhin dhe vlerat që ato përçojnë.</p>
                        <p class="lead">Ne jemi nxënës të klasës së 9-të nga shkolla “Gjon
                            Ndoci” dhe kjo faqe është një nismë e jona për të afruar të rinjtë me gjuhën dhe kulturën
                            shqiptare. Me këtë faqe duam që çdo shprehje të mos mbetet vetëm fjalë, por të kthehet në
                            mësim për jetën.</p>
                    </div>
                </div>
                <div class="col-md-6 offset-md-1 order-1 order-md-2">
                    <div class="row g-2 g-lg-3">
                        <div class="col-6 image-container">
                            <img class="img-fluid rounded-3" src="images/original_logo.png">
                        </div>
                        <div class="col-6 image-container">
                            <img class="img-fluid rounded-3" src="images/castle_kruje.jpg">
                        </div>
                        <div class="col-6 image-container">
                            <img class="img-fluid rounded-3" src="images/rozafa_castle.png">
                        </div>
                        <div class="col-6 image-container">
                            <img class="img-fluid rounded-3" src="images/kole_idromeno_motra_tone.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
require_once "parts/footer.php";
?>