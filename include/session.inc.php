<?php
if (isset($_SESSION['specialite'])) {
    if ($_SESSION['specialite'] == 'no') {
        header('Location: ../error/404 ');
    }
}
