@extends('templateAdmin')
@section('kontent')
<h1><?php echo $data['title'] ?></h1>

<ol class="breadcrumb" style="font-size: 15px">
  <li>
    <a href="#"><span class="fa fa-home"></span> Home</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-users"></span> User</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-pencil"></span> <?php echo $data['title']; ?></a>
  </li>
</ol>
<div class="col-xs-12">
	<a href="/admin/user" class="btn btn-danger" style="margin-bottom: 15px"><span class="fa fa-arrow-left"></span> Kembali</a>
</div>
<div class="col-xs-12">
    <?php 
    if (isset($data['error'])) {
    ?>
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p><?php echo $data['error']; ?></p>
        <?php }?>
    </div>
</div>
<div class="col-xs-7">
	<form method="post" enctype="multipart/form-data" id="form">
		@csrf
		<div class="form-group">
			<label>Email User</label>
			<input type="email" name="email" class="form-control" <?php if (isset($data['user'])) echo "value='" . $data['user']->email . "'"; ?>>
		</div>	
        <?php if(isset($data['user'])){
            ?>
            <div class="form-group">
                <label>Password Lama</label>
                <input type="password" name="passwordLama" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password Baru (Konfirmasi)</label>
                <input type="password" id="passwordKonfirmasi" name="passwordKonfirmasi" class="form-control" required>
            </div>
            <?php
        }else{
            ?>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password(Konfirmasi)</label>
                <input type="password" id="passwordKonfirmasi" name="passwordKonfirmasi" class="form-control" required>
            </div>
            <?php
        }
        ?>

        <span id='message'></span>
        <br>
		
        <div class="form-group">
			<label>Role User</label>
			<select name="role" id="inputKategori" class="form-control" required>
				<option value="Admin" <?php if(!isset($data['user']) || $data['user']->role == 'Admin') echo "Selected";?> >Admin</option>
				<option value="User" <?php if(isset($data['user']) && $data['user']->role == 'User') echo "Selected"; ?>>User</option>
			</select>
		</div>
		<button type="submit" class="btn btn-primary" onClick="validatePassword();">Simpan</button>
	</form>
</div>
@endsection

@section('js')
<script>
$('#passwordKonfirmasi').on('keyup', function () {
  if ($('#password').val() == $('#passwordKonfirmasi').val()) {
    $('#message').html('Password sama').css('color', 'green');
  } else 
    $('#message').html('Password tidak sama').css('color', 'red');
});
</script>
@endsection