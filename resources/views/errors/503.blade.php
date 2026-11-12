<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>রক্ষণাবেক্ষণ চলছে | ডিজিটাল স্টোর ম্যানেজমেন্ট সিস্টেম</title>

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

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

        /* ---------- Left ---------- */
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
            top: 0; right: 0;
            width: 100px; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1));
            transform: skewX(-15deg);
        }

        .government-header { text-align: center; color: white; z-index: 2; }

        .govt-logo {
            width: 60px; height: 60px;
            background: white;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 15px;
            padding: 5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .govt-logo img { width: 100%; height: 100%; object-fit: contain; border-radius: 50%; }

        .govt-title { font-size: 18px; font-weight: 600; margin-bottom: 8px; line-height: 1.4; }
        .govt-subtitle { font-size: 14px; opacity: 0.9; margin-bottom: 5px; }
        .govt-department { font-size: 16px; font-weight: 500; color: #FFD700; }

        .warehouse-illustration {
            display: flex; justify-content: center; align-items: center;
            flex-grow: 1; z-index: 2;
        }

        .warehouse-scene { position: relative; width: 300px; height: 200px; }

        .warehouse-building {
            position: absolute; bottom: 40px; left: 50%;
            transform: translateX(-50%);
            width: 200px; height: 80px;
            background: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .warehouse-roof {
            position: absolute; top: -20px; left: -10px;
            width: 220px; height: 25px;
            background: #dc3545;
            border-radius: 4px;
            transform: perspective(100px) rotateX(15deg);
        }
        .warehouse-door {
            position: absolute; bottom: 0; left: 50%;
            transform: translateX(-50%);
            width: 40px; height: 50px;
            background: #495057;
            border-radius: 4px 4px 0 0;
        }

        /* Maintenance cone in front of the door */
        .cone {
            position: absolute; bottom: 8px; left: 50%;
            margin-left: -70px;
            width: 0; height: 0;
            border-left: 14px solid transparent;
            border-right: 14px solid transparent;
            border-bottom: 38px solid #ff6b35;
            filter: drop-shadow(0 2px 3px rgba(0,0,0,.25));
        }
        .cone::after {
            content: '';
            position: absolute; top: 14px; left: -9px;
            width: 18px; height: 5px;
            background: #fff;
        }

        .boxes { position: absolute; bottom: 0; left: 20px; }
        .box {
            width: 25px; height: 25px;
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
            position: absolute; bottom: 10px; right: 50px;
            width: 40px; height: 30px;
            background: #ff6b35;
            border-radius: 4px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .system-title {
            text-align: right; color: white;
            font-size: 28px; font-weight: bold; line-height: 1.3;
            z-index: 2;
        }

        /* ---------- Right ---------- */
        .right-section {
            flex: 1;
            background: white;
            padding: 40px;
            display: flex; flex-direction: column;
            justify-content: center; align-items: center;
        }

        .notice-card {
            background: white;
            border-radius: 15px;
            padding: 36px 30px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%; max-width: 400px;
            border: 1px solid #e9ecef;
            text-align: center;
        }

        .gear {
            width: 64px; height: 64px;
            margin: 0 auto 18px;
            color: #4a4e96;
        }
        .gear svg { width: 100%; height: 100%; animation: spin 8s linear infinite; }

        .notice-title { font-size: 22px; color: #4a4e96; font-weight: 700; margin-bottom: 10px; }
        .notice-text { font-size: 14px; color: #495057; line-height: 1.8; margin-bottom: 22px; }

        .status-box {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 13px;
            color: #495057;
            margin-bottom: 22px;
        }
        .status-box .dot {
            display: inline-block;
            width: 8px; height: 8px;
            border-radius: 50%;
            background: #ffc107;
            margin-right: 6px;
            animation: pulse 1.6s ease-in-out infinite;
        }

        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            background: #1325ca;
            color: white;
            font-family: inherit;
            transition: all 0.3s ease;
        }
        .btn:hover { background: #0f1da3; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(19, 37, 202, 0.3); }
        .btn:focus-visible { outline: 3px solid rgba(74, 78, 150, 0.4); outline-offset: 2px; }

        .retry-note { font-size: 11px; color: #6c757d; margin-top: 12px; }

        .footer-info {
            color: #6c757d;
            padding: 20px 0 0 0;
            text-align: center;
            font-size: 11px; line-height: 1.4;
            margin-top: 25px;
            border-top: 1px solid #e9ecef;
            width: 100%; max-width: 400px;
        }
        .footer-info p { margin: 2px 0; }

        /* ---------- Motion ---------- */
        @keyframes spin { to { transform: rotate(360deg); } }
        @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: .3; } }
        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
        .forklift { animation: float 3s ease-in-out infinite; }
        .box:nth-child(odd) { animation: float 4s ease-in-out infinite; animation-delay: .5s; }

        @media (prefers-reduced-motion: reduce) {
            .gear svg, .status-box .dot, .forklift, .box { animation: none !important; }
        }

        /* ---------- Responsive ---------- */
        @media (max-width: 1024px) {
            .main-container { max-width: 900px; }
            .govt-title { font-size: 16px; }
            .system-title { font-size: 24px; }
        }

        @media (max-width: 768px) {
            body { padding: 5px; }
            .main-container { flex-direction: column; margin: 0; min-height: auto; border-radius: 15px; max-width: 100%; }
            .left-section { padding: 25px 20px; min-height: 300px; }
            .right-section { padding: 25px 20px; }
            .footer-info { display: none; }
            .warehouse-scene { width: 220px; height: 130px; }
            .warehouse-building { width: 130px; height: 50px; bottom: 30px; }
            .warehouse-roof { width: 150px; height: 20px; top: -15px; }
            .warehouse-door { width: 30px; height: 40px; }
            .cone { margin-left: -50px; transform: scale(.7); transform-origin: bottom; }
            .box { width: 20px; height: 20px; }
            .forklift { width: 30px; height: 25px; right: 40px; }
            .system-title { font-size: 20px; text-align: center; margin-top: 15px; }
            .govt-title { font-size: 14px; }
            .govt-subtitle { font-size: 12px; }
            .govt-department { font-size: 13px; }
            .notice-card { max-width: 100%; padding: 28px 22px; border-radius: 12px; }
        }

        @media (max-width: 480px) {
            body { padding: 2px; }
            .main-container { border-radius: 8px; }
            .left-section { padding: 15px 10px; min-height: 200px; }
            .right-section { padding: 15px 10px; }
            .warehouse-scene { width: 150px; height: 90px; }
            .warehouse-building { width: 90px; height: 35px; bottom: 20px; }
            .warehouse-roof { width: 110px; height: 15px; top: -12px; }
            .warehouse-door { width: 25px; height: 30px; }
            .cone { margin-left: -40px; transform: scale(.5); }
            .box { width: 15px; height: 15px; }
            .forklift { width: 25px; height: 20px; right: 30px; }
            .system-title { font-size: 16px; margin-top: 10px; }
            .govt-title { font-size: 12px; }
            .notice-title { font-size: 18px; }
            .notice-text { font-size: 13px; }
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
                <div class="govt-subtitle">আইন ও বিচার বিভাগ</div>
                <div class="govt-department">বাংলাদেশ সচিবালয়, ঢাকা</div>
            </div>

            <div class="warehouse-illustration">
                <div class="warehouse-scene">
                    <div class="warehouse-building">
                        <div class="warehouse-roof"></div>
                        <div class="warehouse-door"></div>
                    </div>
                    <div class="cone"></div>
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
                ম্যানেজমেন্ট সিস্টেম (version 2.0)
            </div>
        </div>

        <!-- Right Section -->
        <div class="right-section">
            <div class="notice-card" role="status" aria-live="polite">
                <div class="gear" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09a1.65 1.65 0 0 0 1.51-1 1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33h0a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51h0a1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82v0a1.65 1.65 0 0 0 1.51 1H21a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                    </svg>
                </div>

                <h1 class="notice-title">রক্ষণাবেক্ষণের কাজ চলছে</h1>
                <p class="notice-text">
                    সিস্টেমের মান উন্নয়নের জন্য সাময়িকভাবে সেবা বন্ধ রাখা হয়েছে।
                    অনুগ্রহ করে কিছুক্ষণ পর আবার চেষ্টা করুন।
                </p>

                <div class="status-box">
                    <span class="dot"></span>
                    সিস্টেম বর্তমানে রক্ষণাবেক্ষণ মোডে আছে
                </div>

                
            </div>

            <div class="footer-info">
                <p>&copy; Law and Justice Division, MOLJPA</p>
                <p>Technical Consultancy, Arafat Ur Rahman, Assistant Programmer, MOLJPA</p>
            </div>
        </div>
    </div>

     
</body>
</html>