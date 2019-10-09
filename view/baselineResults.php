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
            
                <h2><?php echo htmlspecialchars($_SESSION['currentUser']->getUName() . ' you will start at level ' . $_SESSION['currentUser']->getLevel()); ?></h2>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="viewProfile">
                    <div id="data">
                       <?php for($x=0; $x < count($_SESSION['incorrectQuestions']); $x++) : ?> 
                        <?php 
                        $q = $_SESSION['incorrectQuestions'][$x];
                        $iA = $_SESSION['incorrectAnswers'][$x];
                        $signageWord = $q->getLevel()->getArithmeticType();
                        $sign = '';
                                if($signageWord === 'addition'){
                                    $sign = '+';
                                } elseif ($signageWord === 'subtraction'){
                                    $sign = '-';
                                }elseif ($signageWord === 'multiplication'){
                                    $sign = '*';
                                }elseif ($signageWord === 'division'){
                                    $sign = '/';
                                }
?>
                        <label>Question: <?php echo $q->getFirstNumber() . " " . $sign . ' ' .$q->getSecondNumber(); ?> </label>
                        <br>
                        
                        <label>Correct Answer: <?php echo $q->getAnswer(); ?> </label>
                        <div id="error"><label>Your Answer: <?php echo $iA; ?> </label></div><br>                
                            <?php endfor; ?>
                        <p>Number Incorrect: <?php echo $_SESSION['numIncorrect']; ?> </p>
                        </div>
                    <div id="buttons">
                        <label>&nbsp;</label>
                        <input type="submit" value="Profile"><br>
                        </form>

                        <form action="index.php" method="post">
                            <input type="hidden" name="action" value="logout">
                            <label>&nbsp;</label>
                            <?php if(!empty($_SESSION['currentUser'])){?><input type="submit" value="Logout"><?php } ?><br>
                        </form>
                
                    </div>

            </div>
            <footer>
                <p>Blue Team &#9400; Fall 2019</p>
            </footer>
        </main>
    </body>
</html>
