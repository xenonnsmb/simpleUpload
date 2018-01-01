# simpleUpload
A simple set of PHP scripts to let you upload files to a server and make them public. Uses a MySQL/MariaDB table to keep track of files and their IDs. Files can be accessed with a simple syntax: `get.php?id=[file id]`. Designed for images, but works with most file types. The HTML is also incredibly simple, so it should work on a large variety of browsers and platforms, old and new.

Warning: Don't use this for files you don't want public, as anyone can easily increment the ID for get.php to see all files uploaded. 


# Install and Configure
Put get.php and uploader somewhere in your server. They need to be in the same directory but it can be any directory.

Then, edit the config.php file.

First, add your database info:
```
function getDb() {
    return new mysqli("localhost", "username", "password", "database");
}
```
Then, type in the directory where get.php and uploader/ are (without a trailing slash):
```
define("rootdir", "/phpuploader");
```
Make sure you give your webserver account (usually www-data or nginx) write permission for the uploader directory, or you will not be able to upload files.

# Usage
Navigate to the uploader directory. Choose a file, and click "upload". After it uploads, it will show up in the list of uploaded files, and will have a get.php URL for you to copy and use to embed. You can also click the filename to view it in your browser.
