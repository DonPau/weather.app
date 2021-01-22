<?php include 'Weather.php';
if ($_GET['city']) {
    $weather = new Weather($_GET['city']);
    var_dump( $weather);
    $weather2 = new Weather('KHERSON');
    var_dump( $weather2);
    die();
    $weather = $weather->getData();
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">

    <title>Погода не выходя из дома</title>
</head>
<body>
<div class="container" id="mainDiv">
    <h1>Погода не выходя из дома</h1>

    <form>
        <div class="form-group">
            <input class="form-control" id="city" name="city[]" type="" aria-describedby="Forcast city"
                   placeholder="Ведите название города">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div id="forecastDiv">
    <?php
    if (isset($weather)) {
        foreach ($weather as $city => $value) {

            echo '<div class="alert alert-primary" role="alert">' . 'The weather in ' . $city . ' is ' . $value . '.' . '</div>';
        }
    }
    ?>
</div>
<div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>
</html>