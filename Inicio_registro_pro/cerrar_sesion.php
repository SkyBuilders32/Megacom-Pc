<?php

session_start();
session_destroy();
echo '
            <script>
                alert("Se a cerrado sesion");
                window.location = "index.php";
            </script>
        ';

?>