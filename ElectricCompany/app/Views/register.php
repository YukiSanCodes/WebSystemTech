<?= $this->extend('layout') ?>
<?= $this->section('content') ?> 
 
<!-- Page Header --> 
<section class="hero-section"> 
    <div class="container"> 
        <div class="row text-center"> 
            <div class="col-lg-8 mx-auto"> 
                <h1 class="display-4 fw-bold mb-4">Join Puihaha Electric</h1> 
                <p class="lead">Register to access exclusive customer benefits, service history, and 
priority scheduling</p> 
            </div> 
        </div> 
    </div> 
</section> 
 
<!-- Registration Benefits --> 
<section class="section-padding"> 
    <div class="container"> 
        <div class="row text-center mb-5"> 
            <div class="col-lg-8 mx-auto"> 
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Customer Benefits</h2> 
                <p class="lead text-muted">Join thousands of satisfied customers and enjoy exclusive 
benefits</p> 
            </div> 
        </div> 
        <div class="row g-4 mb-5"> 
            <div class="col-lg-3 col-md-6"> 
                <div class="card h-100 text-center p-4 feature-item"> 
                    <div class="feature-icon">
                                                <i class="fas fa-calendar-check"></i> 
                    </div> 
                    <h5 class="text-primary-custom mb-2">Priority Scheduling</h5> 
                    <p class="text-muted small">Get priority booking for all electrical services and 
maintenance</p> 
                </div> 
            </div> 
            <div class="col-lg-3 col-md-6"> 
                <div class="card h-100 text-center p-4 feature-item"> 
                    <div class="feature-icon"> 
                        <i class="fas fa-percentage"></i> 
                    </div> 
                    <h5 class="text-primary-custom mb-2">Exclusive Discounts</h5> 
                    <p class="text-muted small">Access to member-only discounts and seasonal 
promotions</p> 
                </div> 
            </div> 
            <div class="col-lg-3 col-md-6"> 
                <div class="card h-100 text-center p-4 feature-item"> 
                    <div class="feature-icon"> 
                        <i class="fas fa-history"></i> 
                    </div> 
                    <h5 class="text-primary-custom mb-2">Service History</h5> 
                    <p class="text-muted small">Track all your electrical services and maintenance 
records</p> 
                </div> 
            </div> 
            <div class="col-lg-3 col-md-6"> 
                <div class="card h-100 text-center p-4 feature-item"> 
                    <div class="feature-icon">
                                                <i class="fas fa-headset"></i> 
                    </div> 
                    <h5 class="text-primary-custom mb-2">24/7 Support</h5> 
                    <p class="text-muted small">Dedicated customer support and emergency 
assistance</p> 
                </div> 
            </div> 
        </div> 
    </div> 
</section> 
 
<!-- Registration Form --> 
<section class="section-padding bg-light-custom"> 
    <div class="container"> 
        <div class="row"> 
            <div class="col-lg-8 mx-auto"> 
                <div class="card shadow-lg border-0"> 
                    <div class="card-body p-5"> 
                        <div class="text-center mb-4"> 
                            <h2 class="display-6 fw-bold text-primary-custom mb-3">Create Your Account</h2> 
                            <p class="lead text-muted">Join the Puihaha Electric family today</p> 
                        </div> 
                         
                        <?php if (isset($success) && $success): ?> 
                            <div class="alert alert-success alert-dismissible fade show" role="alert"> 
                                <i class="fas fa-check-circle me-2"></i><?= $success ?> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button> 
                            </div> 
                        <?php endif; ?>
                                                <?php if (isset($error) && $error): ?> 
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
                                <i class="fas fa-exclamation-circle me-2"></i><?= $error ?> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button> 
                            </div> 
                        <?php endif; ?> 
                         
                        <form method="POST" action="<?= base_url('register') ?>" id="registerForm"> 
                            <?= csrf_field() ?> 
                             
                            <!-- Personal Information --> 
                            <div class="mb-4"> 
                                <h4 class="text-primary-custom mb-3"> 
                                    <i class="fas fa-user me-2"></i>Personal Information 
                                </h4> 
                                <div class="row g-3"> 
                                    <div class="col-md-6"> 
                                        <label for="first_name" class="form-label fw-semibold">First Name *</label> 
                                        <input type="text" class="form-control form-control-lg <?= 
isset($validation['first_name']) ? 'is-invalid' : '' ?>"  
                                               id="first_name" name="first_name" value="<?= old('first_name') ?>" 
