<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class SessionController extends Controller
{
    /**
     * Destroy all session's values
     */
    public static function destroySession()
    {
        session()->forget('column-name');
        session()->forget('search-data');

        session()->forget('min-unit-price');
        session()->forget('max-unit-price');

        session()->forget('min-total-sum');
        session()->forget('max-total-sum');
    }

    /**
     * Handle session's values
     */
    public function setSession()
    {
        /**
         * If 'min unit price' and 'max unit price' were set by clicking
         * the button 'Set price values' in 'product' page
         *
         * @see public\build\assets\app.ab93cf8a.js --- 4. If click button 'Set price values'
         */
        if (request()->setMinMaxUnitPrise) {

            # Check user's input and existence of the session
            if (! request()->minUnitPrice || request()->minUnitPrice < 0) {
              request()->minUnitPrice = Product::min('unit_price');
            }
            if (! request()->maxUnitPrice || request()->maxUnitPrice < 0.01) {
              request()->maxUnitPrice = Product::max('unit_price');
            }

            # Set session
            session()->put('min-unit-price', request()->minUnitPrice);
            session()->put('max-unit-price', request()->maxUnitPrice);

            return TRUE;
        }

        /**
         * If a new 'columnName' was selected from 'Select data for search' menu
         *
         * @see public\build\assets\app.ab93cf8a.js -- 5. Set session for selected 'column' name
         */
        elseif (request()->selectedColumnName) {

            self::destroySession();
            session()->put('column-name', request()->selectedColumnName);

            return TRUE;
        }

        /**
         * If 'Reset search' button was clicked
         * @see public\build\assets\app.ab93cf8a.js --- 6. Reset search options to default values
         */
        elseif (request()->deleteSearchSession) {

            self::destroySession();

            return TRUE;
        }

        /**
         * If 'min total sum' and 'max total sum' were set by clicking
         * the button 'Set sum values' in 'orders' page
         *
         * @see public\build\assets\app.ab93cf8a.js --- 5. If click button 'Set sum values' for 'order' page
         */
        elseif (request()->setMinMaxTotalSum) {

            # Check user's input and existence of the session
            if (! request()->minTotalSum || request()->minTotalSum < 0) {
              request()->minTotalSum = Order::min('total_sum');
            }
            if (! request()->maxTotalSum || request()->maxTotalSum < 0.01) {
              request()->maxTotalSum = Order::max('total_sum');
            }

            # Set session
            session()->put('min-total-sum', request()->minTotalSum);
            session()->put('max-total-sum', request()->maxTotalSum);

            return TRUE;
        }
    }

    /**
     * Set sessions values for 'product' page
     */
    public static function setSessionValuesForProducts()
    {
        $minUnitPrice = Product::min('unit_price');
        $maxUnitPrice = Product::max('unit_price');

        session()->put('min-unit-price', $minUnitPrice);
        session()->put('max-unit-price', $maxUnitPrice);
    }

    /**
     * Set sessions values for 'orders' page
     */
    public static function setSessionValuesForOrders()
    {
        $minUnitPrice = Order::min('total_sum');
        $maxUnitPrice = Order::max('total_sum');

        session()->put('min-total-sum', $minUnitPrice);
        session()->put('max-total-sum', $maxUnitPrice);
    }
}
