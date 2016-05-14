<?php 
$title="Ristoranti-Main Page";
include "header.php"; 
$n=3;
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
        echo "<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">";
            echo "<div>";
                echo "<img class=\"img-responsive\" src=\"".$data["thumb"]."\"alt=\"img-restaurant\">";
                echo "<div class=\"div-details\">";
                    echo "<div>";
                        echo "<h2>".$data["nome"]."</h2>";
                    echo "</div>";
                echo "<div>";
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
                echo "<div>";
                    $rand= rand(0, $numr-1);
                    echo "<p class=\"mtop\">"."<span class=text-blue>\"".$rev[$rand]["titolo"]."\"</span> ".$rev[$rand]["data"]."</p>";
                echo "</div>";
                unset($rev[$rand]);
                $rev= array_merge($rev);
                $numr=count($rev);
                echo "<div>";
                    $rand= rand(0, $numr-1);
                    echo "<p>"."<span class=\"text-blue\">\"".$rev[$rand]["titolo"]."\"</span> ".$rev[$rand]["data"]."</p>";
                echo "</div>";
                $kitchens=$data["cucina"];
                $ksize=count($kitchens);
                $kstring="";
                foreach ($kitchens as $k){
                    $kstring=$kstring.$k." ";
                } 
                echo "<div>";
                    echo "<p>Cucina: "."<span class=\"text-green\">".$kstring."</span>";
                echo "</div>";
            echo"</div>";
        echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>
