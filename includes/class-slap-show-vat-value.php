<?php 

class SLAP_VAT_Value {

    public function run() {

        add_filter('woocommerce_get_price_html', 'edit_price_display', 10, 2);

        function edit_price_display ($product) {
            global $product;
            $price = $product->get_price();
            $sale_price = wc_price( wc_get_price_to_display( $product, array( 'price' => $product->get_sale_price() ) ) );
            $regular_price = wc_price( wc_get_price_to_display( $product, array( 'price' => $product->get_regular_price() ) ) );
            
            $tax_rates = WC_Tax::get_rates( $product->get_tax_class() );
            if(!empty($tax_rates) ) {
                $tax_rate = reset($tax_rates);
                $tax_cal = ($tax_rate['rate']/100)+1;
                
                $tax = number_format($price-($price/$tax_cal),2,',','');  
                
                if( $product->is_on_sale() ) {
                    echo '
                        <span class="price">
                            <span class="woocommerce-Price-amount amount">
                                <bdi>
                                    <span style="opacity: 0.8; text-decoration: line-through">' . $regular_price . '</span>
                                    <span>' . $sale_price .'</span>
                                    <span class="single-product-vat">
                                                        (inclui ' . $tax . '€ IVA '.$tax_rate['rate'].'%)
                                                    </span>
                                </bdi>
                            </span>
                        </span>
                    ';
                } else {
                    echo '
                        <span class="price">
                            <span class="woocommerce-Price-amount amount">
                                <bdi>
                                    <span class="woocommerce-Price-currencySymbol">€</span>
                                    <span>' . $regular_price . '</span>
                                    <span class="single-product-vat">
                                                        (inclui ' . $tax . '€ IVA '.$tax_rate['rate'].'%)
                                                    </span>
                                </bdi>
                            </span>
                        </span>
                    ';
                }
            } else {
                echo '
                    <span class="price">
                        <span class="woocommerce-Price-amount amount">
                            <bdi>
                                <span class="woocommerce-Price-currencySymbol">€</span>
                                ' . $price . '
                            </bdi>
                        </span>
                    </span>
                ';
            }
        }
    }
}