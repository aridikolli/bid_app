1-> Installation

	Clone the repository:
	git clone "git@github.com:aridikolli/bid_app.git"

	Install composer dependencies:
	composer install

	Create a .env file:
	cp .env.example .env


	Generate an application key:
	php artisan key:generate


2-> Configuration

	Edit the .env file and set up the following configurations:
	DB_CONNECTION=mysql
	DB_HOST=localhost
	DB_PORT=3630
	DB_DATABASE=bids
	DB_USERNAME=admin
	DB_PASSWORD=adminspassword


3->Migrate the database tables:

	php artisan migrate:fresh
	

4->Load the seeders data:

	php artisan db:seed --class=UserSeeder
	

5-Run the development server
	php artisan serve
	

//SAMPLE DATA FOR LOGGING IN
username: test1
password: 12345678

username:test2
password: 12345678
