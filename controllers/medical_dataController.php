<?php
require_once 'models/Medical.php';
require_once 'models/Estudiante.php'; // Asegúrate que este archivo existe y es correcto

class MedicalDataController {
    private $model;
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
        $this->model = new Medical($db);
    }

    // Mostrar todos los registros médicos
    public function index() {
        $medicalData = $this->model->getAll();
        require 'views/admin/datosmedicos/medicaldata.php';
    }

    // Mostrar formulario de creación de registro médico
    public function createForm() {
        $studentModel = new Estudiante($this->db);
        $students = $studentModel->getAll();
        require_once __DIR__ . '/../views/admin/datosmedicos/createmedicaldata.php';
    }

    // Crear un nuevo registro médico
    public function create() {
        $data = $_POST;
        $result = $this->model->create($data);
        if (isset($result['error'])) {
            // Manejo de error, por ejemplo:
            echo $result['error'];
            exit;
        }
        header('Location: index.php?action=medicaldata');
        exit;
    }

    // Mostrar formulario de edición de registro médico
    public function editForm($id) {
        $medicalRecord = $this->model->getById($id);
        if (isset($medicalRecord['error'])) {
            echo $medicalRecord['error'];
            exit;
        }
        $studentModel = new Estudiante($this->db);
        $students = $studentModel->getAll();
        require 'views/admin/datosmedicos/editmedicaldata.php';
    }

    // Actualizar un registro médico
    public function update() {
        $data = $_POST;
        $result = $this->model->update($data);
        if (isset($result['error'])) {
            echo $result['error'];
            exit;
        }
        header('Location: index.php?action=medicaldata');
        exit;
    }

    // Eliminar un registro médico
    public function delete($id) {
        $result = $this->model->delete($id);
        if (isset($result['error'])) {
            echo $result['error'];
            exit;
        }
        header('Location: index.php?action=medicaldata');
        exit;
    }
}
?>
