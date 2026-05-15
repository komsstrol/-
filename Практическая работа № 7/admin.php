<?php
// Файл: admin.php
// Назначение: Административная панель для управления пользователями
// Возможности: просмотр, редактирование, удаление пользователей

// Подключаем файл с подключением к базе данных
require_once 'bd.php';

// Обработка POST запросов (редактирование и удаление)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Обработка редактирования пользователя
    if (isset($_POST['action']) && $_POST['action'] == 'edit' && isset($_POST['edit_id'])) {
        // Получаем и очищаем данные из формы редактирования
        $id = intval($_POST['edit_id']);                          // ID пользователя (преобразуем в число)
        $name = $connect->real_escape_string($_POST['edit_name']);   // Имя
        $login = $connect->real_escape_string($_POST['edit_login']); // Логин
        $email = $connect->real_escape_string($_POST['edit_email']); // Email
        
        // Используем ПОДГОТОВЛЕННЫЙ ЗАПРОС для безопасности (защита от SQL-инъекций)
        if (!empty($_POST['edit_password'])) {
            // Если указан новый пароль - обновляем все поля
            $password = $connect->real_escape_string($_POST['edit_password']);
            $sql = "UPDATE `users` SET `name` = ?, `login` = ?, `email` = ?, `password` = ? WHERE `id_user` = ?";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("ssssi", $name, $login, $email, $password, $id);
        } else {
            // Если пароль не меняется - обновляем только основные поля
            $sql = "UPDATE `users` SET `name` = ?, `login` = ?, `email` = ? WHERE `id_user` = ?";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("sssi", $name, $login, $email, $id);
        }
        
        // Выполняем запрос и проверяем результат
        if ($stmt->execute()) {
            echo "<script>
                    alert('✅ Пользователь успешно обновлен!');
                    window.location.replace(window.location.pathname);
                  </script>";
        } else {
            echo "<script>alert('❌ Ошибка при обновлении: " . addslashes($stmt->error) . "');</script>";
        }
        $stmt->close();
    }
    
    // Обработка удаления пользователя
    if (isset($_POST['action']) && $_POST['action'] == 'delete' && isset($_POST['delete_id'])) {
        $id = intval($_POST['delete_id']); // ID пользователя для удаления
        
        // Подготовленный запрос для безопасного удаления
        $sql = "DELETE FROM `users` WHERE `id_user` = ?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            echo "<script>
                    alert('🗑️ Пользователь успешно удален!');
                    window.location.replace(window.location.pathname);
                  </script>";
        } else {
            echo "<script>alert('❌ Ошибка при удалении: " . addslashes($stmt->error) . "');</script>";
        }
        $stmt->close();
    }
}

// Получение списка пользователей с использованием ПОДГОТОВЛЕННОГО ЗАПРОСА
// Это более безопасный способ, чем прямое выполнение SQL-запроса
$sql = "SELECT `id_user`, `name`, `login`, `email` FROM `users` ORDER BY `id_user` DESC";
$stmt = $connect->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

