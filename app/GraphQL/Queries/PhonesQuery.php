<?php
namespace App\graphql\Queries;

use App\Models\Phone;
use App\Movie;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
class PhonesQuery extends Query
{
    protected $attributes = [
        "name" => "phones",
    ];
    public function type(): Type
    {
        return Type::listOf(GraphQL::type("Phone"));
    }
    public function resolve($root, $args)
    {
        return Phone::all();
    }
}
