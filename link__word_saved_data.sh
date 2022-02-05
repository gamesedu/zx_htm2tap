mkdir -p /mnt/home/downloads_linux/word_saved_data
#delete folder word_saved_data (if exists to create a symlink)
rm word_saved_data
#ln -s ./word_saved_data /mnt/home/downloads_linux/word_saved_data

ln -s /mnt/home/downloads_linux/word_saved_data ./word_saved_data/