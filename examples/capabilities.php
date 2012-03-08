<?
require_once( "sparqllib.php" );

print "<h1>SPARQL Lib Endpoint Capabilities Tester</h1>";
capability_table( "http://sparql.data.southampton.ac.uk/" );
capability_table( "http://programme.ecs.soton.ac.uk/glastonbury/2011/sparql" );

function capability_table($endpoint)
{
	$db = sparql_connect( $endpoint );
	if( !$db ) { print $db->errno() . ": " . $db->error(). "\n"; exit; }

	print "<h2><a href='$endpoint'>$endpoint</a></h2>";
	print "<table>";
	foreach( $db->capabilityCodes() as $code )
	{
		$can = $db->supports( $code );
		print "<tr><td>$code:</td><td>".($can?"True":"False")."</td></tr>";
	}
	print "</table>";
}
