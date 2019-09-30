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
            
                <h2>Change Password for <?php echo htmlspecialchars($_SESSION['currentUser']->getUName()); ?></h2>
                <!--<p><?php echo htmlspecialchars($message) ?></p>-->
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="resetPwVal">
                    <div id="data">
                        <label>New Password: </label>
                        <input type="password" name="pw" value=""><div id="error"><?php echo htmlspecialchars($error_message); ?></div><br>
                        <label>Confirm Password: </label>
                        <input type="password" name="cPw"><br>
                    </div>

                    <div id="buttons">
                        <label>&nbsp;</label>
                        <input type="submit" value="Submit"><br>
                        </form>

                        
                
                    </div>

            </div>
            <footer>
                <p>Blue Team &#9400; Fall 2019</p>
            </footer>
        </main>
    </body>
</html>