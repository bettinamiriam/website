<?php
require 'php/Db.php';
require 'php/Gov.php';
require 'php/State.php';

if ($_GET) {
    $state = $_GET['state'];
    if (strlen($state) == 2) {
        $abbrev = $state;
    } else {
        $abbrev = State::getAbbreviation(ucwords($state));
    }
    $results = Gov::getCongressDataByState($abbrev);
    if (!$results) {
        $output = "$state is not a valid state. <br> Please enter the name or abbreviation of a state or territory.";
    } else {
        $state_name = State::getFullName($abbrev);
        $output = "Supporters for $state_name";
    }
}
?>

<!DOCTYPE HTML>
<!--
 Elemental: A responsive HTML5 website template by HTML5Templates.com
 Released for free under the Creative Commons Attribution 3.0 license (html5templates.com/license)
 Visit http://html5templates.com for more great templates or follow us on Twitter @HTML5T
 -->
<html>
<head>
    <title>ERA Coalition: Take Action</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <noscript>
        <link rel="stylesheet" href="css/5grid/core.css" />
        <link rel="stylesheet" href="css/5grid/core-desktop.css" />
        <link rel="stylesheet" href="css/5grid/core-1200px.css" />
        <link rel="stylesheet" href="css/5grid/core-noscript.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-desktop.css" />
    </noscript>
    <script src="css/5grid/jquery.js"></script>
    <script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none"></script>
    <!--[if IE 9]><link rel="stylesheet" href="css/style-ie9.css" /><![endif]-->
</head>
<body>
<div id="header-wrapper">
    <div id="header-wrapper2">
        <header id="header" class="5grid-layout">
            <div class="row">
                <div class="12u" id="logo"> <!-- Logo -->
                    <h1><a href="index.html"><img src="images/name-pink.png" alt="" height=100px></a></h1>
                </div>
            </div>
            <div class="row">
                <div class="12u" id="menu">
                    <nav class="mobileUI-site-nav">
                        <ul>
                            <li class="current_page_item"><a href="index.html">Homepage</a></li>
                            <li><a href="about.html">About Our Mission</a></li>
                            <li><a href="ourmembers.html">Our Members</a></li>
                            <li><a href="cosponsors.php">Cosponsor Map</a></li>
                            <li><a href="takeaction.php">Take Action</a></li>
                            <li><a href="pledge.php">Pledge</a></li>
                            <li><a  style="color:#E60082" href="donate.html">Donate</a></li>
                            <li><a href="eratext10.html">ERA Text</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
    </div>
</div>
<div id="page-wrapper">
	<div class="5grid-layout"> </div>
	<div class="12u">
		<div class="5grid-layout">
                    <div class="row">
                        <div class="8u">
                            <section>
                                <h2 style="margin-bottom:20px;">Click on a State Below</h
                            </section>
                        </div>
                        <div class="4u">
                            <section>
                                <h2><?php if (is_string($output)) { echo $output; } ?></h2>
                            </section>
                        </div>
                    </div>
                    <div class="row">
                        <div class="8u">
                            <section>
                                <iframe src="http://createaclickablemap.com/map.php?&id=26966&online=true" width="900" height="525" style="border: none;"></iframe>
<script>if (window.addEventListener){ window.addEventListener("message", function(event) { if(event.data.length >= 22) { if( event.data.substr(0, 22) == "__MM-LOCATION.REDIRECT") location = event.data.substr(22); } }, false); } else if (window.attachEvent){ window.attachEvent("message", function(event) { if( event.data.length >= 22) { if ( event.data.substr(0, 22) == "__MM-LOCATION.REDIRECT") location = event.data.substr(22); } }, false); } </script>
                            </section>
                            <section>
                                <h2></h2>
                            </section>
                            <section>
                                <form align=center action="cosponsors.php" method="GET">
                                    <p style="font-size:1.3em;">State or Territory:
                                    <input name="state" style="width:200px;margin-left:10px;" >
                                    <input type="submit" value="Submit">
                                    </p>
                                </form>
                            </section>
                        </div>
                        <div class="2u">
                            <section>
                                <ul class="list-style3">
                                    <h4 style="color:#171717">Supporters</h4>
                                    <hr style="margin-top:-20px">
                                    <ul>
                                        <?php foreach($results['supporters'] as $name): ?>
                                        <li><h9><?= "$name \n" ?><h9></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </ul>
                            </section>
                        </div>
                        <div class="2u">
                            <section>
                                <ul class="list-style3">
                                    <h4 style="color:#171717">Non-Supporters</h4>
                                    <hr style="margin-top:-20px">
                                    <ul>
                                        <?php foreach($results['nonsupporters'] as $name): ?>
                                        <li><h9><?= "$name \n" ?><h9></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </ul>
                            </section>
                        </div>
                    </div>
		</div>
	</div>
</div>
<div id="footer-wrapper">
    <div id="footer-content" class="5grid-layout">
        <div id="footer-content" class="5grid-layout">
            <h2>Contact Us: <a href="mailto:info@eracoalition.org">info@eracoalition.org</a></h2>
            <p style="text-align:center; font-weight:bold"> The Coalition for the ERA is a project of the <a href="http://www.centerfortransformativeaction.org/" target="_newtab">Center for Transformative Action</a> </>
        </div>
    </div>
</div>
<div class="5grid-layout">
    <div id="copyright">
        <p>&copy; ERA Coalition | Design: <a href="http://2BlueTriangles.com/">2 Blue Triangles</a> | Inspiration: <a href="http://html5templates.com/">HTML5Templates</a></p>
    </div>
</div>
</body>
</html>