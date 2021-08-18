<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaction History</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body style="color:#4682B4">
  <?php include 'navbar.php'?>
  <h3 class="text-center" style="background-color:#e4eae2">Transaction History</h3>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      color: #ff7f7f;
      font-family: monospace;
      font-size: 25px;
      text-align: left;
    }

    th {
      background-color: #588c7e;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2
    }
  </style>
  <div>
    <?php include 'config.php' ?>
    <?php
$sql = "SELECT * FROM transaction";
$result = mysqli_query($con,$sql);
  if(mysqli_num_rows($result) > 0) {
    ?>
    <table id="table" class="table-condensed table-bordered">
      <tr>
        <td><b>Transaction ID</b></td>
        <td><b>Sender Acc No.</b></td>
        <td><b>Sender Acc Name</b></td>
        <td><b>Receiver Acc No.</b> </td>
        <td><b>Receiver Acc Name</b> </td>
        <td><b>Amount Transfer</b> </td>

      </tr>
      <?php
    $i=0;
    while($row = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><b>
            <?php echo $row["TID"]; ?>
          </b></td>
        <td><b>
            <?php echo $row["S_ID"]; ?>
          </b></td>
        <td><b>
            <?php echo $row["S_NAME"]; ?>
          </b></td>
        <td><b>
            <?php echo $row["R_ID"]; ?>
          </b></td>
        <td><b>
            <?php echo $row["R_NAME"]; ?>
          </b></td>
        <td><b>
            <?php echo $row["AMOUNT"]; ?>
          </b></td>

      </tr>
      <?
   $i++;
   }
   ?>
    </table>
    <?php
}
else{
   echo "No result found";
}
?>
  </div>

  <?php include 'footer.php'?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
</body>

</html>