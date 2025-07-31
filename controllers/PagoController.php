<?php
require_once 'models/Pago.php';

class PagoController {
    private $model,$modelestudent;

    public function __construct($db) {
        $this->model = new Pago($db);
        $this->modelestudent = new Estudiante($db);
    }

    // Mostrar todos los pagos
    public function index() {
        $pagos = $this->model->getAll();
        // var_dump($pagos);
        // exit;
        require 'views/admin/pagos/pagos.php'; // Vista para mostrar los pagos
    }

    // Mostrar formulario de creación de pago
    public function createForm() {
        $students = $this->modelestudent->getAll();
        require 'views/admin/pagos/createpagos.php'; // Vista para crear pago
    }

    // Crear un nuevo pago
    public function create() {
        // var_dump($_POST); // Verifica que los datos llegan
        // exit;
        // print_r($_POST);
        // exit;
        $data = $_POST;
         $this->model->create($data);
        //  $result =
        // if ($result["error"]) {
        //     echo($result["error"]);
        //     exit;
        // }
        header('Location: index.php?action=pagos'); // Redirigir a la lista de pagos
    }

    // Mostrar formulario de edición de pago
    public function editForm($id) {
        $students = $this->modelestudent->getAll();
        $pago = $this->model->getById($id);
        require 'views/admin/pagos/editpago.php'; // Vista para editar pago
    }

    // Actualizar un pago
    public function update() {

        $data = $_POST;
        // var_dump($_POST);
        // exit;
        $data['id'] = $_POST['id']; // Asegurar que el ID está presente

        $this->model->update($data);
        header('Location: index.php?action=pagos'); // Redirigir a la lista de pagos
    }

    // Eliminar un pago
    public function delete($id) {
        $this->model->delete($id);
        header('Location: index.php?action=pagos'); // Redirigir a la lista de pagos
    }
}
?>
