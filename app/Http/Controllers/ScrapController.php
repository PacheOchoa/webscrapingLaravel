<?php

namespace App\Http\Controllers;

use App\Scrap;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

use Illuminate\Http\Request;

class ScrapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       

        $goutteClient = new Client();
        $guzzleClient = new GuzzleClient(array(
            'timeout' => 60,
            'verify' => false
        ));
        $goutteClient->setClient($guzzleClient);
        $crawler = $goutteClient->request('GET', 'https://www.doraemonelgatocosmico.com/personajes-de-doraemon/');
        $crawler->filter('h2')->each(function ($node) {
            $data = $node->text();
           
            $guarda = new Scrap();
            $guarda->extraer =$data;
            $guarda->save();
            
           
        });
       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Scrap  $scrap
     * @return \Illuminate\Http\Response
     */
    public function show(Scrap $scrap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Scrap  $scrap
     * @return \Illuminate\Http\Response
     */
    public function edit(Scrap $scrap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Scrap  $scrap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scrap $scrap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Scrap  $scrap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scrap $scrap)
    {
        //
    }
}
