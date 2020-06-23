<?php 
    session_start();
 
    if(isset($_SESSION['User']))
    {
        echo ' Welcome ' . $_SESSION['User'].'<br/>';
        echo '<a href="logout.php?logout">Logout</a>';
    }
    else
    {
        header("location:index.php");
    }
 


$connect = mysqli_connect('localhost','root','','project');
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $item1 = mysqli_real_escape_string($connect, $data[0]);  
    $item2 = mysqli_real_escape_string($connect, $data[1]);
    $item3 = mysqli_real_escape_string($connect, $data[2]);
    $item4 = mysqli_real_escape_string($connect, $data[3]);
    $item5 = mysqli_real_escape_string($connect, $data[4]);
    $item6 = mysqli_real_escape_string($connect, $data[5]);
    $item7 = mysqli_real_escape_string($connect, $data[6]);
    $item8 = mysqli_real_escape_string($connect, $data[7]);
    $item9 = mysqli_real_escape_string($connect, $data[8]);
    $item10 = mysqli_real_escape_string($connect, $data[9]);
    $item11 = mysqli_real_escape_string($connect, $data[10]);
    $item12= mysqli_real_escape_string($connect, $data[11]);
                $query = "INSERT INTO `phone` (`ID`, `image_url`, `name`, `storage`, `screen`, `camera`, `battery`, `processor`, `price`, `amazon_link`, `amazon_price`, `flipkart_link`, `flipkart_price`) VALUES (NULL, '$item1', '$item2', '$item3', '$item4', '$item5', '$item6', '$item7', '$item8', '$item9', '$item10', '$item11', '$item12')";
                mysqli_query($connect, $query);
   }
   fclose($handle);
   echo "<script>alert('Import done');</script>";
  }
 }
}
?>  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Admin</title>
  <script src="js/jquery.min.js"></script>  
  <link rel="stylesheet" href="css/bootstrap.min.css" />
 </head>  
 <body>  
  <h3 align="center">Import Data from CSV File to Database</h3><br />
  <form method="post" enctype="multipart/form-data">
   <div align="center">  
    <label>Select CSV File:</label>
    <input type="file" name="file" />
    <br />
    <input type="submit" name="submit" value="Import" class="btn btn-info" />
   </div>
  </form>
<br>


 </body>  
<!-- </html>  <form method="POST" action="index.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div>
      <input type="file" name="image">
    </div>
    <div>
      <textarea 
        id="text" 
        cols="40" 
        rows="4" 
        name="image_text" 
        placeholder="Say something about this image..."></textarea>
    </div>
    <div>
      <button type="submit" name="upload">POST</button>
    </div>
  </form> -->