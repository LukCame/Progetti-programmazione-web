<?php 
$title="Ristorati-Main Page";
include "header.php"; 
$n=6;
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
        echo "<div class=\"col-lg-2 col-md-2 col-sm-3 col-xs-4\">";
            echo "<img class=\"img-responsive\" src=\"".$data["thumb"]."\" alt=\"img-restaurant\">";
        echo "</div>";  
        echo "<div class=\"col-lg-10 col-md-10 col-sm-9 col-xs-8\">";
        echo "<ul>";
            echo "<li><a href=\"index.php?id=0100".$i."\"><h2>".$data["nome"]."</h2></a></li>";
            $rate=$data["voto"];
            $rate2=str_replace(".", "",(string)$rate);
            if(strlen($rate2)==1){
                $rate2=$rate2."0";
            }
            echo "<li class=\"text-xs\"><img src=\"img/rate-".$rate2.".png\" alt=\"img-rate\">";
            $rev= $data["rev"];
            $numr=count($rev);
            echo "<span class=\"text-blue mleft\">".$numr." review</span></li>";
            $rand= rand(0, $numr-1);
            $del=$rand;
            $rec=$rand+1;
            echo "<li class=\"text-xs\"><p class=\"mtop\">"."<a href=\"index.php?id=0100".$i."&rec=".$rec."\"><span class=text-blue>\"".$rev[$rand]["titolo"]."\"</span></a>"." ".$rev[$rand]["data"]."</p></li>";
            unset($rev[$rand]);
            $rev= array_merge($rev);
            $numr=count($rev);
            $rand= rand(0, $numr-1);
            if($rand>=$del){
                $rec=$rand+2;
            }else{
                $rec=$rand+1;
            }
            echo "<li class=\"text-xs\"><p>"."<a href=\"index.php?id=0100".$i."&rec=".$rec."\"><span class=\"text-blue\">\"".$rev[$rand]["titolo"]."\"</span></a>".$rev[$rand]["data"]."</p></li>";
            $kitchens=$data["cucina"];
            $ksize=count($kitchens);
            $kstring="";
            foreach ($kitchens as $k){
                $kstring=$kstring.$k." ";
            }
            echo "<li class=\"text-xs\"><p class=\"m-bottom\">Cucina: "."<span class=\"text-green\">".$kstring."</span></li>";
        echo "</ul>";
    echo"</div>";
echo "</div>";
}
$foot="main";
include ("footer.php");
?>