<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\StoreRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Task;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function checkout(Cart $cart) {

        $cart->update([
            'status' => 'Оформлено'
        ]);

        session()->flash('success', 'Вы успешно оформили заказ');

        return back();

    }

    public function index() {

        $activeCart = Cart::query()->where('status', 'Активно')->first();

        if($activeCart) {

            $tasks = $activeCart->tasks;

            $total = $activeCart->tasks->sum('price');

            return view('pages.carts.index', compact('tasks', 'activeCart', 'total'));

        }

        return view('pages.carts.index');

    }

    public function destroy(Cart $cart) {

        $cart->delete();

        session()->flash('success', 'Вы успешно очистили корзину');

        return back();

    }

    public function destroyCartTask(Cart $cart, Task $task) {

        Order::query()->where('cart_id', $cart->id)->where('task_id', $task->id)->delete();

        session()->flash('success', 'Вы успешно удалили товар из корзины');

        return back();

    }

    public function store(StoreRequest $request, Task $task) {

        $cart = Cart::query()->where('status', 'Активно')->first();

        if(!$cart) {

            $cartData = [
                'user_id' => auth()->user()->id,
            ];

            $cart = Cart::query()->create($cartData);

            $orderData = [
                'cart_id' => $cart->id,
                'task_id' => $task->id,
            ];

            $condition = $cart->tasks->contains('id', $task->id);

            if($condition) {

                session()->flash('error', 'Данный товар уже находится в корзине');

                return back();

            }

            Order::query()->create($orderData);

            session()->flash('success', 'Вы успешно добавили товар в корзину');

            return redirect()->route('cart.index');

        }

        $orderData = [
            'cart_id' => $cart->id,
            'task_id' => $task->id,
        ];

        $orderData['cart_id'] = $cart->id;

        $condition = $cart->tasks->contains('id', $task->id);

        if($condition) {

            session()->flash('error', 'Данный товар уже находится в корзине');

            return back();

        }

        Order::query()->create($orderData);

        session()->flash('success', 'Вы успешно добавили товар в корзину');

        return redirect()->route('cart.index');

    }
}
