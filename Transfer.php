<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['ID'];
    $to = $_POST['to'];
    $amount = $_POST['AMOUNT'];

    $sql = "SELECT * from user where ID=$from";
    $query = mysqli_query($con,$sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from user where ID=$to";
    $query = mysqli_query($con,$sql);
    $sql2 = mysqli_fetch_array($query);

    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Transaction Cannot be completed due to negative values")';
        echo '</script>';
    }

    else if($amount > $sql1['BALANCE'])
    {

        echo '<script type="text/javascript">';
            echo ' alert("Transaction Failed: Insufficient Balance!!")';  // showing an alert box.
            echo '</script>';
    }

    else if($amount == 0){

         echo "<script type='text/javascript'>";
            echo "alert('Transaction Failed: Zero cannot be transfered')";
            echo "</script>";
     }


    else {
                $newbalance = $sql1['BALANCE'] - $amount;
                $sql = "UPDATE user set BALANCE=$newbalance where ID=$from";
                mysqli_query($con,$sql);

                $newbalance = $sql2['BALANCE'] + $amount;
                $sql = "UPDATE user set BALANCE=$newbalance where ID=$to";
                mysqli_query($con,$sql);

                $s_id = $sql1['ID'];
                $s_name = $sql1['NAME'];
                $r_id = $sql2['ID'];
                $r_name = $sql2['NAME'];
                $sql = "INSERT INTO transaction(`S_ID`, `S_NAME`, `R_ID`,`R_NAME`,`AMOUNT`) VALUES ('$s_id', '$s_name' ,'$r_id', '$r_name' ,'$amount')";
                $query=mysqli_query($con,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                        window.location = 'Transaction.php';
                    </script>";

                }

                $newbalance= 0;
                $amount =0;
        }

}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wIDth=device-wIDth, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style type="text/css">
        button {
            border-radius: 12px;
            border: none;
            background: #ebecf0;
        }

        button:hover {
            background-color: #777E8B;
            transform: scale(1.1);
            color: white;
        }
    </style>
</head>

<body style="background-color :#e4eae2">

    <?php
  include 'navbar.php';
?>

    <div class="container">
        <h2 class="text-center pt-4" style="color :#8bc34a;">Transaction</h2>
        <?php
                include 'config.php';
                $sid=$_GET['ID'];
                $sql = "SELECT * FROM  `user` where `ID` = $sid";
                $result=mysqli_query($con,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($con);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
        <form method="post" name="transact" class="tabletext"><br>
            <div>
                <table class="table table-striped table-condensed table-bordered">
                    <tr style="color :rgb(255,127,127);">
                        <th class="text-center">Account No.</th>
                        <th class="text-center">Account Name</th>
                        <th class="text-center">Contacts</th>
                        <th class="text-center">Balance</th>
                    </tr>
                    <tr style="color :#9acd32;">
                        <td class="py-2"><b>
                                <?php echo $rows['ID'] ?>
                            </b></td>
                        <td class="py-2"><b>
                                <?php echo $rows['NAME'] ?>
                            </b></td>
                        <td class="py-2"><b>
                                <?php echo $rows['EMAIL'] ?>
                            </b></td>
                        <td class="py-2"><b>
                                <?php echo $rows['BALANCE'] ?>
                            </b></td>
                    </tr>
                </table>
            </div>
            <br><br><br>
            <label style="color :rgb(255,127,127);"><b>Transfer To:</b></label>
            <select name="to" class="form-control" required>
                <option value="" disabled selected>Choose</option>
                <?php
                include 'config.php';
                $sid=$_GET['ID'];
                $sql = "SELECT * FROM user where ID!=$sid";
                $result=mysqli_query($con,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($con);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['ID'];?>">

                    <?php echo $rows['NAME'] ;?> (Balance:
                    <?php echo $rows['BALANCE'] ;?> )

                </option>
                <?php
                }
            ?>
                <div>
            </select>
            <br>
            <br>
            <label style="color : rgb(255,127,127);"><b>Amount:</b></label>
            <input type="number" class="form-control" name="AMOUNT" required>
            <br><br>
            <div class="text-center">
                <button class="btn mt-3" name="submit" type="submit" ID="myBtn"><b>Transfer</b></button>
            </div>
        </form>
    </div>
    <?php include 'footer.php'?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>