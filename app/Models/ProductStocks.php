<?php

namespace CoalitionTest\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * ProductStocks class.
 *
 * @since  1.0.0
 * @version 1.0.0
 * @author  Parth Shukla <shuklaparth@hotmail.com>
 */
class ProductStocks extends Model
{
    /**
     * table to be used by this model.
     *
     * @access protected
     * @since 1.0.0
     */
    protected $table = 'product_stocks';

    protected $totalValue;

    //--------------------------------------------------------------------------

    public static function getStockDetails()
    {
        $stockInfo = [];
        //$dbResult = Self::orderBy('created_at', 'desc')->get();

        return Self::orderBy('created_at', 'desc')->get();

        if ($dbResult)
        {
            foreach($dbResult as $row)
            {
                $stockInfo[] = [
                               'id' => $row->id,
                               'name' => $row->name,
                               'quantity' => $row->quantity,
                               'price_per_item' => $row->price_per_item,
                               'created_at' => $row->created_at,
                               'value' => $row->quantity * $row->price_per_item
                           ];

                $totalValue += ($row->quantity * $row->price_per_item);
            }
        }
    }   

}
//end of class ProductStocks
//end of file ProductStocks
