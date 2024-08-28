    <?php

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProveedoresController;

    Route::get('/proveedor', [ProveedoresController::class, 'index']);
    Route::post('/proveedor', [ProveedoresController::class, 'crear']);
    Route::get('/proveedor/{id}', [ProveedoresController::class, 'buscar']);
    Route::put('/proveedor/{id}', [ProveedoresController::class, 'actualizar']);
    Route::patch('/proveedor/{id}', [ProveedoresController::class, 'actualizarParcial']);
    Route::delete('/proveedor/{id}', [ProveedoresController::class, 'borrar']);
