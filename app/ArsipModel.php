<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArsipModel extends Model
{
    protected $table = 'arsip';
    
    public $fillable = ['idArsip', 'tipeSurat', 'nomor', 'kepada', 'tembusan', 'lampiran', 'perihal', 'tanggal', 'file'];
    protected $primaryKey = 'idArsip';
    public $timestamps = false;
    public $incrementing = false;

}
