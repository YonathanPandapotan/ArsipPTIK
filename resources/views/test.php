<!DOCTYPE html>
<html>
<style>
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
    background-color: lightblue;
}
</style>
<body>
    <form action="test.php" method="post">
    <input type="radio" name="number" value="1"><label>one</label>
    <input type="radio" name="number" value="10"><label>ten</label>
    <button type="submit" name="kirim" onclick="">Add</button>
    </form>

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
</body>
<script >
    var x = Document.getElementByID('slectedRow');

    function selector(parameter){
    }
</script>
<?php
include 'connectdb.php';
include 'arsip_table.php';

// $x = 0;

$x = $_POST['number'];
echo "$x"."| ";
if(isset($_REQUEST['number'])){
    $query = "select nomor_surat from arsip where id ='$x'";
    $result = mysqli_query($conn,$query);
    $rowcount = mysqli_num_rows($result);
    if($rowcount >= 1){
        $id = $rowcount;
    }
    else if($rowcount = 1){
        $id = $rowcount + 1;
    }
    echo $rowcount." ";
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["nomor_surat"];
        }
    } else {
        echo "0 results";
    }
}

// echo "         Row Count :";
// $query = "select nomor_surat from arsip";
//     $result = mysqli_query($conn,$query);
//     $rowcount = mysqli_num_rows($result);
//     if($rowcount >= 0){
//         $id = $rowcount;
//         echo "$id";
//     }else{
//         $id = 1;
//         echo "$id";
//     }

    if(isset($_REQUEST['number'])){
    $query = "select * from arsip where id = $id;";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        while($rows=mysqli_fetch_assoc($result)){
            echo "
                <tr id = selectedRow onclick = selector>
                    <td hidden>".$rows['id']."</td>
                    <td>".$rows['tanggal_surat']."</td>
                    <td>".$rows['nomor_surat']."</td>
                    <td>".$rows['lampiran']."</td>
                    <td>".$rows['perihal']."</td>
                    <td>".$rows['kepada']."</td>
                    <td>".$rows['tembusan']."</td>
                    <td><a href='".$rows['file_surat']."'>Download</a></td>
                </tr>";
        }
    }
}

?>
</html>