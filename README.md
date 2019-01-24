# WordPress Demo Plugin

Intended as a boilerplate/demo for building WordPress plugins. Uses PHP7 & OOP with autoloading classes.

We use this do develop custom WordPress plugins over at [MNKY lab](https://www.mnkylab.com).

## Installation

1. `cd` into the /wp-content/plugins directory & clone this repo
2. Remove .git directory and do new `git init`
3. Change folder name from `wordpress-demoplugin` to desired name && `cd` into folder
4. Change `wordpress-demoplugin.php` to desired name.php
5. Open formerly wordpress-demoplugin.php and change Plugin headers, save & close file
6. `$ find . -type f -exec sed -i 's/ACME_DEMO/XX_YY/g' {} \;`
7. `$ find . -type f -exec sed -i 's/ACME\\Demo/XX\\Yy/g' {} \;`
8. Configure the _composer.json_ file
9. `$ composer dump-autoload`
