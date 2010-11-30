<html>
 <head>
  <title>Blue Elephant</title>
  <link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS['stylesheetUrl']; ?>main.css" />
 </head>
 <body>
  <center><span class="header">Blue Elephant</span><br />
  <span class="author">By Joseph Moniz</span></center>
  <?php echo $page_content; ?><br />
  <center><span class="stat">Page loaded in <?php echo round($GLOBALS['globalPageTimer']->__toString(), 3); ?> seconds.</span></center>
 </body>
</html>
