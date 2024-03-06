<?php
function getAllTodos($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM tasks WHERE state='todo'");
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
function getAllDoing($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM tasks WHERE state='doing'");
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
function getAllDone($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM tasks WHERE state='done'");
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

/*
 * Uppdaterar en kund
*/
function updateTasks($conn)
{
    $id = $_POST['id'];
    $state = $_POST['state'];

    try {
        $stmt = $conn->prepare("UPDATE tasks
        SET state=:state WHERE id=:id");
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}