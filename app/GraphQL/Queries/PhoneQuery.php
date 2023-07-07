<?php
namespace App\GraphQL\Queries;

use App\Models\Phone;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class PhoneQuery extends Query
{
    protected $attributes = [
        "name" => "phone",
    ];
    public function type(): Type
    {
        return GraphQL::type("Phone");
    }
    public function args(): array
    {
        return [
            "id" => [
                "name" => "id",
                "type" => Type::int(),
                "rules" => ["required"],
            ],
        ];
    }
    public function resolve($root, $args)
    {
        return Phone::findOrFail($args["id"]);
    }
}
