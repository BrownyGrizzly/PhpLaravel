<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Trang chủ</a></li>
            <li><a href="{{ route('dashboard.reader') }}">Dashboard</a></li>
            <!-- Thêm các liên kết điều hướng khác tùy thuộc vào cần thiết -->
        </ul>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>&copy; 2024 My App</p>
</footer>
</body>
</html>
