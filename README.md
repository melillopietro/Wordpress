# WordpressEnumeration

In default WordPress installation there are several methods to enumerate authors username. These WordPress users can then be used in brute-force attacks against WordPress login page 
to guess passwords.

## WordPress Enumeration via JSON API
WordPress includes a REST API that can be used to list the information about the registered users on a WordPress installation. The REST API exposed user data for all users who had authored a post of a public post type. WordPress 4.7.1 limits this to only post types which have specified that they should be shown within the REST API.

In this attack, Attacker access the WordPress domain by adding /wp-json/wp/v2/users to the end of the URL, as shown below.

Example: https://www.contoso.com/wp-json/wp/v2/users


## Wordpress Change Admin Password

Using the chg_wp_pwd.php File:

- copy the file to the root of your WordPress via FTP and rename the file to .php
- retrieve the URL of the file in the format: http://urldelwordpress/chg_wp_pwd.php
- enter the username of the user whose password you want to reset;
- enter a new password;
