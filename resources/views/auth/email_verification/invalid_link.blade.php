<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link Invalid</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <style>
	:root {
            --blue-theme: #0059ff;
        }
        body {
            margin: 20px;
            padding: 0;
            font-family: 'Poppins', serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #ff4d40;
        }

        .container {
            text-align: center;
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            border: 1px solid #ff4d40;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        .container img {
            width: 80px;
            margin-bottom: 20px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .container h1 {
            font-size: 2em;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .container p {
            font-size: 1.2em;
            margin-bottom: 30px;
            line-height: 1.6;
            font-weight: 400;
        }

        .container a {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            color: #fff;
            text-decoration: none;
            background: var(--blue-theme);
            border-radius: 5px;
            transition: background 0.3s ease;
            font-weight: 500;
        }

        .container a:hover {
            background: #ff4d40;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            .container h1 {
                font-size: 1.8em;
            }

            .container p {
                font-size: 1em;
            }
        }

        @media (max-width: 480px) {
            .container h1 {
                font-size: 1.5em;
            }

            .container p {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset("auth/remove.png") }}" alt="Cross Icon">
        <h1>Link Invalid</h1>
        <p>Link yang Anda buka salah atau Link sudah kadaluwarsa, silahkan Hubungi Admin atau buat Akun baru</p>
    </div>
</body>
</html>
