<html>
    <head>
        <meta charset="utf-8">
        
    </head>
    <body style='background:#fff;'>
        <div id="content">
            
            <?php
                session_start();
                
                if($_SESSION['user'] !== ""){
                    $user = $_SESSION['user'];
                   
                    echo "Bonjour $user, vous êtes connecté";
                }
            ?>
            
        </div>
    </body>
</html>