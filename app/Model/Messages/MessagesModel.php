<?php

namespace App\Model\Messages;

use App\Model\Contacts\ContactsModel;
use Illuminate\Database\Eloquent\Model;

class MessagesModel extends Model
{
    protected $table = 'messages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'description',
        'contact_id',
    ];

    protected static $rules = [
        'default' => [
            'description' => 'required',
            'contact_id' => 'required|integer|exists:contacts,id',
        ],
        'update' => [
            'description' => 'required',
            'contact_id' => 'required|integer|exists:contacts,id',
        ],
    ];

    /**
     * @var array
     */
    protected static $messages = [

        //|---------------------------
        //| Validation: required
        //|---------------------------
        'description' => 'O campo :attribute é obrigatório.',
        'contact_id' => 'O campo :attribute é obrigatório.',

        'contact_id.exists' => 'O id do campo :attribute deve ser um registro existente.',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contact_id' => 'integer',
        'created_at' => 'date',
        'updated_at' => 'date',
    ];

    public function contacts()
    {
        return $this->belongsTo(ContactsModel::class, 'contact_id', 'id');
    }

}