required> 
                                        <?php if (isset($validation['first_name'])): ?> 
                                            <div class="invalid-feedback"><?= $validation['first_name'] ?></div> 
                                        <?php endif; ?> 
                                    </div> 
                                    <div class="col-md-6"> 
                                        <label for="last_name" class="form-label fw-semibold">Last Name *</label>
                                                                                <input type="text" class="form-control form-control-lg <?= 
isset($validation['last_name']) ? 'is-invalid' : '' ?>"  
                                               id="last_name" name="last_name" value="<?= old('last_name') ?>" 
required> 
                                        <?php if (isset($validation['last_name'])): ?> 
                                            <div class="invalid-feedback"><?= $validation['last_name'] ?></div> 
                                        <?php endif; ?> 
                                    </div> 
                                    <div class="col-md-6"> 
                                        <label for="email" class="form-label fw-semibold">Email Address *</label> 
                                        <input type="email" class="form-control form-control-lg <?= 
isset($validation['email']) ? 'is-invalid' : '' ?>"  
                                               id="email" name="email" value="<?= old('email') ?>" required> 
                                        <?php if (isset($validation['email'])): ?> 
                                            <div class="invalid-feedback"><?= $validation['email'] ?></div> 
                                        <?php endif; ?> 
                                    </div> 
                                    <div class="col-md-6"> 
                                        <label for="phone" class="form-label fw-semibold">Phone Number *</label> 
                                        <input type="tel" class="form-control form-control-lg <?= 
isset($validation['phone']) ? 'is-invalid' : '' ?>"  
                                               id="phone" name="phone" value="<?= old('phone') ?>" required> 
                                        <?php if (isset($validation['phone'])): ?> 
                                            <div class="invalid-feedback"><?= $validation['phone'] ?></div> 
                                        <?php endif; ?> 
                                    </div> 
                                </div> 
                            </div> 
                             
                            <!-- Address Information -->
                                                         <div class="mb-4"> 
                                <h4 class="text-primary-custom mb-3"> 
                                    <i class="fas fa-map-marker-alt me-2"></i>Address Information 
                                </h4> 
                                <div class="row g-3"> 
                                    <div class="col-12"> 
                                        <label for="address" class="form-label fw-semibold">Street Address *</label> 
                                        <input type="text" class="form-control form-control-lg <?= 
isset($validation['address']) ? 'is-invalid' : '' ?>"  
                                               id="address" name="address" value="<?= old('address') ?>"  
                                               placeholder="123 Main Street" required> 
                                        <?php if (isset($validation['address'])): ?> 
                                            <div class="invalid-feedback"><?= $validation['address'] ?></div> 
                                        <?php endif; ?> 
                                    </div> 
                                    <div class="col-md-4"> 
                                        <label for="city" class="form-label fw-semibold">City *</label> 
                                        <input type="text" class="form-control form-control-lg <?= 
isset($validation['city']) ? 'is-invalid' : '' ?>"  
                                               id="city" name="city" value="<?= old('city') ?>" required> 
                                        <?php if (isset($validation['city'])): ?> 
                                            <div class="invalid-feedback"><?= $validation['city'] ?></div> 
                                        <?php endif; ?> 
                                    </div> 
                                    <div class="col-md-4"> 
                                        <label for="state" class="form-label fw-semibold">State *</label> 
                                        <select class="form-select form-select-lg <?= isset($validation['state']) ? 'is
invalid' : '' ?>"  
                                                id="state" name="state" required> 
                                            <option value="">Select State...</option>
                                                                                        <option value="AL" <?= old('state') == 'AL' ? 'selected' : '' ?>>Alabama</option> 
                                            <option value="AK" <?= old('state') == 'AK' ? 'selected' : '' ?>>Alaska</option> 
                                            <option value="AZ" <?= old('state') == 'AZ' ? 'selected' : '' ?>>Arizona</option> 
                                            <option value="AR" <?= old('state') == 'AR' ? 'selected' : '' 
?>>Arkansas</option> 
                                            <option value="CA" <?= old('state') == 'CA' ? 'selected' : '' 
?>>California</option> 
                                            <option value="CO" <?= old('state') == 'CO' ? 'selected' : '' 
?>>Colorado</option> 
                                            <option value="CT" <?= old('state') == 'CT' ? 'selected' : '' 
?>>Connecticut</option> 
                                            <option value="DE" <?= old('state') == 'DE' ? 'selected' : '' 
