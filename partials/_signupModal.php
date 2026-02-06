<!-- Sign up Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content modern-modal">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="modal-body p-0">
                <div class="signup-container">
                    <!-- Left side - Branding -->
                    <div class="signup-branding">
                        <div class="brand-content">
                            <div class="logo-wrapper">
                                <img src="img/sportware-logo.jpeg" alt="Sportware Logo" class="brand-logo">
                            </div>
                            <h2 class="brand-title">Join Sportware!</h2>
                            <p class="brand-subtitle">Create your account and start your fitness journey with premium sports equipment</p>
                            <div class="brand-features">
                                <div class="feature-item">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Premium Products</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Fast Delivery</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Expert Support</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right side - Signup Form -->
                    <div class="signup-form-section">
                        <div class="form-header">
                            <h3>Create Account</h3>
                            <p>Fill in your information to get started</p>
                        </div>
                        
                        <form action="partials/_handleSignup.php" method="post" class="modern-form">
                            <div class="form-group-modern">
                                <div class="input-wrapper">
                                    <i class="fas fa-user input-icon"></i>
                                    <input class="form-control-modern" id="username" name="username" type="text" required minlength="3" maxlength="11">
                                    <label class="floating-label">Username</label>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group-modern col-md-6">
                                    <div class="input-wrapper">
                                        <i class="fas fa-user-tag input-icon"></i>
                                        <input type="text" class="form-control-modern" id="firstName" name="firstName" required>
                                        <label class="floating-label">First Name</label>
                                    </div>
                                </div>
                                <div class="form-group-modern col-md-6">
                                    <div class="input-wrapper">
                                        <i class="fas fa-user-tag input-icon"></i>
                                        <input type="text" class="form-control-modern" id="lastName" name="lastName" required>
                                        <label class="floating-label">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group-modern">
                                <div class="input-wrapper">
                                    <i class="fas fa-envelope input-icon"></i>
                                    <input type="email" class="form-control-modern" id="email" name="email" required>
                                    <label class="floating-label">Email Address</label>
                                </div>
                            </div>
                            
                            <div class="form-group-modern">
                                <div class="input-wrapper-phone">
                                    <i class="fas fa-phone input-icon"></i>
                                    <div class="phone-input-group">
                                        <span class="country-code">+62</span>
                                        <input type="text" class="form-control-modern phone-input" id="phone" name="phone" required pattern="[0-9]{10}" maxlength="10" style="color: #333 !important; background: transparent !important; z-index: 20 !important; position: relative !important;" inputmode="numeric">>
                                    </div>
                                    <label class="floating-label-phone">Phone Number</label>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group-modern col-md-6">
                                    <div class="input-wrapper">
                                        <i class="fas fa-lock input-icon"></i>
                                        <input class="form-control-modern" id="password" name="password" type="password" required data-toggle="password" minlength="4" maxlength="21">
                                        <label class="floating-label">Password</label>
                                    </div>
                                </div>
                                <div class="form-group-modern col-md-6">
                                    <div class="input-wrapper">
                                        <i class="fas fa-lock input-icon"></i>
                                        <input class="form-control-modern" id="cpassword" name="cpassword" type="password" required data-toggle="password" minlength="4" maxlength="21">
                                        <label class="floating-label">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn-modern btn-signup">
                                <span>Create Account</span>
                                <i class="fas fa-user-plus"></i>
                            </button>
                        </form>
                        
                        <div class="form-footer">
                            <p>Already have an account? 
                                <a href="#" class="link-modern" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">
                                    Login here
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.signup-container {
    display: flex;
    min-height: 600px;
}

