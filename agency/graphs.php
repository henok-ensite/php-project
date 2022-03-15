<?php
include('config/dbcon.php');
include('authentication.php');
include('includes/header.php');
include('includes/script.php');
?>

      <?php      
            $query = "SELECT eid from employee";
            $query_run = mysqli_query($con, $query);
            $query2 = "SELECT rid from report";
            $query_run2 = mysqli_query($con, $query2);
            
            if(mysqli_num_rows($query_run2) > 0)
            { 
     //          foreach($query_run as $company)
     //             {
     //             echo "<p>".$company['fname']."</p>".'<br>';
                 $employed=mysqli_num_rows($query_run2);
                 //echo "<p>$employed</p>";

                 //}
           }  

            if(mysqli_num_rows($query_run) > 0)
                   { 
            //          foreach($query_run as $company)
            //             {
            //             echo "<p>".$company['fname']."</p>".'<br>';
                        $totalemp=mysqli_num_rows($query_run);
                        $totalunemp=$totalemp-$employed;
                        //echo "<p>$totalunemp</p>";
                        //}
                  }    
         echo "  <center>
                   <br><br><div>
                   <b>Total Number of Job Seeker: $totalemp </b>
                  </div>
                  <div>
                        <b>Total Number of Employement: $employed</b>
                  </div>
                  <div>
                     <b>Total Number of Unemployement: $totalunemp</b>
                  </div>
                  </center>"          
      ?>

  <script type="text/javascript">
   google.charts.load("current", {packages:["corechart"]});
   google.charts.setOnLoadCallback(drawChart);
   function drawChart() {
   var unemployed=<?php echo json_encode($totalunemp, JSON_HEX_TAG); ?>;
   var employed=<?php echo json_encode($employed, JSON_HEX_TAG); ?>;

   var data = google.visualization.arrayToDataTable([
     ['Task', 'Employement Rate'],
     ['Unemployed',   unemployed],
     ['Employed',   employed],
    ]);

    var options = {
     title:"Employement Rate Pie Chart",
     is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
   }

  </script>
<br>
     <center>
        <!-- <div>
           <b>Employement Rate Pie Chart</b>
        </div> -->
   <div id="piechart_3d" style="width: 900px; height: 500px; margin-left:10%"></div>
    </center>

<?php
include('includes/footer.php');
include('includes/script.php');
?>