<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= \yii\helpers\Url::to('/css/styles.css')?>">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <title>Hotel Management System</title>
</head>
<body class="bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-box">
                    <h1 class="text-lg">Bitama System</h1>
                    <p class="text-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-box">
                    <form class="form-group" action="<?= \yii\helpers\Url::toRoute('site/login')?>" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control form-control-sm" name="username" required>
                        </div>
                        <?= \app\Me::TokenSubmission() ?>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control form-control-sm" name="password" type="password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-gray btn-block" value="Login">
                        </div>
                    </form>
                    <footer>
                        <ul class="social-media">
                            <p>Connect With Us</p>
                            <li><a href="https://www.facebook.com/dimasrismail"><span class="fa fa-facebook-square fa-2x"></span></a></li>
                            <li><a href="https://www.twitter.com/dimasrismail"><span class="fa fa-twitter fa-2x"></span></a></li>
                            <li><a href="https://www.instagram.com/dimasrismail"><span class="fa fa-instagram fa-2x"></span></a></li>
                        </ul>
                        <p>made with <span class="fa fa-heart heart"></span> developed by <a>@dimscode</a> </p>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</body>
</html>