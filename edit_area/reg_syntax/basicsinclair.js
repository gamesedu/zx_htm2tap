editAreaLoader.load_syntax["basicsinclair"] = {
	'DISPLAY_NAME' : 'SinclairBasic'
	,'COMMENT_SINGLE' : {1 : 'REM'  , 2 : "rem" , 3 : "Rem"  , 4 : "REm", 5 : "rEM", 6 : "rEm", 7 : "reM" } 
	,'COMMENT_MULTI' : { }
	,'QUOTEMARKS' : {1: '"'}
	,'KEYWORD_CASE_SENSITIVE' : false
	,'KEYWORDS' : {
		'statements' : [
			'if','then','for',
			'next','step','to'
			//'else','elseif','select',
		]
		,'keywords' : [
			'PAPER','BORDER','INK','FLASH','INVERSE','OVER','PLOT',
			'PI','STEP','DATA','restore','gosub', 'goto','go',
			'circle',  'cls','draw','def', 'fn','screen$',
			'let', 'line', 'list','return', 'run',
			'poke', 'randomize', 'read','stop','dim','beep',

			'com', 'common', 'date', 'declare', 'clear', 'close',
			'defint', 'deflng', 'defsng', 'defstr', 'color',
			'double', 'environ', 'erase', 'error', 'field',
			'files',  'get',  'integer', 'key','locate', 'lock', 'long',
			'lprint', 'lset',  'name', 'off', 'on', 'open',
			'option', 'out', 'output', 'paint', 'palette', 'pcopy',
			'preset', 'print', 'pset', 'put', 'random',
			 'reset', 'resume', 'screen', 'seg',
			'shell', 'single', 'sleep', 'sound', 'static', 
			'strig', 'string', 'swap', 'system', 'time', 'timer',
			'troff', 'tron', 'type', 'unlock', 'using', 'view',
			'wait', 'width', 'window', 'write',
			'exit', 'redim', 'shared', 'const',
			'is', 'absolute', 'access', 'any', 'append', 'as',
			'base',  'binary', 'bload',
			//added by other site
			'ABS','ACS','ASN','AT','ATN','ATTR','BEEP',
			'BIN','BORDER','BRIGHT','CAT','CHR$','CIRCLE','CLEAR',
			'CLOSE','CLS','CODE','CONTINUE','COPY','COS','DATA',
			'DEFFN','DIM','DRAW','ERASE','EXP','FLASH','FN','FOR',
			'FORMAT','GOSUB','GOTO','IF','IN','INK','INKEY$',
			'INPUT','INT','INVERSE','LEN','LET','LINE','LIST',
			'LLIST','LN','LOAD','LPRINT','MERGE','MOVE','NEW',
			'NEXT','NOT','OPEN','OR1','OUT','OVER','PAPER','PAUSE',
			'PEEK','PI','PLOT','POINT','POKE','PRINT','RANDOMIZE',
			'READ','RESTORE','RETURN','RND','RUN','SAVE',
			'SCREEN$','SGN','SIN','SQR','STEP','STR$','TAB','TAN',
			'THEN','TO','USR','VAL$','VAL','VERIFY',
			'AND'

	        ]
		,'functions' : [
			'abs', 

			'asc', 'atn', 'cdbl', 'chr', 'cint', 'clng',
			'cos', 'csng', 'csrlin', 'cvd', 'cvdmbf', 'cvi', 'cvl',
			'cvs', 'cvsmbf', 'eof', 'erdev', 'erl', 'err', 'exp',
			'fileattr', 'fix', 'fre', 'freefile', 'hex', 'inkey',
			'inp', 'input', 'instr', 'int', 'ioctl', 'lbound',
			'lcase', 'left', 'len', 'loc', 'lof', 'log', 'lpos',
			'ltrim', 'mid', 'mkd', 'mkdmbf', 'mki', 'mkl', 'mks',
			'mksmbf', 'oct', 'peek', 'pen', 'play', 'pmap', 'point',
			'pos', 'right', 'rnd', 'rtrim', 'seek', 'sgn', 'sin',
			'space', 'spc', 'sqr', 'stick', 'str', 'tab', 'tan',
			'ubound', 'ucase', 'val', 'varptr', 'varseg'
		]
		,'operators' : [
			'and', 'eqv', 'imp', 'mod', 'not', 'or', 'xor'
		]
	}
	,'OPERATORS' :[
		'+', '-', '/', '*', '=','<=','>=','<>', '<', '>', '!', '&'
	]
	,'DELIMITERS' :[
		'(', ')', '[', ']', '{', '}'
	]
	,'STYLES' : {
		'COMMENTS': 'color: #99CC00;'
		,'QUOTESMARKS': 'color: green;' //#333399;
		,'KEYWORDS' : {
			'keywords' : 'color: #3366FF;'
			,'functions' : 'color: #0000FF;'
			,'statements' : 'color: #3366FF;'
			,'operators' : 'color: #FF0000;'
			}
		,'OPERATORS' : 'color: #FF0000;'
		,'DELIMITERS' : 'color: #0000FF;'

	}
};
