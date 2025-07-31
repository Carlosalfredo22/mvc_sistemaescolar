<?php
class BookData {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // getByStudentId (mejor renombrar a getByStudentNIE)
    public function getByStudentNIE($student_nie) {
        $stmt = $this->db->prepare("SELECT number, book, folio, tomo FROM book_data WHERE student_nie = :student_nie");
        $stmt->execute(['student_nie' => $student_nie]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function create($student_nie, $data) {
        $stmt = $this->db->prepare("INSERT INTO book_data (student_nie, number, book, folio, tomo) VALUES (:student_nie, :number, :book, :folio, :tomo)");
        return $stmt->execute([
            'student_nie' => $student_nie,
            'number' => $data['number'],
            'book' => $data['book'],
            'folio' => $data['folio'],
            'tomo' => $data['tomo']
        ]);
    }

    public function update($student_nie, $data) {
        $stmt = $this->db->prepare("UPDATE book_data SET number = :number, book = :book, folio = :folio, tomo = :tomo WHERE student_nie = :student_nie");
        return $stmt->execute([
            'number' => $data['number'] ?? '',
            'book' => $data['book'] ?? '',
            'folio' => $data['folio'] ?? '',
            'tomo' => $data['tomo'] ?? '',
            'student_nie' => $student_nie
        ]);
    }



    public function delete($student_nie) {
        $stmt = $this->db->prepare("DELETE FROM book_data WHERE student_nie = :student_nie");
        return $stmt->execute(['student_nie' => $student_nie]);
    }
}
?>
