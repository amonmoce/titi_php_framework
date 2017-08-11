tealit web framework
====================
 This is tealit web framework

 ## Add new page
 create [your_page_name].php in root document
 go in the index method of [your_page_name].php and add this line:
 ```
 // get the html template
$template = get_class($this);
// send view
$this->controller->view($template);
 ```