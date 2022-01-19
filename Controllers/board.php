<?php
    require_once '../vendor/autoload.php';
    require_once "../View/board.php"
?>

<?php 
    use App\Connection;


    function getBoards($username) {
        $db = (new Connection())->connect();
        $request = $db->prepare("SELECT * FROM Board_list INNER JOIN Users ON Users.User_Id = Creator_Id_Fk WHERE Username = :Username");
        $request->execute(['Username' => $username]);
        $result = $request->fetchAll();



        foreach ($result as $row) {
            $board = '
            <div class="box a">
                <h3>'. $row['Name'] .'</h3>
            </div>
            ';
            echo $board;
            // $array[] = $row['column'];
        }

        // for ($index = 1; $index <= getNumberBoard($username, $db); $index++) {
        //     // echo $index." index , \n";
        //     // echo $result[$index]. "Nombre d'éléments \n";
        //     // echo $result['Name']. "\n";
        //     // echo $result;
        // }
        
    }

    function getNumberBoard($username, $db) {
        $request = $db->prepare("SELECT COUNT(Board_Id) AS numberBoard FROM Board_list INNER JOIN Users ON Users.User_Id = Creator_Id_Fk WHERE Username = :Username");
        $request->execute(['Username' => $username]);
        $result = $request->fetch();
        return $result['numberBoard'];
    }

    function creationBoard($username) {
        if (isset($_POST['createBoard'])) {
            extract($_POST);
            $db = (new Connection())->connect();
            $idUser = getIdUser($username, $db);
            $request = $db->prepare("INSERT INTO Board_list(Creator_Id_Fk, Contributor_Id ,Name) VALUES (:Creator_Id_Fk, :Contributor_Id, :Name)");
            $request->execute([
                'Creator_Id_Fk' =>$idUser,
                'Contributor_Id' => 0,
                'Name' => $nameBoard,
            ]);  
            header("Refresh:0; url=/Controllers/board.php");
            die;
        }

    }

    function getIdUser($username, $db) {
        $request = $db->prepare("SELECT User_Id FROM Users WHERE Username = :Username");
        $request->execute(['Username' => $username]);
        $result = $request->fetch();
        return $result['User_Id'];
    }
    
    function disconnect() {
        // Récupère requête POST avec le nom du boutton
        if (isset($_POST['logout'])) {
            session_destroy();
            header("Location: ../index.php");
            die();
        } 
    }

    // class Board {

    //     function __construct() {}

    //     function getBoards($usernameSession) {
    //         $db = (new Connection())->connect();
    //         $request = $db->prepare("SELECT * FROM Board INNER JOIN Users ON Users.User_Id = Creator_Id_Fk WHERE Username = :Username");
    //         $request->execute(['Username' => $usernameSession]);
    //         $result = $q->fetch();
    //         return $result['Name'];
    //     }
    // }

?>




<!-- // function getUsername() {
// $db = (new Connection())->connect();
// $username= $db->prepare("SELECT Username FROM Users WHERE User_Id = ");
// }

// function connect() {
// if (isset($_POST['connect'])) {
// session_start();
// header("Location: ./View/board.php");
// }
// } -->
<!-- ?> -->