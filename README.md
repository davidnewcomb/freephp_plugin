# freephp_plugin
FreePHP is a B2evolution widget that allows you to embed custom PHP code in
a page widget. Think FreeHTML but with PHP!

## Supported versions
Currently tested and working under B2evolution 6.9, however it may work with
earlier versions.

## Installation
1. Go to the plugins directory of your b2evolution installation.
1. Clone this repo: git clone https://github.com/davidnewcomb/freephp_plugin.git
1. In the backoffice, System > Plugins > Install new.
1. Find 'Free PHP' and click '[Install]'
1. Once installed you can add a widget to your container as normal.

## Usage
The plugin uses `eval()` to run the PHP.
See [[https://secure.php.net/manual/en/function.eval.php]] for information
on handling PHP's opening and closing tags.

## Examples

Just PHP:
```
echo 'Hello World';
```

Mix finishing in non-PHP code:
```
echo 'Hello';?> World
```

Mix finishing in PHP code:
```
?>Hello <?php echo 'World';
```

## Warning
In the wrong hands this plugin can be a very dangerous security issue.
However, if you are a developer on a closed system and you want to test
some code before you create a plugin then it is really handy.

