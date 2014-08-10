<?php
require 'php/Db.php';

$signatures = Db::getSignatures();
$signature_count = Db::getSignatureCount();

?>


<!DOCTYPE HTML>
<!--
 Elemental: A responsive HTML5 website template by HTML5Templates.com
 Released for free under the Creative Commons Attribution 3.0 license (html5templates.com/license)
 Visit http://html5templates.com for more great templates or follow us on Twitter @HTML5T
-->
<html>
    <head>
        <title>ERA Coalition: Pledge Responses</title>
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

        <style>
        table, th, td
        {
            border:1px solid black;
            text-align: left;
            padding-left: 10px;
        }
        </style>
    </head>
    <body>
    </div>
    <div id="page-wrapper">
        <div class="5grid-layout"> </div>
        <div class="12u">
            <div class="5grid-layout">
                <div class="row">
                    <div class="6u">
                        <section>
                            <h2>Total Signatures</h2>
                            <h5><?php echo $signature_count ?></h5>
                        </section>
                        <section>
                            <?php while($signature = mysqli_fetch_array($signatures)): ?>
                            <table style="width:100%">
                                <tr>
                                  <td style="width:45%"><?php echo $signature['name'] ?></td>
                                  <td style="width:45%"><?php echo $signature['email'] ?></td>
                                  <td style="width:10%"><?php echo $signature['state'] ?></td>
                                </tr>
                            <?php endwhile; ?>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>