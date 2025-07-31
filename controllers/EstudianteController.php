<?php
require_once 'models/Estudiante.php';

class EstudianteController {
    private $model;

    public function __construct(PDO $db) {
        $this->model = new Estudiante($db);
    }

    public function index() {
        $students = $this->model->getAll();
        require 'views/admin/estudiantes/expedient_alumnos.php';
    }

    public function createForm() {
        require 'views/admin/estudiantes/createexpedient.php';
    }

    public function create() {
        try {
            // Aquí asumes que todos los datos vienen en $_POST
            $data = $_POST;

            // Manejo de imagen (simplificado, ajustar según tu código)
            $imagenNombre = null;
            if (!empty($_FILES['photo_img']['name'])) {
                $imagenNombre = time() . '_' . basename($_FILES['photo_img']['name']);
                $rutaDestino = 'uploads/' . $imagenNombre;

                if (!file_exists('uploads')) {
                    mkdir('uploads', 0777, true);
                }

                if (!move_uploaded_file($_FILES['photo_img']['tmp_name'], $rutaDestino)) {
                    throw new Exception("Error al mover la imagen.");
                }
            }

            $data['photo_img'] = $imagenNombre;
            $this->model->create($data);

            header('Location: index.php?action=expedient_alumnos');
            // exit(); 
        } catch (Exception $e) {
            echo "Error al crear expediente: " . $e->getMessage();
        }
    }

    public function editForm($id) {
        $student = $this->model->getById($id);
        require 'views/admin/estudiantes/editexpedient.php';
    }

    public function update() {
        try {
            $data = $_POST;
            $id = $_POST['id'];

            // Obtener datos del estudiante actual para gestionar imagen
            $studentActual = $this->model->getById($id);
            $imagenActual = $studentActual['photo_img'] ?? null;
            $imagenNueva = $imagenActual;

            if (!empty($_FILES['photo_img']['name'])) {
                if ($imagenActual && file_exists('uploads/' . $imagenActual)) {
                    unlink('uploads/' . $imagenActual);
                }

                $imagenNueva = time() . '_' . basename($_FILES['photo_img']['name']);
                $rutaDestino = 'uploads/' . $imagenNueva;

                if (!file_exists('uploads')) {
                    mkdir('uploads', 0777, true);
                }

                if (!move_uploaded_file($_FILES['photo_img']['tmp_name'], $rutaDestino)) {
                    throw new Exception("Error al mover la nueva imagen.");
                }
            }

            $data['photo_img'] = $imagenNueva;
            $this->model->update($data);

            header('Location: index.php?action=expedient_alumnos');
            exit();
        } catch (Exception $e) {
            echo "Error al actualizar expediente: " . $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            // Obtener el estudiante para conocer su imagen
            $student = $this->model->getById($id);

            if ($student && !empty($student['photo_img'])) {
                $imagePath = 'uploads/' . $student['photo_img'];
                if (file_exists($imagePath)) {
                    unlink($imagePath);  // Borra la imagen física
                }
            }

            // Ahora borrar el registro de la base de datos
            $this->model->delete($id);

            header('Location: index.php?action=expedient_alumnos');
            exit();
        } catch (Exception $e) {
            echo "Error al eliminar expediente: " . $e->getMessage();
        }
    }
}
?>
