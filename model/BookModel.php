<?php
class bookmodel extends Database
{
    function insertBook($title, $author, $theme, $publisher, $publish_date, $price, $amount, $book_description, $img)
    {
        $stmt = $this->conn->prepare("INSERT INTO book (title, author, theme, publisher, publish_date, price, amount, book_description, img) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssiiss", $title, $author, $theme, $publisher, $publish_date, $price, $amount, $book_description, $img);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->affected_rows == 1)
            return true;
        return false;
    }

    function getAllTheme() {
        $sql = "SELECT DISTINCT theme FROM book";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $themes[] = $row['theme'];
            }
        }
        return $themes;
    }
    
    function getBookbyTheme($theme) {
        $stmt = $this->conn->prepare("SELECT * FROM book WHERE theme = ?");
        $stmt->bind_param("s", $theme);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $books[] = $row;
            }
            return $books;
        }
        return [];
    }

    function getAllBook() {
        $sql = "SELECT * FROM book";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $books[] = $row;
            }
            return $books;
        }
        return [];
    }

    function getBook($id)
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

    function getTop3Book() {
        $sql = "SELECT * FROM book ORDER BY amount LIMIT 3";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $top3Book[] = $row;
            }
            return $top3Book;
        }
        return [];
    }

    function deleteBook($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM book WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        if ($stmt->affected_rows == 1)
            return true;
        return false;
    }

    function updateBook($title, $author, $theme, $publisher, $publish_date, $price, $amount, $book_description, $img, $id)
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
