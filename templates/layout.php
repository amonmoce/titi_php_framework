<!DOCTYPE>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php
            switch($this->template){
                case 'index':
                    include_once 'index_view.php';
                    break;
            }
        ?>
    </body>
</html>