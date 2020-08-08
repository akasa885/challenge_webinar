<?php

namespace App\Http\Controllers\Authors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SummernoteController extends Controller
{
    public function storeContent($desc)
    {
      $detail = $desc;
      libxml_use_internal_errors(true);
      $dom = new \domdocument();
      $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
      $images = $dom->getElementsByTagName('img');

      foreach ($images as $count => $image) {
         $src = $image->getAttribute('src');
         if (preg_match('/data:image/', $src)) {
             preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
             $mimeType = $groups['mime'];
             $path = '/images/' . uniqid('', true) . '.' . $mimeType;
             Storage::disk('s3')->put($path, file_get_contents($src));
             $image->removeAttribute('src');
             $image->setAttribute('src', Storage::disk('s3')->url($path));
         }
      }
      $detail = $dom->savehtml();
      return $detail;      
    }
}
