<!DOCTYPE html>
<html>
<style>
@yield('style')

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

    @yield('kontent')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.js"></script>

    <script>
    @yield('script')
    </script>
</body>
</html>

