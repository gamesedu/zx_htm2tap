<html lang="en">
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
220205 - Removed spaces from filename
220103 - You can also include the supplied `html2text.php` and use `$text = convert_html_to_text($html);` instead.
200902 - initial version - different file per submission 
Changes

*/


$target_subfolder="word_saved_data/";
//$qaopURL=$target_subfolder.'QAOP/qaop.html';
$qaopURL='qaop.html';


include 'Html2Text.php';

print_r ($_REQUEST);


$mytext=$_REQUEST["text_entered"] ;// get TinyMCE html


echo "<HR>";
//$cur_date= date('Ymd');
$file_name="sch".$_REQUEST["schoolname"]."-".$_REQUEST["taksi"].$_REQUEST["tmima"]."-".date('Ymd')."-".$_REQUEST["name"];
$file_name=str_replace(' ', '_',$file_name);//replace spaces with '_'

echo $file_name.".htm";
//$file_name=$cur_date;
//++++++++++++++++++++++++++++++++ Convert HTML 2 txt++++++++++++++++++++++++++++++++++++++

$myfile = fopen($target_subfolder.$file_name.".htm", "w") or die("Unable to open file!");
$txt="";
//$txt = "<h2>$file_name</h2>\n";
//fwrite($myfile, $txt);
$txt = $txt."$mytext\n";
$txt = \Soundasleep\Html2Text::convert($txt); // STrip HTML tags
fwrite($myfile, $txt);
fclose($myfile);

echo "<HR><h2>Η εργασία σας καταχωρήθηκε.</h2> Παρακαλώ κλείστε αυτήν την καρτέλα.";

//++++++++++++++++++++++++++++++++ BAS2TAP : bas2tap $file_name $file_name.TAP++++++++++++++++++++++
//$file_name

//$output = shell_exec("cd $target_subfolder;"."./bas2tap $myfile");
//$output = shell_exec("cd $target_subfolder;".'./bas2tap '. $myfile);
///$output = shell_exec('./zmakebas64_jon '.$target_subfolder.$file_name.".htm"." -o ".$target_subfolder.$file_name.".tap"    ); //zmakebas64 seem to work better
//$output = shell_exec('./bas2tap '.$target_subfolder.$file_name.".htm");	
$output = shell_exec('./zmakebas_32bit '.$target_subfolder.$file_name.".htm"." -o ".$target_subfolder.$file_name.".tap"    ); //zmakebas32 seem to work better online mochahost	   
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
