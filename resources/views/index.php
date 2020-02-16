<!DOCTYPE html>
<html>
<?php include 'style_sheet.php';?>
<style>
.login_form{
    width: 30%;
    height: 300px;
    background-color: rgb(204, 204, 204);
    border: 1px;
    border-radius: 15px;
    padding: 15px;
    margin-left: 35%;
    margin-right: 35%;
    margin-top: 13%;
}
.grid-layout{
    display: inline-grid;
    grid-template-columns: 100px auto;
}
.grid-top{
    grid-column: 1/2;
    grid-row: 1;
}
.item2{
    grid-column: 1;
    grid-row: 2;
}
.item3{
    grid-column: 1;
    grid-row: 3
}
.grid-bot{
    grid-column: 1/2;
    grid-row: 3;
}
input{
    margin-bottom: 10px;
    border-style: none;
}
label{
    margin-bottom: 10px;
}
.btn-custom{
    margin-top: 10px;
    margin-bottom: 10px;
    background-color: white;
    border-radius: 7px;
    border-style: none;
}
</style>
<body>
    <form action="login_user.php" method="POST" enctype="multipart/form-data" class="login_form mx-auto">
        <div class="grid-layout" style="margin-top: 10px;">
            <div><label>Username</label></div>
            <div><input type="text" name="username"></div>
            <div><label>Password</label></div>
            <div><input type="password" name="password"></div>
            <div class="grid-bot">
                <input type="submit" value="Login" class="btn-custom btn-default my-auto" style="margin: 100px;" onclick="isEmpty();">
            </div>
    </form>
</body>
</html>