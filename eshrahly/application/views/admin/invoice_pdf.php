<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<?php $tran_id = base64_decode(urldecode($_GET['id']));?>
<head>
  <title>Invoice no. <?php echo $tran_id; ?>.pdf</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style>
body{
  color :#654E37!important;
}

#table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top: 30px!important;
}

#table td, th {
  
  padding-top: 10px;
  padding-bottom: 10px;
  font-weight: bold;
  background-color: #dddddd;
  border-top: 2px solid #71af2e!important;
  border-bottom: 2px solid #71af2e!important;
}
</style>
<body text="#8B4513">
<div class="container">
<spam><h2 style="color : #654E37!important;"><b>Eshrahly</b> | Paid Invoice</h2></spam>
  <br>
<?php
  $tran_id = base64_decode(urldecode($_GET['id']));
  $name = base64_decode(urldecode($_GET['name']));
  $cash = base64_decode(urldecode($_GET['cash']));
  $card = base64_decode(urldecode($_GET['card'])); 
  $app_profit = base64_decode(urldecode($_GET['profit']));
  $remind = base64_decode(urldecode($_GET['rem']));
  $total = base64_decode(urldecode($_GET['total']));
  $invoice_no = mt_rand(1000,9999);
  $invoice_date = date('d-m-Y');
?> 

<table style="width:100%">
<tr>
  <td>Bill To : </td>
  <td> <?php echo $name;?></td>
  <td>Phone : </td>
  <td> 986531212</td>
  <td> Invoice #</td>
   <td> <?php echo $invoice_no;?></td>
</tr>
<tr>
  <td>Address</td>
  <td>Vijay Nagar</td>
  <td>Fax </td>
  <td>0484848484</td>
  <td>Invoice From Date</td>
  <td> <?php echo $invoice_date ; ?></td>
</tr>
</table>
<table id="table" >
<tr >
    <th>Date</th>
    <th>Cash</th>
    <th>Credit</th>
    <th>Total</th>
    <th>App profit</th>
    <th>Discount</th>
    <th>Total To Send</th>
</tr>
<tr>
    <td> <?php echo $invoice_date ; ?></td>
    <td> $<?php echo $cash ; ?></td>
    <td> $<?php echo $card ; ?></td>
    <td> $<?php echo $total; ?> </td>
    <td> $<?php echo $app_profit ; ?></td>
    <td> <!--$<?php echo $remind; ?> --></td>
    <td> $<?php echo $remind ; ?></td>
</tr>
</table>
<br>
<table style="width:30%;float:right;" >

<tr>
  <td>Invoice Subtotal</td>
  <td>  $<?php echo $total ; ?></td>
</tr>

<tr style="border-bottom: 1px solid #000;">
   <td>Total</td>
  <td> # <?php echo $total ; ?></td>
</tr>
</table>

</div>

</body>
</html>