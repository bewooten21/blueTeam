<!DOCTYPE html>
<html>
    <head>
        <title>MathWiz Login</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>

    <body>
        <main>
            <div id="formWrap">
            <header>MathWiz</header>
            
                <h2>Log In</h2>
                <p><?php echo htmlspecialchars($message) ?></p>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="loggingIn">
                    <div id="data">
                        <label>User Name: </label>
                        <input type="text" name="uName" value="<?php echo htmlspecialchars($uName) ?>"><div id="error"><?php echo htmlspecialchars($error_message['uName']); ?></div><br>
                        <label>Password: </label>
                        <input type="password" name="pWord"><div id="error"><?php echo htmlspecialchars($error_message['pWord']); ?></div><br>
                    </div>

                    <div id="buttons">
                        <label>&nbsp;</label>
                        <input type="submit" value="Login"><br>
                        </form>

                        <form action="index.php" method="post">
                            <input type="hidden" name="action" value="logout">
                            <label>&nbsp;</label>
                            <input type="submit" value="Logout"><br>
                        </form>
                
                    </div>

            </div>
            <footer>
                <p>Blue Team &#9400; Fall 2019</p>
            </footer>
        </main>
    </body>
</html>
