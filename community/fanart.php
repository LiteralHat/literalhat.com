<?php include_once ('../variables.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>LiteralBlank.</title>
    <meta name="LiteralHat | Blank." content="" />
    <?php include_once ($folder . '/elements/headtags.php') ?>
</head>

<body>
    <main>

        <!-- Header and opening main content div used for styling  -->
        <?php include_once ($header) ?>
        <?php include_once ($menutop) ?>
        <!-- side bar on the left.  -->

        <div class="contentrowstripe centerbox">
            <div class='boxedsection'>
                <div class='sidecontainer'>
                    <div class='spacermedium'></div>
                    <?php include_once ($menusimple) ?>

                </div>

                <div class='biggerwidthcontainer'>
                    <div class='contentcontainer'>
                        <div class="whitebox center toneblack">
                            <div class='whiteborder padded'>
                                <hr>
                                <h1 class='white padtop larger'>
                                    LiteralFanart
                                </h1>
                                <hr>
                            </div>
                        </div>
                    </div>


                    <div class='contentcontainer'>
                        <div class="whitebox tone3 paddedsm">
                            <div class="whitebox padded">
                                <h2>Welcome to the fanart gallery.</h2>
                                <p>This gallery is still a work in progress and I'm mostly using it to test out gallery
                                    code. More functionality will be coded soon, check the changelog for upcoming features.</p>
                                    <p class='warning'>Please note that URLs will change in the future; if you decide to hotlink an image from here, it will probably break in the next site release.</p><p>A front page announcement will be made when hotlinking is safe.</p>
                            </div>
                        </div>
                    </div>

                    <div class='contentcontainer'>
                        <section class='whitebox toneblack'>
                            <div class='whiteborder padded'>
                                
                                    <h2 class='white'>Click to jump to other years:</h2>
                                    <p class='white'>2024 - 2023 - 2022 - 2021 - 2020</p>
                                
                                <hr>
                                <div class='padtop' id="fanartgallery">
                                    <!-- jquery appends here -->
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

        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="../scripts/galleryfanart.js"></script>


        <?php include ($footer) ?>
    </main>
</body>

</html>