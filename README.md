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

## Form build

### Open form
```php
<?php
echo Form::open('/action.php', ['method' => 'POST', 'attribute-name' => 'value']);
```
Will output
```html
<form action="/action.php" method="POST" attribute-name="value">
```

### Open ajax form
```php
<?php
echo Form::openAjax('action', ['method' => 'POST', 'attribute-name' => 'value']);
```
Will output
```html
<form action="//localhost:9090/wp-admin/admin-ajax.php?action=action" method="POST" attribute-name="value">
```

### Close form
```php
<?php
echo Form::close();
```
Will output
```html
</form>
```

### Label
```php
<?php
echo Form::label('name', 'Name', ['attribute-name' => 'value']);
```
Will output
```html
<label for="name" attribute-name="value" class="form-label">Name</label>
```

### Text
```php
<?php
echo Form::text('name',  ['attribute-name' => 'value']);
```
Will output
```html
<input name="name" attribute-name="value" class="form-control" type="text" id="name">
```

### Email
```php
<?php
echo Form::email('email',  ['attribute-name' => 'value']);
```
Will output
```html
<input name="email" attribute-name="value" type="email" class="form-control" id="email">
```

### Number
```php
<?php
echo Form::number('number', ['attribute-name' => 'value']);
```
Will output
```html
<input name="number" attribute-name="value" type="number" class="form-control" id="number">
```

### Date
```php
<?php
echo Form::date('date', ['attribute-name' => 'value']);
```
Will output
```html
<input name="date" attribute-name="value" type="date" class="form-control" id="date">
```

### File
```php
<?php
echo Form::file('file', ['attribute-name' => 'value']);
```
Will output
```html
<input name="file" type="file" class="form-control" id="file">
```

### Color
```php
<?php
echo Form::color('color', ['attribute-name' => 'value']);
```
Will output
```html
<input name="color" id="name" type="color" class="form-control form-control-color">
```

### Select
```php
<?php
$cities = [
  [ 'value' => '', 'text' => 'Choose your city', 'attributes' => ['selected', 'hidden', 'disabled']],
  [ 'value' => 'dnipro', 'text' => 'Dnipro'],
  [ 'value' => 'kiev', 'text' => 'Kiev'],
  [ 'value' => 'lviv', 'text' => 'Lviv'],
];
echo Form::select('city', $cities, ['data-city' => 'my']);
```
Will output
```html
<select name="city" data-city="my" class="form-select" id="city">
    <option value="" selected="" hidden="" disabled="">Choose your city</option>
    <option value="dnipro">Dnipro</option>
    <option value="kiev">Kiev</option>
    <option value="lviv">Lviv</option>
</select>
```

### Checkbox
```php
<?php
echo Form::checkbox('checkbox', 'Choose me', 'value', 'check', ['checked' => 'checked'], ['class' => 'mt-4'], ['class' => 'super-label']);
```
Will output
```html
<div class="form-check mt-4">
    <input type="checkbox" id="check" name="checkbox" value="value" checked="checked" class="form-check-input">
    <label for="check" class="form-check-label super-label">
        Choose me
    </label>
</div>
```

### Radio
```php
<?php
echo Form::radio('type', 'Type 1', 'type-1', 'radio-1');
echo Form::radio('type', 'Type 2', 'type-2', 'radio-2');
```
Will output
```html
<div class="form-check">
    <input type="radio" id="radio-1" name="type" value="type-1" class="form-check-input">
    <label for="radio-1" class="form-check-label">
        Type 1
    </label>
</div>
<div class="form-check">
    <input type="radio" id="radio-2" name="type" value="type-2" class="form-check-input">
    <label for="radio-2" class="form-check-label">
        Type 2
    </label>
</div>
```

### Textarea
```php
<?php
echo Form::textarea('textarea', 'Some text', ['rows' => 10]);
```
Will output
```html
<textarea name="textarea" rows="10" id="textarea" class="form-control">Some text</textarea>
```
