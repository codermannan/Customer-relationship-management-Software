<ul class="dropdown-menu search-results animated fadeIn" id="top_search_dropdown" style="display: block; width: 100%; height: 400px;">
   <?php
   $total = 0;
   foreach($result as $heading => $results){
    if(count($results) > 0){
        $total++;
        ?>
        <li role="separator" class="divider"></li>
        <li class="dropdown-header"><?php echo ucwords(str_replace('_',' ',$heading)); ?></li>
        <?php } ?>
        <?php foreach($results as $val){
            $data = '';
            switch($heading){
                case 'people':
                $data = '<a class="searchDesign" href="'.base_url().'index.php?admin/manage_people/'.$val['id'].'">'
                        . ''.$val['FullName'].'<br/>'.$val['designation'].'<br/>Cellular:'.$val['mobile'] .'<br/>Email:'.$val['email'].'</a>';
                break;
                case 'company':
                $data = '<a class="searchDesign" href="'.base_url().'index.php?admin/manage_company/'.$val['com_id'].'">'
                        . ''.$val['com_name'].'<br/>'.$val['com_address'].'<br/>Phone#'.$val['com_phone1'] .'</a>';
                break;
                case 'quotation':
                $data = '<a class="searchDesign" href="'.base_url().'index.php?admin/manage_quotation/list/'.$val['quotation_no'].'">'
                        . ''.$val['quotation_no'].'<br/>Comapny # '.$val['com_name'].'</a>';
                break;
                case 'FPI':
                $data = '<a class="searchDesign" href="'.base_url().'index.php?admin/manage_orders/list/'.$val['id'].'">'
                        . ''.$val['order_no'].'<br/>Comapny # '.$val['com_name'].'</a>';
                break;
                case 'product':
                $data = '<a class="searchDesign" href="'.base_url().'index.php?admin/product_management/'.$val['pid'].'">'
                        . ''.$val['item_code'].'<br/>Product Name # '.$val['item_name'].'<br/>Price # '.$val['original_price'].'</a>';
                break;
                case 'expense':
                $data = '<a class="searchDesign" href="'.base_url().'index.php?admin/expense_management/list/'.$val['exp_id'].'">'
                        . 'Bill No :'.$val['bill_no'].'<br/>Total : '.$val['total_amount'].'<br/>User : '.$val['user_id'].'</a>';
                break;
            }
            ?>
            <li><?php echo $data; ?></li>
            <?php } ?>
    <?php } ?>
            <?php if($total == 0){ ?>
            <li class="padding-5 text-center"><img src="<?php echo base_url();?>assets/images/ajax-loader.gif" alt="Loading..." id="loading" /></li>
            <?php }?>
</ul>

