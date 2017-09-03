# simpleUpload
A simple set of PHP scripts to let you upload files to a server and make them public. Uses a MySQL/MariaDB table to keep track of files and their IDs.

Put the files somewhere in your server, edit the config.php file, import the included SQL dump, then password-protect the uploader directory so only you can upload files.

Don't use this for files you don't want public, as anyone can easily increment the ID for get.php to see all files uploaded. 
