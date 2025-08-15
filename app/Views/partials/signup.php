<!--signup section-->
<section class="signup-section pt-120  pb-120">
    <div class="container">
        <div class="row g-6">
            <div class="col-lg-6">
                <div class="cmn-form radius16 n20-bg cus-border border py-xxl-8 py-4 px-xxl-8 px-4">
                    <div class="box mb-xxl-10 mb-8">
                        <h4 class="n500-color mb-xxl-4 mb-2">
                            Let’s get started as a <?= $accountCat;?>!
                        </h4>
                        <!-- <p class="n500-color">
                            Please Enter your Email Address to Start your Online Application
                        </p> -->
                    </div>
                    <form class="writere-v1" id='formSignUp'>
                        <?= csrf_field() ?>	                        
                        <div class="row g-6">
                            <div class="col-lg-6">
                                <div class="form-cmn">
                                    <label for="firstname" class="fs-six fw_500 n700-color mb-xxl-3 mb-2">First Name</label>
                                    <input type="hidden" id="category" name='category' value=
                                    '<?= $accountCat; ?>'>
                                    <input type="text" placeholder="Johnson" id="firstname" name='firstname' class="n0-bg">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-cmn">
                                    <label for="lastname" class="fs-six fw_500 n700-color mb-xxl-3 mb-2">Last Name</label>
                                    <input type="text" placeholder="Jaytech" id="lastname" name="lastname" class="n0-bg">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-cmn">
                                    <label for="emal" class="fs-six fw_500 n700-color mb-xxl-3 mb-2">Enter Your Email ID</label>
                                    <input type="email" placeholder="Your email ID here" id="email" name="email" class="n0-bg">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="sign__item">
                                    <label for="password-field" class="fs-six fw_500 n700-color mb-xxl-3 mb-2">Enter Your Password</label>
                                    <div class="ps-grp position-relative">
                                        <input type="password" id="password-field" name="password" class="password-field" placeholder="Enter Your Password...">
                                        <i class="far fa-eye-slash field-icon toggle-password eye-icon"></i>
                                    </div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="sign__item">
                                    <label for="password-field2" class="fs-six fw_500 n700-color mb-xxl-3 mb-2">Confirm Password</label>
                                    <div class="ps-grp position-relative">
                                        <input type="password" id="password-field2" name="cpassword" class="password-field2" placeholder="Confirm Password...">
                                        <i class="far fa-eye-slash field-icon toggle-password eye-icon"></i>
                                    </div>
                                    </div>
                            </div>
                            <!-- <div class="col-lg-12">
                                <div class="form-cmn">
                                    <label for="esd" class="fs-six fw_500 n700-color mb-xxl-3 mb-2">Someone invited you over?</label>
                                    <input type="text" placeholder="Enter the referral code" id="esd" class="n0-bg">
                                </div>
                            </div> -->
                            <!-- <div class="col-lg-12">
                                <p class="n500-color fw_400 mt-2 mb-2">
                                    By clicking submit, you agree to <span class="fw_600 n700-color">Terms of Use, Privacy Policy, E-sign & Communication Authorization.</span>
                                </p>
                            </div> -->
                            <div class="col-lg-12">
                                <p class="n500-color fw_400 mt-1">
                                    Already a member? <a href="<?= base_url(); ?>signin" class="fw_600 n700-color">Signin</a>
                                </p>
                            </div>                            
                            <div class="col-lg-12" style=''>
                                <button type="button" class="cmn-btn fw_600 justify-content-center d-inline-flex align-items-center gap-2 py-3 px-xl-6 px-5 n700-color btnSubmit">
                                    <span>
                                        Sign Up
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="sign-thumb sign-thumb-v1">
                    <img src="assets/images/common/signup.png" alt="img">
                </div>
            </div>

        </div>
    </div>
</section>
<!--signup section-->

<script src="<?= base_url(); ?>assets/js/customjs/signup.js"></script>    