<?php
include_once 'libs/database.php';
include_once 'libs/header.php';
include_once 'libs/drop.php';
include 'libs/errors.php';
include 'libs/success.php';
include_once 'libs/create_directory.php';
include 'libs/errors.php';
include 'libs/success.php';
?>
<div class="row">
    <div class="col">
<h3>Wrzuc nowy plik:</h3>
    <form method="POST" ENCTYPE="multipart/form-data">
        <input type="file" value="test" name="plik"/><br><br>
        <input class="btn btn-primary" type="submit" name="wyslij_plik" value="Wyślij plik"/>
    </div>
    <div class="col">
        <h4>Lokalizacja?</h4>
        <input type="radio" name="" value="km"> Katalog macierzysty<br>
        <?php
        foreach(glob("users_files/$username/*", GLOB_ONLYDIR) as $dir) {
            $dir = str_replace("users_files/$username/", '', $dir);
            echo '<input type="radio" name="km" value ="' . $dir . '"> ' . $dir . '<br>';
        }
        ?>
        <bR>
    </div>
    <div class="col">
    </div>
    <div class="col"></div>
    <div class="col"></div>

    </form>
</div>
<hr>
<h3>Stwórz podkatalog:</h3>
    <form method="POST">
        Nazwa: <input type="text" name="nazwa_podkatalogu">
        <input type="submit" name="stworz_podkatalog" value="Stwórz"/>
    </form>


<hr>
<h3>Twoje pliki:</h3>

<?php include 'libs/show.php';
include_once 'libs/footer.php';