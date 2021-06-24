<h1 align=center>PHPGraph</h1>
<h4 align=center><i>A simple and immediate object-oriented library for the official Telegraph API</i></h4>
<div align=center><img src="http://telegra.ph/file/6a5b15e7eb4d7329ca7af.jpg" width=700></div>


## 📦 Installation
You can easily install PHPGraph with composer, running the following command:


```bash
composer install code-a1/phpgraph
```
Then you must only require the autoload file in your project, for example:

```php
require "vendor/autoload.php"
```

<div align=center><i>That's it! Now you can start using the library</i></div>

## 🔧 Usage

All the methods of this library are the same of the official <a href=https://telegra.ph/api>Telegraph api</a>, there are also aliases for some objects - <i>such as edit() or get() for Page</i> - and some methods are easier to use <i>- such as createPage</i>

Here's a basic example:
```php
<?php

use codea1\PHPGraph;

require "vendor/autoload.php";

$client = new PHPGraph\Client("your_access_token");

$page = $client->createPage("Test", "Simple testing page content", ["return_content" => true]);

echo $page->edit("Wow, the title is changed!")->url;
```

## ✅ Features

- All the methods of the ***official Telegraph api***.
- ***Aliases*** for some objects.
- Methods such as createPage and editPage ***simplified*** (for example in ```$client->createPage("Test", "Text to test")```, you don't have to write all the long and complex "content" field for a simple text such as "Text to test"
