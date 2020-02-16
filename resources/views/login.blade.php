@extends('template')
@section('kontent')

<form action="/login" method="POST" enctype="multipart/form-data" class="login_form mx-auto justify-content-center">
    @csrf <!-- {{ csrf_field() }} -->
    <div class="grid-layout" style="margin-top: 10px; margin-right: 10%; margin-left: 10%;">
        <div><label>Username</label></div>
        <div><input type="text" name="username" required></div>
        <div><label>Password</label></div>
        <div><input type="password" name="password" required></div>
    </div>
    <div class="text-center">
        <input type="submit" value="Login" class="my-auto text-center btn btn-primary">
    </div>
    <br><br>
    <?php 
        if (isset($data)) {
        ?>
        <div class="alert <?php if($data['error'] == true ) echo "alert-danger";?>">
            <?php echo $data['errorMessage']; ?>
        </div>
    <?php } ?>
</form>
@endsection