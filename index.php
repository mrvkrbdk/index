<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<div class="container">
<?php
    $baglanti=mysql_connect("localhost","root","");
    if($baglanti){ 
    $vt_sec=mysql_select_db("deneme");
    if($vt_sec){ 

    if (isset($_GET['komut'])&& $_GET['komut']=='duzenle'){ 
	$sql="select * from kullanicilar where id=$_GET[id]";
	$sonuc=mysql_query($sql);
	$yaz=mysql_fetch_assoc($sonuc);
	echo "

   <form action ='' method='POST'>
   <div class='form-group'></div>
   <div class='col-md-10'><br><tr><td><label for='isim'>isim</label></td><td><input type='serial'class='form-control' name='isim' value='$yaz[isim]'></td></tr></div>
   <div class='col-md-10'><br><tr><td><label for='sifre'>sifre</label></td><td><input type='password'class='form-control' name='sifre' value='$yaz[sifre]'></td></tr></div>
   <div class='col-md-10'><br><tr><td><label for='email'>e-mail</label></td><td><input type='email' class='form-control'name='email' value='$yaz[email]'></td></tr></div>
   <div class='col-md-10'><br><tr><td><label for='kullaniciadi'>kullanici adi</label></td><td><input type='serial' class='form-control' name='kullaniciadi' value='$yaz[kullaniciadi]'></td></tr></div>
   <div class='col-md-10'><input type='submit' name='duzenle' value='duzenle'></div>
   </form> ";
 
   } 
   
    else {
    echo "

  <form action ='' method='POST'>
  <div class='col-md-10'><br><tr><td><label for='isim'>isim</label></td><td><input type='serial'class='form-control' name='isim'></td></tr></div>
  <div class='col-md-10'><br><tr><td><label for='sifre'>sifre</label></td><td><input type='password' class='form-control' name='sifre'></td></tr></div>
  <div class='col-md-10'><br><tr><td><label for='email'>e-mail</label></td><td><input type='email' class='form-control' name='email'></td></tr></div>
  <div class='col-md-10'><br><tr><td><label for='kullaniciadi'>kullanici adi</label></td><td><input type='serial' class='form-control' name='kullaniciadi'></td></tr></div>
  <br><div class='col-md-10'><input type='submit'  name='kaydet' value='kaydet'></div>
  </form> ";
        } 
   
   
   
    
   
   
   
     if(isset($_GET['komut'])&& $_GET['komut']=='sil')
	  {
	$sql="select*from  kullanicilar where id=$_GET[id]";
	$sonuc=mysql_query($sql);
	$yaz=mysql_fetch_assoc($sonuc);
	$id=$yaz['id'];
	$sil="delete  from  kullanicilar where id='$id'";
	mysql_query($sil);
	echo "<a href='?komut=sil&id=$yaz[id]'><script>window.alert('kayıt silinecek');</script></a>";
	header("refresh:2;url=index.php");
   
      }

              


    if (isset($_POST['duzenle']))
	{
	 $sql="update kullanicilar set isim='$_POST[isim]',email='$_POST[email]',sifre='$_POST[sifre]',kullaniciadi='$_POST[kullaniciadi]' where id=$_GET[id]";
     mysql_query($sql,$baglanti);
     header("location:index.php");
    }
 
 
 if ($_POST)
 {
    $isim=$_POST["isim"];
    $email=$_POST["email"];
	$sifre=$_POST["sifre"];
	$kullaniciadi=$_POST["kullaniciadi"];
	if(!empty($isim)&&!empty($email)&&!empty($sifre)&&!empty($kullaniciadi))
	{

	 mysql_connect("localhost","root","");
    mysql_select_db("deneme");
	
    $sorgu=mysql_query("INSERT INTO kullanicilar(isim,email,sifre,kullaniciadi) 
	VALUES('$isim','$email','$sifre','$kullaniciadi')");
	
		if($sorgu)
		{   
	       echo " <script>window.alert('kullanici ekleniyor');</script>";
		} 
			
	}else echo "<script>window.alert('bos alan bırakmayınız!!');</script>";
      
  }
 $sorgu=mysql_query("select * from kullanicilar");
 
     echo "<table class='table table-striped'>";
     echo "<thead><th>#</th><th>ISIM</th><th>EMAIL</th><th> KULLANICIADI</th><th> 
			DUZENLE</th><th>SIL</th></tr></thead>";
    while($dizi=mysql_fetch_array($sorgu))
	{
	
	echo "<tbody><tr><td>".$dizi['id']."</td>";
	echo "<td>".$dizi['isim']."</td>";
	echo "<td>".$dizi['email']."</td>";
	echo "<td>".$dizi['kullaniciadi']."</td>";
	echo "<td><a href='?komut=duzenle&id=$dizi[id]'><img src='düzenle.png'width='15%' height='15%'></a></td>";
	echo "<td><a href='?komut=sil&id=$dizi[id]'><img src='sil.png' width='15%' height='15%'></a></td></tbody>";
	
    }
      echo "</table>";
            }else echo "<br>veri tabanına baglanamadı";
              }else echo "baglantı kurulamadı";
 ?>
 </div>








