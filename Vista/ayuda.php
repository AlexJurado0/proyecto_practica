<!DOCTYPE html>
<?php
include '../Controlador/controladorCrud.php';
?>
<html lang="en">
<head>
    <?php include './inc/head.php'; ?>
    <title>Ayuda</title>

</head>
<body>
    <?php include './inc/barraNavegacionA.php';?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <?php
                $api_youtube = 'AIzaSyDZCD4e4azAdH-mSYaf8UdUjlSGzc347jI'; // Tu API Key de YouTube
                $videoId = 'fv0qylN3wgI'; // ID del video

                
                $url = 'https://www.googleapis.com/youtube/v3/videos';
                $url .= '?key=' . $api_youtube;
                $url .= '&part=snippet';
                $url .= '&id=' . $videoId;

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $resultado = curl_exec($ch);
                curl_close($ch);

                $phpObj = json_decode($resultado, true);

            
                $tituloVideo = $phpObj['items'][0]['snippet']['title']; 
                    $urlVideo = 'https://www.youtube.com/embed/' . $videoId;

                    // Mostrar el título y el video
                    echo '<h1 class="mb-4">' . $tituloVideo . '</h1>';
                    echo '<div class="ratio ratio-16x9">';
                    echo '<iframe src="' . $urlVideo . '" ></iframe>';
                    echo '</div>';
                ?>
            </div>
        </div>
    </div>
</body>
</html>