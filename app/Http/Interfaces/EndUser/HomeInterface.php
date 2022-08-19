<?php
namespace App\Http\Interfaces\EndUser;

interface HomeInterface {

    public function index();

    public function showCategory();

    public function getProducts($categorySlug);


}
