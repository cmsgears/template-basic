<p align="center">
    <a href="https://github.com/cmsgears" target="_blank">
        <img src="https://avatars2.githubusercontent.com/u/11252790" height="100px">
    </a>
    <h1 align="center">CMSGears Basic Template</h1>
    <br>
</p>

[![Yii](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)

CMSGears Basic Template is a skeleton [CMSGears](https://github.com/cmsgears) application best for developing CMSGears based web applications utilizing the core modules including Core, Forms, Newsletter, Notify, and SNS Connect.

The template includes four tiers: REST, frontend, backend, and console, each of which is a separate Yii application.

The template is designed to work in a team development environment. It supports deploying the application in different environments.

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in REST, backend and frontend
    services/            contains shared services used in REST, backend and frontend
    tests/               contains tests for common classes
console
    components/          contains console components
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
    services/            contains console services
backend
    assets/              contains application asset classes
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    services/            contains backend-specific services
    tests/               contains tests for backend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application asset classes
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    services/            contains frontend-specific services
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
rest
    config/              contains REST configurations
    controllers/         contains REST controller classes
    models/              contains rest-specific model classes
    runtime/             contains files generated during runtime
    services/            contains rest-specific services
    tests/               contains tests for REST application
    web/                 contains the entry script
modules/    	         contains the project modules
templates/    	         contains the project templates
themes/                  contains the template themes
uploads/    	         contains the uploaded files
widgets/    	         contains the template widgets
environments/            contains environment-based overrides
vendor/                  contains dependent 3rd-party packages
```

Modules, Plugins, and Widgets
-------------------
1. It's pre-installed with the Core, Forms, Newsletter, Notify, SNS Connect, and SMS modules.
2. It's pre-installed with the Assets, Breeze Templates, File Manager, Social Meta, and Icon Picker plugins.
3. The widgets that ships by-default with the basic template includes CLEditor, TinyMCE, Comment, Block, Nav, Login, Gallery, Newsletter, Form, AJAX Form, Tag, Category, Social, Pop-up, and Grid.
4. It's also pre-installed with the FoxSlider Plugin for CMSGears.
5. Apart from the modules, plugins, and widgets specified in points 1 to 3, the template is also configured for several 3-rd party assets including conditionizr, moment, chart.js, etc.

Themes
-------------------
1. The Admin Theme provide layouts to manage and configure the modules and plugins.
2. The template is pre-configured to use the Basic Theme for front end.
3. The basic theme can be considered as the starting point of your application. It's meant to be further updated based on the project needs considering it as the base.

Template Details
-------------------
The Basic Template is a group of directories and configuration files used to manage the backend, frontend, console, and REST applications.

It also provide the migration scripts with test data.

Template Demo
-------------------
1. Frontend - https://demo.cmsgears.com/templates/basic (demouser@cmsgears.com, test#123)
2. Admin - https://demo.cmsgears.com/templates/basic/admin (demomaster@cmsgears.com, test#123)

Real time emails are disabled on demo sites and the database reset is done every hour.

Template Installation
-------------------

The Basic Template can be installed via composer using the below mentioned command. To install composer, please refer to the official site https://getcomposer.org.

We can install release and pre-release i.e. alpha, beta versions using composer as mentioned below.

```
// Release Versions

php composer.phar create-project --prefer-dist --stability=stable cmsgears/template-basic basicdemo

or

composer create-project --prefer-dist --stability=stable cmsgears/template-basic basicdemo
```

We can also use below mentioned commands to access the pre release code.

```
// Pre-release Versions

php composer.phar create-project --prefer-dist --stability=<alpha or beta or RC> cmsgears/template-basic basicdemo

or

composer create-project --prefer-dist --stability=<alpha or beta or RC> cmsgears/template-basic basicdemo
```

In case the web server is Apache, either of the above mentioned commands can be run directly at Apache web root directory. More details can be found at http://www.cmsgears.org.

We can also directly install the template having latest code by cloning Basic Template using the selected branch.

One Click Setup
-------------------
We are working on making a one click setup which can avoid most of the steps as listed below to configure the template.

Template Configuration
-------------------

1. Create the database, database user and update the environments configuration - environments/dev/common/config/main-env.php, environments/alpha/common/config/main-env.php, environments/prod/common/config/main-env.php. The default database and database user are basicdemo.
2. To trigger real-time mails in dev or alpha environments, remove the config param 'useFileTransport' from - environments/dev/common/config/main-env.php, environments/alpha/common/config/main-env.php.
3. After configuring the database, run the php script init.php to initialize the application for the predefined environments. The script will ask to choose environment among prod, alpha or dev. It will copy the appropriate environment files to the relevant directories.
4. Install the DB using the migrate-up commands available in the console/migrations directory. The command must be run from the root directory of the project. Also make sure that the migration command files have executable permissions.
5. The migration scripts available at console/migrations/data directory ships with the test data required for demonstration purpose. It can be tweaked or updated based on the requirements. Make sure to execute the migrate-down command before making changes. Once done, again execute the migrate-up command to bring up the changes.
6. Update htaccess located at the root directory based on your web server needs. More details about live application settings can be found at http://www.cmsgears.org.
7. Download the Admin and Basic Themes and copy the themes content at <template root>/themes/admin and <template root>/themes/basic directories respectively.
8. Now we can run the template using our preferred browser. Example links are as mentioned below.
9. Login to admin and update file upload url in case project name or upload directory is different.
10. By default all the files uploaded by users will be stored in uploads directory. The uploads directory can be changes based on project needs.
11. Update the migration scripts if required and run the commands migrate-down and migrate-up to refresh the database. Make sure that it's done only on dev and alpha environments. Do not ever run migrate-down on live environment, else it will erase all the live data.

The default application URLs will be as shown below. Replace the basicdemo with the project name, in case it's changed.

```
Frontend - http://localhost/basicdemo/frontend/web
Admin - http://localhost/basicdemo/frontend/web
```

Template - Updates
-------------------

The template dependencies can be updated using the composer.json file located at the root of template.

Template Pages
-------------------
The template ships with pre-configured pages as listed below.

1. Landing - Site index page.
2. Login - Login page allows users to login.
3. Register - Register page allows users to sign up.
4. Confirm Account - Users can confirm account by following the link sent to their email while submitting Register form.
5. Forgot Password - It can be used to generate password reset link.
6. Forgot Password OTP - It can be used to generate OTP to reset the password. It will work if SMS manager is available.
7. Reset Password - Users can reset password by following the link sent to their email while submitting Forgot Password form.
8. Reset Password OTP - It can be used to reset the password by providing a valid OTP. It will work if SMS manager is available.
9. Activate Account - User accounts added by site admin can be activated using this page.
10. Privacy - The page to show Privacy Policy.
11. Terms - The page to show Terms and Conditions.
12. FAQs - The page to show the FAQs.

Notes: The pages Forgot Password OTP and Reset Password OTP will work only if the SMS manager is available with SMS balance.

Template Forms
-------------------
The template also provide forms using dynamic forms and comment system.

1. Contact Form (Dynamic Form)
2. Feedback Form (Custom Comment)
3. Testimonial Form (Custom Comment)

Private Pages
----------------------------
The basic template provides a blank dashboard, user profile, user settings, and calendar.

1. Dashboard - Page displayed on login.
2. Profile - Basic - The Basic Page allows user to update the basic details including email, username, name, gender, and date of birth.
3. Profile - Account - The Account Page allows user to update the password.
4. Profile - Address - The Address Page allows user to manage multiple address.
5. Settings - Settings page allows users to configure settings including privacy, notifications, and reminders.
6. Notifications - Shows user notifications.
7. Reminders - Shows user reminders.
8. Activities - Shows user activities.
9. Events - Shows calendar events associated with the user using list view.
10. Events Calendar - Shows calendar events associated with the user using calendar view.
11. Events Cards - Shows calendar events associated with the user using card view.
12. Event - Create - The Create Event Page allows user to add a Calendar Event.
13. Event - Update - The Create Event Page allows user to update a Calendar Event.
