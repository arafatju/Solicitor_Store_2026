<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ডিজিটাল স্টোর ম্যানেজমেন্ট সিস্টেম</title>
    
    <!-- reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
    <!-- Your existing assets -->
    <link href="{{ asset('signin.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Sweet Alert -->
    @include('sweetalert::alert')
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'SolaimanLipi', 'Kalpurush', Arial, sans-serif;
            background: linear-gradient(135deg, #4a4e96 0%, #8B5A96 50%, #D63384 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .main-container {
            width: 100%;
            max-width: 1200px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            min-height: 600px;
            margin: auto;
            flex-grow: 1;
        }

        .left-section {
            flex: 1;
            background: linear-gradient(135deg, #4a4e96 0%, #6B46C1 100%);
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .left-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1));
            transform: skewX(-15deg);
        }

        .government-header {
            text-align: center;
            color: white;
            z-index: 2;
        }

        .govt-logo {
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            padding: 5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .govt-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 50%;
        }

        .govt-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .govt-subtitle {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 5px;
        }

        .govt-department {
            font-size: 16px;
            font-weight: 500;
            color: #FFD700;
        }

        .warehouse-illustration {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            z-index: 2;
        }

        .warehouse-scene {
            position: relative;
            width: 300px;
            height: 200px;
        }

        .warehouse-building {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 80px;
            background: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .warehouse-roof {
            position: absolute;
            top: -20px;
            left: -10px;
            width: 220px;
            height: 25px;
            background: #dc3545;
            border-radius: 4px;
            transform: perspective(100px) rotateX(15deg);
        }

        .warehouse-door {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 50px;
            background: #495057;
            border-radius: 4px 4px 0 0;
        }

        .boxes {
            position: absolute;
            bottom: 0;
            left: 20px;
        }

        .box {
            width: 25px;
            height: 25px;
            background: #ffc107;
            border: 2px solid #ff8c00;
            border-radius: 3px;
            position: absolute;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .box:nth-child(1) { bottom: 0; left: 0; }
        .box:nth-child(2) { bottom: 0; left: 30px; background: #28a745; border-color: #20c997; }
        .box:nth-child(3) { bottom: 30px; left: 0; background: #17a2b8; border-color: #20c997; }
        .box:nth-child(4) { bottom: 0; right: -80px; background: #e83e8c; border-color: #fd7e14; }

        .forklift {
            position: absolute;
            bottom: 10px;
            right: 50px;
            width: 40px;
            height: 30px;
            background: #ff6b35;
            border-radius: 4px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .system-title {
            text-align: right;
            color: white;
            font-size: 28px;
            font-weight: bold;
            line-height: 1.3;
            z-index: 2;
        }

        .right-section {
            flex: 1;
            background: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            border: 1px solid #e9ecef;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-logo {
            width: 50px;
            height: 50px;
            background: #4a4e96;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            padding: 5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .login-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 50%;
            filter: brightness(0) invert(1);
        }

        .login-title {
            font-size: 16px;
            color: #4a4e96;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .login-subtitle {
            font-size: 12px;
            color: #6c757d;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-input:focus {
            outline: none;
            border-color: #4a4e96;
            background: white;
            box-shadow: 0 0 0 3px rgba(74, 78, 150, 0.1);
        }

        .form-input.is-invalid {
            border-color: #dc3545;
        }

        .form-input::placeholder {
            color: #adb5bd;
            font-size: 13px;
        }

        .password-toggle {
            position: relative;
        }

        .toggle-btn {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
            font-size: 16px;
        }

        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
        }

        .alert-danger {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 10px;
            border-radius: 6px;
            font-size: 12px;
            margin-top: 5px;
        }

        .recaptcha-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 12px;
        }

        .form-links {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .form-link {
            color: #4a4e96;
            text-decoration: none;
            font-size: 12px;
        }

        .form-link:hover {
            text-decoration: underline;
        }

        .login-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-login {
            background: #1325caff;
            color: white;
        }

        .btn-login:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
        }

        .btn-register {
            background: #28a745;
            color: white;
        }

        .btn-register:hover {
            background: #218838;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
        }

        .footer-info {
            color: #6c757d;
            padding: 20px 0 0 0;
            text-align: center;
            font-size: 11px;
            line-height: 1.4;
            margin-top: auto;
            border-top: 1px solid #e9ecef;
        }

        .footer-info p {
            margin: 2px 0;
        }

        .desktop-only {
            display: block;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .main-container {
                max-width: 900px;
            }
            
            .govt-title {
                font-size: 16px;
            }
            
            .system-title {
                font-size: 24px;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 5px;
            }
            
            .main-container {
                flex-direction: column;
                margin: 0;
                min-height: auto;
                border-radius: 15px;
                max-width: 100%;
            }
            
            .left-section {
                padding: 25px 20px;
                min-height: 300px;
            }
            
            .right-section {
                padding: 25px 20px;
            }
            
            /* Hide footer on mobile/tablet */
            .desktop-only {
                display: none;
            }
            
            .warehouse-scene {
                width: 220px;
                height: 130px;
            }
            
            .warehouse-building {
                width: 130px;
                height: 50px;
                bottom: 30px;
            }
            
            .warehouse-roof {
                width: 150px;
                left: -10px;
                height: 20px;
                top: -15px;
            }
            
            .warehouse-door {
                width: 30px;
                height: 40px;
            }
            
            .box {
                width: 20px;
                height: 20px;
            }
            
            .forklift {
                width: 30px;
                height: 25px;
                right: 40px;
            }
            
            .system-title {
                font-size: 20px;
                text-align: center;
                margin-top: 15px;
            }
            
            .govt-title {
                font-size: 14px;
            }
            
            .govt-subtitle {
                font-size: 12px;
            }
            
            .govt-department {
                font-size: 13px;
            }
            
            .login-card {
                max-width: 100%;
                padding: 25px;
                border-radius: 12px;
            }
            
            .login-buttons {
                flex-direction: row;
                gap: 8px;
            }
            
            .btn {
                padding: 10px;
                font-size: 13px;
            }
            
            .form-input {
                padding: 10px 12px;
                font-size: 13px;
            }
            
            .recaptcha-container {
                transform: scale(0.9);
                transform-origin: center;
            }
        }

        @media (max-width: 600px) {
            .main-container {
                border-radius: 10px;
            }
            
            .left-section {
                padding: 20px 15px;
                min-height: 250px;
            }
            
            .right-section {
                padding: 20px 15px;
            }
            
            .warehouse-scene {
                width: 180px;
                height: 110px;
            }
            
            .warehouse-building {
                width: 110px;
                height: 45px;
                bottom: 25px;
            }
            
            .warehouse-roof {
                width: 130px;
                height: 18px;
            }
            
            .system-title {
                font-size: 18px;
            }
            
            .govt-title {
                font-size: 13px;
            }
            
            .govt-logo {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }
            
            .login-logo {
                width: 45px;
                height: 45px;
                font-size: 18px;
            }
            
            .login-card {
                padding: 20px;
            }
            
            .recaptcha-container {
                transform: scale(0.8);
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 2px;
            }
            
            .main-container {
                border-radius: 8px;
            }
            
            .left-section {
                padding: 15px 10px;
                min-height: 200px;
            }
            
            .right-section {
                padding: 15px 10px;
            }
            
            .warehouse-scene {
                width: 150px;
                height: 90px;
            }
            
            .warehouse-building {
                width: 90px;
                height: 35px;
                bottom: 20px;
            }
            
            .warehouse-roof {
                width: 110px;
                height: 15px;
                top: -12px;
            }
            
            .warehouse-door {
                width: 25px;
                height: 30px;
            }
            
            .box {
                width: 15px;
                height: 15px;
            }
            
            .forklift {
                width: 25px;
                height: 20px;
                right: 30px;
            }
            
            .govt-title {
                font-size: 12px;
            }
            
            .govt-subtitle {
                font-size: 11px;
            }
            
            .govt-department {
                font-size: 12px;
            }
            
            .system-title {
                font-size: 16px;
                margin-top: 10px;
            }
            
            .govt-logo {
                width: 45px;
                height: 45px;
                font-size: 18px;
            }
            
            .login-logo {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }
            
            .login-card {
                padding: 15px;
                border-radius: 10px;
            }
            
            .login-title {
                font-size: 14px;
            }
            
            .login-subtitle {
                font-size: 11px;
            }
            
            .form-input {
                padding: 8px 10px;
                font-size: 12px;
            }
            
            .btn {
                padding: 8px;
                font-size: 12px;
            }
            
            .login-buttons {
                flex-direction: column;
                gap: 8px;
            }
            
            .form-link {
                font-size: 11px;
            }
            
            .recaptcha-container {
                transform: scale(0.7);
            }
            
            .toggle-btn {
                right: 8px;
                font-size: 14px;
            }
        }

        @media (max-width: 360px) {
            .main-container {
                border-radius: 5px;
            }
            
            .left-section, .right-section {
                padding: 10px 8px;
            }
            
            .warehouse-scene {
                width: 120px;
                height: 70px;
            }
            
            .warehouse-building {
                width: 70px;
                height: 28px;
                bottom: 15px;
            }
            
            .warehouse-roof {
                width: 85px;
                height: 12px;
                top: -10px;
            }
            
            .system-title {
                font-size: 14px;
            }
            
            .govt-title {
                font-size: 11px;
            }
            
            .login-card {
                padding: 12px;
            }
            
            .recaptcha-container {
                transform: scale(0.6);
                margin-bottom: 10px;
            }
        }

        /* Landscape orientation for mobile */
        @media (max-height: 600px) and (orientation: landscape) {
            .main-container {
                flex-direction: row;
                max-height: 100vh;
            }
            
            .left-section {
                padding: 20px 15px;
                min-height: auto;
            }
            
            .warehouse-scene {
                width: 180px;
                height: 100px;
            }
            
            .system-title {
                font-size: 16px;
                text-align: right;
                margin-top: 10px;
            }
            
            .govt-title {
                font-size: 12px;
            }
        }

        /* Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .forklift {
            animation: float 3s ease-in-out infinite;
        }

        .box:nth-child(odd) {
            animation: float 4s ease-in-out infinite;
            animation-delay: 0.5s;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Left Section -->
        <div class="left-section">
            <div class="government-header">
                <div class="govt-logo">
                    <img src="{{ asset('gov.png') }}" alt="Government Logo">
                </div>
                <div class="govt-title">আইন, বিচার ও সংসদ বিষয়ক মন্ত্রণালয়</div>
                                <div class="govt-subtitle">আইন ও  বিচার বিভাগ </div>

                 <div class="govt-department">সলিসিটর অনুবিভাগ </div>
            </div>
            
            <div class="warehouse-illustration">
                <div class="warehouse-scene">
                    <div class="warehouse-building">
                        <div class="warehouse-roof"></div>
                        <div class="warehouse-door"></div>
                    </div>
                    <div class="boxes">
                        <div class="box"></div>
                        <div class="box"></div>
                        <div class="box"></div>
                        <div class="box"></div>
                    </div>
                    <div class="forklift"></div>
                </div>
            </div>
            
            <div class="system-title">
                ডিজিটাল স্টোর<br>
                ম্যানেজমেন্ট সিস্টেম (version 2.5)
            </div>
        </div>

        <!-- Right Section -->
        <div class="right-section">
            <div class="login-card">
                <div class="login-header">
                    
                    <div class="login-title">ডিজিটাল স্টোর</div>
                    <div class="login-subtitle">ম্যানেজমেন্ট সিস্টেম</div>
                </div>
                
                <form method="POST" action="{{ route('login.custom') }}">
                    @csrf
                    
                    <!-- Email Field -->
                    <div class="form-group">
                        <input id="email" 
                               type="email" 
                               class="form-input @error('email') is-invalid @enderror" 
                               name="email" 
                               value="{{ old('email') }}" 
                               placeholder="Email Address"
                               required 
                               autocomplete="off">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <!-- Password Field -->
                    <div class="form-group password-toggle">
                        <input id="password" 
                               type="password" 
                               class="form-input @error('password') is-invalid @enderror" 
                               name="password" 
                               placeholder="Password"
                               required 
                               autocomplete="off">
                        <button type="button" class="toggle-btn" onclick="togglePassword()">👁</button>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <!-- reCAPTCHA 
                    <div class="form-group">
                        <div class="recaptcha-container">
                            <div class="g-recaptcha" 
                                 data-sitekey="6Le6xNkrAAAAAOTzlh1exDw4SsGE2BxwDDwheStn"
                                 data-size="normal"
                                 data-theme="light"></div>
                        </div>
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                        @error('g-recaptcha-response')
                            <div class="alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    -->

                    <div class="form-group">
    <div class="recaptcha-container">
        {!! NoCaptcha::display() !!}
    </div>
    {!! NoCaptcha::renderJs() !!}
    @error('g-recaptcha-response')
        <div class="alert-danger">{{ $message }}</div>
    @enderror
</div>


                    <!-- Login Button -->
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-login">Login</button>
                    </div>
                    
                    <!-- Additional Links -->
                     
                </form>
                
                <!-- Footer - Only visible on desktop -->
                <div class="footer-info desktop-only">
                    <p>&copy; Law and Justice Division, MOLJPA</p>
                    <p>Technical Consultancy, Arafat Ur Rahman, Assistant Programmer, MOLJPA</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleBtn = document.querySelector('.toggle-btn');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = '👁';
            }
        }

        // Handle reCAPTCHA responsiveness
        function handleRecaptchaResize() {
            const recaptcha = document.querySelector('.g-recaptcha');
            const container = document.querySelector('.recaptcha-container');
            
            if (recaptcha && container) {
                const containerWidth = container.offsetWidth;
                if (containerWidth < 300) {
                    recaptcha.setAttribute('data-size', 'compact');
                } else {
                    recaptcha.setAttribute('data-size', 'normal');
                }
            }
        }

        // Add floating animation to elements
        document.addEventListener('DOMContentLoaded', function() {
            const boxes = document.querySelectorAll('.box');
            boxes.forEach((box, index) => {
                box.style.animationDelay = (index * 0.2) + 's';
            });
            
            // Handle initial reCAPTCHA size
            handleRecaptchaResize();
            
            // Handle window resize
            let resizeTimer;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(handleRecaptchaResize, 100);
            });
        });
    </script>
</body>
</html>