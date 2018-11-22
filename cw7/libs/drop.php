<?php
$errors = array();
$success = array();
$max_rozmiar = 1000000;
$username = $_SESSION['username'];
$km = isset($_POST['km']) ? $_POST['km'] .= "/" : NULL;

if(isset($_POST['wyslij_plik'])) {
    if (is_uploaded_file($_FILES['plik']['tmp_name'])) {
        if ($_FILES['plik']['size'] > $max_rozmiar) {
            array_push($errors, "Przekroczenie rozmiaru $max_rozmiar bajtów");
        } else {
            array_push($success, "Odebrano plik: {$_FILES['plik']['name']}<br/>");
            if (isset($_FILES['plik']['type'])) {
                array_push($success,'Typ: ' . $_FILES['plik']['type'] . '<br/>');
            }
            move_uploaded_file($_FILES['plik']['tmp_name'], $_SERVER['DOCUMENT_ROOT']. "/cw7/users_files/" . $username . "/" . $km . $_FILES['plik']['name']);
        }
    } else {
        array_push($errors, "Błąd przy przesyłaniu danych!");
    }
}
?>
