# Devopress

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

**Build email templates:**

```sh
make emails
```

## App Class

```php
// Get values from devopress.config.json
App::config('path.to.the.value');

// Get escaped option value
App::option('option_name');

// Get raw option value
App::optionRaw('option_name');

// Get escaped meta value
App::meta('id', 'field_name');

// Get raw meta value
App::metaRaw('id', 'field_name');

// Get full path to the file
App::file('path/to/the/file');

// Get full path to the image from assets/img/folder
App::image('path/to/the/image');
```

## Emails

### Local testing

**Prepare steps**

- Install local SMTP mail server [MailSlurper](https://mailslurper.com/)
- Install WordPress plugin [Easy WP SMTP
  ](https://wordpress.org/plugins/easy-wp-smtp/)

**Go to Easy WP SMTP Settings and setup next configurations**

- From Email Address: Any fake email address
- From Name: Any fake name
- SMTP Host: `127.0.0.1`
- SMTP Port: `2500`
- SMTP Authentication: `No`
- Enable Debug Log: `true`

**Run MailSlurper**

Now you are able to receive emails 😃

### Templates
Template framework [MJML](https://mjml.io/)
All source templates store in `inc/emails/src/template` folder. After editing, rebuild templates by `make emails`
command.

### Validation
For validation uses [Valitron](https://github.com/vlucas/valitron)
