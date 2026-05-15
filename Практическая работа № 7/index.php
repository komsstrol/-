<?php
require_once 'bd.php';

// Обработка формы регистрации
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
    $name = $connect->real_escape_string($_POST['username']);
    $login = $connect->real_escape_string($_POST['login']);
    $email = $connect->real_escape_string($_POST['email']);
    $password = $connect->real_escape_string($_POST['password']);
    
    $sql = "INSERT INTO `users` (`name`, `login`, `email`, `password`) VALUES (?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("ssss", $name, $login, $email, $password);
    
    if ($stmt->execute()) {
        echo "<script>
                alert(' Регистрация успешна!');
                window.location.replace('admin.php');
              </script>";
    } else {
        echo "<script>alert('Ошибка регистрации: " . addslashes($stmt->error) . "');</script>";
    }
    $stmt->close();
}
// форма регистрации
include 'header.php';
?>

<section style="min-height: 80vh;" class="d-flex align-items-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg rounded-4 border-0">
                    <div class="card-header bg-success text-white text-center py-3 rounded-top-4">
                        <h3 class="mb-0"><i class="fas fa-user-plus me-2"></i>Регистрация</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="regName" class="form-label fw-bold">
                                    <i class="fas fa-user me-1 text-success"></i>Имя
                                </label>
                                <input type="text" class="form-control rounded-pill" id="regName" name="username" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="regLogin" class="form-label fw-bold">
                                    <i class="fas fa-key me-1 text-success"></i>Логин
                                </label>
                                <input type="text" class="form-control rounded-pill" id="regLogin" name="login" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="regEmail" class="form-label fw-bold">
                                    <i class="fas fa-envelope me-1 text-success"></i>Email
                                </label>
                                <input type="email" class="form-control rounded-pill" id="regEmail" name="email" required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="regPassword" class="form-label fw-bold">
                                    <i class="fas fa-lock me-1 text-success"></i>Пароль
                                </label>
                                <input type="password" class="form-control rounded-pill" id="regPassword" name="password" required>
                            </div>
                            
                            <button type="submit" class="btn btn-success w-100 rounded-pill py-2 fw-bold">
                                <i class="fas fa-check-circle me-2"></i>Зарегистрироваться
                            </button>
                        </form>
                        
                        <hr class="my-4">
            
                         <!-- переход в админ панель -->
                        <div class="text-center">
                            <p class="mb-0 text-muted">
                                Вы Администратор? 
                                <a href="admin.php" class="text-success text-decoration-none fw-bold">
                                    </i>=> Переход в Админ панель
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'footer.php';
$connect->close();
?>