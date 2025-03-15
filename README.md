# zx_htm2tap
gamesedu/zx_htm2tap
Uses Edit-Area and zmakebas

Changes:
230122 - Added PC number dropbox to submit form
220215 - Using edit-are without line_numbers

-BUG : bas2tap : < (greater) takes it as start of TAG!!! (zmakebas seems better)
-ToDo: zmakebas: check if a line containing eg "x<20" creates an error




NOTE 1: This is a modification of one of my other scripts.   
NOTE 2: Use this on LOCAL server ONLY. This is designed for local LAN use and NOT with web security in mind!
NOTE 3: handle_submit.php : uncomment the correct line for 32bit or 64 bit versions.
NOTE 4: Make sure zmakebas and bas2tap are executionable.

# commands
./zmakebas b.bas -o b2.tap


# compile commands
gcc -Wall -o bas2tap bas2tap.c -lm
zmakebas: "make" and then "make install"











# Links
https://github.com/z00m128/zmakebas
https://github.com/speccyorg/bas2tap
https://github.com/andybalaam/bas2tap
https://zgedneil.nfshost.com/zmakebas.html
https://github.com/paulspringett/good-shepherd

https://github.com/coding-horror/basic-computer-games
https://github.com/GReaperEx/bcg
