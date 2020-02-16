@extends('templateAdmin')

@section('kontent')
<h1>Tambah/Edit Berita</h1>

<ol class="breadcrumb" style="font-size: 15px">
  <li>
    <a href="/admin"><span class="fa fa-home"></span> Home</a>
  </li>
  <li>
    <a href="/admin/arsip"><span class="fa fa-book"></span> Arsip</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-pencil"></span>Tambah Berita</a>
  </li>
</ol>
<div class="col-xs-12">
	<a href="/admin/arsip" class="btn btn-danger" style="margin-bottom: 15px"><span class="fa fa-arrow-left"></span> Kembali</a>
</div>
<div class="col-xs-12">
    <?php 
        if (isset($data['error']) && count($data['error']) > 0) {
    ?>
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul class="list-square">
            <?php foreach ($data['error'] as $error) { ?>
                <li><?php echo $error; ?></li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>
</div>
<div class="col-lg-12">
	<form method="post" enctype="multipart/form-data">
		@csrf <!-- {{ csrf_field() }} -->
		<div class="form-group">
			<label>Tipe Surat</label> 
			<input type="text" name="tipeSurat" class="form-control" 
            <?php if (isset($data['arsip'])) echo "value='" . $data['arsip']->tipeSurat . "'"; ?>>
		</div>
		<div class="form-group">
			<label>Nomor</label>
			<input type="text" name="nomor" class="form-control" 
            <?php if (isset($data['arsip'])) echo "value='" . $data['arsip']->nomor . "'";?>>
		</div>
        <div class="form-group">
			<label>Kepada</label>
			<input type="text" name="kepada" class="form-control" 
            <?php if (isset($data['arsip'])) echo "value='" . $data['arsip']->kepada . "'";?>>
		</div>
        <div class="form-group">
			<label>Tembusan</label>
			<input type="text" name="tembusan" class="form-control" 
            <?php if (isset($data['arsip'])) echo "value='" . $data['arsip']->tembusan . "'";?>>
		</div>
        <div class="form-group">
			<label>Lampiran</label>
			<input type="text" name="lampiran" class="form-control" 
            <?php if (isset($data['arsip'])) echo "value='" . $data['arsip']->lampiran . "'";?>>
		</div>
        <div class="form-group">
			<label>Perihal</label>
			<input type="text" name="perihal" class="form-control" 
            <?php if (isset($data['arsip'])) echo "value='" . $data['arsip']->perihal . "'";?>>
		</div>
        <div class="form-group">
			<label>Tanggal</label>
			<input type="date" name="tanggal" class="form-control" 
            <?php if (isset($data['arsip'])) echo "value='" . $data['arsip']->tanggal . "'";?>>
		</div>
		<div class="row">
            <div class="col-lg-8">
                <div class="form-group">
                    <label>File</label>
                    <input type="file" name="file" class="form-control" accept="application/pdf" >
                </div>
            </div>
		</div>	
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>
@endsection