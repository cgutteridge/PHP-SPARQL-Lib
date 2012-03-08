<?php
include_once '../geshi/geshi.php'; 
$c1='#006400';
$c2='#E0E0FF';
$c3='#0099CC';
$c4='#320064';
$cb='#CCCCFF';
$bd=$c4;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
 "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <title>SPARQL RDF Library for PHP</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link rel="stylesheet" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" type="text/css">
<style type='text/css'>
html,body { font-family: sans-serif; background-color: <?=$cb?>}
p { margin-top: 0.5em; margin-bottom: 0.5em; }
h1 { color: <?=$c3?>; font-size: 300%; font-weight: bold; font-style: italic  }
h2 { color: <?=$c4?>; font-size: 150%; font-weight: bold; margin-top: 1em; margin-bottom: 1em; border-bottom: 1px solid <?=$c4?> ; margin-left: -1em; }
h3 { color: <?=$c4?>; font-size: 130%; font-weight: bold; margin-top: 1em; }
h4 { color: <?=$c4?>; font-size: 110%; font-weight: bold; margin-top: 1em; }
a { color: <?=$c4?>; }
#ft { margin-top: 2em; }
#hd { margin-top: 2em; margin-left:1em; }
#main { margin-left: 2em; }
.navmenu { right: 1em; top: 5em; position: fixed; font-size: 120%; padding: 1em; border: 1px dashed <?=$c4?> ;  background-color: <?=$c2?>; }
.navmenu li { margin-bottom: 0.4em; margin-top:0.4em }
.navmenu li li { padding-left: 2em; }
.example { margin: 1em; }
.example_code_title { padding: 0.2em 1em 0.2em 1em; background-color: <?=$bd?>; color: <?=$c2?>; }
.example_output_title { padding: 0.2em 1em 0.2em 1em; background-color: <?=$bd?>; color: <?=$c2?>; }
.example_code, .example_output {
	padding: 1em;
	border-left: dashed 1px <?=$bd?>;
	border-right: dashed 1px <?=$bd?>;
	border-bottom: dashed 1px <?=$bd?>;
	overflow: auto;
	margin-bottom: 1em;
	background-color: <?=$c2?>;
}
dl.function_list {
	margin-top: 1em;
}
dl.function_list dt {
	font-size: 110%;
	font-weight: bold;
}
dl.function_list dd {
	margin-bottom: 1em;
	margin-top: 0.5em;
	margin-left: 2em;
}
div.class {
	border-left: solid 8px gray; 
	padding-left: 8px;
}
ul.features, ul.bugs, ul.bugs ul {
	margin-left: 2em;
}
ul.features li, ul.bugs li {
	list-style: disc;
}
strong { font-weight:bold; }
</style>
</head>
<body>
<div id="doc3" class="yui-t5">
   <div id="hd" >
<h1>sparqllib.php</h1>
<p>Simple library to query SPARQL from PHP.</p>
<p>&copy;2010 Christopher Gutteridge, University of Southampton.</p>
</div>
   <div id="bd" >
	<div id="yui-main">
	<div class="yui-b"><div class="yui-g" id='main'>


<h2><a name='intro'></a>Intro</h2>
<p>This is a very simple RDF library to query SPARQL from PHP. It currently ignores language and datatype information to make it feel as similar as possible to the normal PHP SQL libraries.</p>
<ul>
<li>Download: <a href='/download.php/sparqllib.php'>sparqllib.php</a> (cc-by)</li>
</ul>
<p>If you want to get started really quickly, the following command line will install sparqllib.php. You should run it in the same directory as where your PHP code resides.</p>
<div class='example_code'>
curl -s http://graphite.ecs.soton.ac.uk/download.php/sparqllib.php -o sparqllib.php
</div>
<p>Also hosted on this site is <a href='/'>Graphite</a>, a simple PHP library for querying RDF data.</p>

<?php
#<h2 style='clear:both'><a name='quick'></a>Really Quick Interface</h2>
#<p>If you just want to get the damn data, use this style.</p>
#render_example( "examples/quick.php" );
?>

<h2 style='clear:both'><a name='classic'></a>Classic mysql_query style</h2>
<p>The library provides functions very similar to mysql_* for comfort.</p>
<?php
render_example( "examples/basic.php" );
?>

<h2 style='clear:both'><a name='object'></a>Object style</h2>
<p>The object-based interface is a bit tidier than the sparql_ style methods.</p>
<?php
render_example( "examples/object.php" );
?>



   <h2><a name='contact'></a>Contact</h2>
   <p>Get in touch with me at <a href='mailto:cjg@ecs.soton.ac.uk'>cjg@ecs.soton.ac.uk</a> and you could have a look at our <a href="http://blogs.ecs.soton.ac.uk/webteam/">web team blog</a>.</p>
	</div>

	<div class="yui-b" id='navigation'>

<ul class='navmenu'>
<li><a href='#intro'>Intro</a></li>
<li><a href='#quick'>Quick Interface</a></li>
<li><a href='#classic'>Classic Interface</a></li>
<li><a href='#object'>Object Interface</a></li>
<li><a href='#contact'>Contact</a></li>
</ul>	
	</div>
	</div>

</div>
</body>
</html>
<?php
function render_example( $src )
{
	$geshi = new GeSHi(join('',file( $src )) , "php" );
	$geshi->enable_keyword_links(false);
	print "<div class='example'>";
	print "<div class='example_code_title'>Code</div>";
	print "<div class='example_code'>". $geshi->parse_code()."</div>";
	print "<div class='example_output_title'>Output</div>";
	print "<div class='example_output'>"; include $src; print "</div>";
	print "</div>";
}
