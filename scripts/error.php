<html>
    <head>
        <title>Something went wrong.</title>
        <link rel="stylesheet" href="Home.css">
    </head>
    <body>
        <h1>Something went wrong. Please try again later.</h1><br/>
        <?php if (isSet($_GET["error"])) echo $_GET["error"]; ?>
    </body>
</html>