<?php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Get user by username (for login)
    public function getUserByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get all teachers
    public function getAllTeachers() {
        $stmt = $this->db->query("SELECT * FROM users WHERE role = 'teacher'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add a new teacher
    public function addTeacher($username, $password) {
        $stmt = $this->db->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, 'teacher')");
        return $stmt->execute([
            'username' => $username,
            'password' => hash('sha256', $password)
        ]);
    }

    // Delete a teacher
    public function deleteTeacher($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    // Get user by ID (for editing)
    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update teacher details (username and optionally password)
    public function updateTeacher($id, $username, $password = null) {
        if ($password) {
            $stmt = $this->db->prepare("UPDATE users SET username = :username, password = :password WHERE id = :id");
            return $stmt->execute(['username' => $username, 'password' => $password, 'id' => $id]);
        } else {
            $stmt = $this->db->prepare("UPDATE users SET username = :username WHERE id = :id");
            return $stmt->execute(['username' => $username, 'id' => $id]);
        }
    }
}
?>
