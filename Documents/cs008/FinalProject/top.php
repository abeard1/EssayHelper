<!DOCTYPE html>
<html lang="en">
    <head>
        <title>EssayHelper</title>
        <meta charset="utf-8">
        <meta name="author" content="Alex Beard">
        <meta name="description" content="Paths for switching between Home/Sign up">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="style.css" type="text/css" media="screen">
        
        <?php
        $debug = false;
        // This if statement allows us in the classroom to see what our variables are
        // This is NEVER done on a live site 
        if (isset($_GET["debug"])) {
            $debug = true;
        }
// *****************************************************************************
//
// PATH SETUP
//
        $domain = "//";
        $server = htmlentities($_SERVER['SERVER_NAME'], ENT_QUOTES, "UTF-8");
        $domain .= $server;
        $phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");
        $path_parts = pathinfo($phpSelf);
        
        if ($debug) {
            print "<p>Domain: " . $domain;
            print "<p>php Self: " . $phpSelf;
            print "<p>Path Parts<pre>";
            print_r($path_parts);
            print "</pre></p>";
        }
// *****************************************************************************
//
// include all libraries 
// 
//
        print "<!-- include libraries -->";
        
        require_once('lib/security.php');
        
        // only includes functions in form page 
        // 
        
        if ($path_parts['filename'] == "form") {
            print "<!-- include form libraries -->";
            include "lib/validation-functions.php";
            
        }        
        
        print "<!-- finished including libraries -->";
        ?>	



    </head>
    <!--############# body section #################-->
    <?php
    print '<body id="' . $path_parts['filename'] . '">';
    include "header.php";
    include "nav.php";
    if ($debug) {
        print "<p>DEBUG MODE IS ON</p>";
    }
    ?>



