<?php
require_once 'models/Anecdotario.php';

class AnecdotarioController {
    private $model,$modelestudent;

    public function __construct($db) {
        $this->model = new Anecdotario($db);
        $this->modelestudent = new Estudiante($db);
    }

    // Mostrar todas las anécdotas
    public function index() {
        $anecdotas = $this->model->getAll();
        require 'views/admin/anecdotario/anecdotario.php';  // Vista para mostrar anécdotas
    }

    // Mostrar formulario de creación
    public function createForm() {
        $students = $this->modelestudent->getAll();
        require 'views/admin/anecdotario/create_anecdotario.php';  // Vista para crear anécdota
    }

    // Crear una anécdota nueva
    public function create() {
        // var_dump($_POST);
        // exit;
        $data = $_POST;
        $this->model->create($data);
        header('Location: index.php?action=anecdotario');
    }

    // Mostrar formulario de edición
    public function editForm($id) {
        $students = $this->modelestudent->getAll();
        $anecdota = $this->model->getById($id);
        require 'views/admin/anecdotario/edit_anecdotario.php';  // Vista para editar anécdota
    }

    // Actualizar una anécdota
    public function update() {
        $data = $_POST;
        $data['id'] = $_POST['id'];

        $this->model->update($data);
        header('Location: index.php?action=anecdotario');
    }

    // Eliminar una anécdota
    public function delete($id) {
        $this->model->delete($id);
        header('Location: index.php?action=anecdotario');
    }
}
?>
