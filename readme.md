tea web framework
====================
 This is tea web framework

 ## Add new controller
 create [your_page_name].php in root document
 go in the index method of [your_page_name].php and add this line:
 ```
 // get the html template
$template = get_class($this);
// send view
$this->controller->view($template);
 ```
