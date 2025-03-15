
<html lang="en">
<!--
-230122 - Added PC number to submission form
	-->
  <head>
    <meta charset="utf-8">

	<script type="text/javascript">

	//this.onload = function(){window.open($tmpURL; , "emulator_output");};
	
	function load()
	{ //alert ("hello");
		//load2();
		setTimeout(function() {   		load2(); 
		}, 1000);
		
		//history.back() ; //history.go(-1)
	        
	}

	</script>

   </head>
   <body onload="load()" >
<?php
/*
http://localhost/zx/zx_mce2tap/
230124 - REMOVED a replace line - caused multiple white spaces to seem like one space
220222 - include - zx_convert_keywords_to_uppercase.php
220217 - replaced Html2Text_4_forEditArea.php  with function rip_tags($string)
220210 - Added & tested zmakebas152_win.exe 
220209 - Added sample code for bas2tap.exe 
220205 - Removed spaces from filename
220103 - You can also include the supplied `html2text.php` and use `$text = convert_html_to_text($html);` instead.
200902 - initial version - different file per submission 
Changes

*/
$zx_convert_keywords_loaded=false;
$convert_keywords=true;
$target_subfolder="word_saved_data/";
//$qaopURL=$target_subfolder.'QAOP/qaop.html';
$qaopURL='qaop.html';


function rip_tags($string) {
    // ----- remove HTML TAGs -----
    //$string = preg_replace ('/<[^>]*>/', ' ', $string);
    // ----- remove control characters -----
    $string = str_replace("\r", '', $string);    // --- replace with empty space
    //$string = str_replace("\n", ' ', $string);   // --- replace with space
    $string = str_replace("\t", ' ', $string);   // --- replace with space
    // ----- remove multiple spaces -----
    ///$string = trim(preg_replace('/ {2,}/', ' ', $string));  //REMOVED 230124 -caused multiple white spaces to seem like one space
    return $string;

}




//include 'Html2Text.php'; //ΟΡΙΓΙΝΑΛ
//include 'Html2Text_4_forEditArea.php';// Mod for EditArea (fixes problem with line break)

print_r ($_REQUEST);


$mytext=$_REQUEST["text_entered"] ;// get TinyMCE html

if($convert_keywords){ 
	include "zx_convert_keywords_to_uppercase.php";
	if ($zx_convert_keywords_loaded) $mytext=convert_to_upper($mytext);
}



echo "<HR>";
//$cur_date= date('Ymd');
$file_name="sch".$_REQUEST["schoolname"]."-".$_REQUEST["taksi"].$_REQUEST["tmima"]."-".date('Ymd')."-PC".$_REQUEST["pc"]."-".$_REQUEST["name"];
$file_name=str_replace(' ', '_',$file_name);//replace spaces with '_'

echo $file_name.".htm";
//$file_name=$cur_date;
//++++++++++++++++++++++++++++++++ Convert HTML 2 txt++++++++++++++++++++++++++++++++++++++

$myfile = fopen($target_subfolder.$file_name.".htm", "w") or die("Unable to open file!");
$txt="";
//$txt = "<h2>$file_name</h2>\n";
//fwrite($myfile, $txt);
$txt = $txt."$mytext\n";
$txt = str_replace("\r\n", "\n", $txt); //JON added for replaceing HTML2TExt
//$txt = \Soundasleep\Html2Text::convert($txt); // STrip HTML tags
//$txt=strip_tags($txt);
$txt=rip_tags($txt);

fwrite($myfile, $txt);
fclose($myfile);

echo "<HR><h2>Η εργασία σας καταχωρήθηκε.</h2> Παρακαλώ κλείστε αυτήν την καρτέλα.";

//++++++++++++++++++++++++++++++++ BAS2TAP : bas2tap $file_name $file_name.TAP++++++++++++++++++++++
//$file_name

$output = shell_exec('./zmakebas64_jon '.$target_subfolder.$file_name.".htm"." -o ".$target_subfolder.$file_name.".tap"    ); //zmakebas64 seem to work better
///$output = shell_exec('./zmakebas15_win.exe '.$target_subfolder.$file_name.".htm"." -o ".$target_subfolder.$file_name.".tap"    ); //windows
///$output = shell_exec('./zmakebas152_win.exe '.$target_subfolder.$file_name.".htm"." -o ".$target_subfolder.$file_name.".tap"    ); //windows

///$output = shell_exec('./zmakebas_32bit '.$target_subfolder.$file_name.".htm"." -o ".$target_subfolder.$file_name.".tap"    ); //zmakebas32 seem to work better ONLINE mochahost	   

//$output = shell_exec('./bas2tap '.$target_subfolder.$file_name.".htm");	
//$output = shell_exec("cd $target_subfolder;"."./bas2tap ".$file_name.".htm");
//$output = shell_exec("cd $target_subfolder;"."./bas2tap.exe ".$file_name.".htm"); //windows
//$output = shell_exec("cd $target_subfolder;"."./bas2tap $myfile");
//$output = shell_exec("cd $target_subfolder;".'./bas2tap '. $myfile);

echo "<pre>Bas2Tap result : $output</pre>";

//$tmpURL="<a href=".$qaopURL."?#l=".$dir."/$ff target='blank' >$dir/$ff </a>";

//$tmpURL="<a href=".$qaopURL."?#l=".$target_subfolder."/$file_name.tap target='blank' >$target_subfolder/$file_name.tap </a>";
$tmpURL="<a href=".$qaopURL."?#l=".$target_subfolder."$file_name.tap target='emulator_output' >$target_subfolder/$file_name.tap </a>";
echo "file_name=$file_name<br>";
echo "<br>$tmpURL";


?>
<?php 
 echo '
	<script type="text/javascript">

	//this.onload = function(){window.open($tmpURL; , "emulator_output");};
	
	function load2()
	{ //alert ("hello2");
		//window.open( echo $tmpURL , "emulator_output"); ';
		//$tmpURL2='"'.$qaopURL."?#l=".$target_subfolder."$file_name.tap\"";
		$tmpURL2='"'.$qaopURL."?#l=".$target_subfolder."$file_name.tap\"";
	echo '	
		//window.open("https://www.w3schools.com");
		window.open(  '.$tmpURL2.'  , "emulator_output");
		//history.back() ; //history.go(-1)
	        
	}

	</script>
	'; 
	?>
</body> 
</html>
