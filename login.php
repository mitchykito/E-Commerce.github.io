<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BUBUSHOP</title>
</div>
</head>
<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Raleway);
h1{
    font-family: Raleway;
    font-size: 50px;
}
.container{
  position: relative;
}
.submit_button{
    font-family: Raleway;
    font-size: 24px;
    background:#223445;
    color:#FFFFFF ;
    border: 1px solid #223445;
    border-radius: 18px ;
    -webkit-border-radius: 5px ;
    display:inline-block;
    width: 200px;
    height: 70px;
    -webkit-font-smoothing: antialiased;
    }
 .row{
    text-align: center;
      margin-top: 90px;
 }
 .form_info{
    font-family: Raleway;
    margin-bottom: 16px;
 }
 label {
  display: inline-block;
  margin-bottom: 8px;
}
input[type=text] {
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=password] {
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 20%;
  background-color: #005073;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #107dac;
}
#back{
  float:left;
  position: fixed;
  top: 0;
}

</style>
<body>
    <div class="container">
        <div class="row">
            <div></div>
            <div>
                <h1>Login</h1>
                <form action="validation.php" method="post" class="form">
                    <div class="form_info">
                        <label>Username</label><br>
                        <input type="text" name="username" required="" autocomplete="off">
                    </div>
                    <div class="form_info">
                        <label>Password</label><br>
                        <input type="password" name="password" required="">
                    </div>
                    <div class="form_info">
                        <input type="submit" name="submit" value="Login" class="submit_button">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>