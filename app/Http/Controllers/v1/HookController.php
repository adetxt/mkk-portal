<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\DirectusController;
use Illuminate\Http\Request;
use Cache;

class HookController extends DirectusController
{
  public function recacheCollection (Request $req, $collection, $action, $single = null) {
    Cache::forget($collection);
    $cached = Cache::rememberForever($collection, function () use ($collection, $single) {
      return $this->getItems($collection, null, [
        'single' => ($single ? true : false),
        'fields' => '*.*'
      ])['data'];
    });

    return response()->json('success');
  }
}
