<?php
    //user authentication
    require("user.php"); 
    $u = new user();
    $u->isSession();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            require_once("static/head.html");
        ?>
        <title>Dashboard</title>
    </head>
    <body>
        <?php
            require_once("static/nav.php");
        ?>
        <main class="container">

                <div class="row p-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Type author, title or ISBN number..." aria-label="" aria-describedby="button-addon2" id="seachText" name="seachText">
                        <button class="btn btn-outline-primary" type="button" id="searchBookBtn" onclick="$.book.search();">Search</button>
                    </div>
                </div>
                <div id="showResult">
                    <div class="row">
                        <div class="col">
                            <div class="card m-1 p-1 text-center">
                                Index
                            </div>
                        </div>
                        <div class="col">
                            <div class="card m-1 p-1 text-center">
                                OLID
                            </div>
                        </div>
                        <div class="col">
                            <div class="card m-1 p-1 text-center">
                                Book Title
                            </div>
                        </div>
                        <div class="col">
                            <div class="card m-1 p-1 text-center">
                                Author
                            </div>
                        </div>
                        <div class="col">
                            <div class="card m-1 p-1 text-center">
                                Publisher
                            </div>
                        </div>
                        <div class="col">
                            <div class="card m-1 p-1 text-center">
                                Publish Date
                            </div>
                        </div>
                    </div>
                    <div class="row" id="showResultData">

                    </div>
                </div>
        </main>
    </body>
</html>