?>>Delaware</option> 
                                            <option value="FL" <?= old('state') == 'FL' ? 'selected' : '' ?>>Florida</option> 
                                            <option value="GA" <?= old('state') == 'GA' ? 'selected' : '' ?>>Georgia</option> 
                                            <!-- Add more states as needed --> 
                                        </select> 
                                        <?php if (isset($validation['state'])): ?> 
                                            <div class="invalid-feedback"><?= $validation['state'] ?></div> 
                                        <?php endif; ?> 
                                    </div> 
                                    <div class="col-md-4"> 
                                        <label for="zip_code" class="form-label fw-semibold">ZIP Code *</label> 
                                        <input type="text" class="form-control form-control-lg <?= 
isset($validation['zip_code']) ? 'is-invalid' : '' ?>"  
                                               id="zip_code" name="zip_code" value="<?= old('zip_code') ?>"  
                                               placeholder="12345" required> 
                                        <?php if (isset($validation['zip_code'])): ?> 
                                            <div class="invalid-feedback"><?= $validation['zip_code'] ?></div> 
                                        <?php endif; ?> 
                                    </div>
                                                                    </div> 
                            </div> 
                             
                            <!-- Account Security --> 
                            <div class="mb-4"> 
                                <h4 class="text-primary-custom mb-3"> 
                                    <i class="fas fa-lock me-2"></i>Account Security 
                                </h4> 
                                <div class="row g-3"> 
                                    <div class="col-md-6"> 
                                        <label for="password" class="form-label fw-semibold">Password *</label> 
                                        <input type="password" class="form-control form-control-lg <?= 
isset($validation['password']) ? 'is-invalid' : '' ?>"  
                                               id="password" name="password" required> 
                                        <div class="form-text">Password must be at least 8 characters long</div> 
                                        <?php if (isset($validation['password'])): ?> 
                                            <div class="invalid-feedback"><?= $validation['password'] ?></div> 
                                        <?php endif; ?> 
                                    </div> 
                                    <div class="col-md-6"> 
                                        <label for="confirm_password" class="form-label fw-semibold">Confirm 
Password *</label> 
                                        <input type="password" class="form-control form-control-lg <?= 
isset($validation['confirm_password']) ? 'is-invalid' : '' ?>"  
                                               id="confirm_password" name="confirm_password" required> 
                                        <?php if (isset($validation['confirm_password'])): ?> 
                                            <div class="invalid-feedback"><?= $validation['confirm_password'] ?></div> 
                                        <?php endif; ?> 
                                    </div> 
                                </div>
                                                            </div> 
                             
                            <!-- Terms and Conditions --> 
                            <div class="mb-4"> 
                                <div class="form-check"> 
                                    <input class="form-check-input <?= isset($validation['terms']) ? 'is-invalid' : '' ?>"  
                                           type="checkbox" id="terms" name="terms" required> 
                                    <label class="form-check-label" for="terms"> 
                                        I agree to the <a href="#" class="text-primary-custom">Terms of Service</a> 
and  
                                        <a href="#" class="text-primary-custom">Privacy Policy</a> * 
                                    </label> 
                                    <?php if (isset($validation['terms'])): ?> 
                                        <div class="invalid-feedback d-block"><?= $validation['terms'] ?></div> 
                                    <?php endif; ?> 
                                </div> 
                                <div class="form-check mt-2"> 
                                    <input class="form-check-input" type="checkbox" id="newsletter" 
name="newsletter"> 
                                    <label class="form-check-label" for="newsletter"> 
                                        Subscribe to our newsletter for electrical tips and special offers 
                                    </label> 
                                </div> 
                            </div> 
                             
                            <div class="text-center"> 
                                <button type="submit" class="btn btn-primary btn-lg px-5"> 
                                    <i class="fas fa-user-plus me-2"></i>Create Account 
                                </button>
                                                            </div> 
                        </form> 
                         
                        <div class="text-center mt-4"> 
                            <p class="text-muted">Already have an account? <a href="<?= base_url('contact') ?>" 
class="text-primary-custom fw-semibold">Contact us</a> for assistance.</p> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</section> 
 
<!-- Security & Privacy --> 
<section class="section-padding"> 
    <div class="container"> 
        <div class="row text-center"> 
            <div class="col-lg-8 mx-auto"> 
                <h2 class="display-5 fw-bold text-primary-custom mb-4">Your Privacy & Security</h2> 
                <p class="lead text-muted mb-4">We take your privacy seriously and use industry-standard 
