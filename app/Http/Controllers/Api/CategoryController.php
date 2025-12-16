namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // GET all categories
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Category::all()
        ]);
    }

    // POST create category
    public function store(Request $request)
    {
        $request->validate([
            'idCategory' => 'required|unique:categories,idCategory',
            'name' => 'required'
        ]);

        $category = Category::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Category created',
            'data' => $category
        ], 201);
    }

    // GET single category
    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $category
        ]);
    }

    // PUT update category
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 404);
        }

        $request->validate([
            'name' => 'required'
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Category updated',
            'data' => $category
        ]);
    }

    // DELETE category
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 404);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted'
        ]);
    }
}