.signup-branding {
    flex: 1;
    background: linear-gradient(135deg, #d4a574 0%, #b8956a 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.signup-branding::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><polygon fill="rgba(255,255,255,0.1)" points="1000,100 1000,0 0,100"/></svg>');
    background-size: cover;
}

.signup-form-section {
    flex: 1.2;
    padding: 30px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    max-height: 600px;
    overflow-y: auto;
}

.brand-features {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin-top: 20px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 10px;
    color: white;
    font-size: 0.95rem;
}

.feature-item i {
    color: rgba(255,255,255,0.9);
    font-size: 1rem;
}

.input-wrapper-phone {
    position: relative;
}

.phone-input-group {
    display: flex;
    border: 3px solid #e9ecef;
    border-radius: 12px;
    background: transparent;
    transition: all 0.3s ease;
    overflow: hidden;
}

.phone-input-group:focus-within {
    border-color: #d4a574;
    box-shadow: 0 0 0 0.3rem rgba(212, 165, 116, 0.25);
    background: transparent;
}

.country-code {
    display: flex;
    align-items: center;
    padding: 15px;
    background: linear-gradient(45deg, #d4a574, #b8956a);
    color: white;
    font-weight: 600;
    font-size: 16px;
    min-width: 60px;
    justify-content: center;
    z-index: 1;
    position: relative;
}
}

.phone-input {
    flex: 1;
    padding: 15px 15px 15px 10px;
    border: none;
    background: transparent;
    font-size: 16px;
    color: #333 !important;
    outline: none;
    z-index: 15;
    position: relative;
}

.floating-label-phone {
    position: absolute;
    left: 85px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    font-size: 16px;
    pointer-events: none;
    transition: all 0.3s ease;
    background: transparent;
    padding: 0 5px;
    z-index: 5;
}

.phone-input:focus + .floating-label-phone,
.phone-input:valid + .floating-label-phone,
.phone-input.has-value + .floating-label-phone {
    top: -8px;
    left: 12px;
    font-size: 12px;
    color: #d4a574;
    z-index: 2;
}

.btn-signup {
    background: linear-gradient(45deg, #28a745, #20c997);
    color: white;
    box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
}

.btn-signup:hover {
    background: linear-gradient(45deg, #20c997, #17a2b8);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
    color: white;
}

.btn-signup i {
    transition: transform 0.3s ease;
}

.btn-signup:hover i {
    transform: scale(1.1);
}

/* Custom scrollbar for signup form */
.signup-form-section::-webkit-scrollbar {
    width: 6px;
}

.signup-form-section::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.signup-form-section::-webkit-scrollbar-thumb {
    background: #d4a574;
    border-radius: 10px;
}

.signup-form-section::-webkit-scrollbar-thumb:hover {
    background: #b8956a;
}

/* Responsive adjustments for signup */
@media (max-width: 768px) {
    .signup-container {
        flex-direction: column;
        min-height: auto;
    }
    
    .signup-branding {
        padding: 30px 20px;
        order: 2;
    }
    
    .signup-form-section {
        padding: 30px 20px;
        order: 1;
        max-height: none;
    }
    
    .brand-features {
        flex-direction: row;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .form-row {
        flex-direction: column;
    }
    
    .form-row .form-group-modern {
        width: 100%;
        margin-bottom: 20px;
    }
}

@media (max-width: 576px) {
    .modal-lg {
        max-width: 95%;
    }
    
    .floating-label-phone {
        left: 75px;
    }
    
    .country-code {
        min-width: 50px;
        font-size: 14px;
    }
}

/* Fix untuk menghilangkan text shadow di signup modal */
#signupModal .brand-title {
    text-shadow: none !important;
}

#signupModal .brand-content {
    text-shadow: none !important;
}

/* Form controls khusus untuk signup modal */
#signupModal .form-control-modern {
    width: 100%;
    padding: 18px 18px 18px 50px;
    border: 4px solid #e9ecef;
    border-radius: 15px;
    font-size: 16px;
    background: #fafafa;
    transition: all 0.3s ease;
    outline: none;
}

#signupModal .form-control-modern:focus {
    border-color: #d4a574;
    box-shadow: 0 0 0 0.4rem rgba(212, 165, 116, 0.25);
    background: white;
}

#signupModal .input-icon {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: #d4a574;
    font-size: 16px;
    z-index: 2;
}

#signupModal .floating-label {
    position: absolute;
    left: 50px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    font-size: 16px;
    pointer-events: none;
    transition: all 0.3s ease;
    background: white;
    padding: 0 8px;
}

#signupModal .form-control-modern:focus + .floating-label,
#signupModal .form-control-modern:valid + .floating-label,
#signupModal .form-control-modern.has-value + .floating-label {
    top: -12px;
    left: 15px;
    font-size: 12px;
    color: #d4a574;
    font-weight: 600;
}

/* Phone input khusus */
#signupModal .phone-input-group {
    display: flex;
    border: 4px solid #e9ecef;
    border-radius: 15px;
    background: transparent;
    transition: all 0.3s ease;
    overflow: hidden;
}

#signupModal .phone-input-group:focus-within {
    border-color: #d4a574;
    box-shadow: 0 0 0 0.4rem rgba(212, 165, 116, 0.25);
    background: transparent;
}

