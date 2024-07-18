<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Elastic\ScoutDriverPlus\Searchable;

class Book extends Model
{
    use HasFactory, Searchable;

    protected $table = 'books';

    protected $fillable = [
       'name',
       'author',
       'price',
       'nation',
       'desc',
       'status',
    ];

   protected $mapping = [
       'properties' => [
           'name' => [
               'type' => 'text',
               'analyzer' => 'standard'
           ],
           'author' => [
               'type' => 'keyword'
           ],
           'nation' => [
               'type' => 'text',
               'analyzer' => 'standard'
           ],
           'price' => [
               'type' => 'integer'
           ]
       ]
   ];

   public function searchableAs(): string
   {
       return 'books_index';
   }

   public function toSearchableArray(): array
   {
       $array = $this->toArray();

       return [
           'name' => $array['name'],
           'author' => $array['author'],
           'nation' => $array['nation'],
           'price' => $array['price']
       ];
   }
}
