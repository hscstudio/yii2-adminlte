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
- For commercial project  U$$ 5


