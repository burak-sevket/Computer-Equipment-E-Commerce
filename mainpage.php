<?php 
$con = mysqli_connect("localhost","root","","products");
    if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
  }


?>
<?php
session_start();
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$con,
"SELECT * FROM `products` WHERE `code`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
  $code=>array(
  'name'=>$name,
  'code'=>$code,
  'price'=>$price,
  'quantity'=>1,
  'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
  $status = "<div class='box' style='color:red;'>
  Product is already added to your cart!</div>";  
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
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
    <script href="main.js" rel="javascript"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>   
    <link rel="javascript" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
   
  </head>
<body>
  <script>
    $(document).ready(function(){
      $("#anasayfa").addClass("active");
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
          <a class="nav-link" id="anasayfa" href="mainpage.php"><i class="fa fa-home pr-2"></i>Mainpage<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Products.html"><i class="fa fa-shopping-cart pr-2"></i>Products</a>
        </li>
        <form class="form-inline ml-lg-5 mr-lg-3 pr-3 pl-3">
          <input class="form-control mr-lg-2" type="search" size="40px" placeholder=" Enter Keyword Product or Model" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        <li class="nav-item">
          <a class="nav-link" href="pay.html"><i class="fab fa-paypal pr-2"></i>Pay</a>
        </li>


        <li class="nav-item">
          <?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><i class="fas fa-shopping-basket pr-2 "></i>Cart<span>
<?php echo $cart_count; ?></span></a>
</div>
<?php
}
else{
  ?>
  <a href="cart.php"><i class="fas fa-shopping-basket pr-2"></i>Cart</a>
<?php
}
?>
          
        </li>
      </ul>
    </div>
  </nav>
    <section class="orange-yellow anaresim">
              <div id="slider" class="carousel slide py-5" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#slider" data-slide-to="0" class="active"></li>
                    <li data-target="#slider" data-slide-to="1"></li>
                    <li data-target="#slider" data-slide-to="2"></li>
                    <li data-target="#slider" data-slide-to="3"></li>
                    <li data-target="#slider" data-slide-to="4"></li>
                    <li data-target="#slider" data-slide-to="5"></li>
                    <li data-target="#slider" data-slide-to="6"></li>
                    <li data-target="#slider" data-slide-to="7"></li>
                </ol>
                <div class="carousel-inner text-center">
                  <div class="carousel-item active">
                    <img src="resimler\monitor.png" alt="monitor">
                  </div>
                    <div class="carousel-item">
                        <img src="resimler\Anakartlar.png" alt="Anakartlar" >
                      </div>
                      <div class="carousel-item">
                        <img src="resimler\Ekran Kartları.png" alt="Ekran Kartları" >
                      </div>
                      <div class="carousel-item">
                        <img src="resimler\İşlemciler.png" alt="İşlemciler" >
                      </div>
                      <div class="carousel-item">
                        <img src="resimler\Gaming Ürünler.png" alt="Gaming Ürünler">
                      </div>
                     <div class="carousel-item">
                        <img src="resimler\HDD.png" alt="HDD">
                      </div>
                      <div class="carousel-item">
                        <img src="resimler\SSD.png" alt="SSD">
                      </div>
                      <div class="carousel-item">
                        <img src="resimler\Ram.png" alt="RAM">
                      </div>
                </div>
                <a href="#slider" class="carousel-control-prev" data-slide="prev">
                  <span class="carousel-control-prev-icon"  style=" height: 30px; width:30px"></span>
                </a>
                <a href="#slider" class="carousel-control-next" data-slide="next">
                  <span class="carousel-control-next-icon"  style=" height: 30px; width:30px"></span>
                </a>        
          </div>     
    </section> 
    <section class="py-5 anaresim subsliders green-blue">
      <div class="row  mr-lg-0">
        <div class="col-lg-4">
          <p class="başlık pt-3 text-center">SYSTEMS OF THE WEEK</p> 
          <div id="subslider1" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#subslider3" data-slide-to="0" class="active"></li>
                <li data-target="#subslider3" data-slide-to="1"></li>
                <li data-target="#subslider3" data-slide-to="2"></li>        
            </ol>
            <div class="carousel-inner pt-3 pb-4 text-center bg-light">
              <div class="carousel-item active">
                <img class="py-3" src="resimler\corsair.jpg" alt="monitor">
               <div class="text-center p-3 pt-5 mt-3">
                <small>DH-MASTER/AMD Ryzen 5 3600X/MSI RX 5700 MECH GP OC 8GB/16GB DDR4/480GB SSD/Gaming Computer</small>
               </div>
               <p style="color: orange; float: right; cursor: pointer;" class="px-4 pt-4 mt-3">Customize</p>
              </div>
              <div class="carousel-item">
                <img class="py-3" src="resimler\cooler-master.jpg" alt="monitor">
               <div class="text-center p-3 pt-5 mt-3">
                <small>DA-V4/AMD Ryzen 5 2600/MSI RX580 Armor 8GB OC/8GB DDR4/480GB SSD/Gaming Computer</small>
               </div>
               <p style="color: orange; float: right; cursor: pointer;" class="px-4 pt-4 mt-3">Customize</p>
              </div>
              <div class="carousel-item">
                <img class="py-3" src="resimler\msi.jpg" alt="monitor">
               <div class="text-center p-3 pt-5 mt-3">
                <small>VOK-M10/AMD Ryzen 5 2600/MSI RX580 ARMOR OC 8GB/16GB DDR4/480GB SSD/Gaming Computer</small>
               </div>
               <p style="color: orange; float: right; cursor: pointer;" class="px-4 pt-4 mt-3">Customize</p>
              </div>
              </div>
            <a href="#subslider1" class="carousel-control-prev" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a href="#subslider1" class="carousel-control-next" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>        
      </div> 
    </div>       
        <div class="col-lg-4">
          <p class="başlık pt-3 text-center">PRODUCTS OF THE DAY</p>
          <div id="subslider2" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#subslider2" data-slide-to="0" class="active"></li>
                <li data-target="#subslider2" data-slide-to="1"></li>
                <li data-target="#subslider2" data-slide-to="2"></li>        
            </ol>
            <div class="carousel-inner pb-3 text-center bg-light resim">
              <div class="carousel-item active">
                <img class="pt-3" src="resimler\asus-monitor.jpg" alt="monitor">
               <div class="text-center pr-3">
                <small>ASUS 24" VP248H 75Hz 1ms VGA HDMI<br>FHD Freesync Gaming Screen</small>
               </div>
               <span style="float: left; color: orange; cursor: pointer;" class="pl-4 mt-4">Fırsat Fiyatı: 699 $</span>
               <span style="float: right; color:rgba(0, 0, 0, 0.685); cursor: pointer; font-weight: 500;"  class="pr-4 mt-4">All Products</span>
              </div>
              <div class="carousel-item">
                <img class="pt-3" src="resimler\gamebooster-klavye.jpg" alt="monitor">
               <div class="text-center">
                <small>GameBooster G76K Attack Rainbow  LED<br>Mekanik Hisli Gaming Keyboard</small>
               </div>
               <span style="float: left; color: orange; cursor: pointer;" class="pl-4 mt-4">Fırsat Fiyatı: 699 $</span>
               <span style="float: right; color:rgba(0, 0, 0, 0.685); cursor: pointer; font-weight: 500;"  class="pr-4 mt-4">All Products</span>
              </div>
              <div class="carousel-item">
                <img class="pt-3" src="resimler\steelseries-rival-300s.jpg" alt="monitor">
               <div class="text-center pr-3">
                <small>SteelSeries Rival 300S Black<br> RGB Optik Gaming Mouse</small>
               </div>
               <span style="float: left; color: orange; cursor: pointer;" class="pl-4 mt-4">Fırsat Fiyatı: 699 $</span>
               <span style="float: right; color:rgba(0, 0, 0, 0.685); cursor: pointer; font-weight: 500;"  class="pr-4 mt-4">All Products</span>
              </div>
              </div>
            <a href="#subslider2" class="carousel-control-prev" data-slide="prev">
              <span class="carousel-control-prev-icon" ></span>
            </a>
            <a href="#subslider2" class="carousel-control-next" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>        
        </div> 
        </div>
        <div class="col-lg-4">
          <p class="başlık pt-3 text-center">OPPORTUNITY PRODUCTS</p>
          <div id="subslider3" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#subslider2" data-slide-to="0" class="active"></li>
                <li data-target="#subslider2" data-slide-to="1"></li>
                <li data-target="#subslider2" data-slide-to="2"></li>        
            </ol>
            <div class="carousel-inner pb-3 text-center bg-light resim">
              <div class="carousel-item active">
                <img class="pt-3" src="resimler\corsair-psu.jpg" alt="monitor">
               <div class="text-center pr-3 pt-4">
                <small>CORSAİR TX-M Serisi 750W 80 Plus Gold Module PSU</small>
               </div>
               <span style="float: left; color: orange; cursor: pointer;" class="pl-4 mt-4">Fırsat Fiyatı: 699 $</span>
               <span style="float: right; color:rgba(0, 0, 0, 0.685); cursor: pointer; font-weight: 500;"  class="pr-4 mt-4">All Products</span>
              </div>
              <div class="carousel-item">
                <img class="pt-3" src="resimler\corsair-ram.jpg" alt="monitor">
               <div class="text-center">
                <small>CORSAİR 960GB Force MP510 NVMe M.2 SSD<br>(3480 MB Reading / 3000 MB Writing)</small>
               </div>
               <span style="float: left; color: orange; cursor: pointer;" class="pl-4 mt-4">Fırsat Fiyatı: 899 $</span>
               <span style="float: right; color:rgba(0, 0, 0, 0.685); cursor: pointer; font-weight: 500;"  class="pr-4 mt-4">All Products</span>
              </div>
              <div class="carousel-item">
                <img class="pt-3" src="resimler\corsair-kasa.jpg" alt="monitor">
               <div class="text-center pr-3">
                <small>CORSAİR Crystal Serisi 570X RGB Tempered Glass<br>Kırmızı Mid Tower Case</small>
               </div>
               <span style="float: left; color: orange; cursor: pointer;" class="pl-4 mt-4">Fırsat Fiyatı: 1299 $</span>
               <span style="float: right; color:rgba(0, 0, 0, 0.685); cursor: pointer; font-weight: 500;"  class="pr-4 mt-4">All Products</span>
              </div>
              </div>
            <a href="#subslider3" class="carousel-control-prev" data-slide="prev">
              <span class="carousel-control-prev-icon" ></span>
            </a>
            <a href="#subslider3" class="carousel-control-next" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>        
        </div> 
        </div>
  </div>
    </section>
    <section class="altsekme green-blue px-5 py-5">
        <div class="row  bg-light">
          <?php
$result = mysqli_query($con,"SELECT * FROM `products`");
while($row = mysqli_fetch_assoc($result)){
    echo "
          <div class='col-lg-3 text-center'>
          <form method='post' action=''>
          <input type='hidden' name='code' value=".$row['code']." />
            <img src='".$row['image']."'>
            <p class='fiyat'>".$row['price']."$   <span class='text-muted'>KDV dahil</span></p>
          <p class='stok'>In Stock</p>
          <p class='ürün_model pb-4'>".$row['name']."</p>
          <button type='submit' class='py-2 px-3 mt-5 mb-4 orange-yellow buy' style='color:rgb(11, 11, 97); font-weight: 600;'>Add Cart</button> 
           </form>
        </div>";}
        mysqli_close($con);
        ?>
        </div>
        <div class="row my-5 bg-light">
          <div class="col-lg-3 text-center" style="border-right:1.4px solid rgba(128, 128, 128, 0.637);">
            <img src="resimler\AOC Monitör.jpg">
            <p class="fiyat">1.434 $   <span class="text-muted">KDV dahil</span></p>
            <p class="stok">In Stock</p>
            <a href="info.html"><p class="ürün_model">AOC 24" C24G1 144Hz 1ms VGA 2xHDMI DP FHD Freesync Curved Gaming Screen & SteelSeries Rival 300S Black RGB Optik Gaming Mouse Gift</p></a>

          </div>
            <div class="col-lg-3 text-center" style="border-right:1.4px solid rgba(128, 128, 128, 0.637);">
            <img src="resimler\cooler-master-mouse.png">
            <p class="fiyat">139 $   <span class="text-muted">KDV dahil</span></p>
            <p class="stok 	text-danger">Out of stock</p>
            <a href="info1.html"><p class="ürün_model pb-5">Cooler Master CM110 RGB Optik Gaming Mouse</p></a>
          </div>
            <div class="col-lg-3 text-center" style="border-right:1.4px solid rgba(128, 128, 128, 0.637);">
              <img src="resimler\corsair-gaming-kulaklık.jpg">
              <p class="fiyat">749 $   <span class="text-muted">KDV dahil</span></p>
            <p class="stok">In Stock</p>
            <p class="ürün_model">Corsair Gaming Void Pro RGB Dolby 7.1 Kablosuz Special Edition Premium Gaming EarPods</p>
          </div>
            <div class="col-lg-3 text-center">
              <img src="resimler\corsair.jpg">
              <p class="fiyat">3.199 $   <span class="text-muted">KDV dahil</span></p>
            <p class="stok">In Stock</p>
            <p class="ürün_model pb-4">DA-V3.5/AMD Ryzen 5 1600/MSI RX570 Armor 4GB OC/8GB DDR4/480GB SSD/Gaming Computer</p>
          </div>
        </div>
        <div class="row my-5 bg-light">
          <div class="col-lg-3 text-center" style="border-right:1.4px solid rgba(128, 128, 128, 0.637);">
            <img src="resimler\viewsonic-monitör.jpg">
            <p class="fiyat">1299 $   <span class="text-muted">KDV dahil</span></p>
            <p class="stok">In Stock</p>
            <p class="ürün_model">Viewsonic 24" XG2401 144Hz 1ms 2xHDMI DP FHD FreeSync Gaming Screen</p>
          </div>
            <div class="col-lg-3 text-center" style="border-right:1.4px solid rgba(128, 128, 128, 0.637);">
            <img src="resimler\TARS.jpg">
            <p class="fiyat">3.699 $  <span class="text-muted">KDV dahil</span></p>
            <p class="stok">In Stock</p>
            <p class="ürün_model pb-2">TARS-S26570T/AMD Ryzen 5 2600/SAPPHIRE RX 5500 XT PULSE OC 4GB/8GB DDR4/480GB SSD/Gaming Computer</p>
          </div>
            <div class="col-lg-3 text-center" style="border-right:1.4px solid rgba(128, 128, 128, 0.637);">
              <img src="resimler\HyperX.jpg">
              <p class="fiyat">839 $ <span class="text-muted">KDV dahil</span></p>
            <p class="stok 	text-danger">Out of stock</p>
            <p class="ürün_model">HyperX Cloud II 7.1 Red Gaming EarPods & Rampage RM-H19 Holder EarPods Standı Gift</p>
          </div>
            <div class="col-lg-3 text-center">
              <img src="resimler\MSI-monitör.jpg">
              <p class="fiyat">1.349 $ <span class="text-muted">KDV dahil</span></p>
            <p class="stok">In Stock</p>
            <p class="ürün_model pb-5">MSI 23.6" OPTIX G241VC 75Hz 1ms VGA HDMI FHD Curved Gaming Screen </p> 
          </div>
        </div>
      </section>
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
			<li class="my-1"><a href="https://goo.gl/maps/3NTPo8Ln4pX7GGAi6" target="_blank"></i><span class="text-info ">Address</span></a></li>
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
</body>
</html>
