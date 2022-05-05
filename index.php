<?php
// include composer autoload
require './vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

$img = Image::make('google.jpg');

$img->resize(200,null,function (\Intervention\Image\Constraint $constraint) {
    $constraint->aspectRatio();
});

$img->text('Watermark', $img->getWidth(), $img->getHeight(), function (\Intervention\Image\AbstractFont $font) {
    $font->size(12);
    $font->file('Verdana.ttf');
    $font->color('#000000');
    $font->align('right');
    $font->valign('bottom');
});

$img->save('save.jpg');

echo $img->response('jpg');