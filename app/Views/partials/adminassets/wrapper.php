<!--sidebar-wrapper-->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="">
            <img src="<?= base_url(); ?>adminassets/images/logo-icon.png" class="logo-icon-2" alt="" />
        </div>
        <div>
            <h4 class="logo-text"><?= APP_NAMESPACE; ?></h4>
        </div>
        <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="<?= base_url(); ?>admin/dashboard" class="">
                <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-10"><i class="bx bx-spa"></i>
                </div>
                <div class="menu-title">Task(s)</div>
            </a>
            <ul>
                <li> <a href="<?= base_url(); ?>admin/question"><i class="bx bx-right-arrow-alt"></i>Test/Questions</a>
                </li>
                <li> <a href="<?= base_url(); ?>admin/result"><i class="bx bx-right-arrow-alt"></i>Result</a>
                </li>
                <li> <a href="<?= base_url(); ?>admin/analytics"><i class="bx bx-right-arrow-alt"></i>Performance Analytics</a>
                </li>
            </ul>
        </li>
        <div class="dropdown-divider mb-0"></div>	        
        <li class="menu-label">User(s)</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-3"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Account</div>
            </a>
            <ul>
                <li> 
                    <a href="<?= base_url(); ?>admin/profile"><i class="lni lni-user"></i>Profile</a>
                </li>
                <li> 
                    <a href="<?= base_url(); ?>admin/changepassword"><i class="lni lni-lock-alt"></i>Change password</a>
                </li>                
                <li> 
                    <a href="<?= base_url(); ?>admin/resetpassword"><i class="lni lni-lock-alt"></i>Reset password</a>
                </li>                
                <li> 
                    <a href="<?= base_url(); ?>signout"><i class="lni lni-close"></i>Signout</a>
                </li>

            </ul>
        </li>
        <!-- <div class="dropdown-divider mb-0"></div>	        
        <li class="menu-label">Others</li>
        <li>
        <li>
            <a href="javascript:void(0);" target="_blank">
                <div class="parent-icon icon-color-12"><i class="bx bx-folder"></i>
                </div>
                <div class="menu-title">Documentation</div>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li> -->
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar-wrapper-->

<!--header-->
<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn">	<i class="bx bx-menu"></i>
            </a>
        </div>
        <div class="flex-grow-1 search-bar">
            <h3>WELCOME TO <?= APP_NAMESPACE; ?></h3>
        </div>
        <div class="right-topbar ml-auto">
            <ul class="navbar-nav">
                <li class="nav-item search-btn-mobile">
                    <a class="nav-link position-relative" href="javascript:;">	<i class="bx bx-search vertical-align-middle"></i>
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-lg">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javascript:;" data-toggle="dropdown">	<span class="msg-count">1</span>
                        <i class="bx bx-comment-detail vertical-align-middle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:;">
                            <div class="msg-header">
                                <h6 class="msg-header-title">1 New</h6>
                                <p class="msg-header-subtitle">Application Messages</p>
                            </div>
                        </a>
                        <div class="header-message-list">
                            <a class="dropdown-item" href="javascript:;">
                                <div class="media align-items-center">
                                    <div class="user-online">
                                        <img src="<?= base_url(); ?>adminassets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="msg-name">Johnson <span class="msg-time float-right">5 sec
                                            ago</span></h6>
                                        <p class="msg-info">I want to join this platform</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a href="javascript:;">
                            <div class="text-center msg-footer">View All Messages</div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-lg">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javascript:;" data-toggle="dropdown">	<i class="bx bx-bell vertical-align-middle"></i>
                        <span class="msg-count">1</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:void(0);">
                            <div class="msg-header">
                                <h6 class="msg-header-title">1 New</h6>
                                <p class="msg-header-subtitle">Application Notifications</p>
                            </div>
                        </a>
                        <div class="header-notifications-list">
                            <a class="dropdown-item" href="javascript:;">
                                <div class="media align-items-center">
                                    <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="msg-name">New Customers<span class="msg-time float-right">14 Sec
                                            ago</span></h6>
                                        <p class="msg-info">5 new user registered</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a href="javascript:;">
                            <div class="text-center msg-footer">View All Notifications</div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
                        <div class="media user-box align-items-center">
                            <div class="media-body user-info">
                                <p class="user-name mb-0">Johnson</p>
                                <p class="designattion mb-0">Available</p>
                            </div>
                            <img src="<?= base_url(); ?>adminassets/images/avatars/avatar-1.png" class="user-img" alt="user avatar">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">	
                        <a class="dropdown-item" href="<?= base_url(); ?>admin/dashboard">
                            <i class="bx bx-tachometer"></i><span>Dashboard</span>
                        </a>
                        <a class="dropdown-item" href="<?= base_url(); ?>admin/profile">
                            <i class="bx bx-user"></i><span>Profile</span>
                        </a>
                        <div class="dropdown-divider mb-0"></div>	
                        <a class="dropdown-item" href="<?= base_url(); ?>signout">
                            <i class="bx bx-power-off"></i><span>Signout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--end header-->

<!--page-wrapper-->
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <?= $this->include('partials/adminassets/modal')?>        
        <?= $this->renderSection("pagecontent") ?>
    </div>
    <!--end page-content-wrapper-->
</div>
<!--end page-wrapper-->

<!--start overlay-->
<div class="overlay toggle-btn-mobile"></div>
<!--end overlay-->

<!--Start Back To Top Button--> 
<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->

<!--footer -->
<div class="footer">
    <p class="mb-0"><?= APP_NAMESPACE . '@2025 -' . date('Y') ; ?> | Developed By : <a href="javascript:void(0);" target="_blank">:::</a>
    </p>
</div>
<!-- end footer -->