<?php include 'connectdb.php';
    $tempat = $_POST['tempat'];
    $tahun = $_POST['tahun'];
    $bulan = $_POST['bulan'];
    $hari = $_POST['hari'];
    $tanggal_surat = $tempat."/".$hari."/".$bulan."/".$tahun;
    $ns1 = $_POST['ns1'];
    $ns2 = $_POST['ns2'];
    $ns3 = $_POST['ns3'];
    $ns4 = $_POST['ns4'];
    $ns5 = $_POST['ns5'];
    $nomor_surat = $ns1."/".$ns2."/".$ns3."/".$ns4."/".$ns5;
    $lampiran = $_POST['lampiran'];
    $perihal = $_POST['perihal'];
    $kepada = $_POST['kepada'];
    $tembusan = $_POST['tembusan'];

    $target_dir = "data/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $query = "select nomor_surat from arsip";
    $result = mysqli_query($conn,$query);
    $rowcount = mysqli_num_rows($result);
    if($rowcount < 0){
        $id = $rowcount;
    }else{
        $id = $rowcount + 1;
    }


    if($tanggal_surat==""||$nomor_surat==""||$lampiran==""||$perihal==""||$kepada==""||$tembusan==""||$target_file==""){
        echo ("You missing an Information!");
    }else{
        $query = "insert into 
        arsip(id,tipe_surat,tanggal_surat,nomor_surat,lampiran,perihal,kepada,tembusan,file_surat) 
        value('$id','$tanggal_surat','$nomor_surat','$lampiran','$perihal','$kepada','$tembusan','$target_file')";
        if ($conn->query($query) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }
?>