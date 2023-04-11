<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalerts.js"></script>
</html>
<?php
session_start();
session_destroy();
echo "<script> close_session(); </script>";

?>