security measures to protect your personal information.</p> 
                <div class="row g-4"> 
                    <div class="col-md-4"> 
                        <div class="security-item"> 
                            <i class="fas fa-shield-alt text-success mb-3" style="font-size: 3rem;"></i> 
                            <h5 class="text-primary-custom">SSL Encryption</h5> 
                            <p class="text-muted small">All data is encrypted using 256-bit SSL security</p> 
                        </div>
                                            </div> 
                    <div class="col-md-4"> 
                        <div class="security-item"> 
                            <i class="fas fa-user-shield text-success mb-3" style="font-size: 3rem;"></i> 
                            <h5 class="text-primary-custom">Privacy Protected</h5> 
                            <p class="text-muted small">We never share your information with third parties</p> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="security-item"> 
                            <i class="fas fa-lock text-success mb-3" style="font-size: 3rem;"></i> 
                            <h5 class="text-primary-custom">Secure Storage</h5> 
                            <p class="text-muted small">Your data is stored in secure, encrypted databases</p> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</section> 
 
<script> 
document.addEventListener('DOMContentLoaded', function() { 
    // Form validation 
    const form = document.getElementById('registerForm'); 
    const submitBtn = form.querySelector('button[type="submit"]'); 
    const password = document.getElementById('password'); 
    const confirmPassword = document.getElementById('confirm_password');
        // Password matching validation 
    confirmPassword.addEventListener('input', function() { 
        if (password.value !== confirmPassword.value) { 
            confirmPassword.setCustomValidity('Passwords do not match'); 
        } else { 
            confirmPassword.setCustomValidity(''); 
        } 
    }); 
     
    // Phone number formatting 
    const phoneInput = document.getElementById('phone'); 
    phoneInput.addEventListener('input', function(e) { 
        let value = e.target.value.replace(/\D/g, ''); 
        if (value.length >= 6) { 
            value = value.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3'); 
        } else if (value.length >= 3) { 
            value = value.replace(/(\d{3})(\d{0,3})/, '($1) $2'); 
        } 
        e.target.value = value; 
    }); 
     
    // ZIP code formatting 
    const zipInput = document.getElementById('zip_code'); 
    zipInput.addEventListener('input', function(e) { 
        let value = e.target.value.replace(/\D/g, ''); 
        if (value.length > 5) { 
            value = value.replace(/(\d{5})(\d{0,4})/, '$1-$2'); 
        } 
        e.target.value = value;
            }); 
     
    // Form submission 
    form.addEventListener('submit', function(e) { 
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Creating Account...'; 
        submitBtn.disabled = true; 
    }); 
}); 
</script> 
 
<?= $this->endSection() ?> 
 
Source Codes : services.php 
<?= $this->extend('layout') ?> 
 
<?= $this->section('content') ?> 
 
<!-- Page Header --> 
<section class="hero-section"> 
    <div class="container"> 
        <div class="row text-center"> 
            <div class="col-lg-8 mx-auto"> 
                <h1 class="display-4 fw-bold mb-4">Our Electrical Services</h1> 
                <p class="lead">Comprehensive electrical solutions for residential, commercial, and 
industrial needs</p> 
            </div> 
        </div> 
    </div> 
</section>
<!-- Services Overview --> 
<section class="section-padding"> 
    <div class="container"> 
        <div class="row text-center mb-5"> 
            <div class="col-lg-8 mx-auto"> 
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Complete Electrical 
Solutions</h2> 
                <p class="lead text-muted">From simple repairs to complex installations, we provide safe, 
reliable, and efficient electrical services tailored to your specific needs.</p> 
            </div> 
        </div> 
    </div> 
</section> 
 
<!-- Residential Services --> 
<section class="section-padding bg-light-custom"> 
    <div class="container"> 
        <div class="row mb-5"> 
            <div class="col-lg-8 mx-auto text-center"> 
                <h2 class="display-5 fw-bold text-primary-custom mb-3"> 
                    <i class="fas fa-home text-secondary-custom me-3"></i>Residential Services 
                </h2> 
                <p class="lead text-muted">Professional electrical services for your home, ensuring safety, 
efficiency, and comfort for your family.</p> 
            </div> 
        </div> 
        <div class="row g-4"> 
            <div class="col-lg-4 col-md-6"> 
                <div class="card h-100 p-4 feature-item">
                                        <div class="feature-icon"> 
                        <i class="fas fa-plug"></i> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">Electrical Wiring</h4> 
                    <p class="text-muted mb-3">Complete home wiring services including new construction, 
