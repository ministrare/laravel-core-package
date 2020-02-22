# Laravel Core Package
This laravel core package holds my personal tools for laravel 5.8. \
It contains the following: 
 - [Form](#form)
    - [Method](#method)
    - [Input](#inputs)
    - [Input types](#Input-Types)
        - [Checkbox](#Checkbox)
        - [E-mail](#E-mail)
        - [Password](#Password)
        - [Radio buttons](#Radio buttons)
        - [Select](#Select)
        - [String](#String)
        - [Textarea](#Textarea)
    - [Chaining function](#chaining-functions)
        - [Render](#render)
    - [End](#end)
 - [Utilities](#utilities)
    - [createSlug](#createSlug)
    - [keyExists](#keyExists)

## Form
The Form class is supported by a Facade allowing static access to all functions.
The Form class contains 3 major elements:
- [Method](#method)
- [Input](#inputs)
- [End](#end)

### Method
Example usage:
```php
<?= Form::Method('POST', route('login')) ?>
```
The 'Method' function echo`s the HTML form element with the ```@csrf``` element. \
The function requires 2 parameters: ```POST|GET```, ```Route```.

### Input
Example:
```php
<?= Form::Input('type', 'label (optional)', 'slug (optional)', ['options (optional)'])->Render() ?>
```
The ```Form::Input``` function create`s a HTML form input field. \
The function requires minimal 1 parameter: Type. \
The other parameters like: string ```label```, string ```slug``` and array ```options``` are optional. \
Possible type options: 

### Input Types
#### Checkbox
**! Still under development !**
```php
<?= Form::Input('checkbox', __('label'), 'slug', [
    //Required
    'options' => [
        'value_checkbox_option_1' => '(string) label checkbox option 1',
        'value_checkbox_option_2' => '(string) label checkbox option 2',
    ],
    // optional
    'class' => '(string) If set, sets the HTML property class with given value.',
    'message' => '(string) If set, sets and show the error message.',
    'value' => "(string) if set, sets the checkbox that matches the giving key value",
])->Render() ?>
```
Example usage:
```php
<?= Form::Input('checkbox', __('Remember Me'), 'remember', [
    'class' => 'col-md-8 offset-md-2',
    'options' => [
        'remember' => __('Remember Me'),
    ],
    'message' => isset($message) ? $message : '',
    'value' => $checkbox,
])->Render() ?>
```

#### E-mail
```php
<?= Form::Input('email', __('label'), 'slug', [    
    // optional
    'autocomplete' => '(boolean) If set, sets the HTML property autocomplete with the slug.',
    'autofocus' => '(boolean) If set, sets the HTML property autofocus.',
    'class' => '(string) If set, sets the HTML property class with given value.',
    'icon' => '(string) If set, shows a font-awesome 4.7.0 icon instead of the label. example: "address-book" will result in "fa fa-address-book".',        
    'message' => '(string) If set, sets and show the error message.',
    'placeholder' => '(string) If set, sets the HTML property placeholder with given value.',
    'required'=> '(boolean) If set, sets the HTML property required.',
    'small' => '(string) If set, sets the footnote text of the email input field.',
    'value' => "(string) if set, sets the HTML property value with giving string value",
])->Render() ?>
```
Example usage:
```php
<?= Form::Input('email', __('E-mail'), 'email', [
    'placeholder' => 'example@website.com',
    'class' => 'col-md-8 offset-md-2',
    'required'=> true,
    'autofocus' => true,
    'message' => isset($message) ? $message : '',
    'value' => $email,
])->Render() ?>
```

#### Password
```php
<?= Form::Input('password', __('label'), 'slug', [    
    // optional
    'autocomplete' => '(boolean) If set, sets the HTML property autocomplete with the slug.',
    'autofocus' => '(boolean) If set, sets the HTML property autofocus.',
    'class' => '(string) If set, sets the HTML property class with given value.',
    'icon' => '(string) If set, shows a font-awesome 4.7.0 icon instead of the label. example: "address-book" will result in "fa fa-address-book".',        
    'message' => '(string) If set, sets and show the error message.',
    'placeholder' => '(string) If set, sets the HTML property placeholder with given value.',
    'required'=> '(boolean) If set, sets the HTML property required.',
    'small' => '(string) If set, sets the footnote text of the email input field.',
    'value' => "(string) if set, sets the HTML property value with giving string value",
])->Render() ?>
```
Example usage:
```php
<?= Form::Input('password', __('Password'), 'password', [
    'class' => 'col-md-8 offset-md-2',
    'message' => isset($message) ? $message : '',
    'value' =>  '',
])->Render() ?>
```

### Radio buttons
```php
<?= Form::Input('radio', __('label'), 'slug', [
    //Required
    'options' => [
        'value_radio_option_1' => '(string) label radio option 1',
        'value_radio_option_2' => '(string) label radio option 2',
    ],
    // optional
    'class' => '(string) If set, sets the HTML property class with given value.',
    'message' => '(string) If set, sets and show the error message.',
    'value' => "(string) if set, sets the radio option that matches the giving key value",
])->Render() ?>
```
Example usage:
```php
<?= Form::Input('radio', __('Remember Me'), 'remember', [
    'class' => 'col-md-8 offset-md-2',
    'options' => [
        0 => __('Remember Me'),
        1 => __('Don`t Remember Me'),
    ],
    'message' => isset($message) ? $message : '',
    'value' =>  '',
])->Render() ?>
```

### Select
```php
<?= Form::Input('select', __('label'), 'slug', [
    //Required
    'options' => [
        'value_radio_option_1' => '(string) label radio option 1',
        'value_radio_option_2' => '(string) label radio option 2',
    ],
    // optional
    'class' => '(string) If set, sets the HTML property class with given value.',
    'emptyFirst' => "(string) If set, places a empty option in front of the options to display e empty field on load",
    'message' => '(string) If set, sets and show the error message.',
    'multiple' => '(boolean) if set, allows the user to select multiple options.',
    'value' => "(mixed) if set with value_radio_option, will select this option on load. For multiple select, array value allowed."
])->Render() ?>
```
Example usage:
```php
<?= Form::Input('select', __('Roles'), 'roles', [
    'class' => 'col-md-8 offset-md-2',
    'emptyFirst' => true,
    'options' => [
        1 =>'test',
        2 =>'Administrator',
        3 =>'Administrator',
        4 =>'Administrator',
    ],
    'value' => 2,
])->Render(); ?>

<?= Form::Input('select', __('Roles'), 'roles', [
    'class' => 'col-md-8 offset-md-2',
    'multiple' => true, // Multiple selector
    'options' => [
        1 =>'test',
        2 =>'Administrator',
        3 =>'Administrator',
        4 =>'Administrator',
    ],
    'value' => [1,4],   // Multiple values given true array
])->Render(); ?>
```

#### String
```php
<?= Form::Input('string', __('label'), 'slug', [    
    // optional
    'autocomplete' => '(boolean) If set, sets the HTML property autocomplete with the slug.',
    'autofocus' => '(boolean) If set, sets the HTML property autofocus.',
    'class' => '(string) If set, sets the HTML property class with given value.',
    'icon' => '(string) If set, shows a font-awesome 4.7.0 icon instead of the label. example: "address-book" will result in "fa fa-address-book".',        
    'message' => '(string) If set, sets and show the error message.',
    'placeholder' => '(string) If set, sets the HTML property placeholder with given value.',
    'required'=> '(boolean) If set, sets the HTML property required.',
    'small' => '(string) If set, sets the footnote text of the email input field.',
    'value' => "(string) if set, sets the HTML property value with giving string value",
])->Render() ?>
```
Example usage:
```php
<?= Form::Input('string', __('First name'), 'first_name', [    
    'placeholder' => 'First name',
    'class' => 'col-md-8 offset-md-2',
    'required'=> true,
    'autofocus' => true,
    'message' => isset($message) ? $message : '',
    'value' => $first_name,
])->Render() ?>
```

#### Textarea
```php
<?= Form::Input('textarea', __('label'), 'slug', [
    // optional
    'class' => '(string) If set, sets the HTML property class with given value.',
    'rows' => "(integer) If set, sets the HTML property rows with given value",
    'value' => '(mixed) If set, sets the textarea with given value',
])->Render() ?>
```
Example usage:
```php
<?= Form::Input('textarea', __('Message'), 'message', [
    'class' => 'col-md-8 offset-md-2',
    'rows' => 3,
    'value' => $message,
])->Render() ?>
```

### Chaining functions
Most parameters can be overwritten after they are first set. This is possible by chaining multiple set functions. \
This allows easy usage/overwrites by overwriting most important parameters true there own set function.
All set functions are displayed below in there proper order:
```php
<?= Form::Input(string)->Label(string)->Slug(string)->Options(array)->Render(); ?>    
```

#### Render
The ```Form::Input('type')->Render()``` function allows all the given options to be parsed into a view.
The ```Form::Input``` view will not be loaded without the ```Render()``` function and therefor a **important function** within the chain.

### End
Example usage:
```php
<?= Form::End() ?>
```
The ```End``` function echo`s the HTML closing form tag. \
The function has no parameters.

## Utilities
The Utilities class is supported by a Facade allowing static access to all functions.
The Utilities class contains 2 major elements:
 - [createSlug](#createSlug)
 - [keyExists](#keyExists)

### createSlug
A slug is a HTML/mysql friendly string.
Example usage:
```php
<?= Utilities::createSlug(string $name) ?>
```
It removes unwanted spaces and replaces them with a (_) underscore. 
This function is used to create a slug used for the name parameter of a HTML input element.


### keyExists
Example usage:
```php
<?= Utilities::keyExists(string $needle, array $haystack) ?>
```
A function to find a key inside a array and returns key.
