<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    
        <div class="topheader text-center p-4">
            <h3>Spotify</h3>

        </div>
        <div class="container">
        <input type="text" class="m-3" id="myInput" onkeyup="myFunction()" placeholder="Search for songs.." title="Type in a name">
    <?php
        $url = "spo.json";
        $res = file_get_contents($url);
        $data = json_decode($res);

        echo "<div class='row'>";
        for ($i = 0; $i < sizeof($data->tracks->items); $i++){

            $song = $data->tracks->items[$i]->album;
            echo "<div class='menu col-6 col-lg-4 p-4'>";

            echo "<div class='card'>";
            echo "<img class='card-img-top' src='".$song->images[0]->url."' width='100%'>";
            echo "<div class='card-body'>";
            echo "<h4>".$song->name."</h4>";
            echo "Artist: ".$song->artists[0]->name;
            for ($j = 1; $j < sizeof($song->artists); $j++)
            {
                echo ", ".$song->artists[$j]->name;
            }
            echo "<br>Release date: ".$song->release_date."<br>";
            echo "Avaliable: ".sizeof($song->available_markets)." countries";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";

    ?>
    </div>
</body>
</html>