rewiring, and electrical system upgrades to meet modern safety standards.</p> 
                    <ul class="list-unstyled text-muted small"> 
                        <li><i class="fas fa-check text-success me-2"></i>New home wiring</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Rewiring old homes</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Code compliance updates</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Safety inspections</li> 
                    </ul> 
                </div> 
            </div> 
            <div class="col-lg-4 col-md-6"> 
                <div class="card h-100 p-4 feature-item"> 
                    <div class="feature-icon"> 
                        <i class="fas fa-th-large"></i> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">Panel Upgrades</h4> 
                    <p class="text-muted mb-3">Electrical panel upgrades and replacements to handle 
increased power demands and improve home safety and efficiency.</p> 
                    <ul class="list-unstyled text-muted small"> 
                        <li><i class="fas fa-check text-success me-2"></i>Panel replacements</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Circuit breaker upgrades</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Service capacity increases</li> 
                        <li><i class="fas fa-check text-success me-2"></i>GFCI installations</li> 
                    </ul> 
                </div>
                            </div> 
            <div class="col-lg-4 col-md-6"> 
                <div class="card h-100 p-4 feature-item"> 
                    <div class="feature-icon"> 
                        <i class="fas fa-lightbulb"></i> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">Lighting Solutions</h4> 
                    <p class="text-muted mb-3">Indoor and outdoor lighting installations, including LED 
upgrades, landscape lighting, and smart lighting systems.</p> 
                    <ul class="list-unstyled text-muted small"> 
                        <li><i class="fas fa-check text-success me-2"></i>LED lighting upgrades</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Landscape lighting</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Smart lighting systems</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Security lighting</li> 
                    </ul> 
                </div> 
            </div> 
            <div class="col-lg-4 col-md-6"> 
                <div class="card h-100 p-4 feature-item"> 
                    <div class="feature-icon"> 
                        <i class="fas fa-mobile-alt"></i> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">Smart Home Automation</h4> 
                    <p class="text-muted mb-3">Transform your home with smart electrical systems, 
automated controls, and IoT device integration for modern living.</p> 
                    <ul class="list-unstyled text-muted small"> 
                        <li><i class="fas fa-check text-success me-2"></i>Smart switches & outlets</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Home automation systems</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Voice control integration</li>
                                                <li><i class="fas fa-check text-success me-2"></i>Energy monitoring</li> 
                    </ul> 
                </div> 
            </div> 
            <div class="col-lg-4 col-md-6"> 
                <div class="card h-100 p-4 feature-item"> 
                    <div class="feature-icon"> 
                        <i class="fas fa-car"></i> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">EV Charging Stations</h4> 
                    <p class="text-muted mb-3">Electric vehicle charging station installation for convenient 
and efficient home charging of your electric vehicle.</p> 
                    <ul class="list-unstyled text-muted small"> 
                        <li><i class="fas fa-check text-success me-2"></i>Level 2 charger installation</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Electrical capacity assessment</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Permit handling</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Smart charging features</li> 
                    </ul> 
                </div> 
            </div> 
            <div class="col-lg-4 col-md-6"> 
                <div class="card h-100 p-4 feature-item"> 
                    <div class="feature-icon"> 
                        <i class="fas fa-tools"></i> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">Electrical Repairs</h4> 
                    <p class="text-muted mb-3">Quick and reliable electrical repair services for outlets, 
switches, fixtures, and other electrical components in your home.</p> 
                    <ul class="list-unstyled text-muted small">
                                                <li><i class="fas fa-check text-success me-2"></i>Outlet & switch repairs</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Fixture installations</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Troubleshooting</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Emergency repairs</li> 
                    </ul> 
                </div> 
            </div> 
        </div> 
    </div> 
</section> 
 
<!-- Commercial Services --> 
<section class="section-padding"> 
    <div class="container"> 
        <div class="row mb-5"> 
            <div class="col-lg-8 mx-auto text-center"> 
                <h2 class="display-5 fw-bold text-primary-custom mb-3"> 
                    <i class="fas fa-building text-secondary-custom me-3"></i>Commercial Services 
                </h2> 
                <p class="lead text-muted">Reliable electrical solutions for businesses, offices, retail 
spaces, and industrial facilities.</p> 
            </div> 
        </div> 
        <div class="row g-4"> 
            <div class="col-lg-4 col-md-6"> 
                <div class="card h-100 p-4 feature-item"> 
                    <div class="feature-icon"> 
                        <i class="fas fa-industry"></i> 
                    </div>
                                        <h4 class="text-primary-custom mb-3">Commercial Wiring</h4> 
                    <p class="text-muted mb-3">Complete electrical installations for new commercial 
