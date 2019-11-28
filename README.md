# payjp-decorator
This library decorated for payjp/payjp-php.

## Requirements
PHP7.2+

## Install

```
composer req polidog/payjp-decorator
```

## Using

```
<?php
require '__DIR__.'/vendor/autoloard.php'
use Polidog\PayjpProxy; 

$payJp = (new Factory())('your api key');
$result = $payJp->customer->retrieve('hogehoge');
var_dump($result);
```
