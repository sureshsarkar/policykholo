<!-- Modal -->
<div class="modal fade" id="getQuoteModel" tabindex="-1" aria-labelledby="getQuoteModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="section-h">Get in <em> Touch</em></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="getInTauchFormId" action="<?php echo e(route('contactPost')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="quote-card-u sr">
                        <div class="p-2">
                        <div class="form-row-2">
                            <!-- Select Policy -->
                            <div class="form-group">
                                <div class="form-label-pl">
                                    <i class="fas fa-shield-halved"></i> Select Policy <em>*</em>
                                </div>
                                <select class="city-select" name="service" required>
                                    <option value="">Select Policy</option>
                                    <?php $__currentLoopData = $insuranceData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($inc->id); ?>"><?php echo e($inc->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <!-- Name -->
                            <div class="form-group">
                                <div class="form-label-pl">
                                    <i class="fas fa-user"></i> Full Name <em>*</em>
                                </div>
                                <div class="input-wrap">
                                    <input class="form-input has-icon" name="name" type="text" placeholder="Rahul Sharma"
                                        required>
                                    <i class="fas fa-user input-icon"></i>
                                </div>
                            </div>
                            </div>

                            <!-- MObile + Email -->
                            <div class="form-row-2">
                                <div class="form-group">
                                    <div class="form-label-pl">
                                        <i class="fas fa-mobile-screen"></i> Mobile <em>*</em>
                                    </div>
                                    <div class="input-wrap">
                                        <input class="form-input has-icon" name="mobile" type="tel" placeholder="+91 98765 43210"
                                            required>
                                        <i class="fas fa-mobile-screen input-icon"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-label-pl">
                                        <i class="fas fa-envelope"></i> Email Address (optional)
                                    </div>
                                    <div class="input-wrap">
                                        <input class="form-input has-icon" name="email" type="email" placeholder="rahul@email.com">
                                        <i class="fas fa-envelope input-icon"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="form-group">
                                <div class="form-label-pl">
                                    <i class="fa-regular fa-message"></i> Message
                                </div>
                                <div class="input-wrap">
                                    <input class="form-input has-icon" name="message" type="text" placeholder="Hello..">
                                    <i class="fa-regular fa-message input-icon"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <!-- Submit -->
                    <button class="btn-submit">
                        Submit
                        <i class="fas fa-arrow-right fa-sm"></i>
                    </button>

                    <div class="qc-footer text-center">
                        <i class="fas fa-lock"></i>
                        Your data is safe &amp; encrypted · No spam, ever
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>





<!-- ═══ FOOTER ═══ -->
<footer class="footer">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="foot-logo">
                <img src="<?php echo e(asset($setting_data['footer_logo'] ?? 'front/images/logo.png')); ?>" alt="Logo">
                </div>
                <p class="foot-desc"><?php echo e($setting_data['about']); ?></p>
                <div class="foot-social">
                    <?php if(!empty($setting_data['facebook'])): ?>
                    <a href="<?php echo e($setting_data['facebook']); ?>" class="fsoc"><i class="fab fa-facebook-f"></i></a>
                    <?php endif; ?>
                      <?php if(!empty($setting_data['twitter'])): ?>
                    <a href="<?php echo e($setting_data['twitter']); ?>" class="fsoc"><i class="fab fa-twitter"></i></a>
                    <?php endif; ?>
                      <?php if(!empty($setting_data['instagram'])): ?>
                    <a href="<?php echo e($setting_data['instagram']); ?>" class="fsoc"><i class="fab fa-instagram"></i></a>
                    <?php endif; ?>
                      <?php if(!empty($setting_data['linkedin'])): ?>
                    <a href="<?php echo e($setting_data['linkedin']); ?>" class="fsoc"><i class="fab fa-linkedin-in"></i></a>
                    <?php endif; ?>
                      <?php if(!empty($setting_data['youtube'])): ?>
                    <a href="<?php echo e($setting_data['youtube']); ?>" class="fsoc"><i class="fab fa-youtube"></i></a>
                    <?php endif; ?>
                </div>
                
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="foot-col-h">Company</div>
                <ul class="foot-links">
                    <li><a href="<?php echo e(url('about-us')); ?>">About Us</a></li>
                    <li><a href="<?php echo e(url('blogs')); ?>">Blogs</a></li>
                    <li><a href="<?php echo e(url('become-a-posp')); ?>">Become A POSP</a></li>
                    <li><a href="<?php echo e(url('contact-us')); ?>">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="foot-col-h">Insurance</div>
                <ul class="foot-links">
                    <?php $__currentLoopData = $insuranceData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(url($in->seo_url)); ?>"><?php echo e($in->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-2">
                <div class="foot-col-h">Legal</div>
                <ul class="foot-links">
                    <li><a href="<?php echo e(url('privacy-policy')); ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo e(url('terms-and-conditions')); ?>">Terms & Conditions</a></li>
                    <li><a href="<?php echo e(url('disclaimer')); ?>">Disclaimer</a></li>
                </ul>
            </div>
        </div>
        <div class="foot-bottom">
            <div class="foot-copy"><?php echo e($setting_data['copyright']); ?></div>
        </div>
    </div>
</footer>
<script>
    const nav = document.getElementById('mainNav');
    window.addEventListener('scroll', () => nav.classList.toggle('scrolled', scrollY > 50), {
        passive: true
    });
    document.getElementById('mobToggle').addEventListener('click', () => {
        const m = document.getElementById('mobileMenu');
        m.style.display = m.style.display === 'block' ? 'none' : 'block';
    });
    const srEls = document.querySelectorAll('.sr');
    const io = new IntersectionObserver(entries => entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.classList.add('in');
            io.unobserve(e.target)
        }
    }), {
        threshold: .1
    });
    srEls.forEach(el => io.observe(el));
</script>
<?php /**PATH D:\installed-softwares\xampp-8.2.12\htdocs\laravel-projects\policykholo\projects\resources\views/front/layouts/footer.blade.php ENDPATH**/ ?>