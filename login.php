<?php
    require 'includes/header.php';
?>

<main>
    <link rel="stylesheet" href="css/login.css">

    <div class="bg-cover">
        
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