buildings, tenant improvements, and electrical system expansions.</p> 
                    <ul class="list-unstyled text-muted small"> 
                        <li><i class="fas fa-check text-success me-2"></i>New construction wiring</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Tenant improvements</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Office electrical systems</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Retail installations</li> 
                    </ul> 
                </div> 
            </div> 
            <div class="col-lg-4 col-md-6"> 
                <div class="card h-100 p-4 feature-item"> 
                    <div class="feature-icon"> 
                        <i class="fas fa-bolt"></i> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">Power Distribution</h4> 
                    <p class="text-muted mb-3">High-voltage power distribution systems, transformers, and 
electrical infrastructure for commercial and industrial facilities.</p> 
                    <ul class="list-unstyled text-muted small"> 
                        <li><i class="fas fa-check text-success me-2"></i>Power distribution panels</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Transformer installations</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Motor control centers</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Emergency power systems</li> 
                    </ul> 
                </div> 
            </div> 
            <div class="col-lg-4 col-md-6"> 
                <div class="card h-100 p-4 feature-item">
                                        <div class="feature-icon"> 
                        <i class="fas fa-video"></i> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">Security & Data Systems</h4> 
                    <p class="text-muted mb-3">Installation of security systems, surveillance cameras, 
access control, and structured cabling for data networks.</p> 
                    <ul class="list-unstyled text-muted small"> 
                        <li><i class="fas fa-check text-success me-2"></i>Security camera systems</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Access control systems</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Network cabling</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Fire alarm systems</li> 
                    </ul> 
                </div> 
            </div> 
            <div class="col-lg-4 col-md-6"> 
                <div class="card h-100 p-4 feature-item"> 
                    <div class="feature-icon"> 
                        <i class="fas fa-warehouse"></i> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">Industrial Electrical</h4> 
                    <p class="text-muted mb-3">Specialized electrical services for manufacturing facilities, 
warehouses, and industrial operations.</p> 
                    <ul class="list-unstyled text-muted small"> 
                        <li><i class="fas fa-check text-success me-2"></i>Machine wiring</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Control systems</li> 
                        <li><i class="fas fa-check text-success me-2"></i>High-bay lighting</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Power factor correction</li> 
                    </ul> 
                </div>
                            </div> 
            <div class="col-lg-4 col-md-6"> 
                <div class="card h-100 p-4 feature-item"> 
                    <div class="feature-icon"> 
                        <i class="fas fa-wrench"></i> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">Maintenance Services</h4> 
                    <p class="text-muted mb-3">Preventive maintenance programs and ongoing electrical 
system support to ensure reliable operation and minimize downtime.</p> 
                    <ul class="list-unstyled text-muted small"> 
                        <li><i class="fas fa-check text-success me-2"></i>Preventive maintenance</li> 
                        <li><i class="fas fa-check text-success me-2"></i>System inspections</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Thermal imaging</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Equipment testing</li> 
                    </ul> 
                </div> 
            </div> 
            <div class="col-lg-4 col-md-6"> 
                <div class="card h-100 p-4 feature-item"> 
                    <div class="feature-icon"> 
                        <i class="fas fa-chart-line"></i> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">Energy Efficiency</h4> 
                    <p class="text-muted mb-3">Energy audits, efficiency upgrades, and power quality 
improvements to reduce operating costs and improve performance.</p> 
                    <ul class="list-unstyled text-muted small"> 
                        <li><i class="fas fa-check text-success me-2"></i>Energy audits</li> 
                        <li><i class="fas fa-check text-success me-2"></i>LED retrofits</li> 
                        <li><i class="fas fa-check text-success me-2"></i>Power quality analysis</li>
                                                <li><i class="fas fa-check text-success me-2"></i>Demand management</li> 
                    </ul> 
                </div> 
            </div> 
        </div> 
    </div> 
</section> 
 
<!-- Solar & Renewable Energy --> 
<section class="section-padding bg-light-custom"> 
    <div class="container"> 
        <div class="row mb-5"> 
            <div class="col-lg-8 mx-auto text-center"> 
                <h2 class="display-5 fw-bold text-primary-custom mb-3"> 
                    <i class="fas fa-solar-panel text-secondary-custom me-3"></i>Solar & Renewable Energy 
                </h2> 
                <p class="lead text-muted">Sustainable energy solutions to reduce your carbon footprint 
