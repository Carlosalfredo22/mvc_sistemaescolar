<?php
class Medical {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Obtener todos los registros médicos
    public function getAll() {
        try {
            $stmt = $this->db->query("SELECT * FROM medical_data");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return ['error' => "Error al obtener los datos médicos: " . $e->getMessage()];
        }
    }

    // Obtener un registro médico por ID
    public function getById($id) {
        if (!is_numeric($id)) {
            return ['error' => "ID inválido"];
        }
        try {
            $stmt = $this->db->prepare("SELECT * FROM medical_data WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: ['error' => "Registro médico no encontrado"];
        } catch (PDOException $e) {
            return ['error' => "Error al obtener el registro médico: " . $e->getMessage()];
        }
    }

    // Crear un nuevo registro médico
    public function create($data) {
        try {
            $sql = "INSERT INTO medical_data (
                student_nie, disease, medication, allergy, created_at
            ) VALUES (
                :student_nie, :disease, :medication, :allergy, NOW()
            )";

            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                ':student_nie' => $data['student_nie'],
                ':disease' => $data['disease'],
                ':medication' => $data['medication'],
                ':allergy' => $data['allergy']
            ]);
        } catch (PDOException $e) {
            return ['error' => "Error al crear el registro médico: " . $e->getMessage()];
        }
    }

    // Actualizar un registro médico
    public function update($data) {
        try {
            if (empty($data['id']) || !is_numeric($data['id'])) {
                throw new Exception('ID inválido.');
            }

            $sql = "UPDATE medical_data SET 
                student_nie = :student_nie, disease = :disease, 
                medication = :medication, allergy = :allergy, updated_at = NOW()
                WHERE id = :id";

            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                ':student_nie' => $data['student_nie'],
                ':disease' => $data['disease'],
                ':medication' => $data['medication'],
                ':allergy' => $data['allergy'],
                ':id' => $data['id']
            ]);
        } catch (Exception $e) {
            return ['error' => "Error al actualizar el registro médico: " . $e->getMessage()];
        }
    }

    // Eliminar un registro médico
    public function delete($id) {
        if (!is_numeric($id)) {
            return ['error' => "ID inválido"];
        }
        try {
            $stmt = $this->db->prepare("DELETE FROM medical_data WHERE id = :id");
            return $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            return ['error' => "Error al eliminar el registro médico: " . $e->getMessage()];
        }
    }
}
?>
