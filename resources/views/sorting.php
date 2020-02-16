<?php 
include 'connectdb.php';

if(isset($_REQUEST['ascending'])){
    $query = "select * from arsip order by lampiran asc like '%".$_POST['ascending']."%';
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
                </tr>
            ";
        }
    }
}

?>