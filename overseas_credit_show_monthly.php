<?php include('session.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>Inventory Management System</title>
    <?php include("head.php");?>

    
</head>

<body style="overflow-y:auto;">
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php include("nev.php");?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php include("saide.php");?>
            <!-- Navbar End -->




            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
            
            <div class="row g-4">
                
                <div class="col-sm-12 col-md-12 col-xl-12">
                    <div class="h-100 bg-secondary rounded p-4" style="overflow-x:auto;">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                    
                            <div class="col-12 text-center text-sm-start">
                                <center><h2>OVERSEAS MONTHLY TRANSACTION</h2> 
                                <h5>(CREDIT-SHOW)</h5></center>
                                
                            
                            </div>   
                       </div>
                    </div>
                </div>
            </div> <!-- -------------------------------Delete Function Starts here------------------------------- -->

<?php
            include("backend/delete.php");
            $obj= new Delete();
            if(isset($_GET['data']))
            {
                $id=$_GET['overseas_credit_show_monthly_id'];
                if($_GET['data']=='delete')
                {
                    $msg=$obj->delete_overses_monthly_credit($id);
                }
                if(isset($msg))
                
                { 
                
            }
?>

                <script>
                 swal({
                    title: " <?php  echo $msg;?>",
                    icon: "success",
                    button: "Back",
                      });
            </script>

<?php } ?>


<!-- -------------------------------Delete Function Ends here------------------------------- -->
<br> 
            <?php
                include("backend/show.php");
                $obj = new Show();
                $item = $obj->overseas_credit_show_monthly();
            ?>
            <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            
                            <table class="table table-bordered" style="border: 1px solid; border-color: white;">
                                <thead style="background-color: #D61355; color: black; text-align: center;">
                                    <tr> 			
                                        <th scope="col">Sl.No</th>
                                        <th scope="col">Social Media</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while ($element = mysqli_fetch_assoc($item)) { ?>
                                     <tr style="color: white;">
                                        <td><?php echo $element['id']; ?></td>
                                        <td><?php echo $element['social_cost']; ?></td>
                                        <td><?php echo $element['date']; ?></td>
                                        <td><center><a class="btn btn-danger" href="overseas_credit_show_monthly.php?data=delete&&overseas_credit_show_monthly_id=<?php echo $element['id']; ?>" role="button"><i class="fa fa-trash"></i> </a> 
                                        <a class="btn btn-danger" href="delete_overview.php?data=delete&&overview_id=<?php echo $element['id']; ?>" role="button"><i class="fa fa-edit"></i> </a> </center> </td>
                                     </tr>
                                 <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
            </div>
       </div>        
            <!-- Widgets End -->


            <!-- Footer Start -->
            <?php include("footer.php");?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <?php include("script.php");?>
</body>

</html>