#!/bin/sh

php example/generate-html.php > example/example.html
php example/example.php > example/example.json
php example/preview.php > example/preview.html
