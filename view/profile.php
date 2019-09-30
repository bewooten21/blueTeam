<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <main>
            <div id="formWrap">
                <header>MathWiz</header>
                <h3>Hello <?php echo htmlspecialchars($_SESSION['currentUser']->getFName() . ' ' . $_SESSION['currentUser']->getLName()); ?></h3>
                <p>Your current level is <?php $userLevel = is_null($_SESSION['currentUser']->getLevel()) ? 'not set!' : $_SESSION['currentUser']->getLevel(); echo htmlspecialchars($userLevel) ?></p>
                <div id="buttons">
                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="logout">
                        <label>&nbsp;</label>
                        <input type="submit" value="Logout"><br>
                    </form>
                </div>
                <?php if(!empty($_SESSION['currentUser'])){?><a href='index.php?action=resetPw'>Change Password</a><?php } ?>
            </div>
            <footer>
                <p>Blue Team &#9400; Fall 2019</p>
            </footer>
        </main>       
    </body>
</html>
