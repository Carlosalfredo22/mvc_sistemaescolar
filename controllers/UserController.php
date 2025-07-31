<?php
class UserController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    // Login function
    public function login($username, $password) {
        $user = $this->userModel->getUserByUsername($username);

        if ($user && hash('sha256', $password) === $user['password']) {
            $_SESSION['user'] = $user;
            header('Location: index.php');
        } else {
                   // Asignar mensaje de error
            $error_message = "Invalid credentials. Please try again.";

            // Incluir la vista del login con el mensaje de error
            include 'views/login.php';
        }
    }

    public function logout() {
        session_start();  // Aquí es la única vez que se debe llamar a session_start()
        session_unset();  // Elimina todas las variables de sesión
        session_destroy();  // Destruye la sesión

        header('Location: index.php');  // Redirige a la página de login o inicio
        exit();  // Detiene la ejecución para evitar que el código se siga ejecutando
    }

    // Admin Dashboard
    public function adminDashboard() {
        $teachers = $this->userModel->getAllTeachers();
        include 'views/admin/menuadmin.php';
    }

    // Show add teacher form
    public function addTeacherForm() {
        include 'views/admin/add_teacher.php';
    }

    // Add new teacher
    public function addTeacher($username, $password) {
        if ($this->userModel->addTeacher($username, $password)) {
            header('Location: index.php?action=adminDashboard');
        } else {
            echo "Error adding teacher";
        }
    }

    // Delete teacher
    public function deleteTeacher($id) {
        if ($this->userModel->deleteTeacher($id)) {
            header('Location: index.php?action=adminDashboard');
        } else {
            echo "Error deleting teacher";
        }
    }

    // Show edit teacher form
    public function editTeacherForm($id) { //Error no edita edita profesor...
        $teacher = $this->userModel->getUserById($id);
        include 'views/admin/edit_teacher.php';
    }

    // Update teacher details
    public function updateTeacher($id, $username, $password) {
        if (!empty($password)) {
            $password = hash('sha256', $password);
        }
        $this->userModel->updateTeacher($id, $username, $password);
        header('Location: index.php?action=adminDashboard');
    }
}
?>
