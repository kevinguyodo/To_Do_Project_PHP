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
        $result = $request->fetch();

        $board = '
        <div class="box a">
            <h3>'. $result['Name'] .'</h3>
        </div>
        ';
        echo $board;
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