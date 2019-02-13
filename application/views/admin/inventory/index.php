<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo anchor('admin/inventory/create', '<i class="fa fa-plus">&nbsp</i> Add New Item', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- <form class="frmpaging" action="<?= site_url('admin/inventory/setpaging'); ?>" method="post"> -->
                                            <div class="dataTables_length" id="example1_length">
                                            <label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                                                <option value="10"<?= (!isset($_SESSION['paging'])) ? '': ($_SESSION['paging']=='10') ? ' selected="selected"':''; ?>>10</option>
                                                <option value="25"<?= (!isset($_SESSION['paging'])) ? '': ($_SESSION['paging']=='25') ? ' selected="selected"':''; ?>>25</option>
                                                <option value="50"<?= (!isset($_SESSION['paging'])) ? '': ($_SESSION['paging']=='50') ? ' selected="selected"':''; ?>>50</option>
                                                <option value="100"<?= (!isset($_SESSION['paging'])) ? '': ($_SESSION['paging']=='100') ? ' selected="selected"':''; ?>>100</option>
                                            </select> entries</label></div><!--</form>--></div>
                                        <div class="col-sm-6">
                                            <form class="frmfilter" action="<?= site_url('admin/inventory'); ?>" method="get"><div id="search_filter" class="dataTables_filter"><label>Search:<input type="search" name="q" value="<?=isset($_SESSION['q'])?$_SESSION['q']:''; ?>" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></form></div></div>
                                </div>
                                <div class="box-body table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-right">No.</th>
                                                <th><?= lang('inventory_kdbar'); ?></th>
                                                <th><?= lang('inventory_kdurl'); ?></th>
                                                <th><?= lang('inventory_name'); ?></th>
                                                <th><?= lang('inventory_group'); ?></th>
                                                <!-- <th>Gol. 2</th> -->
                                                <th><?= lang('inventory_unit'); ?></th>
                                                <th><?= lang('inventory_brand'); ?></th>
                                                <th class="text-right"><?= lang('inventory_price'); ?></th>
                                                <th><?= lang('inventory_picture'); ?></th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php 
    $index = (int)$_SESSION['start'];
    foreach ($inventory as $item):?>
                                            <tr>
                                                <td class="text-right"><?= ++$index; ?></td>
                                                <td><?php echo anchor('admin/inventory/edit/'.$item->kdurl, htmlspecialchars($item->kdbar, ENT_QUOTES, 'UTF-8')); ?></td>
                                                <td><?php echo htmlspecialchars($item->kdurl, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($item->nama, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($item->nmgol, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <!-- <td><?php echo htmlspecialchars($item->kdgol2, ENT_QUOTES, 'UTF-8'); ?></td> -->
                                                <td><?php echo htmlspecialchars($item->satuan, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($item->merk, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td class="text-right"><?php echo htmlspecialchars($item->hjual, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><div class="product-img"><img src="<?=site_url($this->data['products_dir'].'/'.$item->gambar)?>" alt="Image"></div></td>
                                                <td>
                                                    <?php echo anchor('admin/inventory/edit/'.$item->kdurl, 'Edit'); ?>
                                                </td>
                                            </tr>
<?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="box-footer" align="center">
									<?php echo $this->data['pagination']; ?>
								</div>

                            </div>
                         </div>
                    </div>
                </section>
            </div>

<script type="text/javascript">
$(document).ready(function(){
        
    $('.dataTables_length').change(function(){
        $.ajax({
            type: "POST",
            url: <?php echo '"'.site_url().'admin/inventory/setpaging/"' ?> + $('.dataTables_length option:selected').val(),
            success:function(json){
                // var data = json.data;
                location.reload();
            }
        });
    });
});
</script>