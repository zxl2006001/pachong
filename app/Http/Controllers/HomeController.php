<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getData()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.news.com.au/finance/markets');
        $arr = [];
        $crawler->filter('div#newscorpau_external_includes_external_includes-127 table.market-table tbody tr')->each(function($node,$k) use (&$arr) {

              $arr[$k]['name'] = $node->filter('td')->eq(0)->text();
              $arr[$k]['price'] = $node->filter('td')->eq(1)->text();
              $arr[$k]['change'] = $node->filter('td')->eq(2)->text();
              $arr[$k]['percent'] = $node->filter('td span')->text();

        });
        dd($arr);

    }
}
