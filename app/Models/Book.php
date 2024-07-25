<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Elastic\ScoutDriverPlus\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    // Khi thêm trait Searchable Laravel Scout tự động đồng bộ hóa các thay đổi của dữ liệu với chỉ mục Elasticsearch khi thêm, sửa hoặc xóa dữ liệu.
    use HasFactory, Searchable, SoftDeletes;

    protected $table = 'books';

    protected $dates = ['deleted_at'];

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
            ],
            'created_at' => [
                'type' => 'date'
            ],
            'deleted_at' => [
                'type' => 'date'
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
            'name'          => $array['name'],
            'author'        => $array['author'],
            'nation'        => $array['nation'],
            'price'         => $array['price'],
            'created_at'    => $array['created_at'],
            'deleted_at'    => $this->deleted_at
        ];
    }
}
