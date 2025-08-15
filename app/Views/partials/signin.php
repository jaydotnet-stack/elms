<!--signup section-->
<section class="signup-section pt-120  pb-120">
    <div class="container">
        <div class="row g-6">
            <div class="col-lg-6">
                <div class="cmn-form radius16 n20-bg cus-border border py-xxl-8 py-4 px-xxl-8 px-4">
                    <div class="box mb-xxl-10 mb-8">
                        <h4 class="n500-color mb-xxl-4 mb-2">
                            Welcome Back!
                        </h4>
                        <?php
                            if(isset($activationstatus) && !empty($activationstatus)){?>
                                <p class="n500-color" style='color:red;font-size:15px;'>
                                    <?= $activationstatus; ?>
                                </p>
                            <?php }
                        ?>
                        <p class="n500-color">
                            Sign in to your account and join us
                        </p>
                    </div>
                    <form class="writere-v1" id='formSignIn'>
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-cmn mb-xxl-6 mb-5">
                                    <label for="emal" class="fs-six fw_500 n700-color mb-xxl-3 mb-2">Enter Your Email ID</label>
                                    <input type="email" placeholder="Your email ID here" id="email" name='email' class="n0-bg">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sign__item">
                                    <label for="password-field" class="fs-six fw_500 n700-color mb-xxl-3 mb-2">Enter Your Password</label>
                                    <div class="ps-grp position-relative">
                                        <input type="password" id="password-field" name="password" class="password-field" placeholder="Enter Your Password...">
                                        <i class="far fa-eye-slash field-icon toggle-password eye-icon"></i>
                                    </div>
                                    </div>
                            </div>
                            <a href="javascript:void(0)" class="d-flex justify-content-end n700-color fs-eight mt-xxl-4 mt-3">
                                Forget password
                            </a>
                            <div class="col-lg-12">
                                <p class="n500-color fw_400 mt-1">
                                    Don’t have an account? Sign up as a <a href="<?= base_url(); ?>studentsignup" class="fw_600 n700-color">Student</a>&nbsp;| <a href="<?= base_url(); ?>lecturersignup" class="fw_600 n700-color">Lecturer</a>
                                </p>
                            </div>
                            <div class="col-lg-12">
                                <button type="button" class="cmn-btn mt-xxl-10 mt-lg-8 mt-6 fw_600 justify-content-center d-inline-flex align-items-center gap-2 py-3 px-xl-6 px-5 n700-color btnSubmit">
                                    <span>
                                        Sign In
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="sign-thumb sign-thumb-v1">
                    <img src="<?= base_url(); ?>assets/images/common/signup.png" alt="img">
                </div>
            </div>
        </div>
    </div>
</section>
<!--signup section-->

<script src="<?= base_url(); ?>vendor/jquery/jquery.js"></script>    
<script src="<?= base_url(); ?>assets/js/customjs/signin.js"></script>    