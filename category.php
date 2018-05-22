<?php 
// if category_id is not set, redirect back to index page
if(!isset($_GET['category_id'])){
    header("location:index.php");
}
//SELECTall stock items belonging to the selected category_id
$report_sql="SELECT report.report_id, report.name, category.name AS catname FROM report JOIN category ON report.category_id=category.category_id WHERE report.category_id=".$_GET['category_id'];
if($report_query=mysqli_query($dbconnect, $report_sql)){
    $report_rs=mysqli_fetch_assoc($report_query);
            }
if(mysqli_num_rows($report_query)==0){
    echo "Sorry, this page is currently unavailable";
}
else
{
    ?>
<h1>

</h1>
<?php do{
    ?>
<div class="list">
    <a href=""><p><?php echo $report_rs['name']; ?></p></a>
</div>
<?php
}while($report_rs=mysqli_fetch_assoc($report_query));
?>
<?php
}
        
?>