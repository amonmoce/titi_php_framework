<!DOCTYPE>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="templates/css/results_table.css">
    </head>
    <body>
        <?php
            switch($this->template){
                
                default:
                    include_once 'index.html.php';
                    break;
                    
            }
        ?>
    </body>
    <script type="text/javascript" src="templates/js/jquery-latest.js"></script>
    <script type="text/javascript" src="templates/js/jquery.tablesorter.min.js"></script>
    <script type="text/javascript" src="templates/js/results_table.js"></script>
</html>