
# EXPLOR-5 => Exploring Physical Literacy Opportunities in Recreation
This survey tool was developed majorly for collecting responses from participants for the EXPLOR-5 survey. It has various functionalities such as addition of new survey sections, addition and deletion of new questions, viewing and analysis of survey responses, and generation of survey reports for further analysis.

# Local Development
**Getting Started**

1) Install and setup Laravel Framework for your system by clicking the link below:

https://laravel.com/docs/8.x/installation


2) Setup the Database for the project with the database name => explor_5

i) For the database, we're making use of mysql database. <br>
ii) To be able to do set this up easily, you should download and setup **SequelPro** for your system. SequelPro provides a Graphical User Interface(GUI) for your database and it also provides buit-in functionalities to add tables and perform various functionalities on each table.<br>
iii) You can download SequelPro through this link => https://www.sequelpro.com

OR
you can run the command below if you prefer to use the terminal/command line

`$ mysql -u root`

when logged in, run

`$ CREATE DATABASE explor_5;`

# Running on Local Server
Clone the project and change directory(cd) to the project folder

N/B: Composer must already be installed to run the commands below
You can install composer through => https://getcomposer.org/download/

Then open your terminal and run the commands below to get started
```
$ composer update
$ php artisan migrate
$ php artisan serve
```
Running the above commands will install all required dependencies, create all the required tables in your database and start the local server respectively.

### In order to view the project, you should open your browser and enter the url provided in your terminal as seen below
[Starting Laravel development server: http://127.0.0.1:8000]