// Создаем массив для хранения данных пользователей
$users = [];
if ($result && $result->num_rows > 0) {
    // Записываем все строки результата в массив $users
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
$stmt->close();

// Подключаем заголовок сайта
include 'header.php';
?>

    <!-- Основной контент страницы -->
    <section class="py-5" style="min-height: 80vh;">
        <div class="container">
            <!-- Заголовок страницы -->
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold text-success">
                    Панель управления
                </h1>
                <p class="lead text-muted">Управление зарегистрированными пользователями системы</p>
                <hr class="w-25 mx-auto">
            </div>
            
            <!-- Карточка со списком пользователей -->
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-success text-white py-3 rounded-top-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fs-4 fw-semibold">
                            Список пользователей
                        </h3>
                        <span class="badge bg-light text-success rounded-pill px-3 py-2">
                            Всего: <?php echo count($users); ?>
                        </span>
                    </div>
                </div>
                
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle mb-0">
                            <!-- Заголовок таблицы -->
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th scope="col" style="width: 5%">#ID</th>
                                    <th scope="col" style="width: 20%"><i class="fas fa-user me-2"></i>Имя</th>
                                    <th scope="col" style="width: 20%"><i class="fas fa-key me-2"></i>Логин</th>
                                    <th scope="col" style="width: 35%"><i class="fas fa-envelope me-2"></i>Email</th>
                                    <th scope="col" style="width: 20%"><i class="fas fa-cog me-2"></i>Действия</th>
                                </tr>
                            </thead>
                            
                            <!-- Тело таблицы - динамическое формирование строк -->
                            <tbody>
                                <?php if (!empty($users)): ?>
                                    <!-- Цикл foreach для вывода каждого пользователя в отдельную строку таблицы -->
                                    <?php foreach ($users as $user): ?>
                                        <tr class="text-center align-middle">
                                            <!-- ID пользователя -->
                                            <td class="fw-bold"><?php echo htmlspecialchars($user['id_user']); ?></td>
                                            
                                            <!-- Имя пользователя -->
                                            <td><?php echo htmlspecialchars($user['name']); ?></td>
                                            
                                            <!-- Логин пользователя -->
                                            <td><?php echo htmlspecialchars($user['login']); ?></td>
                                            
                                            <!-- Email пользователя -->
                                            <td>
                                                <a href="mailto:<?php echo htmlspecialchars($user['email']); ?>" class="text-decoration-none">
                                                    <i class="fas fa-envelope me-1"></i><?php echo htmlspecialchars($user['email']); ?>
                                                </a>
                                            </td>
                                            
                                            <!-- Колонка "Действия" с кнопками редактирования и удаления -->
                                            <td>
                                                <!-- Кнопка "Редактировать" (стиль btn-warning) -->
                                                <button type="button" 
                                                        class="btn btn-warning btn-sm action-btn edit-btn"
                                                        data-bs-toggle="tooltip"
                                                        title="Редактировать пользователя"
                                                        data-id="<?php echo $user['id_user']; ?>"
                                                        data-name="<?php echo htmlspecialchars($user['name']); ?>"
                                                        data-login="<?php echo htmlspecialchars($user['login']); ?>"
                                                        data-email="<?php echo htmlspecialchars($user['email']); ?>">
                                                                Редактировать
                                                </button>
                                                
                                                <!-- Кнопка "Удалить" (стиль btn-danger) -->
                                                <button type="button" 
                                                        class="btn btn-danger btn-sm action-btn delete-btn"
                                                        data-bs-toggle="tooltip"
                                                        title="Удалить пользователя"
                                                        data-id="<?php echo $user['id_user']; ?>"
                                                        data-name="<?php echo htmlspecialchars($user['name']); ?>">
                                                            Удалить
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <!-- Сообщение, если пользователей нет -->
                                    <tr>
                                        <td colspan="5" class="text-center py-5">
                                            
                                            <p class="text-muted mb-0">Пользователи пока не зарегистрированы</p>
                                            <a href="index.php" class="btn btn-success btn-sm mt-3">
                                                Добавить первого пользователя
                                            </a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Модальное окно для редактирования пользователя -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="editModalLabel">
                        <i class="fas fa-edit me-2"></i>Редактирование пользователя
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <!-- Скрытое поле для передачи ID пользователя -->
                        <input type="hidden" name="edit_id" id="edit_id">
                        <input type="hidden" name="action" value="edit">
                        
                        <!-- Поле для редактирования имени -->
                        <div class="mb-3">
                            <label for="edit_name" class="form-label fw-bold">
                                <i class="fas fa-user me-1 text-warning"></i>Имя
                            </label>
                            <input type="text" class="form-control rounded-pill" id="edit_name" name="edit_name" required>
                        </div>
                        
                        <!-- Поле для редактирования логина -->
                        <div class="mb-3">
                            <label for="edit_login" class="form-label fw-bold">
                                <i class="fas fa-key me-1 text-warning"></i>Логин
                            </label>
                            <input type="text" class="form-control rounded-pill" id="edit_login" name="edit_login" required>
                        </div>
                        
                        <!-- Поле для редактирования email -->
                        <div class="mb-3">
                            <label for="edit_email" class="form-label fw-bold">
                                <i class="fas fa-envelope me-1 text-warning"></i>Email
                            </label>
                            <input type="email" class="form-control rounded-pill" id="edit_email" name="edit_email" required>
                        </div>
                        
                        <!-- Поле для смены пароля (опционально) -->
                        <div class="mb-3">
                            <label for="edit_password" class="form-label fw-bold">
                                <i class="fas fa-lock me-1 text-warning"></i>Новый пароль
                            </label>
                            <input type="password" class="form-control rounded-pill" id="edit_password" name="edit_password" placeholder="Оставьте пустым, чтобы не менять">
                            <div class="form-text text-muted small mt-2">
                                <i class="fas fa-info-circle"></i> Укажите новый пароль только если хотите его изменить
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i>Отмена
                        </button>
                        <button type="submit" class="btn btn-warning rounded-pill">
                            <i class="fas fa-save me-1"></i>Сохранить изменения
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Модальное окно для подтверждения удаления -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">
                        <i class="fas fa-exclamation-triangle me-2"></i>Подтверждение удаления
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center py-4">
                    
                    <p class="lead mb-3">Вы уверены, что хотите удалить пользователя?</p>
                    <p class="fw-bold text-danger" id="deleteUserName"></p>
                    <p class="text-muted small">Пользователь будет удален безвозвратно!</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Отмена
                    </button>
                    <form action="" method="post" style="display: inline;">
                        <input type="hidden" name="delete_id" id="delete_id">
                        <input type="hidden" name="action" value="delete">
                        <button type="submit" class="btn btn-danger rounded-pill">
                            <i class="fas fa-trash-alt me-1"></i>Да, удалить
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript для обработки кнопок и модальных окон -->
    <script>
        // Ждем полной загрузки DOM-дерева
        document.addEventListener('DOMContentLoaded', function() {
            
            // === ОБРАБОТКА КНОПОК РЕДАКТИРОВАНИЯ ===
            // Находим все кнопки с классом edit-btn
            const editButtons = document.querySelectorAll('.edit-btn');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Получаем данные пользователя из атрибутов data-*
                    const id = this.dataset.id;
                    const name = this.dataset.name;
                    const login = this.dataset.login;
                    const email = this.dataset.email;
                    
                    // Заполняем поля в модальном окне
                    document.getElementById('edit_id').value = id;
                    document.getElementById('edit_name').value = name;
                    document.getElementById('edit_login').value = login;
                    document.getElementById('edit_email').value = email;
                    document.getElementById('edit_password').value = ''; // Очищаем поле пароля
                    
                    // Открываем модальное окно редактирования
                    new bootstrap.Modal(document.getElementById('editModal')).show();
                });
            });
            
            // Находим все кнопки с классом delete-btn
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Получаем ID и имя пользователя
                    const id = this.dataset.id;
                    const name = this.dataset.name;
                    
                    // Заполняем поля в модальном окне
                    document.getElementById('delete_id').value = id;
                    document.getElementById('deleteUserName').textContent = name;
                    
                    // Открываем модальное окно подтверждения удаления
                    new bootstrap.Modal(document.getElementById('deleteModal')).show();
                });
            });
            
            // Инициализация Bootstrap тултипов (подсказок при наведении)
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>

<?php
// Подключаем подвал сайта
include 'footer.php';

// Закрываем соединение с базой данных
$connect->close();
?>