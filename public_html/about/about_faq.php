<?php include_once ('../../config.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>About + FAQ | LiteralHat</title>
    <meta name="About + FAQ | LiteralHat" content="View commonly asked questions and contact information." />
    <?php include_once (INCLUDES_FOLDER . '/headtags.php') ?>
</head>

<body>
    <main>

        <!-- Header and opening main content div used for styling  -->
        <?php include_once (ELEMENT_HEADER) ?>
        <?php include_once (ELEMENT_MENUTOP) ?>
        <!-- side bar on the left.  -->



        <div class="contentrowstripe centerbox">
            <div class='boxedsection'>
                <div class='widthcontainer'>

                    <section>
                        <div class='contentcontainer'>
                            <div class="whitebox center toneblack">
                                <div class='whiteborder padded white'>
                                    <h1 class='padtop large'>About / FAQ</h1>
                                    <p>Hi.</p>
                                    <p>I work on this site in my spare time.</p>
                                    <p>Sometimes I draw, sometimes I animate. Sometimes I pretend to be competent at the guitar.</p>
                                    <p>I don't practice 'consistency' in my projects, please be so kind as to not
                                        expect such from me.</p>
                                        <hr>
                                        <br>
                                    <p>This website is my pride and joy. In the end, my goal is to make it the home of
                                        everything I've done.</p>
                                    <p>It would be nice if you bookmarked LiteralHat.com,
                                        and visit again sometime.</p>
                                </div>
                            </div>
                        </div>


                        <div class='contentcontainer'>
                            <div class="whitebox center toneblack">
                                <div class='whiteborder'>
                                    <h2 class='white padtop'>Contact</h2>
                                </div>
                            </div>
                        </div>

                        <div class="contentcontainer">
                            <div class="whitebox padded">
                                <h3>For any enquiries:</h3>
                                <p>Email <i>support@literalhat.com</i> and I'll get back to you when I have the time.
                                </p>
                                <p><span class="bold">I don't use social media.</span> If you send a message through those means, it won't be read.</p>
                            </div>
                        </div>

                        <div class='contentcontainer'>
                            <div class="whitebox center toneblack">
                                <div class='whiteborder'>
                                    <h2 class='white padtop'>Frequently Asked Questions</h2>
                                </div>
                            </div>
                        </div>

                        <div class='contentcontainer'>
                            <div class="whitebox padded">
                                <h3>I want to show you my fanart!</h3>
                                <p>You can submit it <a href='https://literalhat.com/community/fanartform'>here.</a></p>
                                <h3>Can I use your art in ______?</h3>
                                <p class='bold'>Yes, as long as your use is non-commercial.</p>
                                <p>You can use any of my artworks in your profile pictures, banners, edits, forum
                                    signatures (and/or posts). You can modify my artworks, edit or crop them as you
                                    wish. You can print them out and hang them on your wall for your own
                                    personal delight. You are free to repost my art online to your hearts content.</p>
                                <p>You can use my music in your animations, videos, covers, or edits. You may remix my
                                    music to your hearts content, and reupload them to other platforms.</p>
                                <p class='warning'>Do not use my artworks, characters, music, animations, anything I've
                                    made, really - for profit.</p>
                                <p>Be kind to others during your usage. The world sucks at the moment, don't contribute to it.</p>
                                <p>No need to credit but it is appreciated.</p>
                                <h3>Are you up for hire?</h3>
                                <p>No, sorry.</p>
                                <h3>How can I support you?</h3>
                                <p><a href='<?php echo BASE_URL . "community/support.php" ?>'>Help, Save, Support</a>
                                </p>

                            </div>

                        </div>
                    </section>
                    <div class='spacermedium'></div>
                </div>
            </div>
        </div>
        <!-- Footer and closing div tags used for styled main content box  -->

        <?php include_once (ELEMENT_FOOTER) ?>
    </main>
</body>

</html>