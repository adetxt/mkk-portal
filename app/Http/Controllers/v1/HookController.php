<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\DirectusController;
use Illuminate\Http\Request;
use Cache;

class HookController extends DirectusController
{
  public function recacheCollection (Request $req, $collectionName, $action, $single = null) {
    Cache::forget($collectionName);
    $cached = Cache::rememberForever($collectionName, function () {
      return $this->getItems($collectionName, null, [
        'single' => ($single ? true : false),
        'fields' => '*.*'
      ])['data'];
    });

    return response()->json('success');
  }
}
