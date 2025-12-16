namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'idCategory';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'idCategory',
        'name'
    ];
}
