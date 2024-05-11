<?php include_once ('../variables.php');
include_once ('../includes/dbh.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fanart | LiteralHat</title>
    <meta name="LiteralHat | Fanart" content="Browse, look, and explore the fanart of LiteralHat." />
    <?php include_once ($folder . '/headtags.php') ?>
</head>

<body>
    <main>


        <!-- Header and opening main content div used for styling  -->
        <?php include_once ($header) ?>
        <?php include_once ($menutop) ?>
        <!-- side bar on the left.  -->



        <div id='lightBoxContainer'>
        </div>

        <div class="contentrowstripe centerbox">
            <div class='boxedsection'>
                <div class='sidecontainer'>
                    <div class='spacermedium'></div>
                    <?php include_once ($menusimple) ?>
                </div>

                <div class='extrawidthcontainer'>
                    <div class='contentcontainer'>
                        <div class="whitebox center toneblack">
                            <div class='whiteborder padded'>
                                <h1 class='white padtop huge'>
                                    LiteralFanart
                                </h1>
                            </div>
                        </div>
                    </div>



                    <div class='contentcontainer'>
                        <div class="whitebox toneblack">
                            <div class="whiteborder paddedsm">
                                <div class="whitebox padded center">
                                    <h2>Welcome to the fanart gallery.</h2>
                                    <p>This is where you can view artworks made by you.</p>
                                    <p>Click on an image to enlarge and see the artist's name, click again to hide.</p>
                                    <p>For image removals, or if you've been credited with 'unknown'. Email
                                        <i>support@literalhat.com</i>.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="contentcontainer">
                        <div class="whitebox tone1 center">
                            <div class="whiteborder">
                                <h2 class="padtop white large">SUBMIT YOUR OWN</h2>
                            </div>
                        </div>
                    </div>
            
                    <div class='contentcontainer'>
                        <section class='whitebox toneblack'>
                            <div class='whiteborder padded'>
                                <div class='padtop white' id="fanartgallery">
                                    <?php $statement = $db->query("SELECT * FROM fanart");
                                    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($data as $row => $item) {
                                        echo "<div><img id='".$item['uuid'] . "_". $item['author'] . "' onclick='lightBox(this)' loading='lazy' class='fanartimage' src='https://leviathan.literalhat.com/fanart/" . $item['uuid'] . "_literalfanart_" . $item['datecreated'] . "_" . $item['author'] . ".webp'></div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>


                <div class='sidecontainer'>
                    <div class='contentbox padtop'>
                    </div>
                </div>

            </div>

        </div>

        <!-- Footer and closing div tags used for styled main content box  -->
        <script src="../scripts/fanartgallery.js"></script>

        <?php include ($footer) ?>
    </main>
</body>

</html>