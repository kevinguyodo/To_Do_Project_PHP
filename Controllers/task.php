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
            if ($row['Board_Id_Fk'] == $_GET['board']) {
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
    }

    function getBoardName($username) {
        $db = (new Connection())->connect();
        $request = $db->prepare("SELECT * FROM Board_list  
            INNER JOIN Users ON Users.User_Id = Board_list.Creator_Id_Fk
            WHERE Username = :Username");
        $request->execute(['Username' => $username]);
        $result = $request->fetchAll();

        foreach ($result as $row) {
            if ($row['Board_Id'] == $_GET['board']) {
                $task = '
                <h2>'. $row['Name']. '</h2>';
                echo $task;
            }
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
                'Board_Id_Fk' => $_GET['board'],
                'Task_Name' => $nameTask,
            ]);  
            // Refresh de la page pour l'affichage de la board créée
            header('Refresh:0; url=/Controllers/task.php?board='. $_GET['board']);
            die;
        }
    }

    function doneTask($db, $taskDone, $taskId) {
        if ($_POST['check'] == 'checked') {
            echo "Click";
            $update = $db->prepare("UPDATE Task SET Is_Done = 1 WHERE Task_Id = :Task_Id");
            $update->execute(['Task_Id' => $taskId]);    
        }

        styleIsDoneTask($taskDone);
    }

    // Fonction changeant le style lorsqu'une tache est effecutée
    function styleIsDoneTask($taskDone) {
        if ($taskDone == 1) {
            echo '<style type="text/css">
                #task input:checked ~ p {
                    text-decoration: line-through;
                    color: #ccc;
                }
                
                #task input:checked ~ span {
                    background: #03a9f4;
                    border: 1px solid #03a9f4;
                }
                
                #task input:checked ~ span::before {
                    border-left: 2px solid #fff;
                    border-bottom: 2px solid #fff;
                }
            </style>';            
        } 
    }

?>