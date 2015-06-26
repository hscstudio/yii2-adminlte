yii2-adminlte
=============
Theme Admin LTE for Yii 2

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist hscstudio/yii2-adminlte "1.0.0"
```

or add

```
"hscstudio/yii2-adminlte": "1.0.0"
```

to the require section of your `composer.json` file.


## Usage

At Your config app, add `adminlte` in bootstrap section
```
'bootstrap' => [
	'log',
	'adminlte', # add this
],	
```

still in Your config app, add `adminlte` in component section
```
'components' => [
	'adminlte' => [
		'class'=> 'hscstudio\adminlte\Bootstrap',
		'example' => true,
	],
```

## License

- Free only for free project
- For commercial project 
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="GSH4ME39AWWMC">
<table>
<tr><td><input type="hidden" name="on0" value="License">License</td></tr><tr><td><select name="os0">
	<option value="Per Project">Per Project $5,00 USD</option>
	<option value="Unlimited">Unlimited $25,00 USD</option>
</select> </td></tr>
<tr><td><input type="hidden" name="on1" value="Name or Company">Name or Company</td></tr><tr><td><input type="text" name="os1" maxlength="200"></td></tr>
</table>
<input type="hidden" name="currency_code" value="USD">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>


