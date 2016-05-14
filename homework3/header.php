<?php
echo "<!DOCTYPE html>";
echo "<html>";
    echo "<head>";
        echo "<title>$title</title>";
        echo "<meta charset=\"UTF-8\">";
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">";
        echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
        echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
        echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
    echo "</head>";
    echo "<body>";      
        echo "<nav class=\"navbar navbar-inverse navbar-fixed-top\">";
            echo "<div class=\"container-fluid\">";
                echo "<div class=\"navbar-header\">";
                    echo "<button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#myNavbar\">";
                        echo "<span class=\"icon-bar\"></span>";
                        echo "<span class=\"icon-bar\"></span>";
                        echo "<span class=\"icon-bar\"></span>";                        
                    echo "</button>";
                    echo "<a class=\"navbar-brand\" href=\"#\">Ristorati</a>";
                echo "</div>";
                echo "<div class=\"collapse navbar-collapse\" id=\"myNavbar\">";
                    echo "<ul class=\"nav navbar-nav\">";
                        echo "<li><a href=\"index.php\">Home</a></li>";
                        echo "<li><a href=\"#nogo\">Contattaci</a></li>";
                    echo "</ul>";
                echo "</div>";
            echo "</div>";
        echo "</nav>";
        echo "<div class=\"container\">";
?>

