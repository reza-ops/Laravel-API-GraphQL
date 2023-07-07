<?php
namespace App\GraphQL\Types;

use App\Models\Phone;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
class PhoneType extends GraphQLType
{
    protected $attributes = [
        "name" => "Phone",
        "description" => "Collection of phones",
        "model" => Phone::class,
    ];
    public function fields(): array
    {
        return [
            "id" => [
                "type" => Type::nonNull(Type::int()),
                "description" => "Id of a particular phone",
            ],
            "name" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "The name of the phone",
            ],
            "description" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "The description of the phone",
            ],
            "price" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "The price of the phone",
            ],
        ];
    }
}
