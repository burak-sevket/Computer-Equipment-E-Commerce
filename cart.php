<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      }		
}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store</title>
	<link rel="shortcut icon" href="resimler/money_protection_bank_safe_security_icon_188769 (1).ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"> </script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/lightbox.min.css" media="screen">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="js/lightbox.js"></script>
</head>
<body class="white-gray">
  <script>
    $(document).ready(function(){
      $("#ürünler").addClass("active");
    });
    </script>
   <nav class="navbar navbar-expand-lg navbar-light green-blue sticky-top m-0">
    <a class="navbar-brand" href="#">DEMİRKIRAN HOLDİNG</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="mainpage.php"><i class="fa fa-home pr-2"></i>Mainpage <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="ürünler" href="Products.html"><i class="fa fa-shopping-cart pr-2"></i>Products</a>
        </li>
        <form class="form-inline ml-lg-5 mr-lg-3 pr-3 pl-3">
          <input class="form-control mr-lg-2" type="search" size="40px" placeholder=" Anahtar Kelime Ürün veya Model Giriniz" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <li class="nav-item">
          <a class="nav-link" href="Register.html"><i class="fa fa-user-plus pr-2"></i>Kayıt Ol</a>
        </li>
		
      </ul>
    </div>
  </nav>
<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>  
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr> 
<?php   
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td>
<img src='<?php echo $product["image"]; ?>' width="50" height="40" />
</td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>

</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?>
value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?>
value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?>
value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?>
value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?>
value="5">5</option>
</select>
</form>
</td>
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
<a class="nav-link " id="pay" href="pay.html"><button type='submit' class='py-2 px-3 orange-yellow buy' style='color:rgb(11, 11, 97); font-weight: 600;'>Pay</button></a>
</td>
</tr>
</tbody>
</table>    
  <?php
}else{
  echo "<h3>Your cart is empty!</h3>";
  }
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

<div class="right">
<a class="nav-link " align="right" href="pay.html" ><button type='submit' class='py-2 px-3 orange-yellow buy' style='color:rgb(11, 11, 97); font-weight: 600;'>Pay</button></a>
</div>

    <footer class="bg-dark">
      <div class="row pl-4 py-4" style="color: white;">
        <div class="col-lg-3">
          <h5>SOSYAL MEDYA HESAPLARIM</h5>
          <ol class="text-muted" style="color: rgba(255, 255, 255, 0.596) !important;">
            <li class="my-1"><a href="https://www.facebook.com/buraksevket.demirkiran" target="_blank" class="col-lg-12"><i class="fab fa-facebook fa-2x pt-2 pl-4"></i><span class="sociallink pl-4 pb-3">Facebook</span></a></li>
            <li class="my-1"><a href="https://twitter.com/sevketdemirk" target="_blank" class="col-lg-12"><i class="fab fa-twitter fa-2x pt-2 pl-4"></i><span class="sociallink pl-4 pb-3">Twitter</span></a></li>
            <li class="my-1"> <a href="https://www.instagram.com/burak_sevket/" target="_blank" class="insta col-lg-12"><i class="fab fa-instagram fa-2x pt-2 pl-4"></i><span class="sociallink pl-4 mb-5">Instagram</span></a></li>
            <li class="my-1"><a href="https://www.linkedin.com/in/burak-şevket-d-711687ab" target="_blank" class="col-lg-12"><i class="fab fa-linkedin-in fa-2x pt-2 pl-4" ></i><span class="sociallink pl-4 pb-3">Linkedin</span></a> </li>
            <li class="my-1">    <a href="https://github.com/burak-sevket" target="_blank" class="git col-lg-12" ><i class="fab fa-github fa-2x pt-2 pl-4 "></i><span class="sociallink pl-4 pb-3">Github</span></a></li>
          </ol>
        </div>
        <div class="col-lg-3">
          <h5>FİRMA BİLGİLERİ</h5>
          <ol class="text-muted" style="color: rgba(255, 255, 255, 0.596) !important;">
            <li class="my-1">Hakkımızda</li>
            <li class="my-1">Kariyer</li>
            <li class="my-1">Gizlilik Politikamız</li>
            <li class="my-1">Mağazamız</li>
            <li class="my-1">Bize Ulaşın</li>
          </ol>
        </div>
        <div class="col-lg-3">
          <h5>SİPARİŞ SÜREÇLERİ</h5>
          <ol class="text-muted" style="color: rgba(255, 255, 255, 0.596) !important;" >
            <li class="my-1">Sipariş İşleyiş</li>
            <li class="my-1">Mesafeli Satış Sözleşmesi</li>
            <li class="my-1">Ödeme ve Güvenlik</li>
            <li class="my-1">Kargo</li>
            <li class="my-1">Banka Hesapları</li>
          </ol>
        </div>
        <div class="col-lg-3">
          <h5>MÜŞTERİ HİZMETLERİ</h5>
          <ol class="text-muted" style="color: rgba(255, 255, 255, 0.596) !important;">
            <li class="my-1">Müşteri Hizmetleri</li>
            <li class="my-1">Garanti ve İade Koşulları</li>
            <li class="my-1">Sıkça Sorulan Sorular</li>
          </ol>
        </div>
      </div>  
      <div class="row">
        <div class="bg-light icons col-lg-12">
          <p class="text-center">Demirkıran Holding © 2021 - Tüm Hakları Saklıdır.</p>
        </div>
      </div>