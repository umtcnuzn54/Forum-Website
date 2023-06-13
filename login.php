<?php

    include ("conn.php");
    
    if($_POST)
    {
        $name =$_POST["name"];
        $pass =$_POST["pass"];


        $query  = $db->query("SELECT * FROM userss WHERE username='$name' && password='$pass'",PDO::FETCH_ASSOC);
        if ( $say = $query -> rowCount() ){

            if( $say > 0 ){
                session_start();
                $_SESSION['oturum']=true;
                $_SESSION['user']=$name;
                $_SESSION['pass']=$pass;
                
                header("location:index.php");
            }else{
                echo "Error";
            }
        }else{
            echo "<h1>Username  or password wrong</h1>";
            echo '
                <form action="login.php" method="post">
                    <input type="text" name="name"/>
                    <input type="password" name="pass"/>
                    <input type="submit" />
                </form>
            ';
        }
    }else{
    
        echo '
        <head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<style>
body{
    background-image:  url(" https://i0.wp.com/eos.org/wp-content/uploads/2021/07/paper-silhouette-people-illustration.png?fit=820%2C615&ssl=1 ");
}
.container{
    border-radius: 10px;
    background-color:white;
    padding: 20px;
    position:relative;
    height: 220px;
    width: 260px;
top: 220px;
}
h1{
inline:block;
position:relative;

   left: 830px;
   top: 220px;
</style>
</head>
<body>
<h1> Please Log In </h1>
<div class= "container">

            <form class="form-group" action="login.php" method="post">
                <input class = "form-control" style="width: 220px;" type="text" name="name" placeholder="Name"/>
                <input class = "form-control" style="width: 220px;" type="password" name="pass" placeholder="Password" />
                <input class = "form-control" style="width: 220px;" type="submit" />
            </form>
            For Register <a href="register.php">Click</a>;
            </div>
            </body> 
            ';
        
    }
    
?>