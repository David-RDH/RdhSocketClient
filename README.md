# RdhSocketClient

RdhSocketClient is a socket client for RdhSocket.

## Installation

Use [composer](https://getcomposer.org/download/) to install RdhSocket.

```bash
composer require rdh-archipoint/rdh-socket-client
```

## Usage

```php
use RdhArchipoint\RdhSocketClient;

$r_client = new RdhSocketClient([
   'app_id' => 'APP_ID',
   'app_key' => 'APP_KEY',
   'token' => 'APP_TOKEN'
]);

# EMITS EVENT
$r_client->emit('CHANNEL_NAME','EVENT_NAME','DATA');

```

Replace `APP_ID`, `APP_KEY`, `APP_TOKEN` with your current `RdhSocket` application configuration.

## License

[MIT](https://choosealicense.com/licenses/mit/)