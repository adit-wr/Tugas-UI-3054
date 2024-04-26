<?php
require_once 'config.php';

class Librarian {
    static function select(){
        global $conn;
        $sql = "SELECT * FROM librarian";
        $result = $conn->query($sql);
        $arr = array();

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                foreach ($row as $key => $value) {
                    $arr[$key][] = $value;
                }
            }
        }
        return $arr;
    }
    static function insert( $Phone, $Name) {
        global $conn;
        $sql = "INSERT INTO librarian(Phone, Name) VALUES (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $Phone, $Name);
        $stmt->execute();
    }
    static function update($id, $newPhone, $newName) {
        global $conn;
        $sql = "UPDATE librarian SET Phone = ?, Name = ? WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssi', $newPhone, $newName, $id);
        $stmt->execute();
    }
    static function delete($id) {
        global $conn;
        $sql = "DELETE FROM librarian WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $id);
        $stmt->execute();
    }
    static function selectById($id) {
        global $conn;
        $sql = "SELECT * FROM librarian WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    
}
?>