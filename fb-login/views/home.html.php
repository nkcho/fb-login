<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>    
</head>
<body>
    <style>
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
<h1>Hello <?php echo $user->getField('name'); ?>, you are logged in!</h1>
You can <a href='index.php?logout=true'><button>Logout here</button></a>
<hr/>
<h3>Your public data in JSON is: (could be returned to an API) </h3>

<?php  print_r($json_data); ?>

</body>
</html>
