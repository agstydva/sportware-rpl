<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content modern-modal">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="modal-body p-0">
                <div class="login-container">
                    <!-- Left side - Branding -->
                    <div class="login-branding">
                        <div class="brand-content">
                            <div class="logo-wrapper">
                                <img src="img/sportware-logo.jpeg" alt="Sportware Logo" class="brand-logo">
                            </div>
                            <h2 class="brand-title">Welcome Back!</h2>
                            <p class="brand-subtitle">Sign in to your account to continue your sports journey</p>
                            <div class="brand-decoration">
                                <i class="fas fa-running"></i>
                                <i class="fas fa-dumbbell"></i>
                                <i class="fas fa-basketball-ball"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right side - Login Form -->
                    <div class="login-form-section">
                        <div class="form-header">
                            <h3>Login</h3>
                            <p>Enter your credentials to access your account</p>
                        </div>
                        
                        <form action="partials/_handleLogin.php" method="post" class="modern-form">
                            <div class="form-group-modern">
                                <div class="input-wrapper">
                                    <i class="fas fa-user input-icon"></i>
                                    <input class="form-control-modern" id="loginusername" name="loginusername" type="text" required>
                                    <label class="floating-label">Username</label>
                                </div>
                            </div>
                            
                            <div class="form-group-modern">
                                <div class="input-wrapper">
                                    <i class="fas fa-lock input-icon"></i>
                                    <input class="form-control-modern" id="loginpassword" name="loginpassword" type="password" required data-toggle="password">
                                    <label class="floating-label">Password</label>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn-modern btn-login">
                                <span>Login</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </form>
                        
                        <div class="form-footer">
                            <p>Don't have an account? 
                                <a href="#" class="link-modern" data-dismiss="modal" data-toggle="modal" data-target="#signupModal">
                                    Sign up now
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
.modern-modal {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    background: white;
}

.modal-close {
    position: absolute;
    top: 20px;
    right: 20px;
    z-index: 1000;
    background: rgba(255,255,255,0.9);
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #666;
    font-size: 16px;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.modal-close:hover {
    background: rgba(220, 53, 69, 0.1);
    color: #dc3545;
    transform: scale(1.1);
}

.login-container {
    display: flex;
    min-height: 600px;
}

.login-branding {
    flex: 1;
    background: linear-gradient(135deg, #d4a574 0%, #b8956a 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.login-branding::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><polygon fill="rgba(255,255,255,0.1)" points="1000,100 1000,0 0,100"/></svg>');
    background-size: cover;
}

.brand-content {
    text-align: center;
    color: white;
    z-index: 2;
    position: relative;
}

.logo-wrapper {
    margin-bottom: 20px;
}

.brand-logo {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid rgba(255,255,255,0.3);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

.brand-title {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 10px;
    text-shadow: none;
}

.brand-subtitle {
    font-size: 1rem;
    opacity: 0.9;
    margin-bottom: 30px;
    line-height: 1.5;
}

.brand-decoration {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.brand-decoration i {
    font-size: 1.5rem;
    opacity: 0.7;
    animation: float 3s ease-in-out infinite;
}

.brand-decoration i:nth-child(2) {
    animation-delay: 0.5s;
}

.brand-decoration i:nth-child(3) {
    animation-delay: 1s;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.login-form-section {
    flex: 1;
    padding: 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.form-header {
    text-align: center;
    margin-bottom: 30px;
}

.form-header h3 {
    font-size: 1.8rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 8px;
}

.form-header p {
    color: #666;
    font-size: 0.95rem;
}

.modern-form {
    margin-bottom: 20px;
}

.form-group-modern {
    margin-bottom: 25px;
}

.input-wrapper {
    position: relative;
}

.input-icon {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: #d4a574;
    font-size: 16px;
    z-index: 2;
}

.form-control-modern {
    width: 100%;
    padding: 18px 18px 18px 50px;
    border: 4px solid #e9ecef;
    border-radius: 15px;
    font-size: 16px;
    background: #fafafa;
    transition: all 0.3s ease;
    outline: none;
}

.form-control-modern:focus {
    border-color: #d4a574;
    box-shadow: 0 0 0 0.4rem rgba(212, 165, 116, 0.25);
    background: white;
}

.floating-label {
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

.form-control-modern:focus + .floating-label,
.form-control-modern:valid + .floating-label,
.form-control-modern.has-value + .floating-label {
    top: -12px;
    left: 15px;
    font-size: 12px;
    color: #d4a574;
    font-weight: 600;
}

.btn-modern {
    width: 100%;
    padding: 15px 30px;
    border: none;
    border-radius: 12px;
    font-size: 16px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.btn-login {
    background: linear-gradient(45deg, #d4a574, #b8956a);
    color: white;
    box-shadow: 0 4px 15px rgba(212, 165, 116, 0.3);
}

.btn-login:hover {
    background: linear-gradient(45deg, #b8956a, #a0845a);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(212, 165, 116, 0.4);
    color: white;
}

.btn-login i {
    transition: transform 0.3s ease;
}

.btn-login:hover i {
    transform: translateX(5px);
}

.form-footer {
    text-align: center;
    color: #666;
}

.link-modern {
    color: #d4a574;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.link-modern:hover {
    color: #b8956a;
    text-decoration: none;
}

/* Responsive */
@media (max-width: 768px) {
    .login-container {
        flex-direction: column;
        min-height: auto;
    }
    
    .login-branding {
        padding: 30px 20px;
    }
    
    .login-form-section {
        padding: 30px 20px;
    }
    
    .brand-title {
        font-size: 1.5rem;
    }
    
    .form-header h3 {
        font-size: 1.5rem;
    }
}
</style>

<script>
// Handle floating labels for login modal
document.addEventListener('DOMContentLoaded', function() {
    const loginInputs = document.querySelectorAll('#loginModal .form-control-modern');
    
    loginInputs.forEach(function(input) {
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
</script>
