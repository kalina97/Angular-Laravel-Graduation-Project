<?php

namespace App\Http\Controllers\SharedControllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function allProducts()

    {
        $model=new Product();
        $products=$model->getAllProducts();
        return response()->json($products,200);


    }


    public function productDetails($id)

    {
        $model=new Product();
        $product=$model->getOneProduct($id);
        return response()->json($product,200);


    }


    public function menProducts()

    {
        $model=new Product();
        $products=$model->getMenProducts();
        return response()->json($products,200);


    }


    public function womenProducts()

    {
        $model=new Product();
        $products=$model->getWomenProducts();
        return response()->json($products,200);


    }


    public function kidsProducts()

    {
        $model=new Product();
        $products=$model->getKidsProducts();
        return response()->json($products,200);


    }

    public function sportsProducts()

    {
        $model=new Product();
        $products=$model->getSportsProducts();
        return response()->json($products,200);


    }

    //brands with products

    public function nikeProducts()

    {
        $model=new Product();
        $products=$model->getNikeProducts();
        return response()->json($products,200);


    }

    public function adidasProducts()

    {
        $model=new Product();
        $products=$model->getAdidasProducts();
        return response()->json($products,200);


    }


    public function reebokProducts()

    {
        $model=new Product();
        $products=$model->getReebokProducts();
        return response()->json($products,200);


    }

    public function pumaProducts()

    {
        $model=new Product();
        $products=$model->getPumaProducts();
        return response()->json($products,200);


    }

    public function asicsProducts()

    {
        $model=new Product();
        $products=$model->getAsicsProducts();
        return response()->json($products,200);


    }

    public function nbProducts()

    {
        $model=new Product();
        $products=$model->getNBProducts();
        return response()->json($products,200);


    }
    public function hummelProducts()

    {
        $model=new Product();
        $products=$model->getHummelProducts();
        return response()->json($products,200);


    }

    //all products sorting methods

    public function sortNameAscProducts()

    {
        $model=new Product();
        $products=$model->getSortedByNameAscProducts();
        return response()->json($products,200);


    }


    public function sortNameDescProducts()

    {
        $model=new Product();
        $products=$model->getSortedByNameDescProducts();
        return response()->json($products,200);


    }



    public function sortPriceAscProducts()

    {
        $model=new Product();
        $products=$model->getSortedByPriceAscProducts();
        return response()->json($products,200);


    }


    public function sortPriceDescProducts()

    {
        $model=new Product();
        $products=$model->getSortedByPriceDescProducts();
        return response()->json($products,200);


    }


    //men products sort methods


    public function menSortNameAscProducts()

    {
        $model=new Product();
        $products=$model->menSortedByNameAscProducts();
        return response()->json($products,200);


    }


    public function menSortNameDescProducts()

    {
        $model=new Product();
        $products=$model->menSortedByNameDescProducts();
        return response()->json($products,200);


    }



    public function menSortPriceAscProducts()

    {
        $model=new Product();
        $products=$model->menSortedByPriceAscProducts();
        return response()->json($products,200);


    }


    public function menSortPriceDescProducts()

    {
        $model=new Product();
        $products=$model->menSortedByPriceDescProducts();
        return response()->json($products,200);


    }


    //women products sort methods

    public function womenSortNameAscProducts()

    {
        $model=new Product();
        $products=$model->womenSortedByNameAscProducts();
        return response()->json($products,200);


    }


    public function womenSortNameDescProducts()

    {
        $model=new Product();
        $products=$model->womenSortedByNameDescProducts();
        return response()->json($products,200);


    }



    public function womenSortPriceAscProducts()

    {
        $model=new Product();
        $products=$model->womenSortedByPriceAscProducts();
        return response()->json($products,200);


    }


    public function womenSortPriceDescProducts()

    {
        $model=new Product();
        $products=$model->womenSortedByPriceDescProducts();
        return response()->json($products,200);


    }


    //kids products sort methods

    public function kidsSortNameAscProducts()

    {
        $model=new Product();
        $products=$model->kidsSortedByNameAscProducts();
        return response()->json($products,200);


    }


    public function kidsSortNameDescProducts()

    {
        $model=new Product();
        $products=$model->kidsSortedByNameDescProducts();
        return response()->json($products,200);


    }



    public function kidsSortPriceAscProducts()

    {
        $model=new Product();
        $products=$model->kidsSortedByPriceAscProducts();
        return response()->json($products,200);


    }


    public function kidsSortPriceDescProducts()

    {
        $model=new Product();
        $products=$model->kidsSortedByPriceDescProducts();
        return response()->json($products,200);


    }


    //sports products sort methods

    public function sportsSortNameAscProducts()

    {
        $model=new Product();
        $products=$model->sportsSortedByNameAscProducts();
        return response()->json($products,200);


    }


    public function sportsSortNameDescProducts()

    {
        $model=new Product();
        $products=$model->sportsSortedByNameDescProducts();
        return response()->json($products,200);


    }



    public function sportsSortPriceAscProducts()

    {
        $model=new Product();
        $products=$model->sportsSortedByPriceAscProducts();
        return response()->json($products,200);


    }


    public function sportsSortPriceDescProducts()

    {
        $model=new Product();
        $products=$model->sportsSortedByPriceDescProducts();
        return response()->json($products,200);


    }


    //nike products sort methods



    public function nikeSortNameAscProducts()

    {
        $model=new Product();
        $products=$model->nikeSortedByNameAscProducts();
        return response()->json($products,200);


    }


    public function nikeSortNameDescProducts()

    {
        $model=new Product();
        $products=$model->nikeSortedByNameDescProducts();
        return response()->json($products,200);


    }



    public function nikeSortPriceAscProducts()

    {
        $model=new Product();
        $products=$model->nikeSortedByPriceAscProducts();
        return response()->json($products,200);


    }


    public function nikeSortPriceDescProducts()

    {
        $model=new Product();
        $products=$model->nikeSortedByPriceDescProducts();
        return response()->json($products,200);


    }

    //adidas products sort methods


    public function adidasSortNameAscProducts()

    {
        $model=new Product();
        $products=$model->adidasSortedByNameAscProducts();
        return response()->json($products,200);


    }


    public function adidasSortNameDescProducts()

    {
        $model=new Product();
        $products=$model->adidasSortedByNameDescProducts();
        return response()->json($products,200);


    }



    public function adidasSortPriceAscProducts()

    {
        $model=new Product();
        $products=$model->adidasSortedByPriceAscProducts();
        return response()->json($products,200);


    }


    public function adidasSortPriceDescProducts()

    {
        $model=new Product();
        $products=$model->adidasSortedByPriceDescProducts();
        return response()->json($products,200);


    }


    //reebok products sort methods

    public function reebokSortNameAscProducts()

    {
        $model=new Product();
        $products=$model->reebokSortedByNameAscProducts();
        return response()->json($products,200);


    }


    public function reebokSortNameDescProducts()

    {
        $model=new Product();
        $products=$model->reebokSortedByNameDescProducts();
        return response()->json($products,200);


    }



    public function reebokSortPriceAscProducts()

    {
        $model=new Product();
        $products=$model->reebokSortedByPriceAscProducts();
        return response()->json($products,200);


    }


    public function reebokSortPriceDescProducts()

    {
        $model=new Product();
        $products=$model->reebokSortedByPriceDescProducts();
        return response()->json($products,200);


    }


    //asics products sort methods

    public function asicsSortNameAscProducts()

    {
        $model=new Product();
        $products=$model->asicsSortedByNameAscProducts();
        return response()->json($products,200);


    }


    public function asicsSortNameDescProducts()

    {
        $model=new Product();
        $products=$model->asicsSortedByNameDescProducts();
        return response()->json($products,200);


    }



    public function asicsSortPriceAscProducts()

    {
        $model=new Product();
        $products=$model->asicsSortedByPriceAscProducts();
        return response()->json($products,200);


    }


    public function asicsSortPriceDescProducts()

    {
        $model=new Product();
        $products=$model->asicsSortedByPriceDescProducts();
        return response()->json($products,200);


    }


    //puma products sort methods

    public function pumaSortNameAscProducts()

    {
        $model=new Product();
        $products=$model->pumaSortedByNameAscProducts();
        return response()->json($products,200);


    }


    public function pumaSortNameDescProducts()

    {
        $model=new Product();
        $products=$model->pumaSortedByNameDescProducts();
        return response()->json($products,200);


    }



    public function pumaSortPriceAscProducts()

    {
        $model=new Product();
        $products=$model->pumaSortedByPriceAscProducts();
        return response()->json($products,200);


    }


    public function pumaSortPriceDescProducts()

    {
        $model=new Product();
        $products=$model->pumaSortedByPriceDescProducts();
        return response()->json($products,200);


    }

    //new balance products sort methods

    public function nbSortNameAscProducts()

    {
        $model=new Product();
        $products=$model->nbSortedByNameAscProducts();
        return response()->json($products,200);


    }


    public function nbSortNameDescProducts()

    {
        $model=new Product();
        $products=$model->nbSortedByNameDescProducts();
        return response()->json($products,200);


    }



    public function nbSortPriceAscProducts()

    {
        $model=new Product();
        $products=$model->nbSortedByPriceAscProducts();
        return response()->json($products,200);


    }


    public function nbSortPriceDescProducts()

    {
        $model=new Product();
        $products=$model->nbSortedByPriceDescProducts();
        return response()->json($products,200);


    }

    //hummel products sort methods

    public function hummelSortNameAscProducts()

    {
        $model=new Product();
        $products=$model->hummelSortedByNameAscProducts();
        return response()->json($products,200);


    }


    public function hummelSortNameDescProducts()

    {
        $model=new Product();
        $products=$model->hummelSortedByNameDescProducts();
        return response()->json($products,200);


    }



    public function hummelSortPriceAscProducts()

    {
        $model=new Product();
        $products=$model->hummelSortedByPriceAscProducts();
        return response()->json($products,200);


    }


    public function hummelSortPriceDescProducts()

    {
        $model=new Product();
        $products=$model->hummelSortedByPriceDescProducts();
        return response()->json($products,200);


    }

}
