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
            
                <h2><?php echo htmlspecialchars($_SESSION['currentUser']->getUName()); ?></h2>
                <p><?php echo htmlspecialchars($message) ?></p>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="submitAnswer">
                    <div id="data">
                       <?php foreach($_SESSION['baselineExam']->getQuestions() as $q) : ?> 
                        <?php $signageWord = $q->getLevel()->getArithmeticType(); $sign = '';
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
                        
                        <label>Answer: </label>
                        <input type="text" name="answer"><div id="error"><?php echo htmlspecialchars($error_message); ?></div><br>
                    </div>
                    <?php endforeach; ?>
                    <div id="buttons">
                        <label>&nbsp;</label>
                        <input type="submit" value="Login"><br>
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