<table class="table table-condensed table-hover">
	<thead>
		<tr>
			<th class="text-center"><?php echo __('#'); ?></th>
			<th class="text-center"><?php echo __('Lô'); ?></th>
			<th class="text-center"><?php echo __('Điểm'); ?></th>
			<th class="text-center"><?php echo __('Nháy'); ?></th>
			<th class="text-center"><?php echo __('Trúng'); ?></th>
			<th class="text-center"><?php echo __('Tiền Đánh'); ?></th>
			<th class="text-center"><?php echo __('Tiền Trúng'); ?></th>
			<th class="text-center"><?php echo __('Số Dư'); ?></th>
			<th class="text-center">
				<?php echo $this->Html->link(__('Xóa Hết'), array('controller'=>'giai_thuongs','action'=>'delete_de_all'), array('escape'=>false,'class' => 'delete_de_all_giai_thuong')); ?>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1;$diem=0;$tong_diem_trung=0;$tien_danh=0;$tien_trung=0;$so_du=0; ?>
		<?php foreach ($giai_thuong_des as $key_giai_thuong => $value_giai_thuong): ?>
			<tr class="<?php echo ($value_giai_thuong['Giaithuong']['so_nhay'] == 0)? 'info' : 'danger'; ?>" >
				<td class="text-center" style="padding: 3px!important" ><?php echo $i;$i++; ?></td>
				<td class="text-center" style="padding: 3px!important" ><?php echo  $this->MyHtml->conver_number($value_giai_thuong['Giaithuong']['loto']); ?></td>
				<td class="text-center" style="padding: 3px!important" >
					<?php 
						$diem += $value_giai_thuong['Giaithuong']['diem']; 
						echo $value_giai_thuong['Giaithuong']['diem']; 
					?>
				</td>
				<td class="text-center" style="padding: 3px!important" ><?php echo $value_giai_thuong['Giaithuong']['so_nhay']; ?></td>
				<td class="text-center" style="padding: 3px!important" >
					<?php 
						$tong_diem_trung += $value_giai_thuong['Giaithuong']['tong_diem_trung']; 
						echo $value_giai_thuong['Giaithuong']['tong_diem_trung']; 
					?>
				</td>
				<td class="text-center" style="padding: 3px!important" >
					<?php 
						$tien_danh += $value_giai_thuong['Giaithuong']['tien_danh'];
						echo number_format($value_giai_thuong['Giaithuong']['tien_danh']); 
					?>
				</td>
				<td class="text-center" style="padding: 3px!important" >
					<?php 
						$tien_trung += $value_giai_thuong['Giaithuong']['tien_trung'];
						echo number_format($value_giai_thuong['Giaithuong']['tien_trung']); 
					?>
				</td>
				<td class="text-center" style="padding: 3px!important" >
					<?php 
						$so_du += $value_giai_thuong['Giaithuong']['so_du'];
						echo number_format($value_giai_thuong['Giaithuong']['so_du']); 
					?>
				</td>
				<td class="text-center" style="padding: 3px!important" >
					<i class="glyphicon glyphicon-remove text-danger cursor xoa-de-giai-thuong" gt-id="<?php echo $value_giai_thuong['Giaithuong']['id']; ?>"></i>
				</td>
			</tr>
		<?php endforeach ?>
		<tr class="">
			<td colspan="2"><strong><?php echo __('Tổng'); ?></strong></td>
			<td class="text-center text-danger"><?php echo $diem; ?></td>
			<td></td>
			<td class="text-center text-danger"><?php echo number_format($tong_diem_trung); ?></td>
			<td class="text-center text-danger"><?php echo number_format($tien_danh); ?></td>
			<td class="text-center text-danger"><?php echo number_format($tien_trung); ?></td>
			<td class="text-center text-danger bg-danger"><?php echo number_format($so_du); ?></td>
			<td></td>
		</tr>
	</tbody>
</table>
<div class="hidden" id="get-date" date="<?php echo $date; ?>"></div>
<div class="hidden" id="ket-qua-id" don-vi="<?php echo $ket_qua_id; ?>"></div>
<script type="text/javascript" src="/js/element/giaithuong_de.js"></script>