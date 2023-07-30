<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://localhost/webwithphp/css/style.css">
</head>

<body id="target">
    <header>
        <img src="./img/pngwing.com.png" alt="공부" width="200px">
        <h1>Sign in</a></h1>
    </header>

    <article>
        <form action="signin_process.php" method="POST">
            <p>
                name : <input type="text" name="user_name">
            </p>
            <p>
                email : <input type="text" name="email">
            </p>
            <p>
                password : <input type="text" name="password">
            </p>
            <input type="submit" name="name">
        </form>
    </article>
</body>

</html>