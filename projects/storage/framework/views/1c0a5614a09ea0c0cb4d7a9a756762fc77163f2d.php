
<?php $__env->startSection('title', $data->meta_title); ?>
<?php $__env->startSection('keywords', $data->meta_keywords); ?>
<?php $__env->startSection('description', $data->meta_description); ?>
<?php $__env->startSection('logo', $data->image); ?>
<?php $__env->startSection('header-section'); ?>
    <?php echo $data->header_section; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-section'); ?>
    <?php echo $data->footer_section; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('container'); ?>
    <?php
        $name = $data->name;
        $bannerImage = asset('front/images/banner.png');
        if ($data->bannerImage) {
            $bannerImage = asset($data->bannerImage);
        }
    ?>
    <!-- start banner sec -->

    


    <!--========================login section start =======================================-->

    <section class="login-page-wrapp">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 ps-0">
                <div class="login-page-left">
                    <img src="<?php echo e(asset($data->image ?? 'front/images/login.jpg')); ?>">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 pe-0">
                <div class="login-form-right">
                    <div class="login-top-head">
                        <img src="<?php echo e(asset($setting_data['header_logo'] ?? 'front/images/logo.png')); ?>">
                        <h5><a href="<?php echo e(url('')); ?>"><i class="fas fa-chevron-circle-left"></i> Back to Home</a></h5>
                    </div>
                    <div class="login-form-inner sign-up-form">
                        <h3>Sign up with <span>Your Details</span></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt . </p>
                        <form action="<?php echo e(route('front.user.register')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-12">
                                    <input type="text" name="name" class="form-control" placeholder="Name"
                                        id="signUpNameId" minlength="3" maxlength="25"
                                        onkeydown="return /[a-z ]/i.test(event.key)" onkeyup="useRefShow('signUpNameId')"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-12">
                                    <input type="email" name="email" class="form-control" placeholder="Email Address"
                                        id="signUpEmailId" onkeyup="useRefShow('signUpEmailId')" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group pass-view-inp col-lg-12 col-md-12 col-12">
                                    <input type="text" name="mobile" class="form-control" id="mobileId"
                                        placeholder="Mobile No" minlength="10" maxlength="10"
                                        onkeypress="return digitKeyOnly(event)" onkeyup="useRefShow('mobileId')" required>

                                    <input type="hidden" name="country_code" id="country_code" value="" required>
                                    <span class="error" id="mobile_err"> </span>


                                    <p class="btn btn-pass-view d-none" id="sendOtpBtnId">Send OTP</p>
                                    <button class="btn btn-pass-view d-none" id="verifyCheckId"><i
                                            class="fas fa-check"></i></button>
                                    <button class="btn btn-pass-view d-none" id="unVerifyCheckId"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="row d-none" id="otpDiv">
                                <div class="form-group pass-view-inp col-lg-12 col-md-12 col-12">
                                    <input type="text" name="otp" id="otpId" minlength="4" maxlength="4"
                                        onkeypress="return digitKeyOnly(event)" class="form-control" placeholder="OTP">
                                    <p class="btn btn-pass-view d-none" id="verifyOtpBtnId">Verify</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-12">
                                    <input type="text" name="pan" class="form-control" id="panId"
                                        placeholder="National Id" minlength="10" maxlength="10"
                                        onkeyup="useRefShow('panId')" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group pass-view-inp col-lg-6 col-md-6 col-12">
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        minlength="5" maxlength="25" id="passwordId" onkeyup="useRefShow('passwordId')"
                                        required>
                                    <button type="button" class="btn btn-pass-view"
                                        onclick="togglePassword('passwordId', this)">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </div>
                                <div class="form-group pass-view-inp col-lg-6 col-md-6 col-12">
                                    <input type="password" name="cpassword" class="form-control"
                                        placeholder="Re-enter Password" minlength="5" maxlength="25" id="cpasswordId"
                                        onkeyup="useRefShow('cpasswordId')" required>
                                    <button type="button" class="btn btn-pass-view"
                                        onclick="togglePassword('cpasswordId', this)">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-sign-in">Sign Up</button>
                            </div>
                            <h2>Already have an account? <a href="<?php echo e(url('user-login')); ?>"> Sign In here</a></h2>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--========================login section end =======================================-->
    <style>
        .iti {
            width: 100% !important;
        }
    </style>
<?php $__env->startSection('js'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.6/build/css/intlTelInput.min.css" />

    <!-- Add intlTelInput JS -->
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.6/build/js/intlTelInput.min.js"></script>


    <script>
        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector("i");

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>



    <script>
        $(document).ready(function() {

            let input = document.querySelector("#mobileId");

            let iti = window.intlTelInput(input, {
                initialCountry: "auto", // Set default country (India)
                excludeCountries: ["ae"],
                separateDialCode: true, // Show country code separately
                preferredCountries: ["us", "gb", "in"], // Preferred countries
                utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.6/build/js/utils.js" // Required for formatting
            });


            $("#mobileId").on("input", function() {
                let cleanedNumber = $(this).val().replace(/\s+/g, ""); // Remove all spaces
                $(this).val(cleanedNumber); // Update the input value
            });


            // Log the selected country code
            input.addEventListener("countrychange", function() {
                let countryData = iti.getSelectedCountryData();
                let dialCode = countryData.dialCode; // Get dial code
                console.log("Selected country code: +" + dialCode);

                // Show dial code in an element (optional)
                $("#country_code").val(dialCode);
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/aa979065-84f9-4bb7-9de3-6056bbd0d343/public_html/kharido-policy/projects/resources/views/front/static/register.blade.php ENDPATH**/ ?>