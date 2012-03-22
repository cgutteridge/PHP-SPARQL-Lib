<style>
table.capabilities td { padding-right: 1em; } 
.OK { background-color:#cfc; } 
.Fail { background-color:#fcc; }
</style>
<?
require_once( "sparqllib.php" );
print "<p>These are tests against PUBLIC endpoints. They may support LOAD when credentials are supplied.</p>";
print "<p>A cache file is used to save the results for a week, as they will be very unlikely to change.</p>";
print "<p>ARC2</p>";
capability_table( "http://programme.ecs.soton.ac.uk/glastonbury/2011/sparql" );
print "<p>4store</p>";
capability_table( "http://sparql.data.southampton.ac.uk/" );
# print "<p>joseki 3</p>";
# capability_table( "http://jena.hpl.hp.com:3040/backstage" );
print "<p>Virtuoso</p>";
capability_table( "http://data.semanticweb.org/sparql" );
print "<p>Bigfoot</p>";
capability_table( "http://services.data.gov.uk/reference/sparql" );
print "<p>Fuseki</p>";
capability_table( "http://worldbank.270a.info/sparql" );
function capability_table($endpoint)
{
	$db = sparql_connect( $endpoint );
	$db->capabilityCache( "/usr/local/apache/sites/ecs.soton.ac.uk/graphite/htdocs/sparqllib/cache/caps.db" );

	if( !$db ) { print $db->errno() . ": " . $db->error(). "\n"; exit; }

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
