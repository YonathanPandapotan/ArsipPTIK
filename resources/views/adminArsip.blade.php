@extends('templateAdmin')

@section('kontent')
<h1>Data Berita</h1>

<ol class="breadcrumb" style="font-size: 15px">
  <li>
    <a href="/admin"><span class="fa fa-home"></span> Home</a>
  </li>
  <li>
    <a href="#"><span class="fa fa-book"></span> Arsip</a>
  </li>
</ol>
<a href="/admin/arsip/form/" class="btn btn-primary" style="margin-bottom: 20px;"><span class="fa fa-pencil"></span> Tambah Berita</a>

<div class="col-lg-12">
	<table id="TableId" class="table table-responsive">
		<thead>
			<th>No</th>
			<th>Tanggal</th>
			<th>Tipe Surat</th>
			<th>Kepada</th>
			<th>Tembusan</th>
			<th>Lampiran</th>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach ($data['arsip'] as $arsip) { ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td>{{ date('d-m-Y', strtotime($arsip->tanggal)) }}</td>
					<td><?php echo $arsip->tipeSurat; ?></td>
					<td><?php echo $arsip->kepada; ?></td>
					<td><?php echo $arsip->tembusan; ?></td>
					<td><?php echo $arsip->lampiran; ?></td>
					<td>
						<a href="/admin/arsip/view/<?php echo $arsip->idArsip; ?>" class="btn btn-success">View</a>
						<a href="/admin/arsip/form/<?php echo $arsip->idArsip; ?>" class="btn btn-warning">Edit</a>
						<a href="/admin/arsip/delete/<?php echo $arsip->idArsip; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>
					</td>
				</tr>
			<?php 
				$no++;
			} ?>
		</tbody>
	</table>
</div>
@endsection