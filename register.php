<?php 
include ("conn.php");

if($_POST){
    // Post ettirdik
$name        = $_POST["name"];
$password    = $_POST["password"];
$email       = $_POST["email"];

//bütün kayıtları bir kereye mahsus olmak üzere listeliyoruz; daha doğrusu, bir diziye aktarmak için verileri çekiyoruz
    $query = "SELECT * FROM userss order by id";
    $goster = $db->prepare($query);
    $goster->execute(); //queriyi tetikliyor
    
    $result = $db->prepare("INSERT INTO userss SET username=?,password=?, email=?");
    $result->execute(array($name,$password,$email));
    

    $_SESSION["user"] = $name;
    header("location:index.php");
}else{
    echo '
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<style>
body{
    background-image:  url(" https://andcenter.org/wp-content/uploads/2017/11/sosyolojik-soru.jpg ");
}
.container{
    border-radius: 10px;
    background-color:Pink;
    padding: 0px;
    position:relative;
    height: 320px;
    width: 260px;
top: 220px;
}

</style>
</head>
<body >
<div class="container">
<div class="col-md-6">
        <form  class="form-group" action="" method="post">
            <label for="name">Name</label>
            <input  style="width: 220px;" class="form-control" type="text"  name="name" placeholder="Name"/>
            <label for="email">email</label>
            <input  style="width: 220px;" class="form-control" type="text"  name="email" placeholder="email"/>
            <label for="password">Password</label>
            <input  style="width: 220px;" class="form-control" type="password" name="password" placeholder="Password"/>
            <input  style="width: 220px;" class="form-control" type="Submit" value="Register"/>
        </form>
        For Log In <a styles="inline:block" href="login.php">Click</a>
        </div>
        </div>
        </body>
        ';
       
}

?>
   