#signupModal .phone-input {
    padding: 18px 15px;
    font-size: 16px;
    color: #333 !important;
    background: transparent !important;
    border: none !important;
    z-index: 15;
    position: relative;
}

#signupModal .phone-input::placeholder {
    color: #999 !important;
    opacity: 1;
}

#signupModal .phone-input:focus {
    color: #333 !important;
    outline: none !important;
}

/* Override semua kemungkinan CSS yang mengintervensi */
input[type="text"]#phone {
    color: #333 !important;
    background-color: transparent !important;
    -webkit-text-fill-color: #333 !important;
}

input[type="text"]#phone:focus,
input[type="text"]#phone:active,
input[type="text"]#phone:valid {
    color: #333 !important;
    -webkit-text-fill-color: #333 !important;
}

/* Override Bootstrap form-control */
.phone-input.form-control-modern {
    color: #333 !important;
    background-color: transparent !important;
    -webkit-text-fill-color: #333 !important;
    position: relative !important;
    z-index: 10 !important;
}

.phone-input.form-control-modern:focus {
    color: #333 !important;
    background-color: transparent !important;
    -webkit-text-fill-color: #333 !important;
}

/* Pastikan tidak ada overlay yang menutupi */
.phone-input-group * {
    background: transparent !important;
}

.phone-input-group .phone-input {
    background: transparent !important;
    color: #333 !important;
    z-index: 10 !important;
    position: relative !important;
}

#signupModal .floating-label-phone {
    position: absolute;
    left: 80px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    font-size: 16px;
    pointer-events: none;
    transition: all 0.3s ease;
    background: transparent;
    padding: 0 8px;
    z-index: 5;
}

#signupModal .phone-input:focus + .floating-label-phone,
#signupModal .phone-input:valid + .floating-label-phone,
#signupModal .phone-input.has-value + .floating-label-phone {
    top: -12px;
    left: 15px;
    font-size: 12px;
    color: #d4a574;
    font-weight: 600;
    z-index: 2;
}
</style>

<script>
// Handle floating labels for signup modal
document.addEventListener('DOMContentLoaded', function() {
    const signupInputs = document.querySelectorAll('#signupModal .form-control-modern');
    
    signupInputs.forEach(function(input) {
        // Check if input has value on page load
        if (input.value.trim() !== '') {
            input.classList.add('has-value');
        }
        
        // Add event listeners
        input.addEventListener('input', function() {
            if (this.value.trim() !== '') {
                this.classList.add('has-value');
            } else {
                this.classList.remove('has-value');
            }
        });
        
        input.addEventListener('blur', function() {
            if (this.value.trim() !== '') {
                this.classList.add('has-value');
            } else {
                this.classList.remove('has-value');
            }
        });
    });
});

// Khusus untuk phone input debugging
document.addEventListener('DOMContentLoaded', function() {
    const phoneInput = document.getElementById('phone');
    if (phoneInput) {
        console.log('Phone input found:', phoneInput);
        
        // Force style application
        phoneInput.style.setProperty('color', '#333', 'important');
        phoneInput.style.setProperty('background', 'transparent', 'important');
        phoneInput.style.setProperty('-webkit-text-fill-color', '#333', 'important');
        
        // Validasi hanya angka
        phoneInput.addEventListener('input', function(e) {
            // Hapus semua karakter non-digit
            let value = e.target.value.replace(/\D/g, '');
            e.target.value = value;
            
            console.log('Phone input value:', value);
            // Force style reapplication
            e.target.style.setProperty('color', '#333', 'important');
            e.target.style.setProperty('-webkit-text-fill-color', '#333', 'important');
            e.target.style.setProperty('z-index', '20', 'important');
            
            // Trigger has-value class untuk floating label
            if (value.trim() !== '') {
                e.target.classList.add('has-value');
            } else {
                e.target.classList.remove('has-value');
            }
        });
        
        phoneInput.addEventListener('focus', function(e) {
            console.log('Phone input focused');
            e.target.style.setProperty('color', '#333', 'important');
        });
        
        // Test dengan mengisi nilai setelah 1 detik
        setTimeout(function() {
            phoneInput.value = '123';
            phoneInput.style.setProperty('color', '#333', 'important');
            phoneInput.dispatchEvent(new Event('input'));
            console.log('Test value set to phone input');
        }, 1000);
    }
});
</script>
