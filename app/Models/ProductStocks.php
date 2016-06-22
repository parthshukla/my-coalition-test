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

    /**
     * Validation rule for adding new product
     * information.
     *
     * @static 
     * @access  public
     */
    public static $rules = [
                      'name' => 'required|max:128',
                      'quantity' => 'required|integer',
                      'price_per_unit' => 'required|numeric'
                    ];

    //--------------------------------------------------------------------------

    /**
     * getStockDetails
     *
     * Returns the list of products with their 
     * inventory details.
     *
     * @static 
     * @access public
     * @return object
     */
    public static function getStockDetails()
    { 
      return Self::orderBy('created_at', 'desc')->get();

    }   

}
//end of class ProductStocks
//end of file ProductStocks