and energy costs with cutting-edge solar technology.</p> 
            </div> 
        </div> 
        <div class="row g-4"> 
            <div class="col-lg-6"> 
                <div class="card h-100 p-4 feature-item"> 
                    <div class="row g-0 align-items-center"> 
                        <div class="col-md-3 text-center"> 
                            <div class="feature-icon mx-0"> 
                                <i class="fas fa-sun"></i> 
                            </div> 
                        </div>
                                                <div class="col-md-9"> 
                            <h4 class="text-primary-custom mb-2">Solar Panel Installation</h4> 
                            <p class="text-muted mb-3">Complete solar photovoltaic system design and 
installation for residential and commercial properties.</p> 
                            <ul class="list-unstyled text-muted small"> 
                                <li><i class="fas fa-check text-success me-2"></i>System design & engineering</li> 
                                <li><i class="fas fa-check text-success me-2"></i>Permit acquisition</li> 
                                <li><i class="fas fa-check text-success me-2"></i>Professional installation</li> 
                                <li><i class="fas fa-check text-success me-2"></i>Grid interconnection</li> 
                            </ul> 
                        </div> 
                    </div> 
                </div> 
            </div> 
            <div class="col-lg-6"> 
                <div class="card h-100 p-4 feature-item"> 
                    <div class="row g-0 align-items-center"> 
                        <div class="col-md-3 text-center"> 
                            <div class="feature-icon mx-0"> 
                                <i class="fas fa-battery-full"></i> 
                            </div> 
                        </div> 
                        <div class="col-md-9"> 
                            <h4 class="text-primary-custom mb-2">Energy Storage Systems</h4> 
                            <p class="text-muted mb-3">Battery storage solutions to store solar energy and 
provide backup power during outages.</p> 
                            <ul class="list-unstyled text-muted small"> 
                                <li><i class="fas fa-check text-success me-2"></i>Battery system design</li> 
                                <li><i class="fas fa-check text-success me-2"></i>Backup power solutions</li>
                                                                <li><i class="fas fa-check text-success me-2"></i>Grid-tie with battery backup</li> 
                                <li><i class="fas fa-check text-success me-2"></i>Energy management 
systems</li> 
                            </ul> 
                        </div> 
                    </div> 
                </div> 
            </div> 
            <div class="col-lg-6"> 
                <div class="card h-100 p-4 feature-item"> 
                    <div class="row g-0 align-items-center"> 
                        <div class="col-md-3 text-center"> 
                            <div class="feature-icon mx-0"> 
                                <i class="fas fa-calculator"></i> 
                            </div> 
                        </div> 
                        <div class="col-md-9"> 
                            <h4 class="text-primary-custom mb-2">Energy Consultation</h4> 
                            <p class="text-muted mb-3">Comprehensive energy assessments and consultation 
to determine the best renewable energy solutions.</p> 
                            <ul class="list-unstyled text-muted small"> 
                                <li><i class="fas fa-check text-success me-2"></i>Site assessments</li> 
                                <li><i class="fas fa-check text-success me-2"></i>Energy usage analysis</li> 
                                <li><i class="fas fa-check text-success me-2"></i>ROI calculations</li> 
                                <li><i class="fas fa-check text-success me-2"></i>Financing options</li> 
                            </ul> 
                        </div> 
                    </div> 
                </div>
                            </div> 
            <div class="col-lg-6"> 
                <div class="card h-100 p-4 feature-item"> 
                    <div class="row g-0 align-items-center"> 
                        <div class="col-md-3 text-center"> 
                            <div class="feature-icon mx-0"> 
                                <i class="fas fa-cog"></i> 
                            </div> 
                        </div> 
                        <div class="col-md-9"> 
                            <h4 class="text-primary-custom mb-2">System Maintenance</h4> 
                            <p class="text-muted mb-3">Ongoing maintenance and monitoring services to 
ensure optimal performance of your solar energy system.</p> 
                            <ul class="list-unstyled text-muted small"> 
                                <li><i class="fas fa-check text-success me-2"></i>Performance monitoring</li> 
                                <li><i class="fas fa-check text-success me-2"></i>Preventive maintenance</li> 
                                <li><i class="fas fa-check text-success me-2"></i>System cleaning</li> 
                                <li><i class="fas fa-check text-success me-2"></i>Warranty support</li> 
                            </ul> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</section> 
 
