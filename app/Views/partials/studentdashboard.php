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
                                    <a href= "<?= base_url(); ?>studentquiz" class="cmn-dashitem d-flex gap-2 align-items-center fw_500 n500-color">
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
                                    <a href= "<?= base_url(); ?>editprofile" class="cmn-dashitem d-flex gap-2 align-items-center fw_500 n500-color">
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
                                    <a href= "<?= base_url(); ?>deleteaccount" class="cmn-dashitem d-flex gap-2 align-items-center fw_500 n500-color">
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
                        <div class="row g-xxl-6 g-4 mb-xxl-6 mb-4">
                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                <div class="radius16 n40border py-xxl-6 py-3 px-xxl-6 px-3 gap-xxl-5 gap-3 d-flex align-items-center wow fadeInUp">
                                    <div class="icon cmn__icon64 radius100 d-center p1-bg">
                                        <i class="ti ti-versions n700-color fs-three fw_400"></i>
                                    </div>
                                    <div class="cont">
                                        <h4 class="counters n700-color mb-xl-2 mb-1">
                                            <span class="odometer" data-odometer-final="0"></span>
                                        </h4>
                                        <span class="n500-color d-block">
                                            Total Courses
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4  col-lg-6 col-md-6 col-sm-6">
                                <div class="radius16 n40border py-xxl-6 py-3 px-xxl-6 px-3 gap-xxl-5 gap-3 d-flex align-items-center wow fadeInUp">
                                    <div class="icon cmn__icon64 radius100 d-center p1-bg">
                                        <i class="ti ti-circle-check n700-color fs-three fw_400"></i>
                                    </div>
                                    <div class="cont">
                                        <h4 class="counters n700-color mb-xl-2 mb-1">
                                            <span class="odometer" data-odometer-final="0"></span>
                                        </h4>
                                        <span class="n500-color d-block">
                                            Complete lessons
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4  col-lg-6 col-md-6 col-sm-6">
                                <div class="radius16 n40border py-xxl-6 py-3 px-xxl-6 px-3 gap-xxl-5 gap-3 d-flex align-items-center wow fadeInUp">
                                    <div class="icon cmn__icon64 radius100 d-center p1-bg">
                                        <i class="ti ti-award n700-color fs-three fw_400"></i>
                                    </div>
                                    <div class="cont">
                                        <h4 class="counters n700-color mb-xl-2 mb-1">
                                            <span class="odometer" data-odometer-final="0"></span>
                                        </h4>
                                        <span class="n500-color d-block">
                                            Achieved Certificates
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dash-myactivity mb-xxl-6 mb-4 radius16 n40border py-xxl-8 py-4 px-xxl-8 px-4">
                            <div class="d-flex flex-wrap gap-3 newest__filter align-items-center justify-content-between mb-xxl-2 mb-1 bb-n40dash pb-xxl-6 pb-5 mb-6">
                                <span class="fs-five n700-color fw_600">
                                    My Activity
                                </span>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="n500-color d-block">
                                        Sort By :
                                    </span>
                                    <div class="lang">
                                        <select name="news" class="cus-scro80 cus-border border radius32 ps-5 py-2 pe-8">
                                            <option value="1">
                                                Weekly
                                            </option>
                                            <option value="1">
                                                Monthly
                                            </option>
                                            <option value="1">
                                                Monthly
                                            </option>
                                            <option value="1">
                                                Monthly
                                            </option>
                                            <option value="1">
                                                Monthly
                                            </option>
                                            <option value="1">
                                                Monthly
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="chart" class="w-100"></div>
                        </div>
                        <div class="radius16 mycourses-table n40border py-xxl-8 py-4 px-xxl-8 px-4">
                            <div class="d-grid d-md-flex flex-wrap gap-3 newest__filter align-items-center justify-content-center text-center justify-content-md-between mb-xxl-10 mb-6 bb-n40dash pb-xxl-6 pb-5 mb-6">
                                <span class="fs20 n700-color fw_600">
                                    My Courses
                                </span>
                                <div class="d-grid d-md-flex align-items-center gap-xxl-6 gap-4">
                                    <form action="#" class="search-toggle-box d-block">
                                        <div
                                            class="input-area d-flex n0-bg align-items-center gap-2 py-1 px-6 py-lg-2 px-2 radius30">
                                            <input type="text" class="px-4" placeholder="Search">
                                            <button class="cmn-btn search__icon40">
                                                <span>
                                                    <i class="fa-solid fa-magnifying-glass n4-color"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        <span class="n500-color d-block">
                                            Sort By :
                                        </span>
                                        <div class="lang">
                                            <select name="news" class="cus-scro80 cus-border border radius32 ps-5 py-2 pe-8">
                                                <option value="1">
                                                    All
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
                                                <option value="1">
                                                    ...
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="customtable-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Courses Title</th>
                                        <th>Start Date</th>
                                        <th>Progress</th>
                                        <th>Review</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <!--<tbody>
                                    <tr>
                                        <td>
                                            <span class="d-flex db-pointthumb align-items-center gap-xxl-4 gap-xl-3 gap-2">
                                                <img src="assets/images/common/db1.png" alt="img" class="cmn__icon40 radius100">
                                                <span class="cont fs-seven fw_500 n500-color">
                                                    Scrum Master
                                                    <span class="fw_400 d-block">By Kristin Watson</span>
                                                </span>
                                            </span>
                                        </td>
                                        <td><span class="n500-color">03/05/2024</span></td>
                                        <td>
                                            <span class="d-flex align-items-center gap-xxl-3 gap-xl-2 gap-1">
                                                <span class="n500-color">
                                                    53%
                                                </span>
                                                <span class="progress">
                                                    <span class="progress-bar wow slideInLeft" data-wow-duration=".8s"
                                                        role="progressbar" style="width: 53%;" aria-valuenow="90" aria-valuemin="0"
                                                        aria-valuemax="100"></span>
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="d-flex align-items-center gap-xxl-3 gap-xl-2 gap-1">
                                                <i class="ti ti-star-filled s1-color fs-22"></i>
                                                <span class="n500-color fw_500">
                                                    4.8
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="lang dbg-clr1 dashboad-language">
                                                Complete
                                            </span>
                                        </td>
                                        <td>
                                            <div class="cmn__dropdown dropdown dropleft">
                                                <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ti ti-dots-vertical fs-five fw_400"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                <li class="mb-1">
                                                    <button type="button" class="n500-color fs-seven">
                                                    View
                                                    </button>
                                                </li>
                                                <li class="mb-1">
                                                    <button type="button" class="n500-color fs-seven">
                                                        Edit
                                                    </button>
                                                </li>
                                                <li class="mb-1">
                                                    <button type="button" class="n500-color fs-seven">
                                                        Delete
                                                    </button>
                                                </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="d-flex db-pointthumb align-items-center gap-xxl-4 gap-xl-3 gap-2">
                                                <img src="assets/images/common/db2.png" alt="img" class="cmn__icon40 radius100">
                                                <span class="cont fs-seven fw_500 n500-color">
                                                    UI/UX Designer
                                                    <span class="fw_400 d-block">By Ralph Edwards</span>
                                                </span>
                                            </span>
                                        </td>
                                        <td><span class="n500-color">03/05/2024</span></td>
                                        <td>
                                            <span class="d-flex align-items-center gap-xxl-3 gap-xl-2 gap-1">
                                                <span class="n500-color">
                                                    53%
                                                </span>
                                                <span class="progress">
                                                    <span class="progress-bar wow slideInLeft" data-wow-duration=".8s"
                                                        role="progressbar" style="width: 53%;" aria-valuenow="90" aria-valuemin="0"
                                                        aria-valuemax="100"></span>
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="d-flex align-items-center gap-xxl-3 gap-xl-2 gap-1">
                                                <i class="ti ti-star-filled s1-color fs-22"></i>
                                                <span class="n500-color fw_500">
                                                    4.8
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="lang dbg-clr2 dashboad-language">
                                                Cancel
                                            </span>
                                        </td>
                                        <td>
                                            <div class="cmn__dropdown dropdown dropleft">
                                                <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ti ti-dots-vertical fs-five fw_400"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                <li class="mb-1">
                                                    <button type="button" class="n500-color fs-seven">
                                                    View
                                                    </button>
                                                </li>
                                                <li class="mb-1">
                                                    <button type="button" class="n500-color fs-seven">
                                                        Edit
                                                    </button>
                                                </li>
                                                <li class="mb-1">
                                                    <button type="button" class="n500-color fs-seven">
                                                        Delete
                                                    </button>
                                                </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="d-flex db-pointthumb align-items-center gap-xxl-4 gap-xl-3 gap-2">
                                                <img src="assets/images/common/db3.png" alt="img" class="cmn__icon40 radius100">
                                                <span class="cont fs-seven fw_500 n500-color">
                                                    Python Skill
                                                    <span class="fw_400 d-block">By Annette Black</span>
                                                </span>
                                            </span>
                                        </td>
                                        <td><span class="n500-color">03/05/2024</span></td>
                                        <td>
                                            <span class="d-flex align-items-center gap-xxl-3 gap-xl-2 gap-1">
                                                <span class="n500-color">
                                                    53%
                                                </span>
                                                <span class="progress">
                                                    <span class="progress-bar wow slideInLeft" data-wow-duration=".8s"
                                                        role="progressbar" style="width: 53%;" aria-valuenow="90" aria-valuemin="0"
                                                        aria-valuemax="100"></span>
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="d-flex align-items-center gap-xxl-3 gap-xl-2 gap-1">
                                                <i class="ti ti-star-filled s1-color fs-22"></i>
                                                <span class="n500-color fw_500">
                                                    4.8
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="lang n20-bg dashboad-language">
                                                Running
                                            </span>
                                        </td>
                                        <td>
                                            <div class="cmn__dropdown dropdown dropleft">
                                                <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ti ti-dots-vertical fs-five fw_400"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                <li class="mb-1">
                                                    <button type="button" class="n500-color fs-seven">
                                                    View
                                                    </button>
                                                </li>
                                                <li class="mb-1">
                                                    <button type="button" class="n500-color fs-seven">
                                                        Edit
                                                    </button>
                                                </li>
                                                <li class="mb-1">
                                                    <button type="button" class="n500-color fs-seven">
                                                        Delete
                                                    </button>
                                                </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="d-flex db-pointthumb align-items-center gap-xxl-4 gap-xl-3 gap-2">
                                                <img src="assets/images/common/db4.png" alt="img" class="cmn__icon40 radius100">
                                                <span class="cont fs-seven fw_500 n500-color">
                                                    Node JS
                                                    <span class="fw_400 d-block">By Darlene Robert</span>
                                                </span>
                                            </span>
                                        </td>
                                        <td><span class="n500-color">03/05/2024</span></td>
                                        <td>
                                            <span class="d-flex align-items-center gap-xxl-3 gap-xl-2 gap-1">
                                                <span class="n500-color">
                                                    53%
                                                </span>
                                                <span class="progress">
                                                    <span class="progress-bar wow slideInLeft" data-wow-duration=".8s"
                                                        role="progressbar" style="width: 53%;" aria-valuenow="90" aria-valuemin="0"
                                                        aria-valuemax="100"></span>
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="d-flex align-items-center gap-xxl-3 gap-xl-2 gap-1">
                                                <i class="ti ti-star-filled s1-color fs-22"></i>
                                                <span class="n500-color fw_500">
                                                    4.8
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="lang dbg-clr1 dashboad-language">
                                                Complete
                                            </span>
                                        </td>
                                        <td>
                                            <div class="cmn__dropdown dropdown dropleft">
                                                <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ti ti-dots-vertical fs-five fw_400"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                <li class="mb-1">
                                                    <button type="button" class="n500-color fs-seven">
                                                    View
                                                    </button>
                                                </li>
                                                <li class="mb-1">
                                                    <button type="button" class="n500-color fs-seven">
                                                        Edit
                                                    </button>
                                                </li>
                                                <li class="mb-1">
                                                    <button type="button" class="n500-color fs-seven">
                                                        Delete
                                                    </button>
                                                </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="d-flex db-pointthumb align-items-center gap-xxl-4 gap-xl-3 gap-2">
                                                <img src="assets/images/common/db5.png" alt="img" class="cmn__icon40 radius100">
                                                <span class="cont fs-seven fw_500 n500-color">
                                                    Software Tester
                                                    <span class="fw_400 d-block">By Courtney Henry</span>
                                                </span>
                                            </span>
                                        </td>
                                        <td><span class="n500-color">03/05/2024</span></td>
                                        <td>
                                            <span class="d-flex align-items-center gap-xxl-3 gap-xl-2 gap-1">
                                                <span class="n500-color">
                                                    53%
                                                </span>
                                                <span class="progress">
                                                    <span class="progress-bar wow slideInLeft" data-wow-duration=".8s"
                                                        role="progressbar" style="width: 53%;" aria-valuenow="90" aria-valuemin="0"
                                                        aria-valuemax="100"></span>
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="d-flex align-items-center gap-xxl-3 gap-xl-2 gap-1">
                                                <i class="ti ti-star-filled s1-color fs-22"></i>
                                                <span class="n500-color fw_500">
                                                    4.8
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="lang dbg-clr2 dashboad-language">
                                                Cancel
                                            </span>
                                        </td>
                                        <td>
                                            <div class="cmn__dropdown dropdown dropleft">
                                                <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ti ti-dots-vertical fs-five fw_400"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                <li class="mb-1">
                                                    <button type="button" class="n500-color fs-seven">
                                                    View
                                                    </button>
                                                </li>
                                                <li class="mb-1">
                                                    <button type="button" class="n500-color fs-seven">
                                                        Edit
                                                    </button>
                                                </li>
                                                <li class="mb-1">
                                                    <button type="button" class="n500-color fs-seven">
                                                        Delete
                                                    </button>
                                                </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="d-flex db-pointthumb align-items-center gap-xxl-4 gap-xl-3 gap-2">
                                                <img src="assets/images/common/db6.png" alt="img" class="cmn__icon40 radius100">
                                                <span class="cont fs-seven fw_500 n500-color">
                                                    Ethical Hacker
                                                    <span class="fw_400 d-block">By Ronald Richards</span>
                                                </span>
                                            </span>
                                        </td>
                                        <td><span class="n500-color">03/05/2024</span></td>
                                        <td>
                                            <span class="d-flex align-items-center gap-xxl-3 gap-xl-2 gap-1">
                                                <span class="n500-color">
                                                    53%
                                                </span>
                                                <span class="progress">
                                                    <span class="progress-bar wow slideInLeft" data-wow-duration=".8s"
                                                        role="progressbar" style="width: 53%;" aria-valuenow="90" aria-valuemin="0"
                                                        aria-valuemax="100"></span>
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="d-flex align-items-center gap-xxl-3 gap-xl-2 gap-1">
                                                <i class="ti ti-star-filled s1-color fs-22"></i>
                                                <span class="n500-color fw_500">
                                                    4.8
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="lang n0-bg dashboad-language">
                                                Running
                                            </span>
                                        </td>
                                        <td>
                                            <div class="cmn__dropdown dropdown dropleft">
                                                <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ti ti-dots-vertical fs-five fw_400"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                <li class="mb-1">
                                                    <button type="button" class="n500-color fs-seven">
                                                    View
                                                    </button>
                                                </li>
                                                <li class="mb-1">
                                                    <button type="button" class="n500-color fs-seven">
                                                        Edit
                                                    </button>
                                                </li>
                                                <li class="mb-1">
                                                    <button type="button" class="n500-color fs-seven">
                                                        Delete
                                                    </button>
                                                </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>-->
                                </table>
                            </div>
                            <ul class="pagination justify-content-center tb-n40dash pt-xxl-6 pt-5 mt-6 d-flex align-items-center gap-xxl-3 gap-2 flex-wrap">
                                <li>
                                    <a href="#0" class="n20-bg cmn__icon32 fw_600 d-center radius100 cus-border border">
                                        <i class="ti ti-chevron-left fs-six"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0" class="n20-bg cmn__icon32 fw_600 d-center radius100 cus-border border">
                                        1
                                    </a>
                                </li>
                                <li>
                                    <a href="#0" class="n20-bg cmn__icon32 fw_600 d-center radius100 cus-border border">
                                        2
                                    </a>
                                </li>
                                <li>
                                    <a href="#0" class="n20-bg cmn__icon32 fw_600 d-center radius100 cus-border border">
                                        3
                                    </a>
                                </li>
                                <li>
                                    <a href="#0" class="n20-bg cmn__icon32 fw_600 d-center radius100 cus-border border">
                                        ...
                                    </a>
                                </li>
                                <li>
                                    <a href="#0" class="n20-bg cmn__icon32 fw_600 d-center radius100 cus-border border">
                                        <i class="ti ti-chevron-right fs-six"></i>
                                    </a>
                                </li>
                            </ul>
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
    <script>
        var options = {
          series: [{
          name: 'Sales',
          data: [20, 10, 36, 60, 20, 40, 22, ]
            }],
            chart: {
            height: 450,
            type: 'line',
            },
            forecastDataPoints: {
            count: 2
            },
            stroke: {
            width: 5,
            curve: 'smooth'
            },
            xaxis: {
                categories: ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
                labels: {
                    formatter: function (value) {
                        return value;
                    }
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: [ '#FFC700'],
                    shadeIntensity: 1,
                    type: 'horizontal',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 0, 0, 0]
                },
            },
            yaxis: {
                min: 0,
                max: 100,
                labels: {
                    formatter: function (value) {
                        return value + '%';
                    }
                }
            },
            toolbar: null
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
</body>


