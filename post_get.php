<?php
include('con.php');
if(isset($_POST['clickevent'])||isset($_POST['chclickevent'])||isset($_POST['loadevent'])||isset($_POST['unloadevent'])){
    $cl=json_decode($_POST['clickevent'],true);
    if($cl!=null){
        $qy="INSERT INTO events(data) VALUES ('$cl')";
        $qy=mysqli_query($con,$qy);
    }
    $chcl=json_decode($_POST['chclickevent'],true);
    if($chcl!=null){
        $qy="INSERT INTO events(data) VALUES ('$chcl')";
        $qy=mysqli_query($con,$qy);
    }
    $load=json_decode($_POST['loadevent'],true);
    if($load!=null){
        $qy="INSERT INTO events(data) VALUES ('$load')";
        $qy=mysqli_query($con,$qy);
    }
    $unload=json_decode($_POST['unloadevent'],true);
    if($unload!=null){
        $qy="INSERT INTO events(data) VALUES ('$unload')";
        $qy=mysqli_query($con,$qy);
    }
}
if(isset($_GET['cliclevent'])||isset($_GET['chclickevent'])||isset($_GET['loadevent'])||isset($_GET['unloadevent'])){
    $qy="SELECT * FROM events";
    $qy=mysqli_query($con,$qy);
    if($qy->num_rows>0){
        $ourevents="";
        while($row=$qy->fetch_assoc()){
            if($row['data']!=null)
                $ourevents.=$row['data']."<br><br><br>";
        }
        echo json_encode($ourevents);
    }
    else
        echo "No data to retgrieve";
}
?>