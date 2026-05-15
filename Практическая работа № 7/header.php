<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная панель</title>
    <!-- Подключаем Bootstrap CSS для стилизации -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Дополнительные стили для плавности переходов */
        .navbar-nav .nav-link {
            transition: all 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="bg-light text-dark d-flex flex-column min-vh-100">
    <header>
        <!-- Навигационная панель сайта -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
            <div class="container-fluid">
                <!-- Название сайта -->
                <a class="navbar-brand fw-bold text-success" href="index.php">
                    Управление пользователями
                </a>
                
                <!-- Кнопка для мобильных устройств -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Основное меню навигации -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="admin.php">
                                <i class="fas fa-users me-1"></i>Админ панель
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <i class="fas fa-user-plus me-1"></i>Регистрация
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cog me-1"></i>Настройки
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-1"></i>Профиль</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-lock me-1"></i>Безопасность</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-1"></i>Выход</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    <!-- Форма поиска -->
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Поиск пользователей..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>