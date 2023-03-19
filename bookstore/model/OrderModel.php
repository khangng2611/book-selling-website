<?php
class ordermodel extends Database
{
    public function insertOrder($id_user, $username, $phone, $user_address, $id_book, $title, $amount, $bill, $order_time, $order_state)
    {
        //$this->conn->set_charset("utf8");
        $stmt = $this->conn->prepare("INSERT INTO order1 (id_user, username, phone, user_address, id_book, title, amount, bill, order_time, order_state) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("isssisiiss", $id_user, $username, $phone, $user_address, $id_book, $title, $amount, $bill, $order_time, $order_state);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->affected_rows == 1)
            return true;
        return false;
    }

    function getAllOrder()
    {
        $sql = "SELECT * FROM order1";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getOrder($id)
    {
        $stmt = $this->conn->prepare("SELECT id_user, username, phone, user_address, id_book, title, amount, bill, order_time, order_state FROM order1 WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            [];
        }
    }

    public function deleteOrder($id)
    {

        $stmt = $this->conn->prepare("DELETE FROM order1 WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->affected_rows == 1)
            return true;
        return false;
    }

    public function updateOrderState($id, $state)
    {
        $stmt = $this->conn->prepare("UPDATE order1 SET order_state = ? WHERE id = ?");
        $stmt->bind_param("si", $state, $id);
        $status = $stmt->execute();
        if ($status == true) {
            return true;
        }
        return false;
    }
}
