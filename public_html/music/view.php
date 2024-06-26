<?php

include_once ('../../config.php');
include ('../../vendor/autoload.php');

use App\Controllers\GalleryCtrl;
use App\Models\GalleryModel;
use App\Config\Dbh;

include '../../controllers/galleryctrl.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>LiteralDiscography.</title>
    <meta name="LiteralHat | Discography." content="It's you, it's me, and we're dancing badly!" />
    <?php include_once (INCLUDES_FOLDER . '/headtags.php') ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>



<body>
    <main>

        <!-- Header and opening main content div used for styling  -->
        <?php include_once (ELEMENT_HEADER) ?>
        <?php include_once (ELEMENT_MENUTOP) ?>
        <!-- side bar on the left.  -->

        <div class='contentrowblack centerbox'>
            <div class='boxedsection'>
                <div class='widthcontainer'>
                    <div class='contentcontainer'>
                    <div class='columnbox white center'>
                    <br>
                            <img src='../../../images/titles/discography.png' height='120px'>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contentrowstripe centerbox maxheight">
            <div class='boxedsection'>
            <div class='sidecontainer'>
                    <div class='spacermedium'></div>
                    <?php include_once (ELEMENT_MENUSIMPLE) ?>
                </div>


                <div class='widthcontainer'>
                <br>
                    <div class="contentcontainer">
                    
                        <div class='whitebox whiteborder paddedsm toneblack white'>

                            <?php
                            $title = implode(" ", array_map('ucfirst', explode("-", $data['title'])));
                            $titleparsed = str_replace("'", "&apos;", $data['title']);
                            $formattedDate = date("d F Y", strtotime($data['datecreated']));
                            $extratext = '';
                            if (isset($data['cover'])) {
                                $extratext = "<p><a href='" . $data['cover'] . "'>ORIGINAL</a></p>";
                            }
                            if (isset($data['buy'])) {
                                $extratext = "<p><a href='" . $data['buy'] . "'>BUY</a></p>";
                            }

                            echo "
                            <div class='rowbox'>
                                <div class='columnbox'>
                                    <img class='songcover' src='https://reloaded.literalhat.com/musicicons/literalhat_" . $data['datecreated'] . "_" . $titleparsed . ".webp'>
                                    <br>
                                    <p><a href='https://reloaded.literalhat.com/music/literalhat_" . $data['datecreated'] . "_" . $titleparsed . ".mp3' download='' id='downloadsong'>DOWNLOAD</a></p>
                                    " . $extratext . "
                                    <p class='padtop'>CREDIT:</P>
                                    <textarea id='creditText' class='textblack songcredit'>'" . $title . "' by LiteralHat - https://literalhat.com/</textarea>
                                    <p class='fontheader padtopsm nounderline'><a onclick='clickToCopy()'>CLICK TO COPY</a></p>
                                </div>
                            
                                <div class='columnbox paddedsm'>
                                <h1>" . $title . "</h1>
                                <p class='uppercase'>Category | " . $data['type'] . "</p>
                                <p class='uppercase'>DATE CREATED | " . $formattedDate . "</p>
                                <hr>

                                
                                <br>
                                <audio controls>
                                                            <source src='https://reloaded.literalhat.com/music/literalhat_" . $data['datecreated'] . "_" . $titleparsed . ".mp3'>
                                                        </audio>
                                                        
                                <br>
                                                        <hr>
                                                        

                                <br>
                                <h2>Lyrics</h2>
                                <p>" . nl2br($data['lyrics']) . "</p>
                            
                                </div>
                            </div>
                                    ";

                            $db = null;
                            ?>





                            <div class='spacersmall'></div>
                            <div class='spacersmall'></div>
                            <div class='spacersmall'></div>
                        </div>



                        <script>
                            function clickToCopy() {
                                // Get the text field
                                var copyText = document.getElementById("creditText");

                                // Select the text field
                                copyText.select();
                                copyText.setSelectionRange(0, 99999); // For mobile devices

                                // Copy the text inside the text field
                                navigator.clipboard.writeText(copyText.value);

                                // Alert the copied text
                                alert("You've copied the text: " + copyText.value + ". Thank you a lot for crediting :D");
                            }
                        </script>

                    </div>
                </div>


                <div class='sidecontainer'>
                    <div class='spacermedium'></div>
                </div>

            </div>
        </div>
        <!-- Footer and closing div tags used for styled main content box  -->

        <?php include_once (ELEMENT_FOOTER) ?>
    </main>
</body>

</html>