<?php
require_once 'controller/main.php';

if (isset($_COOKIE['SPmbti'])) {
  echo "
                <script>
                    document.location.href='home';
                </script>
        ";
} else {
  echo "
                <script>
                    document.location.href='logout.php';
                </script>
            ";
}
?>