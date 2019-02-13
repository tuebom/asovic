<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-globe"></i> AdminLTE, Inc.
                            <small class="pull-right">Date: <?=$this->data['order']->tglinput?></small>
                        </h2>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                        Billing
                        <address>
                            <strong><?=$this->data['order']->name?></strong><br>
                            <?=$this->data['order']->address?><br>
                            <?=$this->data['order']->district?>, <?=$this->data['order']->regency?><br>
                            <?=$this->data['order']->province?>, <?=$this->data['order']->post_code?><br><br>
                            Phone: <?=$this->data['order']->phone?><br>
                            Email: <?=$this->data['order']->email?>
                        </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                        Shipping
                        <address>
                            <strong><?=$this->data['order']->name?></strong><br>
                            <?=$this->data['order']->address?><br>
                            <?=$this->data['order']->district?>, <?=$this->data['order']->regency?><br>
                            <?=$this->data['order']->province?>, <?=$this->data['order']->post_code?><br><br>
                            Phone: <?=$this->data['order']->phone?><br>
                            Email: <?=$this->data['order']->email?>
                        </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                        <!-- <b>Invoice #<?=$this->data['order']->id?></b><br> -->
                        <br>
                        <b>Order ID:</b> <?=$this->data['order']->id?><br>
                        <b>Payment Due:</b> 2/22/2014<br>
                        <!-- <b>Account:</b> 968-34567 -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Item Code</th>
                                <th>Description</th>
                                <th class="text-right">Qty</th>
                                <th class="text-right">Price</th>
                                <th class="text-right">Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-right"><?=$order_detail->urut;?></td>
                                <td><?=$order_detail->kdbar;?></td>
                                <td><?=$order_detail->nama;?></td>
                                <td class="text-right"><?=$order_detail->qty;?></td>
                                <td class="text-right">Rp<?=number_format($order_detail->hjual, 0, '.', ',');?></td>
                                <td class="text-right">Rp<?=number_format($order_detail->jumlah, 0, '.', ',');?></td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">
                        <p class="lead">Delivery Method:</p>
                        <img src="<?=base_url('images/'.$this->data['order']->delivery.'png') ?>" alt="Visa">
                        <!-- <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                        <img src="../../dist/img/credit/american-express.png" alt="American Express">
                        <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->

                        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                            <?= $this->data['order']->note ?>
                        </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-6">
                        <p class="lead">Amount Due -</p>

                        <div class="table-responsive">
                            <table class="table">
                            <tbody><tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>Rp<?=number_format($this->data['order']->total, 0, '.', ',');?></td>
                            </tr>
                            <tr>
                                <th>Tax</th>
                                <td>Rp<?=number_format($this->data['order']->tax, 0, '.', ',');?></td>
                            </tr>
                            <tr>
                                <th>Shipping:</th>
                                <td>Rp<?=number_format($this->data['order']->shipcost, 0, '.', ',');?></td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>Rp<?=number_format($this->data['order']->gtotal, 0, '.', ',');?></td>
                            </tr>
                            </tbody></table>
                        </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                        <!-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->
                        <a href="#" class="btn btn-default btn-update"><i class="fa fa-save"></i> Update</a>
                        <!-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                        </button>
                        <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                            <i class="fa fa-download"></i> Generate PDF
                        </button> -->
                        </div>
                    </div>
                </section>
            </div>

    
<script type="text/javascript">
    $(document).ready(function() {
        
        $('.btn-update').click(function(event) {
            event.preventDefault();
            $('#frmOrder').submit();
        });
        
        $('#order-status').change(function(){
            $.ajax({
                type: "POST",
                url: "<?php echo site_url();?>orders/level2/"+$(this).val(),
                // dataType: "json",
                // data: {"id":$(this).val()},
                success:function(json){
                    var data = json.data,
                        firstid = data[0].kdgol2;

                    $('#kdgol2').html('');
                    for (var i = 0; i < data.length; i++) {
                        $('#kdgol2').append('<option value="'+data[i].kdgol2+'">'+data[i].nama+'</option>')
                    }

                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url();?>orders/level3/"+firstid,
                        success:function(json){
                            var data = json.data;
                            $('#kdgol3').html('');
                            for (var i = 0; i < data.length; i++) {
                                $('#kdgol3').append('<option value="'+data[i].kdgol3+'">'+data[i].nama+'</option>')
                            }
                        },
                    });
                },
            });
        });
    });
</script>
