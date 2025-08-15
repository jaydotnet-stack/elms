<header class="header-section cmn-s2color-header header-v3 header-scrollfixed">
    <!-- top header start -->
    <div class="one__header header-cmnbg-added head-border n0-bg">
        <!-- top header end -->
        <div class="container">
            <!-- main header start -->
            <div class="main-navbar one__mainheader">
                <!-- header-section start -->
                <nav class="navbar-custom">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="<?= base_url(); ?>home" class="nav-brand d-lg-none">
                            <img class="w-100" src="<?= base_url(); ?>assets/images/logo.png" alt="logo">
                        </a>
                        <div class="d-flex gap-3 align-items-center position-relative">
                            <div class="switch-wrapper-top d-flex d-lg-none"></div>
                            <button class="navbar-toggle-btn d-block d-lg-none" type="button">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                    <div class="navbar-toggle-item cus__scroll">
                        <div class="d-flex gap-5 flex-column flex-lg-row align-items-start align-items-lg-center justify-content-between mt-5 mt-lg-0">
                            <div class="left__navbox d-flex align-items-center gap-4 gap-xl-6 gap-xxl-10">
                                <a href="<?= base_url(); ?>home" class="navbar-brand d-none d-lg-block">
                                    <img class="w-100" src="<?= base_url(); ?>assets/images/logo.png" alt="logo">
                                </a>
                                <div class="category__oneadjust gap-6 d-flex align-items-center d-none d-lg-block">
                                    <!-- <div class="catev3 d-flex align-items-center gap-1 gap-xxl-2">
                                        <i class="ti ti-category-2 n500-color"></i>
                                        <select name="cate" class="category n0-color">
                                            <option value="1">
                                                Category
                                            </option>
                                            <option value="2">
                                                Web Design
                                            </option>
                                            <option value="3">
                                                Development
                                            </option>
                                            <option value="4">
                                                Graphic Design
                                            </option>
                                            <option value="5">
                                                Softwer Eng
                                            </option>
                                        </select>
                                    </div> -->
                                    <!-- search form input -->
                                    <button class="search-toggle-btn cmn-btn search__icon40 d-block d-md-none">
                                        <span>
                                            <i class="fa-solid fa-magnifying-glass n4-color"></i>
                                        </span>
                                    </button>
                                    <!-- search form input -->
                                </div>
                                <ul class="custom-nav d-lg-flex d-grid gap-4 gap-xl-6">

                                    <li class="menu-item position-relative">
                                        <button id='homePage' class="position-relative pe-5 itembg__1 fw_500">
                                            Home
                                        </button>
                                    </li>
                                    
                                    <li class="menu-item position-relative">
                                        <button id='coursePage'class="position-relative itembg__1 pe-5 fw_500 n500-color">
                                            Courses
                                        </button>
                                    </li>
                                    
                                    <li class="menu-item position-relative">
                                        <button id='aboutUsPage'class="position-relative itembg__1 pe-5 fw_500 n500-color">
                                            About Us
                                        </button>
                                    </li>
                                    
                                    <li class="menu-item position-relative">
                                        <button id='contactPage'class="position-relative itembg__1 pe-5 fw_500 n500-color">
                                            Contact
                                        </button>
                                    </li>

                                </ul>
                            </div>

                            <ul class="shop__styleone ps-lg-0 ps-2 pb-lg-0 pb-2 mt-3 mt-lg-0 d-flex align-items-center gap-2 gap-lg-2 gap-xl-3 gap-xxl-5">
                                <li class="position-relative">
                                    <div class="dropdown position-relative">
                                        <button class="btn headerv3-cmnicon " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-user-circle fs-six"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?= base_url(); ?>studentsignup">Student account</a></li>
                                            <li><a class="dropdown-item" href="<?= base_url(); ?>lecturersignup">Lecturer account</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </nav>
            </div>
            <!-- main header end -->
        </div>
    </div>
</header>