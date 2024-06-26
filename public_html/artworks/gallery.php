<?php

include_once ('../../config.php');
include ('../../vendor/autoload.php');

use App\Controllers\GalleryCtrl;
use App\Models\GalleryModel;
use App\Classes\Query;
use App\Classes\Sortby;
use App\Config\Dbh;

include '../../controllers/galleryctrl.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home | LiteralGallery</title>
    <meta name="Home | LiteralGallery"
        content="Browse, view, and search LiteralHat's artworks, ranging from 2020 to current day. Traditional art, digital art, and more." />
    <?php include_once (INCLUDES_FOLDER . '/headtags.php') ?>

</head>


<body>
    <main>
        <?php include_once (INCLUDES_FOLDER . '/galleryheader.php'); 
        
      
        
        ?>

            

        <div class="contentrowwhite centerbox">
            <div class='widthcontainer centerbox'>
                <div class='contentcontainer paddedsm'>
                    <div class='columnbox'>
                        <p>Welcome to the gallery.</p>
                        <p>Click on an artwork to view.</p>
                        <p>Or find an artwork using the advanced search. If it breaks, email support.</p>
                        <p>Sketchbooks are exclusively <a href='https://www.patreon.com/LiteralHat'>here.</a> In the
                            future, only Patrons will be granted user accounts.</p>
                        <p>This page is still a work in progress and currently not a priority as I have many artworks to
                            catalog.</p>
                        <br>
                        <br>

                        <?php

                        if (isset($_GET['itemsnumber'])) {

                            $itemsPerPage = $_GET['itemsnumber'];
                        }   else {
                            $itemsPerPage = 30;
                        }


                        $totalArtworks = count($data);
                        $totalPages = ceil($totalArtworks / $itemsPerPage);
                        //gets the current page from the url
                        if (isset($_GET['page'])) {
                            $currentPage = $_GET['page'];
                        } else {
                            $currentPage = 1;
                        }

                        $itemsStartLimit = (($currentPage - 1) * $itemsPerPage + 1);
                        $itemsEndLimit = $itemsPerPage * $currentPage;

                        $rowCount = 0;

                        ?>
                    </div>
                </div>
            </div>

            <div class='boxedsection'>
                <div class='sidecontainer gallerysearchform'>
                    <div class='spacermedium'></div>
                    <form class='form' action='' method='GET'>
                        <div class='contentcontainer'>
                            <div class="whitebox padded">
                                <h2>Advanced Search:</h2>
                                <fieldset id='titlecontains'>
                                    <p>
                                        <label for="title">
                                            <h3>Title Contains: </h3>
                                            <input pattern="[A-Za-z0-9' ]+" id="title" type="text"
                                                name="title" placeholder="e.g. baby bird" />
                                        </label>
                                    </p>
                                </fieldset>

                                <fieldset id='daterange'>
                                    <p>
                                    <h3>Date Range:</h3>
                                    <p>
                                        <label for="fuzzydate"><input id="fuzzydate" type="checkbox" name="fuzzydate" />
                                            Fuzzy Date
                                    </p>
                                    </label>

                                    <ul>
                                        <li><label for="beforedate">From:</label><input id="beforedate" type="date"
                                                name="beforedate" /></li>
                                        <li><label for="afterdate">To: </label><input id="afterdate" type="date"
                                                name="afterdate" /></li>
                                    </ul>
                                    </p>
                                </fieldset>



                                <fieldset>
                                    <p>
                                        <label for='category'>
                                            <h3>Category:</h3>
                                            <select name='category' id='category'>
                                                <option value='artwork'>Artworks / Pieces</option>
                                                <option value='collection'>Collections</option>
                                                <option value='doodle'>Doodles / Incomplete</option>
                                                <option value='photography'>Photography / Film</option>
                                                <option value='sketchbook'>Sketchbook</option>
                                                <option value='' selected>Select an option:</option>
                                            </select>
                                        </label>
                                    </p>
                                </fieldset>

                                <fieldset id='collection'>
                                    <p>
                                        <label for='collection'>
                                            <h4>Pick a collection:</h4>
                                            <select name='collection'>
                                                <option value='Baby Bird'>2024 - Baby Bird</option>
                                                <option value='Rose Tinted Window Panes'>2022 - Rose Tinted Window Panes
                                                </option>
                                                <option value='Self Defense'>2022 - Self Defense</option>
                                                <option value='Rat in the Machine'>2022 - Rat In The Machine</option>
                                                <option value='LiteralLucid'>2021 - LiteralLucid</option>
                                                <option value='' selected>Select an option</option>
                                            </select>
                                        </label>
                                    </p>
                                </fieldset>

                                <fieldset id='mediums'>
                                    <p>
                                        <label for='mediums'>
                                            <h3>Medium</h3>
                                            <ul>
                                                <li><input id="watercolor" type="checkbox" name="mediums[]"
                                                        value="watercolor" /><label for="watercolor">
                                                        Watercolor</label>
                                                </li>
                                                <li><input id="ink" type="checkbox" name="mediums[]"
                                                        value="ink" /><label for="ink">
                                                        Ink</label></li>
                                                <li><input id="acrylic" type="checkbox" name="mediums[]"
                                                        value="acrylic" /><label for="acrylic"> Acrylic</label></li>
                                                <li><input id="graphite" type="checkbox" name="mediums[]"
                                                        value="graphite" /><label for="graphite"> Graphite</label>
                                                </li>
                                                <li><input id="gouache" type="checkbox" name="mediums[]"
                                                        value="gouache" /><label for="gouache"> Gouache</label></li>
                                                <li><input id="digital" type="checkbox" name="mediums[]"
                                                        value="digital" /><label for="digital"> Digital</label></li>
                                                <li><input id="traditional" type="checkbox" name="mediums[]"
                                                        value="traditional" /><label for="traditional">
                                                        Traditional</label>
                                                </li>
                                            </ul>
                                        </label>
                                    </p>
                                </fieldset>

                                <script>
                                    const categoryField = document.getElementById('category');
                                    const collectionField = document.getElementById('collection');


                                    collectionField.style.display = 'none';
                                    mediumField.style.display = 'none';


                                    categoryField.addEventListener('change', function () {
                                        if (categoryField.value === 'collection') {
                                            mediumField.style.display = 'none';
                                            collectionField.style.display = 'block';
                                        } else {
                                            mediumField.style.display = 'none';
                                            collectionField.style.display = 'none';
                                        }
                                    });

                                </script>

                                <fieldset>
                                    <p>
                                        <label for="tags">
                                            <h3>Tags:</h3><span>(Separate tags with a space e.g. 'hat levy')</span>
                                            <input pattern="[A-Za-z0-9 ]+" id="tags" type="text"
                                                name="tags" placeholder="tag1 tag2 tag3" />
                                        </label>
                                    </p>
                                </fieldset>


                                <div class='spacersmall'></div>

                                <fieldset>

                                    <button class='button' type='submit' value='submitsearch'
                                        name='submitsearch'>SEARCH</button>
                                </fieldset>

                            </div>
                        </div>
                    </form>
                </div>


                <div class='boxedsection gallerycontainer' id='top'>
                    <div class='contentcontainer'>
                        <div class="whitebox padded">
                             <?php if (isset($_GET['title'])) {
                                echo '<h2>Search Results: ' . count($data) . '</h2><span></span>';
                            } else {
                                echo '<h2>Viewing All Artworks: ' . count($data) . '</h2><span></span>';
                            }
                            ?>


                            <div>
                                <h2 id='gallerypagenumbers'>Page you wanna go to:



                                    <?php

                                    $currentURL = htmlspecialchars($_SERVER['REQUEST_URI']);

                                    for ($i = 1; $i <= $totalPages; $i++) {
                                        // Check if page parameter is already set in the URL
                                        if (isset($_GET['page'])) {
                                            // Replace the existing page number with the current $i
                                            $newURL = preg_replace('/(page=)\d+/', 'page=' . $i, $currentURL);
                                        } else {
                                            // If page parameter is not set, append it to the current URL
                                            $newURL = $currentURL . '&page=' . $i;
                                        }

                                        // Add anchor link '#top' if needed
                                        $newURL .= '#top';

                                        // Determine link class based on current page
                                        $linkClass = ($i == $currentPage) ? 'hoverred textblack' : 'hoverred textblack nounderline';

                                        // Output the pagination link
                                        echo '<a class="' . $linkClass . '" href="' . $newURL . '">' . $i . '</a>';
                                    }

                                    ?>
                                </h2>
                            </div>

                            <form class='form' action="" method='GET'>


                                <input type="hidden" name="title"
                                    value="<?php echo isset($_GET['title']) ? htmlspecialchars($_GET['title']) : ''; ?>">
                                <input type="hidden" name="submitsearch"
                                    value="<?php echo isset($_GET['submitsearch']) ? htmlspecialchars($_GET['submitsearch']) : ''; ?>">
                                <input type="hidden" name="beforedate"
                                    value="<?php echo isset($_GET['beforedate']) ? htmlspecialchars($_GET['beforedate']) : ''; ?>">
                                <input type="hidden" name="afterdate"
                                    value="<?php echo isset($_GET['afterdate']) ? htmlspecialchars($_GET['afterdate']) : ''; ?>">
                                <input type="hidden" name="category"
                                    value="<?php echo isset($_GET['category']) ? htmlspecialchars($_GET['category']) : ''; ?>">
                                <input type="hidden" name="collection"
                                    value="<?php echo isset($_GET['collection']) ? htmlspecialchars($_GET['collection']) : ''; ?>">
                                <input type="hidden" name="tags"
                                    value="<?php echo isset($_GET['tags']) ? htmlspecialchars($_GET['tags']) : ''; ?>">



                                <label for='sortby'><span class='bold'>Sort by:</span></label>
                                <select name='sortby' id='sortby'>
                                    <option value='default'>Default (Date Added)</option>
                                    <option value='title'>Title</option>
                                    <option value='newtoold'>Date Created (Newest to Oldest)</option>
                                    <option value='oldtonew'>Date Created (Oldest to Newest)</option>
                                </select>

                                <label for='itemsnumber'><span class='bold'>Items Per Page:</span></label>
                                <select name='itemsnumber' id='itemsnumber'>
                                    <option value='15'>15</option>
                                    <option value='30' selected>30</option>
                                    <option value='45'>45</option>
                                    <option value='60'>60</option>
                                    <option value='60'>69</option>
                                </select>

                                <button type='submit' value='submitsort' name='submitsort'> Sort that bad
                                    boy!
                                </button>
                            </form>



                            <hr class='hrtextseparator'>
                            <div id='galleryitems'>
                                <?php



                                if (count($data) == 0) {
                                    echo '<div class="center padtop"><p class="medium padtop">Uh oh. Looks like there aren\'t any results for your query.</p><p class="padtop">Try search for something else.</p><img src="../images/pagedolls/hat-frustrated.jpg" width=300px></div>
                                    ';
                                } else {
                                    foreach ($data as $row => $artwork) {
                                        $rowCount++;

                                        if ($rowCount >= $itemsStartLimit) {
                                            $wordsArray = explode("-", $artwork['title']);
                                            $capitalizedWords = array_map('ucfirst', $wordsArray);
                                            $finalString = implode(" ", $capitalizedWords);
                                            $dateString = htmlspecialchars($artwork['datecreated']);
                                            $year = substr($dateString, 0, 4);
                                            echo "<div class='gallerythumbnail'><a href=\"view/" . $artwork['artworkid'] . "\"><img src='https://leviathan.literalhat.com/gallery/literalhat_" . $artwork['datecreated'] . "_" . htmlspecialchars($artwork['title']) . ".webp'><p class='gallerytitle'>" . $finalString . "</p></a><p>" . $year . "</div>";

                                            if ($rowCount >= $itemsEndLimit) {
                                                break;
                                            }
                                        }
                                    }

                                }

                                ?>



                            </div>

                            <hr class='hrtextseparator'>
                            <br>
                            <div class='flexright'>
                                <h2 id='gallerypagenumbers'>More pages:
                                    <?php

                                    $currentURL = htmlspecialchars($_SERVER['REQUEST_URI']);

                                    for ($i = 1; $i <= $totalPages; $i++) {
                                        // Check if page parameter is already set in the URL
                                        if (isset($_GET['page'])) {
                                            // Replace the existing page number with the current $i
                                            $newURL = preg_replace('/(page=)\d+/', 'page=' . $i, $currentURL);
                                        } else {
                                            // If page parameter is not set, append it to the current URL
                                            $newURL = $currentURL . '&page=' . $i;
                                        }

                                        // Add anchor link '#top' if needed
                                        $newURL .= '#top';

                                        // Determine link class based on current page
                                        $linkClass = ($i == $currentPage) ? 'hoverred textblack' : 'hoverred textblack nounderline';

                                        // Output the pagination link
                                        echo '<a class="' . $linkClass . '" href="' . $newURL . '">' . $i . '</a>';
                                    }

                                    ?>
                                </h2>
                            </div>
                        </div>


                    </div>

                </div>


                <div class='sidecontainer' id='gallerysidecontainer'>

                </div>

            </div>

        </div>

        <div class='spacermedium'></div>
        <?php include_once (ELEMENT_FOOTER);
        ?>
    </main>
</body>






</html>