<?php
    require_once '../vendor/autoload.php';
    require_once "../View/task.php"
?>

<?php
    use App\Connection;

    function disconnect() {
        // Récupère requête POST avec le nom du boutton
        if (isset($_POST['logout'])) {
            session_destroy();
            header("Location: ../index.php");
            die();
        } 
    }

    function getTasks($username) {
        $db = (new Connection())->connect();
        $request = $db->prepare("SELECT * FROM Task 
            INNER JOIN Board_list ON Board_list.Board_Id = Board_Id_Fk 
            INNER JOIN Users ON Users.User_Id = Board_list.Creator_Id_Fk
            WHERE Username = :Username");
        $request->execute(['Username' => $username]);
        $result = $request->fetchAll();

        foreach ($result as $row) {
            $task = '
            <li>
                <label>
                    <input type="checkbox" name="">
                    <p>'. $row['Task_Name'] .'</p>
                    <span></span>
                </label>
            </li>';
            echo $task;
        }
    }

    // function backToBoardMenu() {
    //     if (isset($_POST))
    // }


?>