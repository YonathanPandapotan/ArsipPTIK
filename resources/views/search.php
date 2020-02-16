<?php 
include 'connectdb.php';
if(isset($_REQUEST['searchValue'])){
    $query = "select * from arsip where 
    arsip.tanggal_surat like '%".$_POST['searchValue']."%' or 
    arsip.nomor_surat like '%".$_POST['searchValue']."%' or 
    arsip.lampiran like '%".$_POST['searchValue']."%' or
    arsip.perihal like '%".$_POST['searchValue']."%' or
    arsip.kepada like '%".$_POST['searchValue']."%' or
    arsip.tembusan like '%".$_POST['searchValue']."%'";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        while($rows=mysqli_fetch_assoc($result)){
            echo "
                <tr>  
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
    else{
        echo "Result not found.";
    }
}

?>