<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public function images(){
        return $this->hasMany(Image::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function checkouts(){
        return $this->hasMany(Checkout::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getAllProducts()

    {
               return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->get();


    }

    //one product

    public function getOneProduct($id)

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.id','=',$id)
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->first();


    }


    //men products
    public function getMenProducts(){
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','1')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('date_arrived','desc')
            ->get();
    }


    //women products

    public function getWomenProducts(){
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','2')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('date_arrived','desc')
            ->get();
    }


    //kids products

    public function getKidsProducts(){
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','3')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('date_arrived','desc')
            ->get();
    }


    //sports products

    public function getSportsProducts(){
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','4')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('date_arrived','desc')
            ->get();
    }


    //products with brands

    public function getNikeProducts(){
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','1')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('date_arrived','desc')
            ->get();
    }

    public function getAdidasProducts(){
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','2')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('date_arrived','desc')
            ->get();
    }

    public function getReebokProducts(){
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','3')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('date_arrived','desc')
            ->get();
    }

    public function getAsicsProducts(){
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','4')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('date_arrived','desc')
            ->get();
    }

    public function getPumaProducts(){
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','5')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('date_arrived','desc')
            ->get();
    }

    public function getNBProducts(){
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','6')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('date_arrived','desc')
            ->get();
    }

    public function getHummelProducts(){
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','7')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('date_arrived','desc')
            ->get();
    }


    //all products sorting methods

    public function getSortedByNameAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','asc')
            ->get();


    }

    public function getSortedByNameDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','desc')
            ->get();


    }

    public function getSortedByPriceAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','asc')
            ->get();


    }


    public function getSortedByPriceDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','desc')
            ->get();


    }


   //men products sorting methods


    public function menSortedByNameAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','1')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','asc')
            ->get();


    }

    public function menSortedByNameDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','1')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','desc')
            ->get();


    }

    public function menSortedByPriceAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','1')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','asc')
            ->get();


    }


    public function menSortedByPriceDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','1')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','desc')
            ->get();


    }

    //women products sort methods


    public function womenSortedByNameAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','2')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','asc')
            ->get();


    }

    public function womenSortedByNameDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','2')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','desc')
            ->get();


    }

    public function womenSortedByPriceAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','2')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','asc')
            ->get();


    }


    public function womenSortedByPriceDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','2')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','desc')
            ->get();


    }


    //kids products sort methods

    public function kidsSortedByNameAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','3')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','asc')
            ->get();


    }

    public function kidsSortedByNameDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','3')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','desc')
            ->get();


    }

    public function kidsSortedByPriceAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','3')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','asc')
            ->get();


    }


    public function kidsSortedByPriceDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','3')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','desc')
            ->get();


    }


    //sports products sort methods


    public function sportsSortedByNameAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','4')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','asc')
            ->get();


    }

    public function sportsSortedByNameDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','4')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','desc')
            ->get();


    }

    public function sportsSortedByPriceAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','4')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','asc')
            ->get();


    }


    public function sportsSortedByPriceDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.category_id','=','4')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','desc')
            ->get();


    }


    //nike products sort methods


    public function nikeSortedByNameAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','1')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','asc')
            ->get();


    }

    public function nikeSortedByNameDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','1')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','desc')
            ->get();


    }

    public function nikeSortedByPriceAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','1')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','asc')
            ->get();


    }


    public function nikeSortedByPriceDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','1')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','desc')
            ->get();


    }


    //adidas products sorting methods

    public function adidasSortedByNameAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','2')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','asc')
            ->get();


    }

    public function adidasSortedByNameDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','2')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','desc')
            ->get();


    }

    public function adidasSortedByPriceAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','2')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','asc')
            ->get();


    }


    public function adidasSortedByPriceDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','2')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','desc')
            ->get();


    }

    //reebok products sorting methods

    public function reebokSortedByNameAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','3')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','asc')
            ->get();


    }

    public function reebokSortedByNameDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','3')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','desc')
            ->get();


    }

    public function reebokSortedByPriceAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','3')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','asc')
            ->get();


    }


    public function reebokSortedByPriceDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','3')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','desc')
            ->get();


    }


    //asics products sorting methods

    public function asicsSortedByNameAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','4')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','asc')
            ->get();


    }

    public function asicsSortedByNameDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','4')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','desc')
            ->get();


    }

    public function asicsSortedByPriceAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','4')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','asc')
            ->get();


    }


    public function asicsSortedByPriceDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','4')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','desc')
            ->get();


    }

    //puma products sorting methods


    public function pumaSortedByNameAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','5')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','asc')
            ->get();


    }

    public function pumaSortedByNameDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','5')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','desc')
            ->get();


    }

    public function pumaSortedByPriceAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','5')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','asc')
            ->get();


    }


    public function pumaSortedByPriceDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','5')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','desc')
            ->get();


    }


    //new balance products sorting methods

    public function nbSortedByNameAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','6')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','asc')
            ->get();


    }

    public function nbSortedByNameDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','6')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','desc')
            ->get();


    }

    public function nbSortedByPriceAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','6')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','asc')
            ->get();


    }


    public function nbSortedByPriceDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','6')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','desc')
            ->get();


    }

    //hummel products sorting methods


    public function hummelSortedByNameAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','7')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','asc')
            ->get();


    }

    public function hummelSortedByNameDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','7')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.name','desc')
            ->get();


    }

    public function hummelSortedByPriceAscProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','7')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','asc')
            ->get();


    }


    public function hummelSortedByPriceDescProducts()

    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.brand_id','=','7')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->orderBy('p.price','desc')
            ->get();


    }





}
