@extends('templateAdmin')
@section('kontent')
<div class="row">
    <ol class="breadcrumb" style="font-size: 15px">
    <li>
        <a href="/admin"><span class="fa fa-home"></span> Home</a>
    </li>
    <li>
        <a href="/admin/arsip"><span class="fa fa-book"></span> Arsip</a>
    </li>
    <li>
        <a href="#"><span class="fa fa-pencil"></span>Lihat arsip</a>
    </li>
    </ol>
    <div class="col-xs-12">
        <a href="/admin/arsip" class="btn btn-danger" style="margin-bottom: 15px"><span class="fa fa-arrow-left"></span> Kembali</a>
    </div>
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Pengarsipan</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-8 col-lg-8 col-sm-7">
                    <h1><?php echo $data['arsip']->lampiran ?></h1>
                    <div class="x_content">
                        <div class="col-md-8 col-lg-8 col-sm-7">
                            <h3>Kepada:<h3>
                            <h4><?php echo $data['arsip']->kepada ?><h4>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-5">
                            <h3>Tembusan:<h3>
                            <h4><?php echo $data['arsip']->tembusan ?><h4>
                        </div>
                    </div>
                    <br><br>
                    <p>Perihal:</p>
                    <p><?php echo $data['arsip']->perihal ?></p>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-5">
                    <h2>Nomor Surat:</h2>
                    <h3><?php echo $data['arsip']->nomor ?></h3>
                    <br>
                    <h2>Tanggal:</h2>
                    <h3><?php echo $data['arsip']->tanggal ?></h3>
                </div>
                <div class="clearfix"></div>
                <a href="/file/arsip/<?php echo $data['arsip']->file ?>" class="text-center img-thumbnail" style="width: 100px; height: 100px;">
                    <img src="/images/static/file.png" class="img-thumbnail"/>
                    <p>Download File</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection