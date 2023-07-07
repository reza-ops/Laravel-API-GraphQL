<?php
namespace App\graphql\Mutations;

use App\Models\Phone;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Validator;
use Rebing\GraphQL\Support\Facades\GraphQL;
class CreatePhoneMutation extends Mutation
{
    protected $attributes = [
        "name" => "createPhone",
    ];
    public function type(): Type
    {
        return GraphQL::type("Phone");
    }
    public function args(): array
    {
        return [
            "name" => [
                "name" => "name",
                "type" => Type::nonNull(Type::string()),
            ],
            "description" => [
                "name" => "description",
                "type" => Type::nonNull(Type::string()),
            ],
            "price" => [
                "name" => "price",
                "type" => Type::nonNull(Type::int()),
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $phone = new Phone();
        $phone->fill($args);
        $phone->save();
        return $phone;
    }
}
