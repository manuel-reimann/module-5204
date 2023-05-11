<?php
//Class that exttends the DB connection 
class favHandling extends DatabaseConnection
{
    //method to handle the favourited chilli cards // For disclosure: ChatGPT helped me optimizing this function
    public function chilliLikes($userID, $chilliID)
    {
        //show all the favourited chillis associated with the UserID
        $query = "SELECT * FROM favourites WHERE user_id = :user_id AND chilli_id = :chilli_id";
        $stmt = $this->prepare($query);
        $stmt->bindParam(':user_id', $userID);
        $stmt->bindParam(':chilli_id', $chilliID);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // If the user has already liked this chilli, remove the like
            $query = "DELETE FROM favourites WHERE user_id = :user_id AND chilli_id = :chilli_id";
            $stmt = $this->prepare($query);
            $stmt->bindParam(':user_id', $userID);
            $stmt->bindParam(':chilli_id', $chilliID);
            $stmt->execute();

            return "removed";
        } else {
            // If the user has not yet liked this chilli, add the like
            $query = "INSERT INTO favourites (user_id, chilli_id) VALUES (:user_id, :chilli_id)";
            $stmt = $this->prepare($query);
            $stmt->bindParam(':user_id', $userID);
            $stmt->bindParam(':chilli_id', $chilliID);
            $stmt->execute();

            return "added";
        }
    }
}
