<?php
$zx_convert_keywords_loaded=true;
//+++++++++++++++++++++++++++function convert_to_upper+++++++++++++++++++++++++++++++++
function convert_to_upper($query){
	//Converts BASIC keywords to Uppercase BEFORE they are being fed to the bas2tap converter
	echo "<h2>HELLO convert_to_upper</h2>";
/* add this AFTER $mytext=$_REQUEST["text_entered"] ;
if ($replace_with_capital) $mytext=convert_to_upper($mytext);
*/

$initial=	 array (
"copy", "return", "clear", "draw", "cls", "if", "randomize", "randomise", "save", "run", "plot", "print", "poke", "next", "pause", "let", "list", "load", "input", "go sub", "gosub", "go to", "goto", "for", "rem", "dim", "continue", "border", "new", "restore", "data", "read", "stop", "llist", "lprint", "out", "over", "inverse", "bright", "flash", "paper", "ink", "circle", "beep", "verify", "merge", "erase", "move", "format", "cat", "def fn", "deffn", "step", "to", "then", "line", "and", "or", "bin", "not", "chr$", "str$", "usr", "in", "peek", "abs", "sgn", "sqr", "int", "exp", "ln", "atn", "acs", "asn", "tan", "cos", "sin", "len", "val", "code", "val$", "tab", "at", "attr", "screen$", "point", "fn", "pi", "inkey$", "rnd"
                                  );

$replacements=                            array (
"COPY", "RETURN", "CLEAR", "DRAW", "CLS", "IF", "RANDOMIZE", "RANDOMIZE", "SAVE", "RUN", "PLOT", "PRINT", "POKE", "NEXT", "PAUSE", "LET", "LIST", "LOAD", "INPUT", "GO SUB", "GOSUB", "GO TO", "GOTO", "FOR", "REM", "DIM", "CONTINUE", "BORDER", "NEW", "RESTORE", "DATA", "READ", "STOP", "LLIST", "LPRINT", "OUT", "OVER", "INVERSE", "BRIGHT", "FLASH", "PAPER", "INK", "CIRCLE", "BEEP", "VERIFY", "MERGE", "ERASE", "MOVE", "FORMAT", "CAT", "DEF FN", "DEFFN", "STEP", "TO", "THEN", "LINE", "AND", "OR", "BIN", "NOT", "CHR$", "STR$", "USR", "IN", "PEEK", "ABS", "SGN", "SQR", "INT", "EXP", "LN", "ATN", "ACS", "ASN", "TAN", "COS", "SIN", "LEN", "VAL", "CODE", "VAL$", "TAB", "AT", "ATTR", "SCREEN$", "POINT", "FN", "PI", "INKEY$", "RND"
                                  );


$query = str_ireplace(     $initial   ,$replacements,  $query  );	
return $query;
}
//--------------------------------function convert_to_upper------------------------------
?>