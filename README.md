Components-Config
=================

General use configuration classes

###Requirements
 * `Wells\Util`

##Basic Usage

Use dot-notation to set and get settings in nested arrays.

```php
$config = new Wells\Config\Object;
$config->set('use.template.views', true);
```

The above will be stored like:
```php
"use" => array(
    "template" => array(
        "views" => true
    ),
);
```
