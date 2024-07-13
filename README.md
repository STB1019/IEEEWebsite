# IEEE Website (Project for the "Web Programming and Digital Services" course)

This website is primarily built using two frameworks: Bootstrap (CSS) for the front-end and Laravel (PHP) for the back-end.

## Installation

1. Download the .zip file
2. Extract the files
3. Run Composer install: `composer install` (if needed)
4. Run Composer update: `composer update`
5. Edit the .env file and set your database credentials
6. Run `php artisan storage:link` (Needed for pictures)
7. Start database (MAMP or equivalent)
8. Run start.bat (or `php artisan serve`)

## File Organization

The files are organized following the MVC (Model-View-Controller) structure predefined by Laravel for easy understanding and modification. The views are created using Blade and are located in the `resources/views` folder. The views are based on the master.blade.php file contained in the `resources/views/layouts` folder. The other two layouts, master_h and master_hf, derive from the first one, with master_h containing the head and master_hf containing the footer and head. All the pages utilize standard components that I created, which are located in the `resources/views/components` folder.
