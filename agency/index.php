<?php
session_start();
include('Admin/config/dbcon.php');
include('authentication.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<html>
    <head>
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
.pdate, .title, .description, .pfrm, .crtd {
    color: blue;
}

.clear {
    clear:both;
}
.container1 {
  float: left;
  display: inline;
  margin-left: 45px;
  padding: 5px;
}
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
.sss{
  height: 300px;
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  border-radius: 10%;
}
.headerl{
  color: blue;
  width: 100%;
  text-align: center;
  background-color: transparent;
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
.body{
  background-color: teal;
}
</style>
    </head>    
    <body class="body">
      <?php include('message.php');?>
    <div class="container">
      <div class="row">
       <div class="col-lg-1"></div>
         <div id="hello" class="col-lg-10">
      
         <!-- <h1 class="headerl"> WellCome to Ministry Of Labour and Social Affarirs <br> የሰራተኛና ማህበራዊ ጉዳይ ኤጀንሲ</h1>
          -->
        </div>
     </div>
   </div>
</div>
<br>
<center>
<h2>Colaborative Company</h2>
</center>
<br>
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 5</div>
  <img src="logo.jpg" class="sss">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 5</div>
  <img src="helodelala.png" class="sss">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 5</div>
  <img src="helodelala2.jpg" class="sss">
  <div class="text">Caption Three</div>
</div>
<div class="mySlides fade">
  <div class="numbertext">4 / 5</div>
  <img src="name.jpg" class="sss">
  <div class="text">Caption Three</div>
</div>
<div class="mySlides fade">
  <div class="numbertext">5 / 5</div>
  <img src="hlogo.jpg" class="sss">
  <div class="text">Caption Three</div>
</div>
</div>


<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<br>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
<center>
    <h1 class='text-dark'>Recent Post</h1>
    </center>
    <hr>

    <?php  
      $no=1;
      // Import the file where we defined the connection to Database.       
      
          $per_page_record = 4;  // Number of entries to show in a page.   
          // Look for a GET variable page if not found default is 1.        
          if (isset($_GET["page"])) {    
              $page  = $_GET["page"];    
          }    
          else {    
            $page=1;    
          }    
      
          $start_from = ($page-1) * $per_page_record;     
      
          $query = "SELECT * FROM post ORDER BY pid DESC LIMIT $start_from, $per_page_record ";     
          $rs_result = mysqli_query ($con, $query);    
      ?>    
    
      <div class="container">   
        <br>  
        
        <?php     
              while ($row = mysqli_fetch_array($rs_result)) {    
                    // Display each field of the records.    
              ?>     
  <center>
  <div class="container-fluid " id='posts'>
    <!-- <div class="card "> -->
    <div class="card card-columns col-lg-8">
      <!-- content of the card goes here -->
      <div class="card-header"><b style="margin-right:10px;">Title :</b>
          <?php echo "<b class='text-primary'>". $row["title"]; ?></b>
          <br> 
          <sm>
            <?php 
            $cid=$_SESSION['auth_user']['cid'];
          if ($row["pdate"]!=null){
               echo "<b  style='margin-right:10px;'>Meetting Date :</b> ".
               "<sm class='text-primary'>". $row["pdate"]. "</sm>";
              }
           ?>
           </sm>
           </div>
           <br>
           
         <sm>
           <?php
           echo "<b  style='margin-right:10px;'>Author Comapny :</b> ".
               "<sm class='text-primary'>". $row["pfrm"]. "</sm>";
              ?>
      <div class="card-body"><?php echo $row["description"]; ?></div>
      <div class="card-footer"><b>Published Date</b> : <?php echo substr($row["created_at"],0,10); ?></div>
      <div>
        <form action="responsecode.php" method="POST" >
        <input type="text" name="responsedata">
        <input type="submit" value="Response" name="response">
        <input type="hidden" value="<?=$cid?>" name="cid">
        <input type="hidden" value="<?=$row["pid"]?>" name="pid">
        <input type="hidden" value="<?=$page?>" name="page">
        </form>
      </div>
    </div>
    </div>
    <br>
    <br>
    </center>
        
              <?php   
              $no++;  
                  };    
              ?>     
        
        </div> 
            
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
              echo "<a href='index.php?page=".($page-1)."'>  Prev </a>";   
          }       
                     
          for ($i=1; $i<=$total_pages; $i++) {   
            if ($i == $page) {   
                $pagLink .= "<a class = 'active' href='index1.php?page=" .$i."'>".$i." </a>";   
            }               
            else  {   
                $pagLink .= "<a href='index.php?page=".$i."'>".$i." </a>";     
            }   
          };     
          echo $pagLink;   
    
          if($page<$total_pages){   
              echo "<a href='index.php?page=".($page+1)."'>  Next </a>";   
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
      function go2posts(){
        window.location.href='#posts';
      }  
      function go2Page()   
      {   
          var page = document.getElementById("page").value;   
          page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
          window.location.href = 'index.php?page='+page;
      }   
    </script>  
    </body>   
  </html>  












<?php
include('includes/footer.php');
?>