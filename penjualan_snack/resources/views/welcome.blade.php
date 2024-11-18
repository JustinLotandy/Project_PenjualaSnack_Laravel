<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Jaya Abadi Furniture</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg, #eceff1, #ffffff);
            color: #2c3e50;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        .about-container {
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            line-height: 1.8;
            animation: fadeInUp 1s ease-out;
        }
        .about-container img {
            width: 120px;
            height: 120px;
            margin-bottom: 20px;
            border-radius: 50%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: bounce 2s infinite;
        }
        .about-container h1 {
            font-size: 28px;
            margin-bottom: 20px;
            animation: slideInLeft 1s ease-out;
        }
        .about-container p {
            font-size: 16px;
            color: #546e7a;
            animation: fadeIn 1.5s ease-out;
        }
        .login-button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            animation: pulse 2s infinite;
        }
        .login-button:hover {
            background: #388E3C;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .about-container {
                padding: 20px;
                max-width: 90%;
            }
            .about-container h1 {
                font-size: 24px;
            }
            .about-container p {
                font-size: 14px;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-15px);
            }
            60% {
                transform: translateY(-8px);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }
    </style>
</head>
<body>
    <div class="about-container">
        <img src="./logo.png" alt="Jaya Abadi Furniture Logo">
        <h1>Sehati Tetap Jaya</h1>
        <p>
            Sistem manajemen penjuaan modern untuk pengelolaan dan pemantauan penjualan snack. Dirancang khusus untuk memastikan efisiensi dan akurasi dalam proses penjualan.
        </p>
        <p>
            Discover our extensive collection and let us help you create the spaces you deserve. 
            At Sehati Tetap Jaya, quality meets modernity.
        </p>
        <a href="\admin" class="login-button" style="display: block; margin: 20px auto; width: 200px; text-decoration: none;">Login</a>
    </div>
</body>
</html>
