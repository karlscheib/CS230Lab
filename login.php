<?php
    require 'includes/header.php';
?>

<main>
    <link rel="stylesheet" href="css/login.css">

    <div class="bg-cover">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block mx-auto" src="images/wf-bg.jpeg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block mx-auto" src="images/fo-bg.jpeg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block mx-auto" src="images/kcd-bg.jpeg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="h-40 center-me">
            <div class="my-auto">
                <form class="form-signin" action="includes/login-helper.php" method="post">
                    
                    <h2>Please login</h2>
                    <p class="hint-text">Login Please</p>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" name="username-email" placeholder="Username/Email" required="required">
                    </div>

                    <div class="form-group">
                        <input type="password" class=form-control name="password" placeholder="Password" required="required">
                    </div>

                    <div>
                        <button class="btn btn-lg btn-outline-danger btn-block" name="login" type="submit">Login</button>
                    </div>

                    <p class="mt-5 mb-3 text-muted">&copy; 2020-9999</p>
                </form>
            </div>
        </div>

    </div>
</main>