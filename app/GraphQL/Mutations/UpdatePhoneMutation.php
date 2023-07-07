<?php
namespace App\graphql\Mutations;

use App\Models\Phone;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
class UpdatePhoneMutation extends Mutation
{
    protected $attributes = [
        "name" => "updatePhone",
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
                "type" => Type::nonNull(Type::int()),
            ],
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
            ],
        ];
    }
    public function resolve($root, $args)
    {
        $phone = Phone::findOrFail($args["id"]);
        $phone->fill($args);
        $phone->save();
        return $phone;
    }
}
