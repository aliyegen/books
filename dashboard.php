<?php
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
            <form id="seachForm" name="seachForm" method="POST">
                <div class="row p-3">
                    <div class="col-md-3">
                        <select class="form-select" id="searchMethodSelect" name="searchMethodSelect">
                            <option selected>Select one</option>
                            <option value="1">Author</option>
                            <option value="2">Book Title</option>
                            <option value="3">ISBN</option>
                        </select>
                    </div>
                    <div class="col-md-9">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Type something" aria-label="" aria-describedby="button-addon2" id="seachText" name="seachText">
                            <button class="btn btn-outline-secondary" type="button" id="searchBookBtn" onclick="$.user.search();">Search</button>
                        </div>
                    </div>
                </div>
            </form>
                <div id="showResult">
                    <div class="row">
                        <!-- Number of result-->
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card m-1 p-1 text-center">
                                Index
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