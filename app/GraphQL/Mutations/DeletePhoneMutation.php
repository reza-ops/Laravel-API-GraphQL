<?php
namespace App\graphql\Mutations;

use App\Models\Phone;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
class DeletePhoneMutation extends Mutation
{
    protected $attributes = [
        "name" => "deletePhone",
    ];
    public function type(): Type
    {
        return Type::boolean();
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
        $phone = Phone::findOrFail($args["id"]);
        return $phone->delete() ? true : false;
    }
}
