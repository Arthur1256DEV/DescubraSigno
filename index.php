<!DOCTYPE html>
<html lang="en">
<?php include("./layouts/header.php"); ?>

<body>
    <div class="shadow rounded w-75 mx-auto" id="container">
    <h1>Descubra seu signo:</h1>
    <hr>

    <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="d-flex justify-content-center align-items-center">
        <div>
            <p>Data De Nascimento:</p>

            <div class="break"></div>

            <input type="date" name="infoDate" id="dateSign" class="rounded border-light bg-white"> 

            <div class="break"></div>

            <button type="submit" id="btnSubmit" class="border-light bg-info rounded shadow-sm"> DESCUBRA AGORA </button>
        </div>
       
    </form>

    <hr class="border-primary">
    </div>
</body>

<script src="./assets/js/javascript.js"></script>
</html>