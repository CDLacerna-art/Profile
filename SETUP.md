# Setup (Laravel + Blade + Bootstrap 5)

1. Create a fresh Laravel project (needs PHP and Composer):

       composer create-project laravel/laravel profile-site
       cd profile-site

2. Copy everything from this folder into the project, and accept overwriting
   `routes/web.php`. (The folders match: app/, database/, public/, resources/, routes/.)

3. Run:

       php artisan migrate
       php artisan db:seed --class=ProfileSeeder
       php artisan storage:link
       php artisan serve

4. Open http://127.0.0.1:8000

5. Click "Edit profile" in the sidebar to change your motto, Bible verse, links,
   profile picture, and to upload your GCash QR code.

## File map (good for explaining during evaluation)
- routes/web.php ............................ 3 routes (show, edit, update)
- app/Http/Controllers/ProfileController.php  show, edit, update + validation + uploads
- app/Models/Profile.php .................... the model (one row)
- database/migrations/...create_profiles ... the table
- database/seeders/ProfileSeeder.php ........ starting data
- resources/views/layouts/app.blade.php ..... Bootstrap CDN + page shell
- resources/views/profile/show.blade.php .... 2-column layout
- resources/views/profile/edit.blade.php .... edit form
- resources/views/partials/ ................. sidebar, motto, verse, donate (+ modal)
- public/css/profile.css .................... small custom styling
