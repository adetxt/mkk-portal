<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\DirectusController;
use Illuminate\Http\Request;
use Cache;

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
      'single' => true,
      'fields' => '*,featured_image.data'
    ])['data'];

    list($application_data, $company_data) = $this->withCompanyAndApplication();

    return view($this->template.'index2', compact('page_data','company_data','application_data'));
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
      'single' => true,
      'fields' => '*,featured_image.data'
    ])['data'];

    list($application_data, $company_data) = $this->withCompanyAndApplication();

    return view($this->template.'about', compact('page_data','company_data','application_data'));
  }
  
  /**
   * News page
   *
   * @param  mixed $req
   * @return void
   */
  public function news (Request $req) {
    $page_data = $this->getItems('pages', null, [
      'filter[key][eq]' => 'news',
      'single' => true,
      'fields' => '*,featured_image.data'
    ])['data'];

    $news_data = $this->getItems('news', null, [
      'status' => 'published',
      'fields' => 'created_on,title,excerpt,featured_image.data'
    ])['data'];

    list($application_data, $company_data) = $this->withCompanyAndApplication();

    return view($this->template.'news', compact('page_data','news_data','company_data','application_data'));
  }

  /**
   * Contact page
   *
   * @param  mixed $req
   * @return void
   */
  public function contact (Request $req) {
    $page_data = $this->getItems('pages', null, [
      'filter[key][eq]' => 'contact',
      'single' => true,
      'fields' => '*,featured_image.data'
    ])['data'];

    list($application_data, $company_data) = $this->withCompanyAndApplication();

    return view($this->template.'contact', compact('page_data','company_data','application_data'));
  }

  public function getCompany () {
    return Cache::rememberForever('company', function () {
      return $this->getItems('company', null, [
        'single' => true,
        'fields' => '*,logo.data'
      ])['data'];
    });
  }

  public function getApplication () {
    return Cache::rememberForever('application', function () {
      return $this->getItems('application', null, [
        'single' => true,
        'fields' => '*'
      ])['data'];
    });
  }

  public function withCompanyAndApplication () {
    $application_data = Cache::get('application', function () {
      return $this->getApplication();
    });

    $company_data = Cache::get('company', function () {
      return $this->getCompany();
    });

    return [
      $application_data,
      $company_data
    ];
  }
}
