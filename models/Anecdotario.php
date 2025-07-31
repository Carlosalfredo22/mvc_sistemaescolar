<?php
class Anecdotario {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Obtener todas las anécdotas
    public function getAll() {
        try {
            $stmt = $this->db->query("SELECT * FROM anecdote");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener anécdotas: " . $e->getMessage());
            return false;
        }
    }

    // Obtener una anécdota por ID
    public function getById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM anecdote WHERE anecdote_id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener anécdota con ID $id: " . $e->getMessage());
            return false;
        }
    }

    // Crear una nueva anécdota
    public function create($data) {
        try {
            $sql = "INSERT INTO anecdote (
                student_nie, student_name, faults, faults_date, created_at
            ) VALUES (
                :student_nie, :student_name, :faults, :faults_date, NOW()
            )";

            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                'student_nie' => $data['student_nie'],
                'student_name' => $data['student_name'],
                'faults' => $data['faults'],
                'faults_date' => $data['faults_date']
            ]);
        } catch (PDOException $e) {
            error_log("Error al crear anécdota: " . $e->getMessage());
            return false;
        }
    }

    // Actualizar una anécdota
    public function update($data) {
        try {
            $sql = "UPDATE anecdote SET 
                student_nie = :student_nie, student_name = :student_name, 
                faults = :faults, faults_date = :faults_date, updated_at = NOW()
                WHERE anecdote_id = :anecdote_id";

            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                'student_nie' => $data['student_nie'],
                'student_name' => $data['student_name'],
                'faults' => $data['faults'],
                'faults_date' => $data['faults_date'],
                'anecdote_id' => $data['id']
            ]);

        } catch (PDOException $e) {
            error_log("Error al actualizar anécdota con ID {$data['anecdote_id']}: " . $e->getMessage());
            return false;
        }
    }

    // Eliminar una anécdota
    public function delete($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM anecdote WHERE anecdote_id = :id");
            return $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            error_log("Error al eliminar anécdota con ID $id: " . $e->getMessage());
            return false;
        }
    }
}
?>
