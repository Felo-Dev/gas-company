    <?php

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProveedoresController;
    use App\Http\Controllers\CalidadControllers;
    use App\Http\Controllers\ClientesControllers;

    Route::get('/proveedor', [ProveedoresController::class, 'index']);
    Route::post('/proveedor', [ProveedoresController::class, 'crear']);
    Route::get('/proveedor/{id}', [ProveedoresController::class, 'buscar']);
    Route::put('/proveedor/{id}', [ProveedoresController::class, 'actualizar']);
    Route::patch('/proveedor/{id}', [ProveedoresController::class, 'actualizarParcial']);
    Route::delete('/proveedor/{id}', [ProveedoresController::class, 'borrar']);

    Route::get('calidades', [CalidadControllers::class, 'index']);
    Route::post('calidades', [CalidadControllers::class, 'crear']);
    Route::get('/calidades/{id}', [CalidadControllers::class, 'buscar']);
    Route::put('/calidades/{id}', [CalidadControllers::class, 'actualizar']);
    Route::patch('/calidades/{id}', [CalidadControllers::class, 'actualizarParcial']);
    Route::delete('/calidades/{id}', [CalidadControllers::class, 'borrar']);

    Route::get('/cliente', [ClientesControllers::class, 'index']);
    Route::post('/cliente', [ClientesControllers::class, 'crear']);
    Route::get('/cliente/{id}', [ClientesControllers::class, 'buscar']);
    Route::delete('/cliente/{id}', [ClientesControllers::class, 'borrar']);
    Route::put('/cliente/{id}', [ClientesControllers::class, 'actualizar']);
    Route::patch('/cliente/{id}', [ClientesControllers::class, 'actualizarParcial']);

