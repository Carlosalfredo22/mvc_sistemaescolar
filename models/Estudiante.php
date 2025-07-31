<?php
require_once 'BookData.php';
require_once 'Documents.php';
require_once 'Parents.php';

class Estudiante {
    private $db;
    private $bookDataModel;
    private $documentsModel;
    private $parentsModel;

    public function __construct(PDO $db) {
        $this->db = $db;
        // Instancia los modelos relacionados
        $this->bookDataModel = new BookData($db);
        $this->documentsModel = new Documents($db);
        $this->parentsModel = new Parents($db);
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM students");
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($students as &$student) {
            $student['book_data'] = $this->bookDataModel->getByStudentNIE($student['student_nie']);
            $student['documents'] = $this->documentsModel->getByStudentNIE($student['student_nie']);

            //  var_dump($student['documents']); // <-- aquí para ver qué trae documentos

            $parents = $this->parentsModel->getByStudentNIE($student['student_nie']);
            $student['parents'] = ['mother' => null, 'father' => null];
            foreach ($parents as $parent) {
                $student['parents'][$parent['parent_type']] = $parent;
            }
        }

        return $students;
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM students WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $student = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$student) return null;

        // Obtener datos relacionados usando student_nie
        $student['book_data'] = $this->bookDataModel->getByStudentNIE($student['student_nie']);
        $student['documents'] = $this->documentsModel->getByStudentNIE($student['student_nie']);

        $parents = $this->parentsModel->getByStudentNIE($student['student_nie']);
        $student['parents'] = ['mother' => null, 'father' => null];
        foreach ($parents as $parent) {
            $student['parents'][$parent['parent_type']] = $parent;
        }

        return $student;
    }

    public function create(array $data) {
        try {
            $this->db->beginTransaction();

            // Insertar estudiante
            $sql = "INSERT INTO students (student_nie, first_name, last_name, address, age, grade, phone, living_with, date_of_birth, place_of_birth, photo_img, created_at) 
                    VALUES (:student_nie, :first_name, :last_name, :address, :age, :grade, :phone, :living_with, :date_of_birth, :place_of_birth, :photo_img, NOW())";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                'student_nie' => $data['student_nie'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'address' => $data['address'],
                'age' => $data['age'],
                'grade' => $data['grade'],
                'phone' => $data['phone'],
                'living_with' => $data['living_with'],
                'date_of_birth' => $data['date_of_birth'],
                'place_of_birth' => $data['place_of_birth'],
                'photo_img' => $data['photo_img'] ?? null
            ]);
            $student_id = $this->db->lastInsertId();

            // Insertar datos relacionados usando el id para bookData y documents
            $this->bookDataModel->create($data['student_nie'], $data);
            $this->documentsModel->create($data['student_nie'], $data);

            // Para padres, usar student_nie, porque esa tabla relaciona por student_nie
            $motherData = [
                'name' => $data['mother_name'],
                'workplace' => $data['mother_workplace'],
                'phone' => $data['mother_phone'],
                'dui' => $data['mother_dui'],
                'marital_status' => $data['mother_marital_status']
            ];
            $fatherData = [
                'name' => $data['father_name'],
                'workplace' => $data['father_workplace'],
                'phone' => $data['father_phone'],
                'dui' => $data['father_dui'],
                'marital_status' => $data['father_marital_status']
            ];
            $this->parentsModel->create($data['student_nie'], $motherData, $fatherData);

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            echo($e->getMessage());
            throw $e;
        }
    }

    public function update(array $data) {
        try {
            $this->db->beginTransaction();

            $sql = "UPDATE students SET student_nie = :student_nie, first_name = :first_name, last_name = :last_name, address = :address, age = :age, 
                    grade = :grade, phone = :phone, living_with = :living_with, date_of_birth = :date_of_birth, place_of_birth = :place_of_birth, photo_img = :photo_img, updated_at = NOW()
                    WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                'student_nie' => $data['student_nie'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'address' => $data['address'],
                'age' => $data['age'],
                'grade' => $data['grade'],
                'phone' => $data['phone'],
                'living_with' => $data['living_with'],
                'date_of_birth' => $data['date_of_birth'],
                'place_of_birth' => $data['place_of_birth'],
                'photo_img' => $data['photo_img'],
                'id' => $data['id']
            ]);

            $student_id = $data['id'];

            // Actualizar datos relacionados con id para bookData y documents
            $this->bookDataModel->update($data['student_nie'], $data);
            $this->documentsModel->update($data['student_nie'], $data);

            // Para padres usar student_nie
            $motherData = [
                'name' => $data['mother_name'],
                'workplace' => $data['mother_workplace'],
                'phone' => $data['mother_phone'],
                'dui' => $data['mother_dui'],
                'marital_status' => $data['mother_marital_status']
            ];
            $fatherData = [
                'name' => $data['father_name'],
                'workplace' => $data['father_workplace'],
                'phone' => $data['father_phone'],
                'dui' => $data['father_dui'],
                'marital_status' => $data['father_marital_status']
            ];
            $this->parentsModel->update($data['student_nie'], $motherData, $fatherData);

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    public function delete($id) {
        try {
            $this->db->beginTransaction();

            // Obtener student_nie para borrar padres
            $stmt = $this->db->prepare("SELECT student_nie FROM students WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $student_nie = $stmt->fetchColumn();

            // Borrar datos relacionados
            $this->bookDataModel->delete($student_nie);
            $this->documentsModel->delete($student_nie);
            $this->parentsModel->delete($student_nie); // Aquí se usa student_nie para borrar padres

            // Borrar estudiante
            $stmt = $this->db->prepare("DELETE FROM students WHERE id = :id");
            $stmt->execute(['id' => $id]);

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
}
