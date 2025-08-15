    <!-- Student Dashboard Cmn Banner Start -->
    <section class="student-cmnbanner pt-6 pb-20 position-relative">
        <div class="container">
            <div class="student-wrapper ">
                <div class="banner-student">
                    <img src="assets/images/banner/dashboard-banner.png" alt="img" class="w-100 radius16">
                    <div class="student-banner-content box-shadow2 n0-bg d-grid d-md-flex align-items-center">
                        <div class="earn-countwrap d-flex d-md-grid d-lg-flex justify-content-center justify-content-md-start">
                            <div class="earn-count-item text-center">
                                <i class="ti ti-mouse-2 s2-color fs-22"></i>
                                <h5 class="n700-color mt-xxl-4 mt-3 mb-1">
                                    0
                                </h5>
                                <span class="n500-color max93 d-block">
                                    Earns Points
                                </span>
                            </div>
                            <div class="earn-count-item text-center">
                                <i class="ti ti-versions s2-color fs-22"></i>
                                <h5 class="n700-color mt-xxl-4 mt-3 mb-1">
                                   0
                                </h5>
                                <span class="n500-color max93 d-block">
                                    Completed Courses
                                </span>
                            </div>
                            <div class="earn-count-item text-center">
                                <i class="ti ti-circle-check s2-color fs-22"></i>
                                <h5 class="n700-color mt-xxl-4 mt-3 mb-1">
                                    0
                                </h5>
                                <span class="n500-color max93 d-block">
                                    Completed Lessons
                                </span>
                            </div>
                        </div>
                        <div class="student-profilebox">
                            <div class="student-imgwap mb-xxl-8 n0-bg mb-xl-6 mb-5 m-auto cus-border border p-1 radius100 img170">
                                <div class="student-img position-relative radius100 img160 n0-bg radius100">
                                    <img src="assets/images/banner/student-profiles.png" alt="img" class="radius100">
                                    <span class="penicon n20-bg radius100 d-center cmn__icon32">
                                        <i class="ti ti-pencil"></i>
                                        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
                                    </span>
                                </div>
                            </div>
                           <div class="cont text-center position-relative">
                                <h4 class="n700-color mb-xxl-3 mb-2 d-flex align-items-center justify-content-center align-items-center gap-xxl-4 gap-2">
                                    Johnson Jaytech
                                    <i class="ti ti-discount-check-filled s2-color fs-five fw_400"></i>
                                </h4>
                                <span class="n500-color d-block">
                                    Full Stack Developer
                                </span>
                           </div>
                        </div>
                        <div class="student-social">
                            <h5 class="n700-color mb-xxl-4 mb-3">
                                Social Media
                            </h5>
                            <ul class="d-flex align-items-center gap-xxl-4 gap-xl-3 gap-2">
                                <li>
                                    <a href="#0" class="cmn-btn second-alt n700-color d-flex align-items-center justify-content-center radius100">
                                        <i class="ti ti-brand-facebook fs-22"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0" class="cmn-btn second-alt n700-color d-flex align-items-center justify-content-center radius100">
                                        <i class="ti ti-brand-twitter fs-22"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0" class="cmn-btn second-alt n700-color d-flex align-items-center justify-content-center radius100">
                                        <i class="ti ti-brand-instagram fs-22"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-active d-lg-none mt-6 n20-bg radius16 py-xxl-4 py-3 px-4 mb-xxl-6 mb-5 d-flex align-items-center justify-content-between">
                <span class="n700-color fs-five d-block fw_500">
                    Toggle Menu
                </span>
                <button type="button">
                    <i class="ti ti-adjustments-horizontal fs-three fw_400"></i>
                </button>
            </div>
            <div class="row g-xxl-6 g-5">
                <div class="col-lg-3">
                    <div class="cmn__dashboard-barwap dashboar-leftbar">
                        <div class="cmn-dashboard-inner radius16 n40border n0-bg py-xxl-10 py-xl-8 py-lg-6 py-5 px-xxl-10 px-xl-4 px-lg-3 px-3">
                            <div class="bb-n40dash pb-xxl-6 pb-5 mb-xxl-6 mb-5 d-flex align-items-center justify-content-between">
                                <span class="n700-color d-block fw_500">
                                    Dashboard
                                </span>
                                <button type="button" class="dashboard-active d-lg-none">
                                    <i class="ti ti-x fs-four fw-400"></i>
                                </button>
                            </div>
                            <ul class="cmn-dash-menu">
                                <li class="mb-xxl-3 mb-2">
                                    <a href= "<?= base_url(); ?>studentdashboard" class="cmn-dashitem active d-flex gap-2 align-items-center fw_500 n500-color">
                                        <i class="ti ti-category n500-color fs-five fw_400"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <!--<li class="mb-xxl-3 mb-2">
                                    <a href="student-subscribtions.html" class="cmn-dashitem d-flex gap-2 align-items-center fw_500 n500-color">
                                        <i class="ti ti-bell-plus n500-color fs-five fw_400"></i>
                                        Subscriptions
                                    </a>
                                </li> -->
                                <li class="mb-xxl-3 mb-2">
                                    <a href="student-mycourse.html" class="cmn-dashitem d-flex gap-2 align-items-center fw_500 n500-color">
                                        <i class="ti ti-versions n500-color fs-five fw_400"></i>
                                        My Courses
                                    </a>
                                </li>
                                <li class="mb-xxl-3 mb-2">
                                    <a href="student-resume.html" class="cmn-dashitem d-flex gap-2 align-items-center fw_500 n500-color">
                                        <i class="ti ti-storm n500-color fs-five fw_400"></i>
                                        Course Resume
                                    </a>
                                </li>
                                <li class="mb-xxl-3 mb-2">
                                    <a href="<?= base_url(); ?>studentquiz" class="cmn-dashitem d-flex gap-2 align-items-center fw_500 n500-color">
                                        <i class="ti ti-cloud-question n500-color fs-five fw_400"></i>
                                        Quiz
                                    </a>
                                </li>
                                <!--<li class="mb-xxl-3 mb-2">
                                    <a href="student-chat.html" class="cmn-dashitem d-flex gap-2 align-items-center fw_500 n500-color">
                                        <i class="ti ti-brand-wechat n500-color fs-five fw_400"></i>
                                        Chat
                                    </a>
                                </li>
                                <li class="mb-xxl-3 mb-2">
                                    <a href="student-whislist.html" class="cmn-dashitem d-flex gap-2 align-items-center fw_500 n500-color">
                                        <i class="ti ti-heart n500-color fs-five fw_400"></i>
                                        Wishlist
                                    </a>
                                </li> -->
                                <li class="mb-xxl-3 mb-2">
                                    <a href="<?= base_url(); ?>editprofile" class="cmn-dashitem d-flex gap-2 align-items-center fw_500 n500-color">
                                        <i class="ti ti-user n500-color fs-five fw_400"></i>
                                        Edit Profile
                                    </a>
                                </li>
                                <!--<li class="mb-xxl-3 mb-2">
                                    <a href="student-pymentinfo.html" class="cmn-dashitem d-flex gap-2 align-items-center fw_500 n500-color">
                                        <i class="ti ti-cash n500-color fs-five fw_400"></i>
                                        Payment Info
                                    </a>
                                </li> -->
                                <li class="mb-xxl-3 mb-2">
                                    <a href="student-setting.html" class="cmn-dashitem d-flex gap-2 align-items-center fw_500 n500-color">
                                        <i class="ti ti-settings n500-color fs-five fw_400"></i>
                                        Setting
                                    </a>
                                </li>
                                <li class="mb-xxl-3 mb-2">
                                    <a href= "<?= base_url(); ?>deletaccount" class="cmn-dashitem d-flex gap-2 align-items-center fw_500 n500-color">
                                        <i class="ti ti-trash n500-color fs-five fw_400"></i>
                                        Delete Profile
                                    </a>
                                </li>
                                <li class="mb-xxl-3 mb-2">
                                    <a href= "<?= base_url(); ?>signout" class="cmn-dashitem d-flex gap-2 align-items-center fw_500 n500-color">
                                        <i class="ti ti-logout n500-color fs-five fw_400"></i>
                                        Sign Out
                                    </a>
                                </li>
                            </ul>
                            <!--<div class="upgrade-por mt-xxl-10 mt-xl-6 mt-5 mb-xxl-4 mb-3">
                                <img src="assets/images/vectors/upgrade-pro.png" alt="img">
                            </div>
                            <p class="fs-eight fw_400 n500-color mb-xxl-10 mb-xl-8 mb-lg-6 mb-5">
                                Upgrade to <span class="fw_600">PRO</span> for more resources
                            </p>
                            <button class="cmn-btn w-100 radius32 py-xxl-3 py-2 px-xxl-4 px-3" type="button">
                                <span>
                                    Upgrade Now
                                </span>
                            </button> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="cmn__dadhboardbody">
                        <div class="radius16 student-quiz n40border py-xxl-8 py-4 px-xxl-8 px-4">
                            <div class="d-grid justify-content-center justify-content-sm-start text-center text-sm-start d-sm-flex align-items-center gap-xxl-10 gap-xl-6 gap-5 bb-n40dash pb-xxl-8 pb-6 mb-xxl-8 mb-6">
                                <div class="thumb">
                                    <img src="assets/images/common/course-curriculum.jpg" alt="img" class="radius16">
                                </div>
                                <div class="cont">
                                    <h4 class="n700-color mb-xxl-3 mb-2">
                                        The Complete Health Sciences & Medicine Courses 
                                    </h4>
                                    <p class="n700-color">
                                        120 Courses In 01
                                    </p>
                                </div>
                            </div>
                            <div class="quiz-dboxwrap n20-bg rounded n30-border py-xxl-6 py-5 px-xxl-6 px-5 mb-xxl-6 mb-5">
                                <h5 class="n700-color bb-n40dash pb-xxl-6 pb-5 mb-xxl-6 mb-5">
                                    Q1. What is the primary focus of the field of epidemiology?
                                </h5>
                                <div class="cmn-quizitem">
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                a. Diagnosis of diseases
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                b. Treatment planning
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox" checked="checked">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                c. Disease prevention and patterns
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                d. Surgical procedures
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="quiz-dboxwrap n20-bg rounded n30-border py-xxl-6 py-5 px-xxl-6 px-5 mb-xxl-6 mb-5">
                                <h5 class="n700-color bb-n40dash pb-xxl-6 pb-5 mb-xxl-6 mb-5">
                                    Q2. What is the purpose of a placebo in clinical trials?
                                </h5>
                                <div class="cmn-quizitem">
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                a. To test the efficacy of a new drug
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox" checked="checked">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                b. To deceive participants about the treatment
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                c. To induce side effects intentionally
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                d. To act as an active control in experiments
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="quiz-dboxwrap n20-bg rounded n30-border py-xxl-6 py-5 px-xxl-6 px-5 mb-xxl-6 mb-5">
                                <h5 class="n700-color bb-n40dash pb-xxl-6 pb-5 mb-xxl-6 mb-5">
                                    Q3. What is the main objective of vaccination in public health?
                                </h5>
                                <div class="cmn-quizitem">
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                a. To cure infectious diseases
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox" checked="checked">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                b. To prevent the spread of diseases
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                c. To boost overall immunity
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                d. To treat existing infections
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="quiz-dboxwrap n20-bg rounded n30-border py-xxl-6 py-5 px-xxl-6 px-5 mb-xxl-6 mb-5">
                                <h5 class="n700-color bb-n40dash pb-xxl-6 pb-5 mb-xxl-6 mb-5">
                                    Q4. What does the acronym DNA stand for in genetics?
                                </h5>
                                <div class="cmn-quizitem">
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox" checked="checked">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                a. Deoxyribonucleic Acid
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                c. Deoxyribose Nucleotide Assembly
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                d. Ribose Nucleic Acid
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                d. Surgical procedures
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="quiz-dboxwrap n20-bg rounded n30-border py-xxl-6 py-5 px-xxl-6 px-5">
                                <h5 class="n700-color bb-n40dash pb-xxl-6 pb-5 mb-xxl-6 mb-5">
                                    Q5. What is the primary role of insulin in the human body?
                                </h5>
                                <div class="cmn-quizitem">
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                a. Regulating blood sugar levels
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                b. Enhancing muscle strength
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox" checked="checked">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                c. Controlling heart rate
                                            </span>
                                        </span>
                                    </label>
                                    <label class="checkbox-single">
                                        <span class="d-flex gap-xl-2 ga-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="n500-color">
                                                d. Assisting in digestion
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="cmn-btn n700-color gap-2 d-inline-flex align-items-center radius30 py-2 py-xxl-3 px-xxl-6 px-5 mt-xxl-10 mt-8">
                                <span>
                                    View Result
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Student Dashboard Cmn Banner end -->



    
    <!-- ==== js dependencies start ==== -->
    <script src="assets/js/plugins/plugins.js"></script>
    <script src="assets/js/plugins/plugin-custom.js"></script>
    <script src="assets/js/apexcharts.js"></script>
    <script src="assets/js/plugins/aos.js"></script>
    <script src="assets/js/main.js"></script>

