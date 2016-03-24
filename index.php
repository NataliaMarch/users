<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script src="js/script.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <div id="page">
            <header>
                <nav>
                    <ul>
                        <button><li onclick="showRegistration()">Register</li></button>
                        <button><li onclick="showAuth()">Login</li></button>
                        <button><li onclick="showUsers()">All Users</li></button>
                    </ul>
                </nav>
            </header>
            <main>
                <div id="registr" display="block">
                    <form method="POST" action="json.php">
                        <input type="text" name="login" placeholder="login" required/><br/>
                        <input type="email" name="email" placeholder="email" required/><br/>
                        <input type="password" name="pass" placeholder="pass" required/><br/>
                        <input type="submit"/>
                    </form>
                </div>
                <div id="auth" display="none">
                    <form method="POST" action="json.php">
                        <input type="text" name="enter_login" placeholder="login" required/><br/>
                        <input type="password" name="enter_pass" placeholder="pass" required/><br/>
                        <input type="submit"/>
                    </form>
                </div>
                <div id="allUsers" display="none">
                    <?php
                        include_once 'users.php';
                    ?>
                </div>
            </main>
        </div>
    </body>
</html>