<?php
require 'php/Db.php';
require 'php/Gov.php';

if ($_GET) {
    $zip = $_GET['zip'];
    $results = Gov::getCongressDataByZip($zip);
    if (!$results) {
        $output = "$zip is not a valid zip code. <br> Please enter the zip code where you are registered to vote.";
    } else {
        $output = $results;
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
				<div class="6u">
                                    <section>
                                        <h2>Be a Part of the ERA Movement</h2>
                                        <p style="text-align:center;font-size:1.2em;">
                                            We need everyone to get involved in the ERA Movement! Find your local Congress members by entering your zip code and send them a short email reminding them how important it is to support all of the ERA Resolutions.
                                        </p>
                                        <h4 style="text-align:center; margin-top:50px; margin-bottom:30px">Sample Email</h4>
                                        <p style="text-align:left; margin-left:30px; margin-right:30px">
                                            Dear [<lite>Congress Member</lite>],
                                            <br><br>
                                            My name is [<lite>Your Name</lite>] and I am a supporter of the Equal Rights Amendment (ERA). Support of the ERA, in particular,  [<lite>SJ Resolution 10 or SJ 15</lite> (<strong>if your letter is to a Senator</strong>)] [<lite>HJ Resolution 56 or HJ 113</lite> (<strong>if  your letter is to a member of the House of Representatives</strong>)] is of significant importance to the future of equal rights in the United States. I urge you to help ensure passage of either of these Resolutions expeditiously.
                                            <br><br>
                                            I have taken a pledge to support only elected representatives and candidates who support the passage of the ERA.  If you are not willing to support passage of the ERA, I would appreciate a response explaining your objection.
                                            <br><br>
                                            Thank you for your service,
                                            <br><br>
                                            Sincerely,
                                            <br>
                                            [<lite>Your Name</lite>]
                                        </p>
                                    </section>
				</div>
				<div class="6u">
                                    <section>
                                        <h2 style="margin-bottom:20px;">Let's Take Action!</h2>
                                        <form align=center action="takeaction.php" method="GET">
                                            <p style="font-size:1.5em;"> Your Zip Code:
                                            <input name="zip" style="width:200px;margin-left:10px;" >
                                            <input type="submit" value="Submit">
                                            </p>

                                        </form>
                                        <ul class="list-style2">
                                            <h4><?php if (is_string($output)) { echo $output; } ?></h4>
                                            <ul>
                                                <?php foreach($output as $name => $info ): ?>
                                                <li><h6><?= $name ?></h6>
                                                    <ul>
                                                        <p style="font-size:1.1em;"><?php echo "Co-Sponsor of: " . $info['bills'] ?></p>
                                                        <p style="font-size:1.1em;"><?php echo "<a href={$info['contact']} target='_newtab'>Contact your {$info['role']}</a>" ?></p>
                                                    </ul>
                                                </li>
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