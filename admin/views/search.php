<h4 style="margin-top:0;padding-top:20px;">Result for "<?= $word ?>" keyword:</h4>
<?php 
    foreach ($search['searchmat'] as $key => $value)
	{
        if( strpos(strtolower($key), $word) !== false && $search['searchmat'][$key][0]['category'] == $category ):
?>
			<div class="row">
			    <div class="col-md-7">
			        <div class="panel panel-default">
			            <div class="panel-heading">
			                <?= '<h3><a href="'.base_url($search['searchmat'][$key][0]['link']).'">'.str_replace('_', " ", $key).'</a></h3>'; ?>
			            </div>
			            <div class="panel-body">
			                <?= strlen($value[0]['detail']) > 245 ? substr($value[0]['detail'],0,245)."..." : $value[0]['detail']; ?>
			            </div>
			            <div class="panel-footer">
			            	<?= 'source: <a href="'.base_url($search['searchmat'][$key][0]['link']).'">'.base_url($value[0]['link']).'</a>' ?>
			            </div>
			        </div>
			    </div>
			</div>
<?php
		elseif( strpos(strtolower($value[0]['detail']), $word) !== false && $search['searchmat'][$key][0]['category'] == $category ):
?>
			<div class="row">
			    <div class="col-md-7">
			        <div class="panel panel-default">
			            <div class="panel-heading">
			                <?= '<h3><a href="'.base_url($value[0]['link']).'">'.str_replace('_', " ", $key).'</a></h3>'; ?>		            	
			            </div>
			            <div class="panel-body">
			                <?= strlen($value[0]['detail']) > 245 ? substr($value[0]['detail'],0,245)."..." : $value[0]['detail']; ?>
			            </div>
			            <div class="panel-footer">
			            	<?= 'source: <a href="'.base_url($value[0]['link']).'">'.base_url($value[0]['link']).'</a>' ?>
			            </div>
			        </div>
			    </div>
			</div>
<?php
		endif;
	}
?>