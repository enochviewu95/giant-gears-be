<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{

    /**
     * The function creates a new product using the validated data from a ProductRequest object.
     * 
     * @param ProductRequest productRequest The `ProductRequest` parameter in the `createProduct` function
     * is likely a class that contains the validation rules and logic for validating incoming product data
     * before creating a new product. It is commonly used in Laravel applications for form validation.
     * 
     * @return Product The `createProduct` function is returning an instance of the `Product` class.
     */
    public function createProduct(ProductRequest $productRequest): Product
    {
        $product = Product::create($productRequest->validated());
        return $product;
    }


    /**
     * The function `getProducts` returns an array of products in descending order of creation.
     * 
     * @return array An array of products is being returned, with the products sorted by the latest
     * created date.
     */
    public function getProducts(): LengthAwarePaginator
    {
        return Product::latest()->paginate();
    }



    /**
     * The function getProduct takes a Product object as input and returns the same Product object.
     * 
     * @param Product product The `getProduct` function is a method that takes a `Product` object as a
     * parameter and returns the same `Product` object. It simply accepts a `Product` object and then
     * immediately returns it.
     * 
     * @return Product The `getProduct` function is returning the `` object of type `Product`.
     */
    public function getProduct(Product $product): Product
    {
        return $product;
    }


    /**
     * The function `updateProduct` updates a product and returns a status message based on the success or
     * failure of the update.
     * 
     * @param Product product The `updateProduct` function takes two parameters:
     * @param ProductRequest productRequest The `updateProduct` function you provided takes two parameters:
     * `` of type `Product` and `` of type `ProductRequest`.
     * 
     * @return array An array is being returned with a "status" key and a "message" key. The "status" key
     * will have a value of either "success" or "fail" depending on the outcome of the update operation.
     * The "message" key will provide additional information about the outcome, either "update successful"
     * or "update failed".
     */
    public function updateProduct(Product $product, ProductRequest $productRequest): array
    {
        $response = $product->update($productRequest->validated());
        if ($response) {
            return [
                "status" => "success",
                "message" => "update successful"
            ];
        }
        return [
            "status" => "fail",
            "message" => "update failed"
        ];
    }

 /**
  * The function `deleteProduct` deletes a product and returns a status message indicating success or
  * failure.
  * 
  * @param Product product The `deleteProduct` function takes a `Product` object as a parameter and
  * attempts to delete it from the database. If the deletion is successful, it returns an array with a
  * "success" status and a message indicating that the delete was successful. If the deletion fails, it
  * returns an array with
  * 
  * @return array An array is being returned with the keys "status" and "message" indicating the
  * success or failure of the delete operation.
  */
    public function deleteProduct(Product $product): array
    {
        $response = $product->delete();
        if ($response) {
            return [
                "status" => "success",
                "message" => "delete successful"
            ];
        }
        return [
            "status" => "fail",
            "message" => "delete failed"
        ];
    }


    public function deletedSelectedProduct():string
    {
        return 'Deleted selected products';
    }

}
