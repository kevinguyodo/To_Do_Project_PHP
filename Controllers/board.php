<?php 
    require_once "../View/board.php";
    require_once "../Models/Connection.php";
?>

<?php 
    use App\Connection;

    $db;
    // require "../View/board.php";
    function disconnect() {
        // Récupère requête POST avec le nom du boutton
        if (isset($_POST['logout'])) {
            session_destroy();
            header("Location: ../index.php");
            die();
        } 
    }

    function connect() {
        if (isset($_POST['connect'])) {
            session_start();
            header("Location: ./View/board.php");
        }
    }
?>
// function getUsername() {
// $db = (new Connection())->connect();
// $username= $db->prepare("SELECT Username FROM Users WHERE User_Id = ");
// }

// function connect() {
// if (isset($_POST['connect'])) {
// session_start();
// header("Location: ./View/board.php");
// }
// }
?>