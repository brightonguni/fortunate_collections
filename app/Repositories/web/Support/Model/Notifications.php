<?php
    namespace App\Support\Model;
    use App\Permissions\Model\RoleUser;
    use Illuminate\Database\Eloquent\Model;

    class Notifications extends Model {

        /**Category
         * The table associated with the model.
         *
         * @var string
         */
        protected $table = 'notifications';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'type', 'message', 'variables', 'active', 'severity',
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];

        /**
         * The attributes that should be cast to native types.
         *
         * @var array
         */
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];
//

    }
