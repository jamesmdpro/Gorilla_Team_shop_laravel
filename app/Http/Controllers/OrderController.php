<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // Mostrar un pedido
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }

    // Guardar un nuevo pedido
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'items' => 'required|array',
            'total' => 'required|numeric',
        ]);

        // Obtener los productos del carrito desde la petición
        $cartItems = $validated['items'];

        // Iniciar una transacción para asegurar la integridad de los datos
        DB::beginTransaction();

        try {
            // Crear la orden
            $order = Order::create([
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'address' => $validated['address'],
                'city' => $validated['city'],
                'total' => $validated['total'],
            ]);

            // Crear los order items
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['productId'], // Usar productId del JavaScript
                    'variant_name' => $item['variantName'], // Agregar nombre de variante
                    'quantity' => $item['quantity'],
                    'price' => $item['price'], // Precio al momento de la compra
                ]);
            }

            // Commit la transacción
            DB::commit();

            // Retornar respuesta JSON para AJAX
            return response()->json([
                'success' => true,
                'message' => 'Pedido creado exitosamente',
                'order_id' => $order->id
            ]);

        } catch (\Exception $e) {
            // Rollback la transacción en caso de error
            DB::rollback();

            // Retornar error JSON
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el pedido: ' . $e->getMessage()
            ], 500);
        }
    }

    // Actualizar un pedido
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
        ]);

        $order->update($validated);

        return redirect()->route('orders.show', $order->id);
    }

    // Eliminar un pedido
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index');
    }
}