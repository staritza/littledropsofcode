<?php
define(LIBLDOC_PATH, '@LIBLDOC_PATH@');

function __autoload($class) {
    require_once(LIBLDOC_PATH . "/classes/$class.php");
}

function action($action) {
    require(LIBLDOC_PATH . "/actions/$action.php");
}

function page($page) {
    require(LIBLDOC_PATH . "/pages/$page.php");
}

function snippet($snippet) { 
    require(LIBLDOC_PATH . "/snippets/$snippet.php");
}

// This needs to be here to ensure that the Session constructor runs before 
// the headers are sent.
Session::instance();

if (isset($_GET['action'])) {
    action($_GET['action']);
}

Session::instance()->setNavbarItem(LittleDropsOfCode::instance()->getPage());
?>

<html xmlns="http://www.w3.org/1999/xhtml" version="XHTML 1.1">
  <head>
    <title>Little drops of code</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="js/@PKG_JQUERY@" type="text/javascript"></script>
  </head>

  <body>
    <div id="page">
      <div id="page-header">
	Little drops of code
      </div>

      <div id="navbar">
	<?php snippet("navbar"); ?>
      </div>

      <?php page(LittleDropsOfCode::instance()->getPage()); ?>

      <div id="page-footer">
	Copyright &copy; 2009 Lorenzo Cabrini
      </div>
    </div>
  </body>
</html>
