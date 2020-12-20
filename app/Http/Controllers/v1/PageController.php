<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\DirectusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PageController extends DirectusController
{
    public function __construct()
    {
        $this->template = 'climb-template.pages.';
    }

    /**
     * Index page.
     *
     * @param Illuminate\Http\Request $req
     */
    public function index(Request $req)
    {
        $page_data = $this->getItems('pages', null, [
            'filter[key][eq]' => 'index',
            'single' => true,
            'fields' => '*,featured_image.data',
        ])['data'];

        list(
            $application_data,
            $company_data) = $this->withCompanyAndApplication();

        return view(
            $this->template.'index2',
            compact('page_data', 'company_data', 'application_data')
        );
    }

    /**
     * About page.
     *
     * @param mixed $req
     */
    public function about(Request $req)
    {
        $page_data = $this->getItems('pages', null, [
            'filter[key][eq]' => 'about',
            'single' => true,
            'fields' => '*,featured_image.data',
        ])['data'];

        $clients_data = $this->getItems('clients', null, [
            'status' => 'published',
            'fields' => 'name, url, logo.data',
        ])['data'];

        list($application_data, $company_data) = $this->withCompanyAndApplication();

        return view(
            $this->template.'about',
            compact('page_data', 'clients_data', 'company_data', 'application_data')
        );
    }

    /**
     * News page.
     *
     * @param mixed      $req
     * @param null|mixed $slug
     * @param null|mixed $id
     */
    public function news(Request $req, $slug = null, $id = null)
    {
        $page_data = $this->getItems('pages', null, [
            'filter[key][eq]' => 'news',
            'single' => true,
            'fields' => '*,featured_image.data',
        ])['data'];

        list(
            $application_data,
            $company_data) = $this->withCompanyAndApplication();

        if ($slug and $id) {
            $news_data = $this->getItems('news', null, [
                'filter[id][eq]' => $id,
                'filter[slug][eq]' => $slug,
                'single' => true,
                'meta' => '*',
                'status' => 'published',
                'fields' => 'category.id,category.category_name,created_on,owner.first_name,owner.last_name,id,title,excerpt,content,featured_image.data',
            ])['data'];

            return view(
                $this->template.'news-detail',
                compact(
                    'page_data',
                    'news_data',
                    'company_data',
                    'application_data'
                )
            );
        }

        $news_data = $this->getItems('news', null, [
            'filter[category][eq]' => $req->category,
            'filter[id][eq]' => $id,
            'filter[slug][eq]' => $slug,
            'limit' => $req->limit ?? 15,
            'page' => $req->page ?? 1,
            'meta' => '*',
            'status' => 'published',
            'fields' => 'category.id,category.category_name,created_on,id,title,excerpt,slug,featured_image.data',
        ]);

        $news_categories_data = $this->getItems('news_categories', null, [
            'fields' => '*,id,sort,category_name',
        ])['data'];

        return view(
            $this->template.'news',
            compact(
                'page_data',
                'news_data',
                'news_categories_data',
                'company_data',
                'application_data'
            )
        );
    }

    /**
     * Contact page.
     *
     * @param mixed $req
     */
    public function contact(Request $req)
    {
        $page_data = $this->getItems('pages', null, [
            'filter[key][eq]' => 'contact',
            'single' => true,
            'fields' => '*,featured_image.data',
        ])['data'];

        list(
            $application_data,
            $company_data) = $this->withCompanyAndApplication();

        return view(
            $this->template.'contact',
            compact('page_data', 'company_data', 'application_data')
        );
    }

    /**
     * Career Page.
     *
     * @param mixed $req
     */
    public function career(Request $req)
    {
        $page_data = $this->getItems('pages', null, [
            'filter[key][eq]' => 'career',
            'single' => true,
            'fields' => '*,featured_image.data',
        ])['data'];

        list(
            $application_data,
            $company_data) = $this->withCompanyAndApplication();

        return view(
            $this->template.'careers',
            compact('page_data', 'company_data', 'application_data')
        );
    }

    /**
     * gallery.
     *
     * @param mixed $req
     * @param mixed $slug
     * @param mixed $id
     */
    public function gallery(Request $req, $slug = null, $id = null)
    {
        $page_data = $this->getItems('pages', null, [
            'filter[key][eq]' => 'gallery',
            'single' => true,
            'fields' => '*,featured_image.data',
        ])['data'];

        list(
            $application_data,
            $company_data) = $this->withCompanyAndApplication();

        if ($slug and $id) {
            $galleries_data = $this->getItems('gallery', null, [
                'filter[id][eq]' => $id,
                'filter[slug][eq]' => $slug,
                'single' => true,
                'meta' => '*',
                'status' => 'published',
                'fields' => 'created_on,owner.first_name,owner.last_name,id,title,featured_image.data,foto.file.data',
            ])['data'];

            return view(
                $this->template.'gallery-detail',
                compact(
                    'page_data',
                    'galleries_data',
                    'company_data',
                    'application_data'
                )
            );
        }

        $galleries_data = $this->getItems('gallery', null, [
            'filter[category][eq]' => $req->category,
            'filter[id][eq]' => $id,
            'filter[slug][eq]' => $slug,
            'limit' => $req->limit ?? 15,
            'page' => $req->page ?? 1,
            'meta' => '*',
            'status' => 'published',
            'fields' => 'created_on,id,title,featured_image.data,slug',
        ]);

        return view(
            $this->template.'gallery',
            compact(
                'page_data',
                'galleries_data',
                'company_data',
                'application_data'
            )
        );
    }

    public function getCompany()
    {
        return Cache::rememberForever('company', function () {
            return $this->getItems('company', null, [
                'single' => true,
                'fields' => '*,logo.data',
            ])['data'];
        });
    }

    public function getApplication()
    {
        return Cache::rememberForever('application', function () {
            return $this->getItems('application', null, [
                'single' => true,
                'fields' => '*,favicon.data',
            ])['data'];
        });
    }

    public function withCompanyAndApplication()
    {
        $application_data = Cache::get('application', function () {
            return $this->getApplication();
        });

        $company_data = Cache::get('company', function () {
            return $this->getCompany();
        });

        return [$application_data, $company_data];
    }
}
