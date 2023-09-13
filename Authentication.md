# Authentication

## Guards
### Auth Guard
Identification of the "user"

Currently logged-in user:
```php
$user ->auth()->user();
```
### Auth Guard Driver
This says HOW to authenticate the user.
- Session driver
    - Session ID encrypted
    - Cookies to store the data
    - Cookie named: laravel_session

Contract for the auth guard - Illuminate\Contracts\Auth\Guard
Session driver - Illuminate\Auth\SessionGuard

```php
$id = $this->sessoin->get($this->getName());
```

### JWT
- package tymon/jwt-auth
- class Tymon\JWTAuth\JWTGuard
- implements authenticating a user via JWT token in an HTTP request

```php
if ($this->user !== null) {
    return $this->user;
}
if ($this->jwt->setRequest($this->request)->getToken() &&
    ($payload = $this->jwt->check(true)) &&
    $this->validateSubject()) 
{
        return $this->user = $this->provider->retrievedById($payload['sub']);
}   
```

## User Provider & Driver Configuration

```php
    'guards' => [
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'user' => [
            'driver' => 'jwt',
            'provider' => 'users',
            'hash' => false,
        ],
    ],
```

JTW will then receive the following configuration:
```text
[
   'driver' => 'jwt',
   'provider' => 'users',
   'hash' => false,
]
```
Thi is then passed to the $config in these implemnetaiotns:

```php
protected function extendAuthGuard(){
    $this->app['auth']->extend('jwt, function($app, $name, array $config){
        $guard = new JWTGuard(
            $app['tymon.jwt'],
            $app['auth']->createUserProvider($config['provider']),
            $app['request']   
        );
        
        $app->refresh('request', $guard, 'setRequest');
        
        return $guard;
    }
}
```

## Different User Types from Different Tables

Protect the Admin Routes:
```php
Route::group(['middleware'=>'auth:admin'], function() {
 //... do stuff
})
```
Protect the User Routes:
```php
Route::group(['middleware'=>'auth:user'], function() {
 //... do stuff
})
```

In the controller we use the Auth Guard to get the user details:
```php
$user = auth()->user();
```

Explicitly refer to one or the other "guard":
```php
$user = auth('admin')->user();
$user = auth('user')->user();
```
