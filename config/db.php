<?php
class Database {
    // بيانات الاتصال بـ Aiven (غيرها إلى بياناتك الصحيحة)
    private $host = 'mysql-29339c36-saednyapp.g.aivencloud.com';
    private $port = '23533';
    private $db_name = 'saedny_db';
    private $username = 'avnadmin';  // غيرها إلى اسم المستخدم من Aiven
    private $password = '';  // غيرها إلى كلمة السر الحقيقية
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            // إضافة المنفذ (port) إلى الاتصال
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name . ";charset=utf8mb4",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
                ]
            );
        } catch(PDOException $exception) {
            echo json_encode([
                'success' => false,
                'message' => 'فشل الاتصال بقاعدة البيانات: ' . $exception->getMessage()
            ]);
            exit;
        }

        return $this->conn;
    }
}
?>