<?php
$con = mysqli_connect("localhost","root","","fmb"); //connection variable
    if(mysqli_connect_error())
    {
      echo "failed to connect to database: ".mysqli_connect_error();
    }
$query = mysqli_query($con, "SELECT * FROM markers WHERE 1 ");
$row = mysqli_fetch_array($query);
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';


// Iterate through the rows, adding XML nodes for each

while ($row){
  // Add to XML document node
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("name",$row['name']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lang']);
  $newnode->setAttribute("type", $row['type']);
}

echo $dom->saveXML();

?>
