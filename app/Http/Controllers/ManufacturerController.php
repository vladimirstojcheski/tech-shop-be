<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
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
         * @param  \App\Http\Requests\StoreProductRequest  $request
         * @return \Illuminate\Http\Response
         */
        public function store(StoreProductRequest $request)
        {

        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Product  $product
         * @return \Illuminate\Http\Response
         */
        public function show(Product $product)
        {
            //
        }

        public function getAll() {

        }

        public function getAllByProducts(GetProductRequest $request) {
            $search = $request->search;
            $listMan = $search['manufacturersToFilter'];
            if (isset($listMan)) {
                if (sizeof($listMan) > 0) {
                    $allManu = Manufacturer::whereIn("id", $listMan)->get();
                } else {
                    $allManu = Manufacturer::get();
                }
            }
            return $allManu;
        }

        public function getAllByCategory($id) {
            $allManuByCat = Manufacturer::where("sub_category_id", $id)->get();
            return $allManuByCat;
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Product  $product
         * @return \Illuminate\Http\Response
         */
        public function edit(Product $product)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \App\Http\Requests\UpdateProductRequest  $request
         * @param  \App\Models\Product  $product
         * @return \Illuminate\Http\Response
         */
        public function update(UpdateProductRequest $request, Product $product)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Product  $product
         * @return \Illuminate\Http\Response
         */
        public function destroy(Product $product)
        {
            //
        }
}
