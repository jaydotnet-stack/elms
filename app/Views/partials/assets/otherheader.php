<!-- header-section start -->
<header class="header-section">
    <!-- top header start -->
    <div class="header__topone header__bg">
        <div class="container">
            <div class="top-header d-flex gap-5 align-items-center justify-content-between py-lg-5 py-4">
                <div class="d-flex gap-lg-10 gap-xl-15 align-items-center">
                    <a href="<?= base_url(); ?>home" class="nav-brand d-none d-lg-block">
                        <img class="w-100" src="<?= base_url(); ?>assets/images/logo.png" alt="logo">
                    </a>
                    <div class="category__oneadjust gap-6 d-flex align-items-center">
                        <!-- <select name="cate" class="category">
                            <option value="1">
                                Category
                            </option>
                            <option value="1">
                                Web Design
                            </option>
                            <option value="1">
                                CSE
                            </option>
                            <option value="1">
                                Web Development
                            </option>
                            <option value="1">
                                Academic
                            </option>
                            <option value="1">
                                Graphic Design
                            </option>
                            <option value="1">
                                Art & Creative
                            </option>
                            <option value="1">
                                Softwer Eng
                            </option>
                        </select> -->
                        <!-- search form input -->

                        <!-- <button class="search-toggle-btn cmn-btn search__icon40 d-block d-md-none">
                            <span>
                                <i class="fa-solid fa-magnifying-glass n4-color"></i>
                            </span>
                        </button>
                        <form action="#" class="search-toggle-box d-md-block">
                            <div
                                class="input-area d-flex n0-bg align-items-center gap-2 py-1 px-6 py-lg-2 px-2 radius30">
                                <input type="text" class="px-4" placeholder="Search">
                                <button class="cmn-btn search__icon40">
                                    <span>
                                        <i class="fa-solid fa-magnifying-glass n4-color"></i>
                                    </span>
                                </button>
                            </div>
                        </form> -->

                        <!-- search form input -->
                    </div>
                </div>

                <!-- need to change or add new button  -->
                <div class="d-flex align-items-center gap-4 gap-xxl-6">


                    <?php
                        if(session()->get('isLoggedIn') && session()->get('isLoggedIn') == true){?>
                            <a href="<?= base_url(); ?>signout" class="cmn-btn d-none d-sm-block second-alt n700-color gap-2 d-flex align-items-center radius30 py-2 py-xxl-4 px-xxl-8 px-5">
                                <span>
                                    Sign out
                                </span>
                                <i class="ti ti-arrow-up-right"></i>
                            </a>
                        <?php } else{?>
                            <a href="<?= base_url(); ?>signin" class="cmn-btn d-none d-sm-block second-alt n700-color gap-2 d-flex align-items-center radius30 py-2 py-xxl-4 px-xxl-8 px-5">
                                <span>
                                    Sign in
                                </span>
                                <i class="ti ti-arrow-up-right"></i>
                            </a>          
                        <?php }
                    ?>

                    <!-- <a href="<?= base_url(); ?>signup" class="cmn-btn n700-color gap-2 d-flex align-items-center radius30 py-2 py-xxl-4 px-xxl-8 px-5">
                        <span>
                            Sign Up
                        </span>
                        <i class="ti ti-arrow-up-right fs-six"></i>
                    </a> -->
                </div>
            </div>
        </div>
    </div>
    <div class="one__header bg1-color">
        <!-- top header end -->
        <div class="container">
            <!-- main header start -->
            <div class="main-navbar one__mainheader">
                <!-- header-section start -->
                <nav class="navbar-custom">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="<?= base_url(); ?>home" class="nav-brand d-block d-lg-none">
                            <img class="w-100 d-none d-md-block" src="<?= base_url(); ?>assets/images/white-logo.png" alt="logo">
                            <img class="w-100 d-block d-md-none" src="<?= base_url(); ?>assets/images/favicon2.png" alt="logo">
                        </a>
                        <div class="d-flex gap-6">
                            <div class="switch-wrapper-top d-flex d-lg-none"></div>
                            <!-- <button class="navbar-toggle-btn d-block d-lg-none" type="button">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </button> -->
                        </div>
                    </div>
                    <div class="navbar-toggle-item cus__scroll">
                        <div class="d-flex gap-5 flex-column flex-lg-row align-items-start align-items-lg-center justify-content-between mt-5 mt-lg-0">
                                <a href="<?= base_url(); ?>home" class="navbar-brand logo">
                                <img class="w-100" src="<?= base_url(); ?>assets/images/favicon2.png" alt="logo">
                            </a>
                            <ul class="custom-nav d-lg-flex d-grid gap-4 gap-xl-6">
                                <li class="menu-item position-relative">
                                    <button id='homePage' class="position-relative pe-5 itembg__1 n0-color fw_500">
                                        Home
                                    </button>
                                </li>
                                <li class="menu-item itembg__1 position-relative">
                                    <a href="<?= base_url(); ?>course" class="fw_500">
                                        Courses
                                    </a>
                                </li>
                                <li class="menu-item itembg__1 position-relative">
                                    <a href="<?= base_url(); ?>aboutus" class="fw_500">
                                        About Us
                                    </a>
                                </li>
                                <li class="menu-item itembg__1 position-relative">
                                    <a href="<?= base_url(); ?>contact" class="fw_500">
                                        Contact
                                    </a>
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
<!-- header-section end -->