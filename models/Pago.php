<?php
class Pago {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Obtener todos los pagos
    public function getAll() {
        try {
            $stmt = $this->db->query("SELECT * FROM payments");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return ['error' => "Error al obtener pagos: " . $e->getMessage()];
        }
    }

    // Obtener un pago por ID
    public function getById($id) {
        if (!is_numeric($id)) {
            return ['error' => "ID inválido"];
        }

        try {
            $stmt = $this->db->prepare("SELECT * FROM payments WHERE payment_id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: ['error' => "Pago no encontrado"];
        } catch (PDOException $e) {
            return ['error' => "Error al obtener pago: " . $e->getMessage()];
        }
    }

    public function create($data) {
        try {
            $sql = "INSERT INTO payments (
                student_nie, student_name, manual, card, virtual_classroom, tuition, 
                january, february, march, april, may, june, july, august, september, 
                october, november, december, created_at
            ) VALUES (
                :student_nie, :student_name, :manual, :card, :virtual_classroom, :tuition, 
                :january, :february, :march, :april, :may, :june, :july, :august, :september, 
                :october, :november, :december, NOW()
            )";
    
            // Prepara y ejecuta la consulta
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':student_nie' => $data['student_nie'],
                ':student_name' => $data['student_name'],
                ':manual' => $data['manual'],
                ':card' => $data['card']??0,
                ':virtual_classroom' => $data['virtual_classroom'],
                ':tuition' => $data['tuition'],
                ':january' => $data['january'] ??0,
                ':february' => $data['february']??0,
                ':march' => $data['march']??0,
                ':april' => $data['april']??0,
                ':may' => $data['may']??0,
                ':june' => $data['june']??0,
                ':july' => $data['july']??0,
                ':august' => $data['august']??0,
                ':september' => $data['september']??0,
                ':october' => $data['october']??0,
                ':november' => $data['november']??0,
                ':december' => $data['december']??0
            ]);
            return ['success' => 'Pago creado exitosamente.'];
        } catch (PDOException $e) {
            return ['error' => "Error al crear pago: " . $e->getMessage()];
        }
    }

    // Actualizar un pago
    public function update($data) {
        try {
            if (empty($data['id']) || !is_numeric($data['id'])) {
                throw new Exception('ID inválido.');
            }

            $sql = "UPDATE payments SET 
                student_nie = :student_nie, student_name = :student_name, manual = :manual, 
                card = :card, virtual_classroom = :virtual_classroom, tuition = :tuition, 
                january = :january, february = :february, march = :march, april = :april, 
                may = :may, june = :june, july = :july, august = :august, september = :september, 
                october = :october, november = :november, december = :december, updated_at = NOW() 
                WHERE payment_id = :payment_id";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':student_nie' => $data['student_nie'],
                ':student_name' => $data['student_name'],
                ':manual' => $data['manual'],
                ':card' => $data['card']??0,
                ':virtual_classroom' => $data['virtual_classroom'],
                ':tuition' => $data['tuition'],
                ':january' => $data['january'] ??0,
                ':february' => $data['february']??0,
                ':march' => $data['march']??0,
                ':april' => $data['april']??0,
                ':may' => $data['may']??0,
                ':june' => $data['june']??0,
                ':july' => $data['july']??0,
                ':august' => $data['august']??0,
                ':september' => $data['september']??0,
                ':october' => $data['october']??0,
                ':november' => $data['november']??0,
                ':december' => $data['december']??0,
                ':payment_id' => $data['id']
            ]);
            return ['success' => 'Pago actualizado exitosamente.'];
        } catch (Exception $e) {
            echo($e->getMessage());
            exit;
            return ['error' => "Error al actualizar pago: " . $e->getMessage()];
        }
    }

    // Eliminar un pago
    public function delete($id) {
        if (!is_numeric($id)) {
            return ['error' => "ID inválido"];
        }

        try {
            $stmt = $this->db->prepare("DELETE FROM payments WHERE payment_id = :id");
            $stmt->execute(['id' => $id]);
            return ['success' => 'Pago eliminado exitosamente.'];
        } catch (PDOException $e) {
            return ['error' => "Error al eliminar pago: " . $e->getMessage()];
        }
    }
}
?>
