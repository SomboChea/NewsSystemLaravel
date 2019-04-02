<?php

/**
 * Custom Helper
 */

 if (!function_exists('slug'))
 {
    function slug($text)
    {
      // replace non letter or digits by -
      $text = preg_replace('~[^\pL\d]+~u', '-', $text);

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      // trim
      $text = trim($text, '-');

      // remove duplicate -
      $text = preg_replace('~-+~', '-', $text);

      // lowercase
      $text = strtolower($text);

      if (empty($text)) {
        return 'n-a';
      }

      return $text;
    }
 }

 if (!function_exists('upload'))
 {
     function upload(\Illuminate\Http\Request $file, $driver = 'media')
     {
        try{
            $file=\Illuminate\Support\Facades\Storage::disk($driver)->put('',$file->file);
            return [
                "host"=>$file->getSchemeAndHttpHost(),
                "uploaded"=>true,
                "url"=>\Illuminate\Support\Facades\Storage::disk($driver)->url($file)
            ];
        } catch (Exception $ex){
            return [
                "host"=>$file->getSchemeAndHttpHost(),
                "uploaded"=>false,
                "error"=> [
                    "message"=> $ex->getMessage()
                ]
            ];
        }
     }
 }
