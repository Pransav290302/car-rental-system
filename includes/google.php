<?php
    if (isset($_POST["submit_address"]))
    {
        $address = $_POST["address"];
        $name=$_POST['name']; 
        $address = str_replace(" ", "+", $address);
        $sql="INSERT INTO  tbladdress(address,name) VALUES(:address,:name)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':address',$address,PDO::PARAM_STR);
        $query->bindParam(':name',$name,PDO::PARAM_STR);
        $query->execute();
        ?>
 
        <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe>
 
        <?php
    }
?>

<form method="POST">
    <p>
    
        <input type="text" name="address" placeholder="Enter Address">
        <input type="text" name="name" placeholder="Full Name"> 
    </p>
 
    <input type="submit" name="submit_address">
</form>

