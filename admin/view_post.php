<?php
include('config/dbcon.php');
include('authentication.php');
include('includes/header.php');
?>

<style>   
    table {  
        border-collapse: collapse;  
    }  
        .inline{   
            display: inline-block;   
            float: right;   
            margin: 20px 0px;   
        }   
         
        input, button{   
            height: 34px;   
        }   
  
    .pagination {   
        display: inline-block;   
    }   
    .pagination a {   
        font-weight:bold;   
        font-size:18px;   
        color: black;   
        float: left;   
        padding: 8px 16px;   
        text-decoration: none;   
        border:1px solid black;   
    }   
    .pagination a.active {   
            background-color: pink;   
    }   
    .pagination a:hover:not(.active) {   
        background-color: skyblue;   
    }   
        </style> 

<div class="container-fluid px-4">
    <h4 class="mt-4">View Posts</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">POST</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Registerd Employee
                    <a href="index.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-stripe">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Meeting Date</th>
                                <th>Posted From</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Edit</th>
                                
</tr>
</thead>
<tbody> 
    <?php  
      $no=1;
    // Import the file where we defined the connection to Database.     
    
        $per_page_record = 8;  // Number of entries to show in a page.   
        // Look for a GET variable page if not found default is 1.        
        if (isset($_GET["page"])) {    
            $page  = $_GET["page"];    
        }    
        else {    
          $page=1;    
        }    
    
        $start_from = ($page-1) * $per_page_record;     
        $query = "SELECT * FROM post ORDER BY pid DESC LIMIT $start_from, $per_page_record";     
        $rs_result = mysqli_query ($con, $query);    

            while ($row = mysqli_fetch_array($rs_result)) {    
                  // Display each field of the records.    
            ?>     
            <tr>     
             <td><?= $no ?></td>     
            <td><?= $row["title"]; ?></td>   
            <td><?= $row["pdate"]; ?></td>   
            <td><?= $row["pfrm"]; ?></td>   
            <td><?= $row['description']; ?></td>  
            <td><?= $row['created_at']; ?></td>   
            <td><a href="Post_replay.php?id=<?=$row['pid'];?>" class="btn btn-success">View Replay</a></td>                                
            </tr>     
            <?php   
            $no++;  
                };    
            ?>     
          </tbody>   
        </table>   
  
     <div class="pagination">    
      <?php  
        $query = "SELECT COUNT(*) FROM post";     
        $rs_result = mysqli_query($con, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='view_post.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='index1.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='view_post.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='view_post.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    
      </div>  
  
  
      <div class="inline">   
      <input id="page" type="number" min="1" max="<?php echo $total_pages?>"   
      placeholder="<?php echo $page."/".$total_pages; ?>" required>   
      <button onClick="go2Page();">Go</button>   
     </div>    
    </div>   
  </div>  
</center>   
  <script>   
    function go2Page()   
    {   
        var page = document.getElementById("page").value;   
        page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
        window.location.href = 'view_post.php?page='+page;   
    }   
  </script>  
  </body>   
</html>  

<?php
include('includes/footer.php');
include('includes/script.php');
?>



