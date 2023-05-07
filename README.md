# PET PATROL - Pet Trainer Matcher 🐕🐕

## Overview

PET PATROL is a web application that automatically matches pet trainers with pet owners based on the specific criteria created by the pet owner. This project aims to make the pet owner-trainer booking process easier and more efficient.

## Technologies

* Laravel
* Alpine.js
* TailwindCSS
* MYSQL

## Installation and Usage

To run Pet PATROL on your local machine, follow these steps:

1. Make sure Node.js, composer and XAMPP(version 8.2.4 / PHP 8.2.4 and up) is installed on your device.
2. Create a table in phpMyAdmin and name it 'petpatrolv2'.
3. Delete the vendor folder in the public folder.
4. Run `composer update` or `composer install`.
5. Run `php artisan migrate` to auto populate the columns in the table you created.
6. Run `npm run dev`. 
7. Run `php artisan serve` in a separate terminal and copy the link it provided and paste to your browser.
8. Run `php artisan queue:work` in a separate terminal to make sending email work without affecting user experience.

## Known Issues

* There are no trainer recommendations in the Trainer Marketplace, unlike a standard e-commerce site. 
* You need to configure your own MAIL SMTP credentials in the .env file for the email verification to work.
* You need to create an admin account through database(phpmyadmin), just make sure that the role is set to "3".
* This project is intended for educational purposes only.

## Contributing

If you'd like to contribute to PET PATROL, please feel free to reach out to me via email doctorajillbert@gmail.com.

## Demo

Feel free to explore the repo. Teehee <img src="https://image.pngaaa.com/931/253931-middle.png" style="width:60px; height:60px; margin-left: 10px;">

## License

PET PATROL is an open-source project and does not have any licensing or copyright information.
