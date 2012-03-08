<style>
table.capabilities td { padding-right: 1em; } 
.OK { background-color:#cfc; } 
.Fail { background-color:#fcc; }
</style>
<?
require_once( "sparqllib.php" );

print "<h1>SPARQL Lib Endpoint Capabilities Tester</h1>";
capability_table( "http://sparql.data.southampton.ac.uk/" );
capability_table( "http://programme.ecs.soton.ac.uk/glastonbury/2011/sparql" );
#capability_table( "http://dbpedia.org/sparql" );


function capability_table($endpoint)
{
	$db = sparql_connect( $endpoint );
	if( !$db ) { print $db->errno() . ": " . $db->error(). "\n"; exit; }

	print "<h2><a href='$endpoint'>$endpoint</a></h2>";
	print "<table class='capabilities'>";
	foreach( $db->capabilityCodes() as $code )
	{
		$can = $db->supports( $code );
		print "<tr class='".($can?"OK":"Fail")."'>";
		print "<td>".($can?"OK":"Fail")."</td>";
		print "<td>".$db->capabilityDescription($code)."</td>";
		print "<td>($code)</td>";
		print "</tr>";
	}
	print "</table>";
}
