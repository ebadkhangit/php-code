1) Explain what is CodeIgniter?

Codeigniter is an open source framework for web application. 
It is used to develop websites on PHP. 
It is loosely based on MVC pattern, and it is easy to use compare to other PHP framework.

2) Explain what are hooks in CodeIgniter?

Codeigniter’s hooks feature provides a way to change the inner working of the framework without hacking the core files. 
In other word, hooks allow you to execute a script with a particular path within the Codeigniter. 
 Usually, it is defined in application/config/hooks.php file.
 
 7) List out different types of hook point in Codeigniter?

Different types of hook point in Codeigniter includes

post_controller_constructor
pre_controller
post_sytem
pre_system
cache_override
display_override
post_controller

11) Mention what is the default URL pattern used in Codeigniter framework?
http://servername/controllerName/controllerFunction/parameter1/parameter2.

12) Explain how you can extend the class in Codeigniter?

To extend the native input class in CodeIgniter, you have to build a file named application/core/MY_Input.php and declare your class with

Class MY_Input extends CI_Input {

}

13) Explain how you can prevent CodeIgniter from CSRF?

There are several ways to protect CodeIgniter from CSRF, one way of doing is to use a hidden field in each form on the website.  This hidden field is referred as CSRF token; it is nothing but a random value that alters with each HTTP request sent. As soon as it is inserted in the website forms, it gets saved in the user’s session as well.  So, when the form is submitted by the users, the website checks whether it is the same as the one saved in the session. If it is same then, the request is legitimate.

14) Explain how you can enable CSRF (Cross Site Request Forgery) in CodeIgniter?

You can activate CSRF (Cross Site Request Forgery) protection in CodeIgniter by operating your application/config/config.php file and setting it to

$config [ ‘csrf_protection’] = TRUE;

If you avail the form helper, the form_open() function will insert a hidden csrf field in your forms automatically

Sessions in CodeIgniter
In CodeIgniter Session class allows you maintain a user’s “state” and track their activity while they are browsing your website.
In order to use session, you need to load Session class in your controller.

$this->load->library(‘session’); method is used to sessions in CodeIgniter

$this->load->library('session');
Once loaded, the Sessions library object will be available using:

$this->session
Reading session data in CodeIgniter
Use $this->session->userdata(); method of session class to read session data in CodeIgniter.

Usage

$this->session->userdata('your_key');
---------------------------------------------------------------------------------------------------------------------

1.what is the Codeigniter?
Codeigniter is open source, webapplication a PHP framework. Codeigniter is loosely based on MVC pattern simple framework in php.

2.When and who developed codeigniter?
The first public version of CodeIgniter was released on February 28, 2006.

4. Explain Application Flow Chart in codeigniter.
Application flow chart from Codeigniter documentaion

The index.php serves as the front controller, initializing the base resources needed to run CodeIgniter.
2. The Router examines the HTTP request to determine what should be done with it.
If a cache file exists, it is sent directly to the browser, bypassing the normal system execution.
Security. Before the application controller is loaded, the HTTP request and any user submitted data is filtered for security.
The Controller loads the model, core libraries, helpers, and any other resources needed to process the specific request.
The finalized View is rendered then sent to the web browser to be seen. If caching is enabled, the view is cached first so that on subsequent requests it can be served.

6. what are the features of codeigniter?
1. codeigniter is open source, webapplication framework.
2.codeigniter is light weight framework.
3.codeigniter faster than any other farmework.
4.codeigniter search engine friendly urls generator.
5.codeigniter is easy exensible.

8. Explain MVC in Codeigniter.
Model–View–Controller (MVC) is an architecture that separates the representation of information from the user’s interaction with it.

Controller:- The Controller serves as an intermediary between the Model, the View. controller mediates input, converting it to commands for the model or view.

Model:-The Model represents your data structures. Typically your model classes will contain functions that help you retrieve, insert, and update information in your database.The model consists of application data and business rules.

View:-The View is the information that is being presented to a user. A View will normally be a web page.A view can be any output representation of data.

For more detail understanding MVC please read this article What is MVC(Model-View-Controller) Architecture.

9. Explain codeigniter file structure.
Application
-cache
-config
-controllers
-core
-errors
-helpers
-hooks
-languages
-logs
-models-
-thirdparty
-view
system
-core
-database
-fonts
-helpers
-language
-libraries

10. Explain what is meant by inhibitor in Codeigniter?
For CodeIgniter, inhibitor is an error handler class that use native PHP functions like set_exception_handler, set_error_handler, register_shutdown_function to handle parse errors, exceptions, and fatal errors.

11. What are the hooks in codeigniter?
In CodeIgniter, hooks are events which can be called before and after the execution of a program. It allows executing a script with specific path in the CodeIgniter execution process without modifying the core files. For example, it can be used where you need to check whether a user is logged in or not before the execution of controller. Using hook will save your time in writing code multiple times.

There are two hook files in CodeIgniter. One is application/config/hooks.php folder and other is application /hooks folder.

In other language, if you want to run a code every time after controller constructor is loaded, you can specify that script path in hooks.

he hooks feature can be globally enabled/disabled by setting the following item in the application/config/config.php file:

$config[‘enable_hooks’] = TRUE;


12.Explain what is meant by routing in Codeigniter?
In CodeIgniter, the way PHP files served is in different rather than accessing it directly from the browser. This process is the called the routing. Routing in CodeIgniter gives you freedom to customize the default URL pattern to use our own URL pattern according to the requirement. So, whenever there is a request made and matches our URL pattern it will be automatically direct to the specified controller and the function.

13. How you will be add or load an model in the codeigniter?
Models will be the typically loaded and called from within your controller functions. To load a model you will have to use the following function:

$this->load->model(‘Model_name’);

14.Why is there a need to configure the URL routes?

Changing the URL routes has some benefits like

From the SEO point of the view, to make URL SEO friendly and get more user visits
Hide some URL element such as the function name, controller name, etc. from the users for the security reasons
Provide different functionality to the particular parts of a system

18. Explain how you can link images/CSS/JavaScript from a view in the codeigniter?
In HTML, there is no Codeigniter way, as such it is a PHP server side framework. Just use an absolute path to your resources to link the images or CSS or JavaScript from a view in CodeIgniter

/css/styles.css

/js/query.php

/img/news/566.gpg