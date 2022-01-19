<?php
    require_once '../vendor/autoload.php';
    require_once "../View/task.php";
    // require_once "./cookieSession.php";
?>

<?php
    use App\Connection;


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

    function creationTask($username) {
        if (isset($_POST['createTask'])) {
            // On extrait les éléments de l'input
            extract($_POST);
            $db = (new Connection())->connect();
            // Creation requête SQL
            $request = $db->prepare("INSERT INTO Task(Board_Id_Fk, Task_Name) VALUES (:Board_Id_Fk, :Task_Name)");
            $request->execute([
                // Board_Id_Fk sera le parametre de l'URL 
                // TO DO
                'Board_Id_Fk' => 1,
                'Task_Name' => $nameTask,
            ]);  
            // Refresh de la page pour l'affichage de la board créée
            header("Refresh:0; url=/Controllers/task.php");
            die;
        }
    }

?>