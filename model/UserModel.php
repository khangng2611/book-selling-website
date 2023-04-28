<?php

class usermodel extends Database
{
    public function login($username, $password){
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ( $result->num_rows == 1 ) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['user_password'])) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['user_role'] = $row['user_role'];
                $_SESSION['username']= $row['username'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['user_address'] = $row['user_address'];
                $_SESSION['img'] = $row['img'];
                $_SESSION['password'] = $row['user_password'];
                return true;
            }
        }
        return false;
    }

    public function insertUser($role, $username, $firstname, $lastname, $email, $phone, $address, $img, $password)
    {   
        $stmt = $this->conn->prepare("INSERT IGNORE INTO user (user_role, username, firstname, lastname, email, phone, user_address, img, user_password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssssss", $role, $username, $firstname, $lastname, $email, $phone, $address, $img, $password);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->affected_rows == 1) {
            return true;
        }
        return false;        
    }

    function getAllUser()
    {
        $sql = "SELECT * FROM user";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            return $users;
        }
        return [];
    }

    public function getUser($id)
    {
        $stmt = $this->conn->prepare("SELECT id, user_role, username, firstname, lastname, email, phone, user_address, img, user_password FROM user WHERE id = ?");
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

    public function deleteUser($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM user WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->affected_rows == 1)
            return true;
        return false;
    }


    public function updateUserAdmin($id, $role, $username, $firstname, $lastname, $email, $phone, $address, $img)
    {
        $stmt = $this->conn->prepare("UPDATE user SET user_role=?, username=?, firstname=?, lastname=?, email=?, phone=?, user_address=?, img=? WHERE id = ?");
        $stmt->bind_param("isssssssi", $role, $username, $firstname, $lastname, $email, $phone, $address, $img, $id);
        $status = $stmt->execute();
        if ($status == true) {
            return true;
        }
        return false;
    }

    public function updateUser($id, $role, $username, $firstname, $lastname, $email, $phone, $address, $img)
    {
        $stmt = $this->conn->prepare("UPDATE user SET user_role=?, username=?, firstname=?, lastname=?, email=?, phone=?, user_address=?, img=? WHERE id = ?");
        $stmt->bind_param("isssssssi", $role, $username, $firstname, $lastname, $email, $phone, $address, $img, $id);
        $status = $stmt->execute();
        if ($status == true) {
                $_SESSION['user_role'] = $role;
                $_SESSION['username']= $username;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['email'] = $email;
                $_SESSION['phone'] = $phone;
                $_SESSION['user_address'] = $address;
                $_SESSION['img'] = $img;
                return true;
        }
        return false;
    }

    public function updateUserPW($password, $id)
    {
        $stmt = $this->conn->prepare("UPDATE user SET user_password = ? WHERE id = ?");
        $stmt->bind_param("si", $password, $id);
        $status = $stmt->execute();
        if ($status == true) {
            return true;
        }
        return false;
    }
}
