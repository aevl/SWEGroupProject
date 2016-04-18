<?
extract($_POST);

$UploadedFileName=$_FILES['UploadImage']['name'];
if($UploadedFileName!='')
{
                $upload_directory = "MyUploadImages/"; //This is the folder which you created just now
        $TargetPath=time().$UploadedFileName;
                if(move_uploaded_file($_FILES['files']['tmp_name'], $upload_directory.$TargetPath))
                {    
                    $QueryInsertFile="INSERT INTO user SET picture='$TargetPath'"; 
                    // Write Mysql Query Here to insert this $QueryInsertFile.
                    $link = mysqli_connect("pikachu-swacy.centralus.cloudapp.azure.com", "general", "Thisistheultimatepassword1337", "mydb") or die ("Connection Error " . mysqli_error($link));
                    if ($stmt = mysqli_prepare($link, $QueryInsertFile)) {
                        mysqli_stmt_bind_param($stmt, "s", $QueryInsertFile) or die ("photobind");
                    }
                
                }
}
?>
