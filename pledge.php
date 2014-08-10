<?php
require 'php/Db.php';

if ($_POST) {
    $name = $_POST['signature'];
    $email = $_POST['email'];
    $state = $_POST['state'];
    $output = Db::insertSignature($name, $email, $state);
} else {
    $output = "";
}

$num_of_signatures = Db::getSignatureCount();

?>


<!DOCTYPE HTML>
<!--
 Elemental: A responsive HTML5 website template by HTML5Templates.com
 Released for free under the Creative Commons Attribution 3.0 license (html5templates.com/license)
 Visit http://html5templates.com for more great templates or follow us on Twitter @HTML5T
 -->
<html>
<head>
    <title>ERA Coalition: Pledge</title>
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
                            <h2>Take the ERA Pledge</h2>
                            <p style="text-align:center;font-size:1.2em;">
                                I support the ERA Campaign to end economic discrimination and violence against women and to promote equality for all women through an Equal Rights Amendment to the United States Constitution. I pledge NOT to support state and federal legislators who do not publicly support the ERA, either through passage of a new amendment or by completing ratification of the amendment passed by Congress in 1972. Equality for women is a fundamental human right that should be supported by all Americans.
                            </p>
                        </section>
                        <section>
                            <h2 style="margin-top:40px;">Join the ERA Coalition</h2>
                            <p style="text-align:center;font-size:1.2em;">
                                If you represent an organization which would like to join the ERA Coalition, <a href="files/EraCoalitionSignOn.pdf">download and sign the sign-on form</a> and email to: <a href="mailto:info@eracoalition.org">info@eracoalition.org</a>.
                            </p>

                        </section>
                    </div>
                    <div class="6u">
                        <section>
                            <h2>Total Signatures</h2>
                            <h5><?php echo $num_of_signatures ?></h5>
                        </section>
                        <section>
                            <h4 style="text-align:center; margin-top:-10px; margin-bottom:10px"> To take the ERA Pledge, sign your name below</h4>
                            <h4 style="text-align:center; margin-top:20px; color:black;"><?php echo $output; ?></h4>
                            <form action="pledge.php" method="POST">
                                <p style="font-size:1.5em; text-align:center; margin-bottom:10px;">
                                    Name: <input name="signature" style="width:200px;margin-left:10px;" type="text">
                                </p>
                                <p style="font-size:1.5em; text-align:center; margin-bottom:20px;">
                                    Email: <input name="email" style="width:200px; margin-left:10px;" type="text">
                                </p>
                                <select style="position:relative; display:block; margin:0 auto; width:210px;" name="state" size="1">
                                    <option selected value="">State...</option>
                                    <option value="ZZ">None</option>
                                    <option value="">-- UNITED STATES --</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                    <option value="">-- TERRITORIES --</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="GU">Guam</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="VI">Virgin Islands</option>
                                </select>
                                <input style="position:relative; display:block; margin:0 auto; margin-top:30px" type="submit" value="Submit">
                            </form>
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