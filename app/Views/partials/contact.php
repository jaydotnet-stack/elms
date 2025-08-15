<!--contact section-->
    <section class="contact-seection pt-120 pb-120 position-relative">
        <div class="container">
              <div class="row g-6">
                <div class="col-lg-4">
                    <div class="contact-left-bar n0-bg n30-border radius16 p-xxl-8 px-lg-6 p-5">
                        <h4 class="n700-color fw_600 pb-xxl-10 pb-7 mb-xxl-10 mb-7 bb-n40dash">
                            Need more help?
                        </h4>
                        <div class="need-box mb-xxl-6 mb-5 d-flex align-items-center gap-xxl-8 gap-xl-6 gap-lg-5 gap-3 cus-border border radius16 n20-bg p-xxl-6 p-lg-5 p-md-4 p-3">
                            <span class="icon cmn__icon80 d-center cus-border border radius100 n0-bg">
                                <i class="ti ti-phone fs-four fw_400"></i>
                            </span>
                            <div class="cont">
                                <span class="fz20 fw_600 n700-color d-block mb-2">
                                    Call Now
                                </span>
                                <a href="#0" class="n700-color">
                                    <?= ADMIN_PHONE_NUMBER; ?> 
                                    <!-- <span class="d-block">
                                        (252) 555-0126
                                    </span> -->
                                </a>
                            </div>
                        </div>
                        <div class="need-box mb-xxl-6 mb-5 d-flex align-items-center gap-xxl-8 gap-xl-6 gap-lg-5 gap-3 cus-border border radius16 n20-bg p-xxl-6 p-lg-5 p-md-4 p-3">
                            <span class="icon cmn__icon80 d-center cus-border border radius100 n0-bg">
                                <i class="ti ti-mail-opened fs-four fw_400"></i>
                            </span>
                            <div class="cont">
                                <span class="fz20 fw_600 n700-color d-block mb-2">
                                    Email Address
                                </span>
                                <a href="#0" class="n700-color">
                                    <?= ADMIN_EMAIL; ?> 
                                    <!-- <span class="d-block">
                                        info@example.com
                                    </span> -->
                                </a>
                            </div>
                        </div>
                        <div class="need-box d-flex align-items-center gap-xxl-8 gap-xl-6 gap-lg-5 gap-3 cus-border border radius16 n20-bg p-xxl-6 p-lg-5 p-md-4 p-3">
                            <span class="icon cmn__icon80 d-center cus-border border radius100 n0-bg">
                                <i class="ti ti-phone fs-four fw_400"></i>
                            </span>
                            <div class="cont">
                                <span class="fz20 fw_600 n700-color d-block mb-2">
                                    Location
                                </span>
                                <span class="n700-color">
                                    <?= HEAD_OFFICE_ADDRESS; ?> 
                                    <!-- <span class="d-block">
                                        Jersey 45463
                                    </span> -->
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact-right n0-bg n30-border radius16 p-xxl-8 px-lg-6 p-5">
                        <h4 class="n700-color fw_600 pb-xxl-10 pb-7 mb-xxl-10 mb-7 bb-n40dash">
                            Get in touch with us.
                        </h4>
                        <form action="#0" class="writere-v1">
                            <div class="row g-4">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-cmn">
                                        <label for="names" class="fs-six fw_500 n700-color mb-xxl-3 mb-2">Name</label>
                                        <input type="text" placeholder="Enter Your Name..." id="names" class="n20-bg">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-cmn">
                                        <label for="em" class="fs-six fw_500 n700-color mb-xxl-3 mb-2">Email</label>
                                        <input type="email" placeholder="Enter Your Email..." id="em" class="n20-bg">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-cmn">
                                        <label for="numbewr" class="fs-six fw_500 n700-color mb-xxl-3 mb-2">Phone</label>
                                        <input type="number" placeholder="Enter Your Number..." id="numbewr" class="n20-bg">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-cmn">
                                        <label class="fs-six fw_500 n700-color mb-xxl-3 mb-2">Country</label>
                                        <!-- <select name="#0">
                                            <option value="1">
                                                England
                                            </option>
                                            <option value="1">
                                                US
                                            </option>
                                            <option value="1">
                                                Uk
                                            </option>
                                            <option value="1">
                                                ...
                                            </option>
                                            <option value="1">
                                                ...
                                            </option>
                                            <option value="1">
                                                ...
                                            </option>
                                            <option value="1">
                                                ...
                                            </option>
                                        </select> -->
                                        <input type="text" placeholder="Enter Your Country..." id="country" class="n20-bg">                                        
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-cmn mb-xxl-4 mb-3">
                                        <label for="rev" class="fs-six fw_500 n700-color mb-xxl-3 mb-2">Message</label>
                                        <textarea name="write" id="rev" rows="4" placeholder="Enter Your Message..." class="n20-bg"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="cmn-btn fw_600 justify-content-center d-flex align-items-center gap-2 py-3 px-xl-6 px-5 n700-color">
                                        <span>
                                            Send Message
                                        </span>
                                        <i class="ti ti-arrow-up-right fs-six"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
        </div>
        <img src="assets/images/vectors/light.png" alt="img" class="light-bulp">
    </section>
    <!--contact section-->

    <!--map section-->
    <!-- <section class="map-section overflow-visible">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9581847.762833687!2d-14.999498377213254!3d54.103560962682884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sbd!4v1701164030317!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section> -->
    <!--map section-->

    <!-- subscribe start -->
    <!-- <section class="subscribtion-v2 bg1-color overflow-visible">
        <div class="container">
            <div class="subscribtion__wrap subscribe-map p1-bg radius16">
                <div class="row g-4 justify-content-center">
                    <div class="col-xxl-5 col-xl-6 col-lg-8">
                        <div class="subscrib__content text-center">
                            <h3 class="mb-3 mb-xl-4">
                                Subscribe for newsletters
                            </h3>
                            <p class="n700-color mb-6 mb-xl-10">
                                Subscribe Our Newsletter For Latest Updates
                            </p>
                            <form action="#0" class="mb-5 mb-xl-6 d-flex align-items-center">
                                <input type="text" placeholder="Enter Email...">
                                <button class="d-center btn__v4">
                                    <span>
                                        <i class="ti ti-send n0-color"></i>
                                    </span>
                                </button>
                            </form>
                            <div class="subscrib__check d-flex justify-content-center">
                                <label class="checkbox-single gap-2 gap-xl-3 d-flex align-items-center">
                                    <span class="checkbox-area d-center">
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark d-center"></span>
                                    </span>
                                    <span class="fs-seven n700-color">
                                        I agree with <a href="privacy.html" class="fw_600 n700-color">privacy policy</a> and <a href="#0" class="fw_600 n700-color">terms</a>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- subscribe end -->