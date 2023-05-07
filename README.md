# PET PATROL - Pet Trainer Matcher

## Overview

PET PATROL is a web application that automatically matches pet trainers with pet owners based on the specific criteria created by the pet owner. This project aims to make the pet owner-trainer booking process easier and more efficient.

## Technologies

<div style="display: flex; align-items: center;">
  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" alt="Laravel Logo" style="width: 200px; height: 200px; margin-right: 20px;">
  <img src="https://seeklogo.com/images/T/tailwind-css-logo-5AD4175897-seeklogo.com.png" alt="TailwindCSS Logo" style="width: 200px; height: 200px; margin-right: 20px;">
  <img src="https://www.mysql.com/common/logos/logo-mysql-170x115.png" alt="MySQL Logo" style="width: 200px; height: 200px;">
  Alpine.js
</div>

## Installation and Usage

To run Pet PATROL on your local machine, follow these steps:

1. Make sure Node.js and composer is installed on your device.
2. Create a table in phpMyAdmin and name it 'petpatrolv2'.
3. Delete the vendor folder in the public folder.
4. Run `composer update` or `composer install`.
5. Run `php artisan migrate` to auto populate the columns in the table you created.
6. Run `npm run dev`. 
7. Run `php artisan serve` in a separate terminal.

## Known Issues

There are no trainer recommendations in the Trainer Marketplace, unlike a standard e-commerce site. This project is intended for educational purposes only.

## Contributing

If you'd like to contribute to PET PATROL, please feel free to reach out to me via email doctorajillbert@gmail.com.

## Demo

You can explore the PET PATROL project on my GitHub repo.

## License

PET PATROL is an open-source project and does not have any licensing or copyright information.
