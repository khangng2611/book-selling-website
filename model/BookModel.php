<?php

class bookmodel extends Database
{
    public function insertBook($title, $author, $theme, $publisher, $publish_date, $price, $amount, $book_description, $img)
    {
        $stmt = $this->conn->prepare("INSERT INTO book (title, author, theme, publisher, publish_date, price, amount, book_description, img) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssiiss", $title, $author, $theme, $publisher, $publish_date, $price, $amount, $book_description, $img);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->affected_rows == 1)
            return true;
        return false;
    }

    function getAllBook()
    {
        $sql = "SELECT * FROM book";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getBook($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM book WHERE id = ?");
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



    public function deleteBook($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM book WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->affected_rows == 1)
            return true;
        return false;
    }

    public function updateBook($title, $author, $theme, $publisher, $publish_date, $price, $amount, $book_description, $img, $id)
    {
        $stmt = $this->conn->prepare("UPDATE book SET title=?, author=?, theme=?, publisher=?, publish_date=?, price=?, amount=?, book_description=?, img=? WHERE id = ?");
        $stmt->bind_param("sssssiissi",  $title, $author, $theme, $publisher, $publish_date, $price, $amount, $book_description, $img, $id);
        $status = $stmt->execute();
        if ($status == true) {
            return true;
        }
        return false;
    }
}
