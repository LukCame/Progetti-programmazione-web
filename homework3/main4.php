<?php 
$title="Ristoranti-Main Page";
include "header.php"; 
$n=4;
for($i=1;$i<=$n;$i++){
    $datafile="r0100".$i.".json";
    $path="data/";
    $datastr=  file_get_contents($path.$datafile);
    $data= json_decode($datastr,true);
    if($i==1){
        echo "<div id=\"first\" class=\"row main\">";
    }else{
        echo "<div class=\"row main\">";
    }
        
        echo "<div class=\"col-lg-3 col-md-3 col-sm-4 col-xs-4\">";
            echo "<img class=\"img-responsive\" src=\"".$data["thumb"]."\"alt=\"img-restaurant\">";
        echo "</div>"; 
    echo "<div class=\"col-lg-9 col-md-9 col-sm-6 col-xs-8\">";
        echo "<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">";
            echo "<h2>".$data["nome"]."</h2>";
        echo "</div>";
        echo "<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">";
            $rate=$data["voto"];
            $rate2=str_replace(".", "",(string)$rate);
            if(strlen($rate2)==1){
                $rate2=$rate2."0";
            }
            echo "<img src=\"img/rate-".$rate2.".png\"alt=\"img-rate\">";
            $rev= $data["rev"];
            $numr=count($rev);
            echo "<span class=\"text-blue mleft\">".$numr." review</span>";
        echo "</div>"; 
        echo "<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">";
            $rand= rand(0, $numr-1);
            echo "<p class=\"mtop\">"."<span class=text-blue>\"".$rev[$rand]["titolo"]."\"</span> ".$rev[$rand]["data"]."</p>";
        echo "</div>";
        unset($rev[$rand]);
        $rev= array_merge($rev);
        $numr=count($rev);
        echo "<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">";
            $rand= rand(0, $numr-1);
            echo "<p>"."<span class=\"text-blue\">\"".$rev[$rand]["titolo"]."\"</span> ".$rev[$rand]["data"]."</p>";
        echo "</div>";
        $kitchens=$data["cucina"];
        $ksize=count($kitchens);
        $kstring="";
        foreach ($kitchens as $k){
            $kstring=$kstring.$k." ";
        }
        echo "<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">";
            echo "<p>Cucina: "."<span class=\"text-green\">".$kstring."</span>";
        echo "</div>";
    echo"</div>";
   echo "</div>";
}
?>



