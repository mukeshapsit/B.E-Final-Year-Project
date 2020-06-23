<?php

session_start();
 
    if(isset($_SESSION['User']))
    {
    

    }
    else
    {
        header("location:index.php");
    }


if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `phone` WHERE CONCAT(`name`) LIKE '%".$valueToSearch."%' limit 1";
    $search_result = filterTable($query);
    
}

else {
    $query = "SELECT * FROM `phone` limit 1";
    $search_result = filterTable($query);
}

// if(isset($_POST['compare']))
// {
//     $valueToSearch = $_POST['comparephone'];
//     $query = "SELECT * FROM `phone` WHERE CONCAT(`name`) LIKE '%".$comparephone."%'";
//     $compare_result = filterTable($query);
    
// }


// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "project");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <script src="js/jquery.min.js"></script>  
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <style>

        .image_div{
            width:200px; 
            height:300px; 
            margin-left: 8%;
            overflow: hidden;



        }

        .image_div:hover > img {
                 transform: scale(1.3);
                 transition: transform .5s ease;
                }

        .image_div >img {
            margin-left: 25px;
            margin-top: 40px; 
            width:150px; 
            height:220px; 
        } 
        .img_price
        {
            position: relative;

        }
        .price_tag
        {
            height: 300px;
            width: 200px;
            position: relative;
            margin-top: -300px;
            margin-left: 22%;
            text-align: center;
        }
        .amazon
        {
            width: 200px;
            height: 100px;
        }
        .flipkart
        {
            width: 200px;
            height: 100px;
        }
        .price
        {
            height: 50px;
            width: 200px;
            font-size: 20px;
            font-weight: 700;
        }

    </style>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $_SESSION['User'];?></a>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link" href="/new/welcome.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php?logout">Logout</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="phone.php" method="post">
              <input class="form-control mr-sm-2" type="text" name="valueToSearch" placeholder="Value To Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search" value="Search">Search</button>
            </form>
          </div>
        </nav>

        <br>
        <br>
        <form action="phone.php" method="post">
            <!-- <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Search"><br><br> -->
<!-- 
             <input type="text" name="comparephone" placeholder="Enter Phone to Compare"><br><br>
            <input type="submit" name="compare" value="compare"><br><br> -->
            <?php while($row = mysqli_fetch_array($search_result)):?>

                <div class="img_price">
                <div class="image_div">
                <img src="<?php echo $row['image_url'];?>">
                </div>

                <div class="price_tag">
                    <a href="<?php echo $row['amazon_link']; ?>">
                    <div class="amazon">
                        <img src="img/amz100.jpg">

                    </div>
                    </a>
                    <div class="price">
                       Rs. <?php echo $row['amazon_price'];?>
                        
                    </div>
                    <a href="<?php echo $row['flipkart_link']; ?>">
                    <div class="flipkart">
                         <img src="img/fkt100.jpg">
                        
                    </div>
                    </a>
                    <div class="price">
                        Rs. <?php echo $row['flipkart_price'];?>
                    </div>
                </div>

                </div>
                <br>
            <table class="table table-striped table-bordered">

                <tr>
                    <th>Name</th>
                    <td><?php echo $row['name'];?></td>
                </tr>

                <tr>
                    <th>Storage</th>
                    <td><?php echo $row['storage'];?></td>
                </tr>

                <tr>
                    <th>Screen</th>
                    <td><?php echo $row['screen'];?></td>
                </tr>

                <tr>
                    <th>Camera</th>
                    <td><?php echo $row['camera'];?></td>
                </tr>

                <tr>
                    <th>Battery</th>
                    <td><?php echo $row['battery'];?></td>
                </tr>

                <tr>
                    <th>Processor</th>
                    <td><?php echo $row['processor'];?></td>
                </tr>

                <tr>
                    <th>Price</th>
                    <td><?php echo $row['price'];?></td>
                </tr>
                
            </table>
            <?php endwhile;?>
        </form>
        
    </body>
</html>







