<?php
class Documents {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getByStudentNIE($student_nie) {
        $stmt = $this->db->prepare("SELECT photo, previous_grade_certificate, behavior_certificate, guardian_dui_copy, financial_regulations, other FROM documents WHERE student_nie = :student_nie");
        $stmt->execute(['student_nie' => $student_nie]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($student_nie, $data) {
        $stmt = $this->db->prepare("INSERT INTO documents (student_nie, photo, previous_grade_certificate, behavior_certificate, guardian_dui_copy, financial_regulations, other) VALUES (:student_nie, :photo, :previous_grade_certificate, :behavior_certificate, :guardian_dui_copy, :financial_regulations, :other)");
        return $stmt->execute([
            'student_nie' => $student_nie,
            'photo' => $data['photo'] ?? '',
            'previous_grade_certificate' => $data['previous_grade_certificate'] ?? '',
            'behavior_certificate' => $data['behavior_certificate'] ?? '',
            'guardian_dui_copy' => $data['guardian_dui_copy'] ?? '',
            'financial_regulations' => $data['financial_regulations'] ?? '',
            'other' => $data['other'] ?? null
        ]);
    }

    public function update($student_nie, $data) {
        echo "<h3>Contenido recibido en update documents:</h3>";
        echo "<pre>";
        var_dump($data);
        echo "</pre>";

        $stmt = $this->db->prepare("UPDATE documents SET photo = :photo, previous_grade_certificate = :previous_grade_certificate, behavior_certificate = :behavior_certificate, guardian_dui_copy = :guardian_dui_copy, financial_regulations = :financial_regulations, other = :other WHERE student_nie = :student_nie");

        $result = $stmt->execute([
            'photo' => $data['photo'] ?? '',
            'previous_grade_certificate' => $data['previous_grade_certificate'] ?? '',
            'behavior_certificate' => $data['behavior_certificate'] ?? '',
            'guardian_dui_copy' => $data['guardian_dui_copy'] ?? '',
            'financial_regulations' => $data['financial_regulations'] ?? '',
            'other' => $data['other_documents'] ?? null,  // <- CORRECTO
            'student_nie' => $student_nie
        ]);

        echo "<h3>Resultado de la ejecución:</h3>";
        var_dump($result);

        // exit();

        return $result;
    }



    public function delete($student_nie) {
        $stmt = $this->db->prepare("DELETE FROM documents WHERE student_nie = :student_nie");
        return $stmt->execute(['student_nie' => $student_nie]);
    }

}
?>
