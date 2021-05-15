<?php

namespace App\Http\Controllers\Admin;

use ACFBentveld\XML\Transformers\ArrayTransformer;
use ACFBentveld\XML\XML;
use App\Http\Controllers\Controller;
use DOMDocument;
use Illuminate\Http\Request;
use XMLReader;


class ReaderxmlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = array();
       //$deger = $_POST['deger'];
        $xmlReader = new XMLReader();
        $xmlReader->open('https://www.tesetturpazari.com/xml/facebookmagaza.com.php?imageSize=B');
        $doc = new DOMDocument('1.0', 'UTF-8');
        while ($xmlReader->read()) {

            if ($xmlReader->nodeType == XMLReader::ELEMENT && $xmlReader->localName == "item") {
                // Load the XML under the <item> tag into SimpleXML
                $data = simplexml_import_dom($doc->importNode($xmlReader->expand(), true));
                $item = [];
                // Loop over the child elements from the 'g' namespace
                foreach ($data->children("g", true) as $tag => $value) {
                    $tag = "g:" . $tag;
                    // If an item with that tag name already exists, convert it to an array of items
                    if (isset($item[$tag])) {
                        if (!is_array($item[$tag])) {
                            $item[$tag] = [$item[$tag]];
                        }
                        $item[$tag][] = (string)$value;
                    } else {
                        // For normal items, add in the value (as a string) to the array
                        $item[$tag] = (string)$value;
                    }
                }
                // Store new item
                $items[] = $item;
            }
        }
        return response()->json($items);
       // dd($items['g:additional_image_link']);
        /*foreach ($items as $value){
            return $value['g:additional_image_link'];
        }*/

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
