<?php
namespace App\Model\Stores;

use App\Model\Licensors\LicensorStore;
use App\Model\Products\Product;
use App\Model\Projects\Project;
use App\Model\Stores\Account;
use App\Model\Stores\Contact;
use App\Model\Stores\Hour;
use App\Model\Stores\Stores;
use App\Model\Stores\StoresAddress;
use App\Model\Stores\StoresCategory;
// use App\Support\Model\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Stores extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stores';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name',
        'email',
        'logo',
        'phone',
        'website',
        'description',
        // 'pin',
        'addresses',
        'active',
        'hours',
        'avatar',
        'accounts',
        'contacts',
        'categories',

    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'store_id', 'id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'store_id', 'id');
    }
    /**
     * Fetch trading hours that belongs to the store
     */
    public function hours()
    {
        return $this->belongsToMany(Hour::class, 'store_hours', 'store_id', 'hour_id');
    }

    public function categories()
    {
        return $this->belongsToMany(StoresCategory::class, 'store_categories', 'store_id', 'category_id');
    }

    public function addresses()
    {
        return $this->belongsToMany(StoresAddress::class, 'store_addresses', 'store_id', 'address_id', 'id');
    }

    /**
     * Fetch locations that belongs to the store
     */
    public function locations()
    {
        return $this->belongsToMany(Location::class, 'stores_locations', 'store_id', 'location_id');
    }

    /**
     * Fetch locations that belongs to the store
     */
    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'stores_contacts', 'store_id', 'contact_id');
    }

    /**
     * Fetch locations that belongs to the store
     */
    public function accounts()
    {
        return $this->belongsToMany(Account::class, 'stores_account', 'store_id', 'account_id');
    }
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function storeLicensor()
    {
        return $this->hasMany(LicensorStore::class, 'store_id');
    }
    public function licensor()
    {
        return $this->hasOne(LicensorStore::class, 'store_id', 'id');
    }
}