# PIM API PHP

A simple PHP package to connect to the API of Crazy Factory's PIM Backend.

## Requirements

1) PHP 5.3+, accessible via command line.
2) Your PHP project should be set up to use composer.

## Installation

1) Update your `composer.json` to include a reference to our github repository.

```
"repositories": [
   {
     "type": "vcs",
     "url": "https://github.com/crazyfactory/pim-api-composer"
   }
 ]
 ```

2) Add the `crazyfactory/pim-api-composer` package to your project by typing `php composer.phar require crazyfactory/pim-api-composer`. If you prefer a development version append the `--dev` option.

## Usage

Using the API is very simple and should pose no problems. For all available API Endpoints take a look at the */pim/controllers* folder or read through the **documentation**.

Basic sample:

Create a new user

```php
// Initialize composer's autoloader
require_once('vendor/autoload.php');

// Provide your unique access token to the PIM API.
\PIM\Configuration::setAccessToken("adcahdiuhaidhasid");

// Reference a Controller and a Model
use \PIM\Controllers\Users;
use \PIM\Models\User;

// Create a user instance
$user = new User();

// Change values (via property or index as you please)
$user->name = 'Alice';
$user['email'} = 'alice@wonderland.fu';

try {
    // Add the new user to PIM
    $user = Users::create($user);
} catch (\PIM\Exceptions\PIMResponseException $e) {
    // The Server encountered an error processing your request.
    handleThings();
    exit;
} catch (\PIM\Exceptions\PIMValidationException $e) {
    // The object you are trying to send did not pass validation.
    handleThings();
} catch (\PIM\Exceptions\PIMSDKException $e) {
    // Something else happened. :/
    handleThings();
}
```

### License

Not yet decided. Use at your own risk.
