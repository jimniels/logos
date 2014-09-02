<?php $brands = json_decode( file_get_contents("brands.json"), true); ?><!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title>Logo Integrity in Focus</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="assets/css/build/styles.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="assets/scripts/modernizr.js"></script>

    <!-- Open Graph -->
    <meta property="og:title" content="Logo Integrity in Focus" />
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="Jim Nielsen, Designer / Problem Solver"/>
    <meta property="og:url" content="http://www.jim-nielsen.com/logo-integrity/" />
    <meta property="og:description" content="A well-designed logo retains its form and recognizability under the duress of real-world use and abuse. Take a look at how well a variety of contemporary iconic logo marks hold up to a single form of visual stress: a gaussian blur." />
    <meta property="og:image" content="http://jim-nielsen.com/logo-integrity/assets/images/build/logo-integrity-thumbnail.jpg" />
</head>
<body class="">
    
    <header class="header">
        <blockquote>
            <p>
                <span>“</span>How far out of focus can an image be and still be recognized? A [logo] which is subject to an infinite number of uses, abuses, and variations&hellip;cannot survive unless it is designed with utmost simplicity and restraint.”
                <br />— Paul Rand, <em>A Designer’s Art</em>.
            </p>
        </blockquote>
        <p>According to Paul Rand, a well-designed logo retains its form and recognizability under the duress of real-world use and abuse. To test this theory, let’s look at how well these contemporary iconic logo marks hold up to a single form of visual stress: a gaussian blur. <a href="#">Read more about this experiment &raquo;</a></p>
        <h2>Click to Identify the Logos Below</h2>
        <p>The blurrier the logos are, the more points you’ll get for a correct guess. When you can’t guess anymore, make it easier by sharpening the logos.</p>
    </header>

    <nav class="navigation">
        <div class="sharpen">
            <a href="#" title="Sharpen the logos">Sharpen the Logos</a>
        </div>
        <div class="points score-current">0</div>
    </nav>

    <section class="container wrap" data-active-blur-value="20">

        <ul class="brands">
            <?php
                function outputBrandNames($names){
                    
                    $string = '';

                    foreach ($names as $name) {
                        $string .= "'".$name."',";
                    }
                    
                    // cut off the last comma
                    $string = substr($string, 0, -1);

                    return $string;
                }
                foreach ($brands as $brandID => $brandNames) {
                    ?>
                        <li class="brand" id="<?php echo $brandID ?>" data-answer="[<?php echo outputBrandNames($brandNames) ?>]" data-answered="false">
                            <h2 class="brand-name">
                                <a href="assets/images/build/logos/jpgs/<?php echo $brandID ?>.jpg"><?php echo $brandNames[0] ?></a>
                            </h2>
                        </li>
                    <?php
                }
            ?>
        </ul>

    </section>

    <footer class="footer">
        <p>Created by <a href="http://jim-nielsen.com/">Jim Nielsen</a>. Got feedback? Tweet me <a href="http://twitter.com/jimniels/">@jimniels</a>.</p>
    </footer>


    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" style="width:0;height:0;visibility:hidden">
        <?php 
            for ($i=0; $i <= 20; $i++) { 
                ?> 
                    <filter id="blur-<?php echo $i ?>" x="-50%" y="-50%" width="225%" height="225%">
                        <feGaussianBlur stdDeviation="<?php echo $i ?>"></feGaussianBlur>
                    </filter>
                <?php  
            } 
        ?>
    </svg>


    <script type="text/javascript" src="assets/scripts/jquery.js"></script>
    <script type="text/javascript" src="assets/scripts/fuzzySet.js"></script> 
    <script type="text/javascript" src="assets/scripts/scripts.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-19579223-3', 'auto');
        ga('send', 'pageview');
    </script> 

    <script type="text/html" id="template-brand-form">
        <div class="logo"></div>
        <form class="form" method="post">
            <input type="text" />
            <label>Guess the brand:</label>
            <button type="button">Guess</button>
        </form>
    </script>  
    <script type="text/html" id="template-share-modal">
        <div class="share-modal">
            <div class="wrapper">
                <h2 class="score-final-title">Congratulations on your score!</h2>
                <p class="score-final">0</p>
                <ul class="score-final-share clearfix">
                    <li><a href="#" class="icon-twitter" target="_blank">Tweet your score</a></li>
                    <li><a href="#" class="icon-facebook" target="_blank">Share your score</a></li>
                    <li><a href="#" class="icon-play-again">Play again</a></li>
                </ul>
                <p class="made-by">Made by: <a href="http://jim-nielsen.com/" title="Jim's Homepage">Jim Nielsen</a>, a.k.a. <a href="http://twitter.com/jimniels" title="Jim Nielsen on Twitter">@jimniels</a></p>
            </div>
        </div>
    </script>

</body>
</html>