# Devocraft WordPress Theme

**Setup:**
```sh
make install
```

**Start development:**
```sh
make dev
```

**Make POT file:**
```sh
make pot
```

**Make favicons:**
```sh
make favicon
```
## Helpers
### App
```php
App::option('option_name');
App::meta('id', 'field_name');
```

### Asset
```php
Asset::get('path/to/file'); # /path/to/file
Asset::image('path/to/image'); # /assets/img/path/to/file
```
