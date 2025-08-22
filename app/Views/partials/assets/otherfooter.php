<!-- footer Start -->
<footer class="footer__one bg1-color">
    <div class="footer__topone pt-120 pb-120">
        <div class="container">
            <div class="row g-4 justify-content-between">
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-6 col-sm-6">
                    <div class="footer__onewidget">
                        <span class="display-five n0-color mb-5 mb-md-8">
                            <span class="p1-color">
                                Let’s
                            </span> Work Together
                        </span>
                        <p class="n0-color mb-5 mb-md-8">
                            Welcome to our diverse and dynamic course catalog. At Edufast, we're dedicated to providing you with access to high-quality education that empowers your personal and professional growth.
                        </p>
                        <ul class="social-area d-flex gap-3 gap-xl-4">
                                <li>
                                <a href="javascript:void(0)" class="d-center">
                                    <i class="ti ti-brand-facebook fw_400 fs-five"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="d-center">
                                    <i class="ti ti-brand-twitter fw_400 fs-five"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="d-center">
                                    <i class="ti ti-brand-instagram fw_400 fs-five"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="d-center">
                                    <i class="ti ti-brand-pinterest fw_400 fs-five"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-4">
                    <div class="footer__onewidget__link">
                        <h4 class="n0-color mb-5 mb-md-8">
                            Navigation
                        </h4>
                        <ul class="widget__linkone">
                            <li>
                                <a href="<?= base_url(); ?>home" class="p1hover">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>course" class="p1hover">
                                    Courses
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>aboutus" class="p1hover">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>contact" class="p1hover">
                                    Contact
                                </a>
                            </li>
                            <!-- <li>
                                <a href="faq.html" class="p1hover">
                                    FAQs
                                </a>
                            </li>
                            <li>
                                <a href="blog-grid.html" class="p1hover">
                                    Blogs
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
                    <div class="footer__onewidget__link">
                        <h4 class="n0-color mb-5 mb-md-8">
                            Contact Us
                        </h4>
                        <ul class="widget__contactone">
                            <li class="d-flex gap-3 gap-xl-5 mb-4 mb-xl-6">
                                <span class="icon cmn__social d-center">
                                    <i class="ti ti-phone fs-five fw_400"></i>
                                </span>
                                <a href="#0" class="p1hover">
                                    <?= ADMIN_PHONE_NUMBER; ?>
                                    <!-- <span class="d-block n0-color">
                                        (303) 555-0105
                                    </span> -->
                                </a>
                            </li>
                            <li class="d-flex gap-3 gap-xl-5 mb-4 mb-xl-6">
                                <span class="icon cmn__social d-center">
                                    <i class="ti ti-mail-opened fs-five fw_400"></i>
                                </span>
                                <a href="#0" class="p1hover">
                                    <?= ADMIN_EMAIL; ?>
                                    <!-- <span class="d-block n0-color">
                                        example@gmail.com
                                    </span> -->
                                </a>
                            </li>
                            <li class="d-flex gap-3 gap-xl-5">
                                <span class="icon cmn__social d-center">
                                    <i class="ti ti-map-pin-check fs-five fw_400"></i>
                                </span>
                                <a href="#0" class="p1hover">
                                    <?= HEAD_OFFICE_ADDRESS; ?>
                                    <!-- <span class="d-block n0-color">
                                        3890 Poplar Dr.
                                    </span> -->
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottomone">
        <div class="container">
            <div class="footer__bottomone__content bt-dash d-grid justify-content-center text-center  py-6 py-lg-10 d-md-flex align-items-center justify-content-lg-between gap-2 gap-md-15">
                <p class="fs-seven n0-color">
                    Copyright &copy; <?= date('Y'); ?> <a href="<?= base_url(); ?>home" class="p1-color"><?= APP_NAMESPACE; ?></a> All Rights Reserved.
                </p>
                <!-- <ul class="terms__one d-flex justify-content-center align-items-center gap-4 gap-lg-6">
                    <li>
                        <a href="privacy.html" class="fs-seven n0-color p1hover">
                            Terms & Conditions
                        </a>
                    </li>
                    <li>
                        <a href="privacy.html" class="fs-seven n0-color p1hover">
                            Privacy Policy
                        </a>
                    </li>
                </ul> -->
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->