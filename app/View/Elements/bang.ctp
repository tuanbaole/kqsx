<ul class="pagination pagination-sm" style="margin:0px 0px 5px 0px;" id="pagination-bang" val="<?php echo count($bangs); ?>">
  	<li class="cursor <?php echo ($this->Session->read('Session.bang') === -1)?'active':''; ?>">
  		<?php echo $this->Html->link(__('Tất Cả'), array('controller'=>'ketquas','action'=>'session_bang',-1), array('escape'=>false)); ?>
  	</li>
  	<li id="them-bang"  class="cursor">
  		<?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i>', array('controller'=>'bangs','action'=>'view',$ketqua_id), array('escape'=>false)); ?>
  	</li>
  	<?php foreach ($bangs as $key_bang => $value_bang): ?>
  		<li val="<?php echo $key_bang; ?>" class="don-giaithuong cursor <?php echo $key_bang === $this->Session->read('Session.bang')?'active':''; ?>">
  			<?php echo $this->Html->link($value_bang, array('controller'=>'ketquas','action'=>'session_bang',$key_bang), array('escape'=>false)); ?>
  		</li>
  	<?php endforeach ?>
</ul>
<script type="text/javascript" src="/js/element/bang.js"></script>