<?php
  
  function imgResize($inputRelativePath, $outputRelativePath, $maxWidth, $maxHeight, $quality=82) {

    /**
     * imgResize v4b (https://humanize.me)
     * Copyright 2019-2020 Jérémie Diarra
     * Licensed under MIT (https://humanize.me/mit-license.php)
     * 
     * Return [$outputWidth, $outputHeight, "converter name"]
     * 
     * @param {string} $inputRelativePath The fullpath of your input picture.
     * @param {string} $outputRelativePath The fullpath of your output picture (the thumbnail).
     * @param {integer} $maxWidth The maximum width of your output picture (the thumbnail).
     * @param {integer} $maxHeight The maximum height of your output picture (the thumbnail).
     * @param {integer} $quality The quality of your output picture (the thumbnail), default is 82.
     * @return {array} final output picture width, final output picture height, converter used for it (imagemagick or gd).
     */

    // --------------------------------------------------------------------
    // SECURITY -- SECURITY -- SECURITY -- SECURITY -- SECURITY -- SECURITY
    // --------------------------------------------------------------------
    // this function does not provide any security check
    // so you'd better do this job BEFORE calling this function
    // if you're not scared enough check https://imagetragick.com
    // --------------------------------------------------------------------
    // SECURITY -- SECURITY -- SECURITY -- SECURITY -- SECURITY -- SECURITY
    // --------------------------------------------------------------------

    // GD or ImageMagick ?
    exec("convert -version", $out, $rcode);
    $imageMagickIsReal = ($rcode === 0) ? true : false;

    // input exists
    if (file_exists($inputRelativePath) == false) exit("❌ imgResize() : provided inputFullpath does not exist");

    // output writable
    if (touch($outputRelativePath) == false) exit("❌ imgResize() : cannot write to outputFullpath, you may need to play with chmod");

    // input
    $inputExtension  = strtolower(pathinfo($inputRelativePath, PATHINFO_EXTENSION));
    if ($inputExtension == "jpeg") $inputExtension = "jpg";
    $inputDimensions = getimagesize($inputRelativePath);
    $inputWidth  = $inputDimensions[0];
    $inputHeight = $inputDimensions[1];
    if ($inputWidth > $inputHeight)     $inputOrientation = "landscape";
    elseif ($inputWidth < $inputHeight) $inputOrientation = "portrait";
    else                                $inputOrientation = "square";

    // output dimensions
    if ($inputOrientation == "landscape") {
      $outputWidth  = $maxWidth;
      $outputHeight = round($maxWidth * $inputHeight / $inputWidth);
      if ($outputHeight > $maxHeight) {
        $outputHeight = $maxHeight;
        $outputWidth  = round($maxHeight * $inputWidth / $inputHeight);
      }
    }
    if ($inputOrientation == "portrait") {
      $outputHeight = $maxHeight;
      $outputWidth  = round($maxHeight * $inputWidth / $inputHeight);
      if ($outputWidth > $maxWidth) {
        $outputWidth  = $maxWidth;
        $outputHeight = round($maxWidth * $inputHeight / $inputWidth);
      }
    }
    if ($inputOrientation == "square") {
      if ($maxWidth > $maxHeight) {
        $outputWidth  = $maxHeight;
        $outputHeight = $maxHeight;
      } else {
        $outputWidth  = $maxWidth;
        $outputHeight = $maxWidth;  
      }
    }

    if ($imageMagickIsReal) {
      
      // yes ImageMagick is in the place

      // thx Dave Newton for his great article about imagemagick, love for ever <3
      // www.smashingmagazine.com/2015/06/efficient-image-resizing-with-imagemagick/
      $cmd = "convert \"$inputRelativePath\" -auto-orient -filter Triangle -define filter:support=2 -strip -thumbnail ". $outputWidth . "x" . $outputHeight ." -unsharp 0.25x0.08+8.3+0.045 -dither None -posterize 136 -quality $quality -define jpeg:fancy-upsampling=off -interlace Plane -colorspace sRGB \"$outputRelativePath\"";

      exec($cmd, $out, $rcode);
      return [$outputWidth, $outputHeight, "imagemagick"];

    } else {
      
      // we don't have ImageMagick, switching to GD 

      // GD : open input file
      if ($inputExtension == "jpg") $inputImage = imagecreatefromjpeg($inputRelativePath);
      if ($inputExtension == "gif") $inputImage = imagecreatefromgif($inputRelativePath);
      if ($inputExtension == "png") $inputImage = imagecreatefrompng($inputRelativePath);

      // GD : create output image
      $outputImage = imagecreatetruecolor($outputWidth, $outputHeight);

      // GD : resamble the input to the output
      imagecopyresampled($outputImage, $inputImage, 0, 0, 0, 0, $outputWidth, $outputHeight, $inputWidth, $inputHeight);

      // GD : save the output
      if ($inputExtension == "jpg") $result = imagejpeg($outputImage, $outputRelativePath, $quality);
      if ($inputExtension == "gif") $result = imagegif($outputImage, $outputRelativePath);
      if ($inputExtension == "png") $result = imagepng($outputImage, $outputRelativePath, 9);

      // GD : free up memory
      imagedestroy($inputImage);
      imagedestroy($outputImage);

      if ($result) return [$outputWidth, $outputHeight, "gd"];
      else         return $result;

    }

  }

?>