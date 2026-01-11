<?php
require_once "parts/header.php";
require_once "parts/nav.php";
?>

<style>
    body {
        min-height: 100vh;
        font-family: "Patrick Hand", cursive;
        font-size: 15pt;
    }

    .patrick-hand-regular {
        font-family: "Patrick Hand", cursive;
        font-weight: 400;
        font-style: normal;
        font-size: 15pt;
    }

    .contact-wrapper {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
    }

    .contact-info {
        background: #FD7979;
        padding: 40px;
        color: white;
    }

    .contact-item {
        display: flex;
        align-items: center;
        margin-bottom: 25px;
        transition: all 0.3s ease;
    }

    .contact-item:hover {
        transform: translateX(10px);
    }

    .contact-icon {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
    }

    .contact-content {
        padding: 40px;
    }
</style>

<div class="container py-5 patrick-hand-regular">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="contact-wrapper">
                <div class="row g-0">

                    <!-- LEFT SIDE -->
                    <div class="col-md-5">
                        <div class="contact-info h-100">
                            <h3 class="mb-4">Na Kontaktoni</h3>
                            <p class="mb-4">
                                Mund të na kontaktoni në çdo kohë duke përdorur informacionin më poshtë.
                            </p>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Adresa</h6>
                                    <p class="mb-0">
                                        Shkodër, Shqipëri<br>
                                        Urta e Arte
                                    </p>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Telefoni</h6>
                                    <p class="mb-0">+355 67 368 3405</p>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Email</h6>
                                    <p class="mb-0">urtaearte@yahoo.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT SIDE -->
                    <div class="col-md-7">
                        <div class="contact-content">
                            <h3 class="mb-4">Informacione Kontakti</h3>

                            <p>
                                Nëse keni pyetje, kërkesa ose keni nevojë për mbështetje,
                                mos hezitoni të na kontaktoni përmes telefonit ose emailit.
                            </p>


                            <div style="width:100%; margin-top:20px;">
                                <iframe width="100%" height="400"
                                        src="https://maps.google.com/maps?width=100%25&height=400&hl=en&q=Shkoder+(Urta%20e%20Arte)&t=&z=14&ie=UTF8&iwloc=B&output=embed">
                                </iframe>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once "parts/footer.php";
