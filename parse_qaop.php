<?php
/*
v211117d - iterate many dirs
v211117c - Working with static dir
v211117b - 
v211110 - initial


*/




//$myfile = fopen("HAD_ZX.DAT", "r") or die("Unable to open file!");
@$myfile = fopen("../HAD_ZX.DAT", "r") ;//or die("Unable to open file!");

$qaopURL='http://localhost/zx/QAOP/qaop.html';
$qaopURL='qaop.html';
$snapsURL='../ROMSMINE/00selection/';
$scanPATH[0]='../GAMES_SELECT/';
$scanPATH[1]='../ROMSMINE/_!Games!';


function string_contains($str, array $arr)
{
    foreach($arr as $a) {
        if (stripos($str,$a) !== false) return true;
    }
    return false;
}


function listFolderFiles($dir){
	global $qaopURL,$snapsURL;
    $ffs = scandir($dir);
    //$ffs = preg_grep('~\.(z80|sna|tap)$~i', scandir($dir));

    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

    // prevent empty ordered elements
    if (count($ffs) < 1)
        return;

    echo '<ol>';
    foreach($ffs as $ff){
     // $ff=preg_grep('~\.(z80|sna|tap)$~i', $ff);      
    	$tmpURL="<a href=".$qaopURL."?#l=".$dir."/$ff target='blank' >$dir/$ff </a>";
        //echo ;
        if(string_contains($tmpURL,array ("z80","sna","tap"))) echo '<li>'.$tmpURL;
        if(is_dir($dir.'/'.$ff)){ echo "<li>";listFolderFiles($dir.'/'.$ff);}
        echo '</li>';
    }
    echo '</ol>';
}

foreach ($scanPATH as $path1 ) {
  # code...
  listFolderFiles($path1);
  echo "<hr>";
}
//listFolderFiles($scanPATH);


/*
SGD
*/
function process_fields($fields){
global $qaopURL,$snapsURL;
echo "<tr><td>";



echo "</td><td>".$fields[1];

echo "</td><td>".$fields[2];

echo "</td><td>".$fields[3];

//echo "</td><td>".$fields[4];
echo "</td><td><a href=".$qaopURL."?#l=".$snapsURL.$fields[4]. ">".$fields[4]."</a> ";
echo "</td><td>".$fields[5];
echo "</td><td>".$fields[6];

echo "</td></tr>";
 //print_r($fields);

};

echo "<table border=1 >";

if($myfile==null) exit(1);
// Output one line until end-of-file
while(!feof($myfile)) {
  
  $s= fgets($myfile);

 // echo "$s" . "<br>";

    $fields[1] = substr($s,0,36);  // gamename first field:  first 10 characters of the line
    $fields[2] = substr($s,37,4);  // year second field: next 5 characters of the line
    $fields[3] = substr($s,42,36); // Publisher  third field:  next 12 characters of the line
    $fields[4] = substr($s,93,12);  //PC name
    $fields[5] = substr($s,106,7); // Type
    $fields[6] = substr($s,150,37); // Type
    //$fields[6] = substr($s,43,89);
    //$fields[7] = substr($s,43,89);
  process_fields($fields);

}
echo "</tr></table>";
fclose($myfile);


?>
<!--
The current database format is:

Field        Start Length  Notes

Name             1     36
Year            38      4  Year-2000 compliant :-)
Publisher       43     36
Memory          80      3  Either one of " 16", " 48", "128", "4/1", "US0",
                           " +2", " +3" or "Pen"
# Players       84      1
Together        86      1  Only 'Y' if > 1 player, space otherwise
Joysticks       88      5  Shrunk leftward, order is 'K12CR' for
                           Kempston, Intf2#1, Intf2#2, Cursor and Redefineable.
PC-Name         94     12  The '.'s are aligned (raw name padded)
Type           107      7
PathIndex      115      3  Index number of the appropriate `GameDir' entry
FileSize       119      7  Is '+' if the size has more than 7 digits
Orig screen    127      1  'Y' if checked, space otherwise
Origin         129      1  ' ' = (unknown)
                           'O' = Original release
                           'R' = Re-release
                           'C' = Compilation release
                           'M' = Magazine conver-tape version
                           'T' = Type-in
                           'H' = Hacked/cracked version
                           'I' = Incomplete version
                           'B' = Buggered/corrupted version
FloppyId       131      4  Marked floppy number, or 0 for harddisk etc.
Emul override  136      2  -1 = none
                           0  = Z80
                           1  = JPP
                           2  = Warajevo
                           3  = X128
                           4  = WSpecEm
                           5  = ZX
                           6  = Spanish
                           7  = ZX-32
                           8  = R80
                           9  = Russian/Shalayev
                           10 = Russian/Yudin
AYSound        139      1  'Y' if checked, space otherwise
MultiLoad      141      1  'Y' if multi-load in both 48K and 128K mode
                           '4' if multi-load only in 48K mode
                           ' ' if not multi-load at all
Language       143      3
Score          147      3  0  = not set
Author         151    100

	-->