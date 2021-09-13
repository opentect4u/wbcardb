<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/************************************************************ 
 * This Controller is used for Reports                      *
 *                                                          * 
 ************************************************************/

class Report extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->model('Process');
        $this->load->model('Reports');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url','pharmacy_helper'));
    }

    public function openStock(){                    /**Opening Stock report for every year */
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $year   =  $_POST['stk_yr'];

            $stock['item'] = $this->Reports->f_get_open_stk($year);

            // $this->load->view('dashboard/header');

            // $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/open_stock/openStockRep.php',$stock);

            $this->load->view('dashboard/footer');
            
        }else{

            // $this->load->view('dashboard/header');

            // $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/open_stock/openStockIp.php');

            $this->load->view('dashboard/footer');
        }
    }

/**Itemwise Stock Report */    
 
    public function stockRep(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $prod   =  $_POST['prod'];

            $date   =  $_POST['from_dt'];

            $mth    =  date('n',strtotime($date));

            $yr     =  date('Y',strtotime($date));

            if($mth > 3){

                $year = $yr;

            }else{

                $year = $yr - 1;
            }

            $dt     =  date($year.'-04-01');

            $item['batch'] = $this->Reports->f_get_batch($prod);

            $item['name']  = $this->Reports->f_get_name($prod);

            $item['opn']   = $this->Reports->f_get_opening($prod,$dt);

            $item['pur']   = $this->Reports->f_get_purchase($prod,$dt,$date);

            $item['sale']  = $this->Reports->f_get_sale($prod,$dt,$date);

            $item['cls']   = $this->Reports->f_get_tot_qty($prod,$dt,$date);

            // $this->load->view('dashboard/header');

            // $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/stock/stockRep.php',$item);
            
            $this->load->view('dashboard/footer');
        }else{

            $data['product'] = $this->Process->fetch_product();
            // $this->load->view('dashboard/header');

            $this->load->view('dashboard/menu');

            $this->load->view('report/stock/stockRepIp',$data);

            $this->load->view('dashboard/footer');
        }
    }

/**Purchase Book Report */
    public function purchaseBook(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $from   =  $_POST['from_dt'];

            $to     =  $_POST['to_dt'];

            $item['purc'] = $this->Reports->f_purchase($from,$to);

            $item['tot']  = $this->Reports->f_tot_purchase($from,$to);

            //$item['comp'] = $this->Reports->f_get_comp();

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/purchase_book/purchaseBookRep.php',$item);
            
             $this->load->view('dashboard/footer');
        }else{
            
            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/purchase_book/purchaseBookIp');
             $this->load->view('dashboard/footer');
        }
    }
/**Sale Book Report */
    public function saleBook(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $from   =  $_POST['from_dt'];

            $to     =  $_POST['to_dt'];

            $item['sale'] = $this->Reports->f_sale($from,$to);

            $item['tot']  = $this->Reports->f_tot_sale($from,$to);

            $this->load->view('dashboard/header');

            // $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/sale_book/saleBookRep.php',$item);

             $this->load->view('dashboard/footer');
            
        }else{
            
            $this->load->view('dashboard/header');

            // $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/sale_book/saleBookIp');

            $this->load->view('dashboard/footer');
        }
    }
/**Friday Return  Report */
public function fridayrtn(){
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $from   =  $_POST['from_dt'];

        $to     =  $_POST['to_dt'];

        $item['sale'] = $this->Reports->f_fridayrtn($from,$to);

         $item['tot']  = $this->Reports->f_tot_fridayrtn($from,$to);

        $this->load->view('dashboard/header');

        // $this->load->view('dashboard/nav');

        $this->load->view('dashboard/menu');

        $this->load->view('report/friday_rtn_rep/fridayrtnRep.php',$item);

         $this->load->view('dashboard/footer');
        
    }else{
        
        $this->load->view('dashboard/header');

        // $this->load->view('dashboard/nav');

        $this->load->view('dashboard/menu');

        $this->load->view('report/friday_rtn_rep/fridayrtnIp');

        $this->load->view('dashboard/footer');
    }
}

    public function itempurchase(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $prod   =  $_POST['prod'];

            $from   =  $_POST['from_dt'];

            $to     =  $_POST['to_dt'];

            $item['itmpurc'] = $this->Reports->f_item_purchase($from,$to,$prod);

            $item['name']    = $this->Reports->f_get_name($prod);

            $item['tot']     = $this->Reports->f_tot_item_purchase($from,$to,$prod);

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/item_purchase/ItempurchaseBook.php',$item);

             $this->load->view('dashboard/footer');
            
        }else{

            $data['product'] = $this->Process->fetch_product();
            
            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/item_purchase/itemPurchaseIp',$data);

             $this->load->view('dashboard/footer');
        }
    }
    
/**Itemwise sale report */
    public function itemsale(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $prod   =  $_POST['prod'];

            $from   =  $_POST['from_dt'];

            $to     =  $_POST['to_dt'];

            $item['itmsal'] = $this->Reports->f_item_sale($from,$to,$prod);

            $item['name']    = $this->Reports->f_get_name($prod);

            $item['tot']     = $this->Reports->f_tot_item_sale($from,$to,$prod);

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/item_sale/ItemsaleBook.php',$item);

             $this->load->view('dashboard/footer');
            
        }else{

            $data['product'] = $this->Process->fetch_product();
            
            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');
            $this->load->view('report/item_sale/itemSaleIp',$data);

             $this->load->view('dashboard/footer');
        }
    }

/**Stock report as on a supplied date */   

    public function totStockRep(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $date   =  $_POST['stk_dt'];

            $mth    =  date('n',strtotime($date));

            $yr     =  date('Y',strtotime($date));

            if($mth > 3){

                $year = $yr;

            }else{

                $year = $yr - 1;
            }

            $dt     =  date($year.'-04-01');

            $item['qty'] = $this->Reports->f_get_all_qty($dt,$date);

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/total_stk/totStockRep',$item);

             $this->load->view('dashboard/footer');
            
        }else{

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');
            $this->load->view('report/total_stk/totStockIp');

            $this->load->view('dashboard/footer');
        }
    }

}