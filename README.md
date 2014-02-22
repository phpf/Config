Components-Config
=================

{PHP} General use configuration classes

**Requires:**
 * `Wells\Util`

###Usage

First, set up the config with the dependency injection container:

```php
$di->setSingleton('config', function (){
  return new Wells\Config\Object;
});
```

Then use like so:

```php
$config = $di->singleton('config');

$config->set('dot.notation.rocks', true);
```

The above will be stored in a nested array:

```php
"dot" => array(
  "notation" => array(
    "rocks" => true
  ),
);
```
