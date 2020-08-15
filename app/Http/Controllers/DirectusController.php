<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class DirectusController extends Controller
{
  public $http;
  public $api_url = null;

  public $hasError = false; // error state
  public $errorMesssage = null; // error message

  function __construct () {

  }
  
  /**
   * Generate Directus API URL
   *
   * @return void
   */
  public function getApiUrl () {
    $this->api_url = config('directus.server_url').'/'.config('directus.project_name');
    return $this;
  }
  
  /**
   * Get directus jwt token by Auth
   *
   * @return void
   */
  protected function auth () {
    $this->getApiUrl();
    $token = Http::post($this->api_url.'/auth/authenticate', [
      'email' => config('directus.email'),
      'password' => config('directus.password')
    ]);

    if ($token->failed()) {
      $this->createError($token);
      return false;
    };

    return $token;
  }
  
  /**
   * Get collection items
   *
   * @param  string $collectionName
   * @param  string|int $itemId
   * @return void
   */
  public function getItems ($collectionName, $itemId = null, $query = []) {
    $data = $this->buildGetApi('/items', [$collectionName, $itemId], $query);

    if ($this->hasError) {
      return $this->errorMesssage;
    }

    return $data;
  }
  
  /**
   * Build api url and retrive data from server
   *
   * @param  mixed $endpoint
   * @param  mixed $param
   * @return void
   */
  protected function buildGetApi ($endpoint, $param = null, $query = null) {
    $tail = '';
    foreach ($param as $val) {
      if ($val) {
        $tail .= ('/'.$val);
      }
    }

    if (!$this->api_url) {
      $this->getApiUrl();
    }

    return $this->get($this->api_url.$endpoint.$tail, $query);
  }
  
  /**
   * httpInstance
   *
   * @return void
   */
  public function httpInstance () {
    // $token = $this->auth();

    if ($this->hasError) {
      return false;
    }

    // $token->json()['data']['token'];
    $this->http = Http::withToken(config('directus.static_token'));
    return $this;
  }
  
  /**
   * Http get request
   *
   * @param  string $url
   * @return void
   */
  public function get ($url, $query = null) {
    $this->httpInstance();

    if ($this->hasError) {
      return false;
    }
    
    $data = $this->http->get($url, $query);

    // if http error
    if ($data->failed()) {
      $this->createError($data);
      return false;
    }

    return $data->json();
  }
  
  /**
   * Create error state
   *
   * @param  mixed $instance
   * @return void
   */
  public function createError ($instance) {
    $this->hasError = true;
    $this->errorMesssage = $instance->json()['error']['message'];
    return $this;
  }
}
