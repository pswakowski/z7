<?php
$username = $_SESSION['username'];

$dir = $_SERVER['DOCUMENT_ROOT'] . "cw7/users_files/" . $username;

function ListFolder($dir)
{
    $dir_handle = @opendir($dir) or die("Unable to open $dir");

    $dirname = end(explode("/", $dir));

    echo ("<li>$dirname\n");
    echo "<ul>\n";
    while (false !== ($file = readdir($dir_handle)))
    {
        if($file!="." && $file!="..")
        {
            if (is_dir($dir."/".$file))
            {
                ListFolder($dir."/".$file);
            }
            else
            {
                echo "<li><a href='$dir/$file' download>$file</a></li>";
            }
        }
    }
    echo "</ul>\n";
    echo "</li>\n";

    closedir($dir_handle);
}

ListFolder($dir);