<!DOCTYPE html>
<html>
    <head>
        <title>File Sharing Web Application</title>
         <style>
            div{
                font-size :22px;
            }
            </style>
    </head>
    <body>
        <div>
            <?php
             if(DB::connection() -> getpdo())
             {
                echo "Successfully connected to the database =>"
                        .DB::connection() -> getDatabaseName();
             }
            ?>
        </div>
    </body>
</html>
