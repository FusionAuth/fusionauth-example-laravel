# Laravel with FusionAuth Example

This app is an example Laravel application. It delegates user management, registration and login to FusionAuth. It uses a middleware to ensure that only signed in users can access certain pages.

Read more about how to set this up and run it [HERE](https://fusionauth.io/blog/2020/06/03/user-registration-and-sign-in-with-laravel).

## Setting up this rep

1. Run `composer install` or `composer update` (depending on what the commandline says)
1. Rename `example.env` to `.env`
1. Update `.env` file and add three keys and their appropriate value: 
    - FUSIONAUTH_APP_ID=<your_app_id>
    - FUSIONAUTH_API_KEY=<your_api_key>
    - FUSIONAUTH_BASE_URL=<where_fusionauth_is_running, usually port `9011`>
1. If you run into trouble
   - If you see these screens you can try the following fixes
   ![500-error](https://user-images.githubusercontent.com/16090626/113050431-103a2280-9162-11eb-894c-a6702c271145.png)
   ![php-gen-key](https://user-images.githubusercontent.com/16090626/113050435-10d2b900-9162-11eb-9403-4700b4190151.png)
   - `php artisan key:generate`
     - This regenerate a unique app id within artisan/php.
     - Alternatively, you can click the `generate app key` button and have this done for you
   - `sudo chmod -R 777 vendor`
     - This will make your vendor file executable
  
## Git Log
This application follows the headings on the [tutorial](https://fusionauth.io/blog/2020/06/03/user-registration-and-sign-in-with-laravel).  Each commit is a section of code walked through.  One can checkout each commit and see the code in realtime if you get stuck following along (or use Github to view the `diff`).

  
  | SHA | Heading in Tutorial |
  | --- | --- | 
  | 6378981 | Logging out
  | c385639 | Showing the current user’s profile
  | f9cfff1 | Logging a user in
  | 8260d3d | Registering a new user
  | b87d132 | Installing and configuring the FusionAuth PHP package
  | 5734d71 | Setting up a new Laravel Application

## Requirements
1. This example application was tested using:
   - Php 7.2
