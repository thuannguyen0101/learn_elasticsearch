<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Elastic\ScoutDriverPlus\Searchable;

class Book extends Model
{
    // Khi thêm trait Searchable Laravel Scout tự động đồng bộ hóa các thay đổi của dữ liệu với chỉ mục Elasticsearch khi thêm, sửa hoặc xóa dữ liệu.
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

    /**
     * @var array[]
     * Chỉ định cách các trường dữ liệu được index
     */
    protected $mapping = [
        'properties' => [
            'name'   => [
                'type'     => 'text',
                'analyzer' => 'standard'
            ],
            'author' => [
                'type' => 'keyword'
            ],
            'nation' => [
                'type'     => 'text',
                'analyzer' => 'standard'
            ],
            'price'  => [
                'type' => 'integer'
            ]
        ]
    ];

    /**
     * @return string
     * Chỉ định tên của index
     */
    public function searchableAs(): string
    {
        return 'books_index';
    }

    /**
     * @return array
     * Chỉ định các trường dữ liệu được index
     */
    public function toSearchableArray(): array
    {
        $array = $this->toArray();

        return [
            'name'   => $array['name'],
            'author' => $array['author'],
            'nation' => $array['nation'],
            'price'  => $array['price']
        ];
    }
}
