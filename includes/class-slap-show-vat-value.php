<?php 

class SLAP_VAT_Value {

    public function run() {

        add_filter('woocommerce_get_price_html', 'edit_price_display', 10, 2);

        function edit_price_display () {
            global $product;
            $price = $product->price;
            
            $tax_rates = WC_Tax::get_rates( $product->get_tax_class() );
            if(!empty($tax_rates)) {
                $tax_rate = reset($tax_rates);
                $tax_cal = ($tax_rate['rate']/100)+1;
                
                $tax = number_format($price-($price/$tax_cal),2,',','');  
                echo '
                    <span class="price">
                        <span class="woocommerce-Price-amount amount">
                            <bdi>
                                <span class="woocommerce-Price-currencySymbol">€</span>
                                ' . $price . '  <span class="single-product-vat">
                                                    (inclui ' . $tax . '€ IVA '.$tax_rate['rate'].'%)
                                                </span>
                            </bdi>
                        </span>
                    </span>
                ';
            }
        }
    }
}