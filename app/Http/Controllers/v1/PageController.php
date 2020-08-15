<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\DirectusController;
use Illuminate\Http\Request;

class PageController extends DirectusController
{
  function __construct () {
    $this->template = 'climb-template.pages.';
  }
  
  /**
   * Index page
   *
   * @param  Illuminate\Http\Request $req
   * @return void
   */
  public function index (Request $req) {
    $page_data = $this->getItems('pages', null, [
      'filter[key][eq]' => 'index',
      'single' => true
    ])['data'];

    $company_data = $this->getCompany('nama_perusahaan,motto');

    return view($this->template.'index', compact('page_data','company_data'));
  }
  
  /**
   * About page
   *
   * @param  mixed $req
   * @return void
   */
  public function about (Request $req) {
    $page_data = $this->getItems('pages', null, [
      'filter[key][eq]' => 'about',
      'single' => true
    ])['data'];

    $company_data = $this->getCompany('tentang_perusahaan,visi_misi');

    return view($this->template.'about', compact('page_data','company_data'));
  }

  public function getCompany ($fields = null) {
    return $this->getItems('company', null, [
      'single' => true,
      'fields' => $fields ?? '*'
    ])['data'];
  }
}