<!-- Emergency Services --> 
<section class="section-padding bg-danger text-white">
        <div class="container"> 
        <div class="row text-center"> 
            <div class="col-lg-8 mx-auto"> 
                <h2 class="display-5 fw-bold mb-4"> 
                    <i class="fas fa-exclamation-triangle text-warning me-3"></i>24/7 Emergency Services 
                </h2> 
                <p class="lead mb-4">Electrical emergencies don't wait for business hours. Our emergency 
response team is available 24/7 to handle urgent electrical issues and ensure your safety.</p> 
                <div class="row g-4 mt-4"> 
                    <div class="col-md-4"> 
                        <div class="emergency-item"> 
                            <i class="fas fa-fire text-warning mb-3" style="font-size: 3rem;"></i> 
                            <h4>Electrical Fires</h4> 
                            <p>Immediate response to electrical fires and safety hazards</p> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="emergency-item"> 
                            <i class="fas fa-power-off text-warning mb-3" style="font-size: 3rem;"></i> 
                            <h4>Power Outages</h4> 
                            <p>Quick diagnosis and restoration of electrical power</p> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="emergency-item"> 
                            <i class="fas fa-zap text-warning mb-3" style="font-size: 3rem;"></i> 
                            <h4>Electrical Faults</h4> 
                            <p>Emergency repairs for dangerous electrical conditions</p> 
                        </div>
                                            </div> 
                </div> 
                <div class="mt-5"> 
                    <a href="tel:5551234567" class="btn btn-warning btn-lg me-3"> 
                        <i class="fas fa-phone me-2"></i>Emergency: (555) 123-4567 
                    </a> 
                    <a href="<?= base_url('contact') ?>" class="btn btn-outline-light btn-lg">Contact Us</a> 
                </div> 
            </div> 
        </div> 
    </div> 
</section> 
 
<!-- Service Process --> 
<section class="section-padding"> 
    <div class="container"> 
        <div class="row text-center mb-5"> 
            <div class="col-lg-8 mx-auto"> 
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Our Service Process</h2> 
                <p class="lead text-muted">A streamlined approach to delivering exceptional electrical 
services from consultation to completion.</p> 
            </div> 
        </div> 
        <div class="row g-4"> 
            <div class="col-lg-3 col-md-6"> 
                <div class="text-center feature-item"> 
                    <div class="process-step bg-primary text-white rounded-circle d-flex align-items-center 
justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;"> 
                        <span class="h3 mb-0">1</span>
                                            </div> 
                    <h4 class="text-primary-custom mb-3">Consultation</h4> 
                    <p class="text-muted">Free consultation to understand your needs and provide expert 
recommendations</p> 
                </div> 
            </div> 
            <div class="col-lg-3 col-md-6"> 
                <div class="text-center feature-item"> 
                    <div class="process-step bg-primary text-white rounded-circle d-flex align-items-center 
justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;"> 
                        <span class="h3 mb-0">2</span> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">Assessment</h4> 
                    <p class="text-muted">Thorough site assessment and detailed project planning with 
transparent pricing</p> 
                </div> 
            </div> 
            <div class="col-lg-3 col-md-6"> 
                <div class="text-center feature-item"> 
                    <div class="process-step bg-primary text-white rounded-circle d-flex align-items-center 
justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;"> 
                        <span class="h3 mb-0">3</span> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">Installation</h4> 
                    <p class="text-muted">Professional installation by licensed electricians using quality 
materials and equipment</p> 
                </div> 
            </div> 
            <div class="col-lg-3 col-md-6"> 
                <div class="text-center feature-item">
                                        <div class="process-step bg-primary text-white rounded-circle d-flex align-items-center 
justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;"> 
                        <span class="h3 mb-0">4</span> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">Follow-up</h4> 
                    <p class="text-muted">Quality inspection, testing, and ongoing support with 
comprehensive warranties</p> 
                </div> 
            </div> 
        </div> 
    </div> 
</section> 
 
<!-- Call to Action --> 
<section class="section-padding bg-light-custom"> 
    <div class="container"> 
        <div class="row align-items-center"> 
            <div class="col-lg-8"> 
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Ready to Get Started?</h2> 
                <p class="lead text-muted mb-4">Contact us today for a free consultation and quote. Our 
expert team is ready to help you with all your electrical needs, from simple repairs to complex 
installations.</p> 
            </div> 
            <div class="col-lg-4 text-lg-end"> 
                <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg me-3">Get Free 
Quote</a> 
                <a href="tel:5551234567" class="btn btn-outline-primary btn-lg"> 
                    <i class="fas fa-phone me-2"></i>Call Now 
                </a> 
            </div>
            </div> 
</div> 
</section> 
<?= $this->endSection() ?>