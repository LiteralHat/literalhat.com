<?php
$db = new PDO('sqlite:artworksv2.db');
if (!isset($_GET['page'])) {
    session_unset();
    //echo '<br>SESSION DESTROYED';
}
if (isset($_SESSION['dbresults'])) {
    $artworksdb = $_SESSION['dbresults'];
    //echo '<br>SESSION ONGOING';

} else {
    $statement = $db->query("SELECT * FROM artworks");
    //$artworksdb is the 'master' array that will be echo'ed in HTML
    $artworksdb = $statement->fetchAll(PDO::FETCH_ASSOC);
    //echo '<br>ARRAY RESET';
};
$wow = count($artworksdb);
$randomNumber = (rand(0, $wow) + 1);
?>

<div class="contentrowwhite centerbox">
    <div class="extrawidthcontainer center">
        <div class='contentcontainer'>
            <div>
                <div class='spacermedium'></div>
                <span id='gallerytext'><a class='hoverred textblack' href=<?php echo $links . "artworks/gallery" ?>>LITERALGALLERY.</a></span>
                <ul id='gallerymenu'>
                    <li><a  class='hoverred textblack' href=<?php echo $links . "artworks/gallery" ?>>Gallery</a></li>
                    <li><a  class='hoverred textblack' href=<?php echo $links . "artworks/view/" . $randomNumber ?>>Random</a></li>
                    <li><a  class='hoverred textblack' href=<?php echo $links . "artworks/archive" ?>>Archive</a></li>
                    <li><a  class='hoverred textblack' href=<?php echo $links . "index.php" ?>>Back Home</a></li>
                </ul>
                <div class='spacersmall'></div>
                <div class='spacersmall'></div>
                <div class='spacersmall'></div>
            </div>
        </div>
    </div>
</div>



