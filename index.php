<?php
require 'config.php';
require 'models/User.php';
require 'controllers/UserController.php';
require_once 'controllers/EstudianteController.php';  // Incluir el controlador de Estudiante
require_once 'controllers/PagoController.php';
require_once 'controllers/AnecdotarioController.php';
require_once 'controllers/medical_dataController.php';

session_start();  // Inicializar la sesión

$userModel = new User($db);  // Instanciar el modelo de usuario
$userController = new UserController($userModel);
$estudianteController = new EstudianteController($db);  // Instanciar el controlador de Estudiante
$pagoController = new PagoController($db);// Instanciar el controlador de pago

$anecdotarioController = new AnecdotarioController($db);
$medicaldataController = new MedicalDataController($db);

// Si no hay sesión activa, mostrar el login
if (!isset($_SESSION['user'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
        $userController->login($_POST['username'], $_POST['password']);
    } else {
        include 'views/login.php';
    }
} else {
    // Usuario autenticado
    $role = $_SESSION['user']['role'];
    $action = $_GET['action'] ?? null;
    // Rutas para el administrador
    if ($role === 'admin') {
        switch ($action) {
            case 'logout':
                $userController->logout();
                exit(); // Detener la ejecución después del logout

            case 'adminDashboard':
                $userController->adminDashboard();
                break;

            case 'addTeacherForm':
                include 'views/admin/registrarprofesor/add_teacher.php';
                break;

            case 'addTeacher':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $userController->addTeacher($_POST['username'], $_POST['password']);
                }
                break;

            case 'deleteTeacher':
                if (isset($_GET['id'])) {
                    $userController->deleteTeacher($_GET['id']);
                }
                break;

            case 'editTeacherForm':
                include 'views/admin/registrarprofesor/edit_teacher.php';
                if (isset($_GET['id'])) {
                    $userController->editTeacherForm($_GET['id']);
                }
                break;

            case 'updateTeacher':
                if (isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
                    $userController->updateTeacher($_GET['id'], $_POST['username'], $_POST['password']);
                }
                break;

            case 'registroadminteacher':
                $teachers = $userModel->getAllTeachers(); // Obtener todos los docentes
                include 'views/admin/registrarprofesor/registroadminteacher.php';
                break;

            case 'expedient_alumnos':
                // Manejo de subacciones relacionadas con expedientes de alumnos
                $subaction = $_GET['subaction'] ?? null;
                switch ($subaction) {
                    case 'createexpedient':
                        include 'views/admin/estudiantes/createexpedient.php';  // Vista para crear un expediente
                        break;
                    case 'create':
                        $estudianteController->create();
                        break;

                    case 'editeexpedient':
                            $estudianteController->editForm($_GET['id'] ?? null); // Mostrar formulario de edición
                        break;
                    case 'update':
                            $estudianteController->update();
                        break;
                    case 'deleteexpedient':
                        $estudianteController->delete($_GET['id']);
                        break;

                    default:
                        $estudianteController->index();  // Mostrar lista de expedientes
                        break;
                }
                break;

                case 'pagos':
                    // Manejo de subacciones relacionadas con pagos
                    $subaction = $_GET['subaction'] ?? null;
                    switch ($subaction) {
                        case 'createpagos':
                            // include 'views/admin/pagos/createpagos.php';
                            $pagoController->createForm();
                            break;
                        case 'create':
                            $pagoController->create();
                            break;
                        case 'editpago':
                            $pagoController->editForm($_GET['id'] ?? null); // Mostrar formulario de edición
                            break;
                        case 'update':
                            $pagoController->update();
                            break;
                        case 'deletepago':
                                $pagoController->delete($_GET['id']);
                            break;
                        default:
                            $pagoController->index();  // Mostrar lista de pagos
                            break;
                    }
                break;

            case 'anecdotario':
                $subaction = $_GET['subaction'] ?? null;
                switch ($subaction) {

                    case 'create_anecdotario':
                        // Show the form to create a new anecdote
                        $anecdotarioController->createForm();
                    break;

                    case 'create':
                        $anecdotarioController->create();
                     break;

                    case 'edit_anecdotario':
                        $anecdotarioController->editForm($_GET['id'] ?? null); // Mostrar formulario de edición
                    break;

                    case 'update':
                        $anecdotarioController->update();
                    break;

                    case 'deleteanecdotario':
                        $anecdotarioController->delete($_GET['id']);
                    break;

                    default:
                    $anecdotarioController->index(); //Mostrar lista de anecdotario
                    break;
                }
            break;

            default:
                $userController->adminDashboard();
                break;
        }
    }

    // Rutas para el docente
    elseif ($role === 'teacher') {
        switch ($action) {
            case 'logout':
                $userController->logout();
                exit(); // Detener la ejecución después del logout

                case 'expedient_alumnos':
                    // Manejo de subacciones relacionadas con expedientes de alumnos
                    $subaction = $_GET['subaction'] ?? null;
                    switch ($subaction) {
                        case 'createexpedient':
                            include 'views/admin/estudiantes/createexpedient.php';  // Vista para crear un expediente
                            break;
                        case 'create':
                            $estudianteController->create();
                            break;

                        case 'editeexpedient':
                                $estudianteController->editForm($_GET['id'] ?? null); // Mostrar formulario de edición
                            break;
                        case 'update':
                                $estudianteController->update();
                            break;
                        case 'deleteexpedient':
                            $estudianteController->delete($_GET['id']);
                            break;

                        default:
                            $estudianteController->index();  // Mostrar lista de expedientes
                            break;
                    }
                    break;

                    case 'anecdotario':
                        $subaction = $_GET['subaction'] ?? null;
                        switch ($subaction) {

                            case 'create_anecdotario':
                                // Show the form to create a new anecdote
                                $anecdotarioController->createForm();
                            break;

                            case 'create':
                                $anecdotarioController->create();
                             break;

                            case 'edit_anecdotario':
                                $anecdotarioController->editForm($_GET['id'] ?? null); // Mostrar formulario de edición
                            break;

                            case 'update':
                                $anecdotarioController->update();
                            break;

                            case 'deleteanecdotario':
                                $anecdotarioController->delete($_GET['id']);
                            break;

                            default:
                            $anecdotarioController->index(); //Mostrar lista de anecdotario
                            break;
                        }
                    break;

               case 'medicaldata':
                $subaction = $_GET['subaction'] ?? null;
                switch ($subaction) {
                    case 'createForm':
                        $medicaldataController->createForm();
                        break;

                    case 'create':
                        $medicaldataController->create();
                        break;

                    case 'editForm':
                        $medicaldataController->editForm($_GET['id'] ?? null);
                        break;

                    case 'update':
                        $medicaldataController->update();
                        break;

                    case 'deleteMedical':
                        $medicaldataController->delete($_GET['id'] ?? null);
                        break;

                    default:
                        $medicaldataController->index(); // Mostrar lista
                        break;
                }
                break;

            default:
                include 'views/profesor/profile.php';
                break;
        }
    }
}
?>