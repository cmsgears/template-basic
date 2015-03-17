Project 	- CMSGears (http://www.cmsgears.org)
Template  	- Basic
License 	- GPLv3 (http://www.gnu.org/licenses/gpl-3.0.html)
Description - The basic template use core and dynamic form modules from CMSGears. It ships with the default basic theme for website and admin theme for admin.

=========================================
Template Features
=========================================
1. The template uses the admin theme provided by CMSGears team. The admin theme provides options to manage site users, newsletter subscribers, roles and permissions. It provide options to download and install themes, modules and widgets.
2. The template also use the basic theme provided by CMSGears team. This theme provide login and registration using both Ajax and regular form submission. It also provide features to manage user profile and few more forms related account setup and password.
3. The basic theme uses the dynamic forms module to accept contact and feedback forms from site users.

=========================================
Template Installation
=========================================

The basic template can be installed via composer using the below mentioned command. To install composer, please refer to their official site https://getcomposer.org/.

php composer.phar create-project --prefer-dist --stability=dev cmsgears/template-basic basic

or

composer create-project --prefer-dist --stability=dev cmsgears/template-basic basic

=========================================
Template Configuration - New
=========================================

1. Run the php script init.php to initialize the application for the predefined environments. We can set the required environment before running the script.
2. Create a new database and update the db configuration in common/config/main-local.php accordingly.
3. Apply migrations with console command yii migrate. This will create all the required tables.
4. Update htaccess for both admin and web applications.
5. Set document roots of your Web server. An example for locahost is as mentioned below:

Frontend - http://localhost/basic/ for path <www path>/basic/frontend/web/
Admin    - http://localhost/basic/admin for path <www path>/basic/admin/web/

=========================================
Template Configuration - Upgrade
=========================================

TODO: Steps to upgrade from previous release.

=========================================
Default Pages
=========================================
1. Landing
2. Login
3. Register
4. Forgot Password
5. Reset Password
6. User Home
7. User Profile
8. User Settings

Notes: The detailed description about the basic template can be found at http://www.cmsgears.org/templates/basic