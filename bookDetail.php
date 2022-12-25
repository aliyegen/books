<?php
    //user authentication
    require("user.php"); 
    $u = new user();
    $u->isSession();

    //catch GET data
    $bookCode = $_GET['bookCode'];

    //send bookcode request
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, "https://openlibrary.org/books/".$bookCode.".json");
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

    $headers = array();
    curl_setopt($c, CURLOPT_HTTPHEADER, $headers);

    // execute the request and parse the response
    $response = curl_exec($c);
    $result = json_decode($response, true);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            require_once("static/head.html");
        ?>
        <title>Book Title</title>
    </head>
    <body>
        <?php
            require_once("static/nav.php");
            //print_r($result);
        ?>
        <main class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Book Title</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">ISBN Number</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $result['title'] ?></td>
                    <td><?php echo $result['publishers'][0] ?></td>
                    <td><?php echo $result['isbn_13'][0]?></td>
                </tr>
            </tbody>
            </table>

        </main>
    </body>
</html>