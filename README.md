# wp_cardfile

This plugin is built to handle user registration in wp and at the same time registers information about the user and child.

wp_carfile is creating a new table called wp_cardfile_users. It relates to the users table on the wp_user_id field

## Fields

| Collumn name | Tyoe | Description |
| ------------ | -----| --------------------- |
| id  | int | primary id |
| blog_id | int | for multisite purposes |
| wp_user_id | int | referencing user id |
| parent_id | int | referencing id |
| first_name | string | |
| last_name | string | |
| born | string | |
| phone_number | string | |
| address_line_1 | string | |
| address_line_2 | string | |
| postal_code | string | |
| city | string | |
| email | string | |
| unit | string | entity or organisation |
| branch | string | branch of entity |
| time | datetime | |

## Shortcode
Currently there is only one short code registered,

To display the registration form : 
```php
do_shortcode(‘[cardfile view=“registration”]’);
```

To display the update form :
```php
do_shortcode(‘[cardfile view=“update”]’);
```