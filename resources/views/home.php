<!DOCTYPE html>
<html>
<?php 
include 'style_sheet.php'; 
include 'connectdb.php';
?>

<style>
.logo{
    width: 70x;
    height: 70px;
    margin-top: 5px;
    margin-bottom: 5px;
}

.button{
    height: 30px;
    width: 30px;
    background-color: rgb(0, 150, 255);
    border: none;
    border-radius: 20px;
    margin-right: 5px;
}
.icon{
    height: 20px;
    width: 20px;
    max-height: 100%;
    max-width: 100%;
}
.button:hover{
    background-color: rgb(0, 200, 255)
}
.gradient{
    height: 90px;
    border: none;
    background-color: rgb(20, 100, 255);
    background-image: linear-gradient(rgb(20, 100, 255), rgba(255,255,255,1));
}
label{
    display: inline-block;
    margin-bottom: 10px;

}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 95%;
    background-color: rgb(0, 80, 255);
}
tr, td, th {
    border: 1px solid;
    border-color: rgb(0, 0, 0);
    text-align: left;
    padding: 8px;
}
tr:nth-child(even) {
    background-color: rgb(200, 200, 200);
}
tr:nth-child(odd) {
    background-color: rgb(220, 220, 220);
}
tr:hover{
    background-color: honeydew;
}
.grid-layout{
    display: inline-grid;
    grid-template-columns: 100px auto;
}
input{
    height: 30px;
}

</style>
<body>

<!--navbar-->
<nav class="gradient" class="navbar navbar-default">
    <div class="container-fluid">
        <div class="d-flex flex-row">
            <img class="logo" src="img/ukrida_logo.png">
            <div class="ml-auto mr-10 my-auto">
                <form action="home.php" method="POST">
                    <input class="mr-auto" type="text" name="searchValue" placeholder="Search" 
                    style="padding-left: 10px; border: none; border-radius: 30px; height: 30px; width: 400px;">
                    <button type="submit" class="button">
                        <i class="icon"><img src="img/search_icon.png" class="icon"></i>
                    </button>
                    
                </form>
            </div>
            <div class="ml-auto my-auto">
                <button type="button" onclick="reload();" class="button" data-toggle="modal">
                    <img class="icon" src="img/refresh_icon.png">
                </button>
                <button type="button" class="button" data-toggle="modal" data-target="#add-data">
                    <img class="icon" src="img/add_icon.png">
                </button>
            </div>
        </div>
    </div>
</nav>

<script>
    function reload(){
        window.location = 'http://localhost/arsip%20ptik/home.php';
    }
    function isEmpty() {
    }
</script>

<!--table-->
<table style="margin-left: 2.5%">
    <tr>
        <th>Tanggal Surat</th>
        <th>Nomor</th>
        <th>Lampiran</th>
        <th>Perihal</th>
        <th>Kepada</th>
        <th>Tembusan</th>
        <th>File</th>
    </tr>
    
    <?php 
        if(!isset($_REQUEST['searchValue'])){
            include 'arsip_table.php';
        }else{
            include 'search.php';
        }
    ?>

    <!-- modal -->
    <div id="add-data" class="modal fade" role="form">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Add Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="new_data.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body grid-layout">

                    <div><label>Tanggal Surat</label></div>
                    <div>
                        <input type="text" name="tempat" id="tempat" style="width: 70px; padding-left: 3px;" placeholder="Tempat" required>
                        <input type="text" name="hari" id="hari" style="width: 35px; padding-left: 3px;" maxlength="2" placeholder="DD" required>
                        <input type="text" name="bulan" id="bulan" style="width: 35px; padding-left: 3px;" maxlength="2" placeholder="MM" required>
                        <input type="text" name="tahun" id="tahun"style="width: 50px; padding-left: 3px;" maxlength="4" placeholder="YYYY" required>
                    </div>
                    
                    <div><label>Nomor</label></div>
                    <div>
                        <input type="text" name="ns1" id="ns1" style="width: 50px;" required>
                        <input type="text" name="ns2" id="ns2" style="width: 50px;" required>
                        <input type="text" name="ns3" id="ns3" style="width: 50px;" required>
                        <input type="text" name="ns4" id="ns4" style="width: 50px;" required>
                        <input type="text" name="ns5" id="ns5" style="width: 50px;" required>
                    </div>

                    <div><label>Lampiran</label></div>
                    <div><input type="text" id="lampiran" name="lampiran" required></div>

                    <div><label>Perihal</label></div>
                    <div><input type="text" id="perihal" name="perihal" required></div>

                    <div><label>Kepada</label></div>
                    <div><input type="text" id="kepada" name="kepada" required></div>

                    <div><label>Tembusan</label></div>
                    <div><input type="text" id="tembusan" name="tembusan" required></div>

                    <div><label>File</label></div>
                    <div><input type="file" id="file" name="file" required></div>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="kirim" class="btn btn-default" onclick="isEmpty();">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal preview data -->
<div id="preview-data" class="modal fade" role="form">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Preview Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="preview_data.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body grid-layout">

                    <div><label>Tanggal Surat</label></div>
                    <div><label></label></div>
                    
                    <div><label>Nomor</label></div>
                    <div><label></label></div>

                    <div><label>Lampiran</label></div>
                    <div></div>

                    <div><label>Perihal</label></div>
                    <div></div>

                    <div><label>Kepada</label></div>
                    <div></div>

                    <div><label>Tembusan</label></div>
                    <div></div>

                    <div><label>File</label></div>
                    <div></div>

                </div>
            </form>
        </div>
    </div>

</body>
</html>