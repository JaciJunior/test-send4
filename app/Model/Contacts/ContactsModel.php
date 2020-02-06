<?php

namespace App\Model\Contacts;

use App\Model\Messages\MessagesModel;
use Illuminate\Database\Eloquent\Model;

class ContactsModel extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'surname',
        'telephone',
        'email'
    ];

    protected static $rules = [
        'default' => [
            'name' => 'required|max:50',
            'surname' => 'required|max:255',
            'telephone' => 'required|max:20',
            'email' => 'required|max:255',
        ],
    ];

    /**
     * @var array
     */
    protected static $messages = [

        //|---------------------------
        //| Validation: required
        //|---------------------------
        'name' => 'O campo :attribute é obrigatório.',
        'surname' => 'O campo :attribute é obrigatório.',
        'telephone' => 'O campo :attribute é obrigatório.',
        'email' => 'O campo :attribute é obrigatório.',

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
        'created_at' => 'date',
        'updated_at' => 'date',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function messages()
    {
        return $this->hasMany(MessagesModel::class, 'contact_id', 'id');
    }

}
