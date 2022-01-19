<?php
    require_once '../vendor/autoload.php';
    require_once "../View/board.php";
    require_once "./cookieSession.php";
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
        }
    }

    function getNumberBoard($username, $db) {
        // On compte le nombre de Board d'un user afin de tous les afficher
        $request = $db->prepare("SELECT COUNT(Board_Id) AS numberBoard FROM Board_list INNER JOIN Users ON Users.User_Id = Creator_Id_Fk WHERE Username = :Username");
        $request->execute(['Username' => $username]);
        $result = $request->fetch();
        return $result['numberBoard'];
    }

    function creationBoard($username) {
        if (isset($_POST['createBoard'])) {
            // On extrait les éléments de l'input
            extract($_POST);
            $db = (new Connection())->connect();
            $idUser = getIdUser($username, $db);
            // Creation requête SQL
            $request = $db->prepare("INSERT INTO Board_list(Creator_Id_Fk, Contributor_Id ,Name) VALUES (:Creator_Id_Fk, :Contributor_Id, :Name)");
            $request->execute([
                'Creator_Id_Fk' =>$idUser,
                'Contributor_Id' => 0,
                'Name' => $nameBoard,
            ]);  
            createBoardURL($nameBoard);
            // Refresh de la page pour l'affichage de la board créée
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
?>
