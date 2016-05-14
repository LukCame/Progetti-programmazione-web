<?php 
$title="Ristorati-";
$error=false;
if(isset($_GET["id"])){
    $id2=(string)$_GET["id"];
    $datafile="r".$id2.".json";
    $path="data/";
    $datastr=@file_get_contents($path.$datafile);
    if($datastr!=false){
        $data= json_decode($datastr,true);
        $title=$title.$data["nome"];
    }
    else{
        $error=true;
        $restaurant= rand(1, 6);
        $id2="0100".$restaurant;
        $datafile="r".$id2.".json";
        $path="data/";
        $datastr=  file_get_contents($path.$datafile);
        $data= json_decode($datastr,true);
        $title=$title.$data["nome"];
    }
}

?>
<?php include "header.php"; ?>
<?php if($error==true) :?>
            <div class="row al">
                <div class="alert alert-warning  alert-dismissable col-md-12 col-lg-12 col-sm-12 ">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Attenzione!</strong><span>Non esiste nessun ristorante con l'id specificato.</span>
                </div>
            </div>
<?php endif;?>
    <div class="row" <?php if($error==false) echo "id=f-sing"?>>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
            <ul>
                <li><a href="index.php"><span id="back">Back</span></a></li>
<?php 
    $datafile="r".$id2.".json";
    $path="data/";
    $datastr=  file_get_contents($path.$datafile);
    $data= json_decode($datastr,true);
    $h1= $data["nome"];
?>
                <li><h1><?php echo $h1?></h1></li>
    
<?php 
    $rate=$data["voto"];
    $rate2=str_replace(".", "",(string)$rate);
    if(strlen($rate2)==1){
            $rate2=$rate2."0";
    }
?>
                <li class="m-bott"><img src="img/rate-<?php echo $rate2.".png";?>" alt="img-rate">
<?php 
    $rev= $data["rev"];
    $numr=count($rev);
?>
                <span class="text-blue mleft"><?php echo $numr."review";?></span></li>
<?php 
    $kitchens=$data["cucina"];
    $ksize=count($kitchens);
    $kstring="";
    foreach ($kitchens as $k){
        $kstring=$kstring.$k." ";
    }
?>    
                <li><p>Cucina: <span class="text-green"><?php echo $kstring ?></span></li>
            </ul>
        </div>
    </div>
    <div class="row" id="row-img">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
<?php
    $img=$data["foto"];
    $size=count($img)-1;
    $rand=  rand(0, $size);
    $img2=$img[$rand];
?>
            <img src="<?php echo $img2?>" class="img-responsive" id="img-sing" alt="img-rest">
        </div>
    </div>
<?php 
    if(isset($_GET["rec"])and $_GET["rec"]>0){
        $rec=$_GET["rec"];
    }else{
        $rec=1;
    }
    $rev=$data["rev"];
    $n=count($rev);
    for ($i=0;$rec<=$n and $i<5;$rec++,$i++){
        echo "<div class=\"row single\">";
            echo "<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">";
                echo "<ul class=\"sin-ul\">";
                    $t_rec=$rev[$rec-1]["titolo"];
                    echo "<li><span class=\"tit-sing\">\"".$t_rec."\"</span></li>";
                    $rate=$rev[$rec-1]["voto"];
                    $rate2=str_replace(".", "",(string)$rate);
                    if(strlen($rate2)==1){
                        $rate2=$rate2."0";
                    }
                    $data=$rev[$rec-1]["data"];
                    echo "<li><img src=\"img/rate-".$rate2.".png"."\" alt=\"img-rate\">";
                    echo "<span> ".$data."</span>";
                    $user=$rev[$rec-1]["user"];
                    echo "<li><span class=\"user\">".$user."</span></li>";
                    $comm=$rev[$rec-1]["note"];
                    echo "<li><p>".$comm."</p></li>";
                echo "</ul>";
            echo "</div>";
        echo "</div>";
        }
?>
<?php 
$foot="sing";
include "footer.php"
?>    