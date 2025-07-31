<?php
class Parents {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getByStudentNIE($student_nie) {
        $stmt = $this->db->prepare("SELECT parent_type, name, workplace, phone, dui, marital_status FROM parents WHERE student_nie = :student_nie");
        $stmt->execute(['student_nie' => $student_nie]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($student_nie, $motherData, $fatherData) {
        $stmt = $this->db->prepare("INSERT INTO parents (student_nie, parent_type, name, workplace, phone, dui, marital_status) VALUES 
            (:student_nie, 'mother', :mother_name, :mother_workplace, :mother_phone, :mother_dui, :mother_marital_status),
            (:student_nie, 'father', :father_name, :father_workplace, :father_phone, :father_dui, :father_marital_status)
        ");
        return $stmt->execute([
            'student_nie' => $student_nie,
            'mother_name' => $motherData['name'],
            'mother_workplace' => $motherData['workplace'],
            'mother_phone' => $motherData['phone'],
            'mother_dui' => $motherData['dui'],
            'mother_marital_status' => $motherData['marital_status'],
            'father_name' => $fatherData['name'],
            'father_workplace' => $fatherData['workplace'],
            'father_phone' => $fatherData['phone'],
            'father_dui' => $fatherData['dui'],
            'father_marital_status' => $fatherData['marital_status']
        ]);
    }


    public function update($student_nie, $motherData, $fatherData) {
        $stmt = $this->db->prepare("UPDATE parents SET name = :name, workplace = :workplace, phone = :phone, dui = :dui, marital_status = :marital_status WHERE student_nie = :student_nie AND parent_type = :parent_type");

        $result1 = $stmt->execute([
            'name' => $motherData['name'],
            'workplace' => $motherData['workplace'],
            'phone' => $motherData['phone'],
            'dui' => $motherData['dui'],
            'marital_status' => $motherData['marital_status'],
            'student_nie' => $student_nie,
            'parent_type' => 'mother'
        ]);

        $result2 = $stmt->execute([
            'name' => $fatherData['name'],
            'workplace' => $fatherData['workplace'],
            'phone' => $fatherData['phone'],
            'dui' => $fatherData['dui'],
            'marital_status' => $fatherData['marital_status'],
            'student_nie' => $student_nie,
            'parent_type' => 'father'
        ]);

        return $result1 && $result2;
    }

    public function delete($student_nie) {
        $stmt = $this->db->prepare("DELETE FROM parents WHERE student_nie = :student_nie");
        return $stmt->execute(['student_nie' => $student_nie]);
    }

}
?>
