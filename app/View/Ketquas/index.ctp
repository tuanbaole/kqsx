<div class="row"><!-- row.1 -->
	<div class="col-md-3"><!-- col-md-4.1 -->
		<div class="row"><!-- row.2 -->

			<div class="col-md-12"><!-- col-md-12.1 -->
				
				<table class="table table-bordered">
					<thead>
						<tr>
							<th colspan="2" class="text-center text-danger">
								<?php echo __('XỔ SỐ MIỀN BẮC NGÀY').' '.$date; ?>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php if (isset($ketqua['Ketqua'])): ?>
							<?php foreach ($ketqua['Ketqua'] as $key_ketqua => $value_ketqua): ?>
								<tr <?php echo ($key_ketqua == 'dacbiet')? 'class="danger"' : ''; ?> >
									<td class="text-center">
										<?php echo $key_ketqua; ?>
									</td>
									<td class="text-center">
									<?php if (!in_array($key_ketqua, $check_string)): ?>
										<?php 
											$in_ketqua = implode(' - ', json_decode($value_ketqua)); 
											echo $in_ketqua;
										?>
									<?php else : ?>
										<?php echo $value_ketqua; ?>
									<?php endif ?>
									</td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
			</div><!-- end col-md-12.1 -->

			<div class="col-md-12"><!-- col-md-12.2 -->
				<table class="table table-bordered">
					<thead><tr><th class="text-center" colspan="9"><?php echo __('Lô tô trực tiếp'); ?></th></tr></thead>
					<tbody>
						<?php if (!empty($lotos)): ?>
							<?php $i = 0; ?>
							<?php foreach ($lotos as $key_loto => $value_loto): ?>
								<?php if ($i%9 == 0): ?>
									<tr class="text-center">
								<?php endif ?>
									<td <?php echo ($value_loto['Loto']['dacbiet'] == 1) ? 'class="danger text-center"' : 'class="text-center"'; ?> >
										<?php echo $this->MyHtml->conver_number($value_loto['Loto']['loto']); ?>
									</td>
								<?php if ($i%9 == 8): ?>
									</tr>
								<?php endif ?>
								<?php $i++; ?>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
			</div><!-- end col-md-12.2 -->

			<div class="col-md-12"><!-- col-md-12.3 -->
				<div class="row">
					<div class="col-md-6"><!-- col-md-6.1 -->
						<table class="table table-bordered">
							<thead>
								<tr>
									<th class="text-center" style="padding:3px;"><?php echo __('Đầu'); ?></th>
									<th class="text-center" style="padding:3px;"><?php echo __('Loto'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($loto_daus)): ?>
									<?php foreach ($loto_daus as $key_loto_dau => $value_loto_dau): ?>
										<tr>
											<td class="text-center" style="padding:3px;"><?php echo $key_loto_dau; ?></td>
											<td class="text-center" style="padding:3px;">
												<?php $string_dau = ''; ?>
												<?php foreach ($value_loto_dau as $key_value_loto_dau => $value_value_loto_dau): ?>
													<?php 
														$ht_kq_dau = $this->MyHtml->conver_number($value_value_loto_dau['Loto']['loto']);
														if ($value_value_loto_dau['Loto']['dacbiet'] != 1) 
														{
															$string_dau .= $ht_kq_dau.','; 
														} 
														else 
														{
															$string_dau .= '<span class="text-danger">'.$ht_kq_dau.'</span>'.','; 
														}
													?>
												<?php endforeach ?>
												<?php echo rtrim($string_dau,","); ?>
											</td>
										</tr>
									<?php endforeach ?>
								<?php endif ?>
							</tbody>
						</table>
					</div><!-- end col-md-6.1 -->
					<div class="col-md-6"><!-- col-md-6.2 -->
						<table class="table table-bordered">
							<thead>
								<tr>
									<th class="text-center" style="padding:3px;"><?php echo __('Đuôi'); ?></th>
									<th class="text-center" style="padding:3px;"><?php echo __('Loto'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($loto_dits)): ?>
									<?php foreach ($loto_dits as $key_loto_dit => $value_loto_dit): ?>
										<tr>
											<td class="text-center" style="padding:3px;"><?php echo $key_loto_dit; ?></td>
											<td class="text-center" style="padding:3px;">
												<?php $string_dit = ''; ?>
												<?php foreach ($value_loto_dit as $key_value_loto_dit => $value_value_loto_dit): ?>
													<?php 
														$ht_kq_dit = $this->MyHtml->conver_number($value_value_loto_dit['Loto']['loto']);
														if ($value_value_loto_dit['Loto']['dacbiet'] != 1) 
														{
															$string_dit .= $ht_kq_dit.','; 
														} 
														else 
														{
															$string_dit .= '<span class="text-danger">'.$ht_kq_dit.'</span>'.','; 
														}
													?>
												<?php endforeach ?>
												<?php echo rtrim($string_dit,","); ?>
											</td>
										</tr>
									<?php endforeach ?>
								<?php endif ?>
								
							</tbody>
						</table>
					</div><!-- end col-md-6.2 -->
				</div>
			</div><!-- end col-md-12.3 -->

		</div><!-- end row.2 -->
	</div><!-- end col-md-4.1 -->

	<div class="col-md-9"><!-- col-md-8.1 -->
		<div class="row"><!-- row-3 -->
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<ul class="pagination" style="margin:0px 0px 5px 0px;">
							<li>
								<span style="line-height: 30px;"><?php echo __('Lô'); ?></span>
							</li>
							<li>
							  	<span style="line-height: 30px;" class="col-xs-2">
							  		<input class="form-control input-sm currentcy-input" type="text" name="" value="<?php echo number_format(21700); ?>" id="gia-diem" don-vi="<?php echo 21700; ?>"  step="any" >
								  	
								</span>
							</li>
							<li>
								<span style="line-height: 30px;"><?php echo __('Trúng') ?></span>
							</li>
							<li>
							  	<span style="line-height: 30px;" class="col-xs-2">
								  	<input class="form-control input-sm currentcy-input" type="text" name="" value="<?php echo number_format(80000); ?>"  id="gia-trung" don-vi="<?php echo 80000; ?>" >
								</span>
							</li>
							<li>
								<span style="line-height: 30px;"><?php echo __('Đề') ?></span>
							</li>
							<li>
							  	<span style="line-height: 30px;" class="col-xs-2">
							  		<input class="form-control input-sm" type="text" name="" value="<?php echo 80; ?>" id="gia-trung-de">
								</span>
							</li>
							<li>
								<span style="line-height: 30px;"><?php echo __('Tỷ Giá') ?></span>
							</li>
							<li>
							  	<span style="line-height: 30px;" class="col-xs-2">
							  		<input class="form-control input-sm currentcy-input" type="text" name="" value="<?php echo number_format(1000); ?>" id="ty-gia">
								</span>
							 </li>
						</ul>
					</div>
					<div class="col-md-12" id="bang">
						<?php echo $this->element('bang',array('bangs' => $bangs)); ?>
					</div>
				</div>
			</div>
			<div class="col-md-6"><!-- col-md-6.1 -->
				<div class="input-group">
				    <span class="input-group-addon"><?php echo __('Loto'); ?></span>
				    <input id="loto" type="number" class="form-control" name="loto" placeholder="Loto" max="99" min="0" <?php echo ($this->Session->read('Session.bang') === -1)?' disabled': ''; ?> >
				</div>
				<div class="input-group">
				    <span class="input-group-addon"><?php echo __('Diem'); ?></span>
				    <input id="diem" type="number" class="form-control" name="diem" placeholder="Diem" step="0.1" <?php echo ($this->Session->read('Session.bang') === -1)?' disabled': ''; ?> >
				</div>
				<div id="giaithuong-loto">
					<?php echo $this->element('giaithuong_loto',array('giai_thuong_los' => $giai_thuong_los,'date'=>$date,'ket_qua_id' => $id)); ?>
				</div>
			</div><!-- end col-md-6.1 -->

			<div class="col-md-6"><!-- col-md-6.2 -->
				<div class="input-group">
				    <span class="input-group-addon"><?php echo __('Đề'); ?></span>
				    <input id="de" type="number" class="form-control" name="de" placeholder="Đề" max="99" min="0" <?php echo ($this->Session->read('Session.bang') === -1)?' disabled': ''; ?> >
				</div>
				<div class="input-group">
				    <span class="input-group-addon"><?php echo __('Tiền'); ?></span>
				    <input id="tien_de" type="number" class="form-control" name="tien_de" placeholder="Tiền" step="0.1" <?php echo ($this->Session->read('Session.bang') === -1)?' disabled': ''; ?> >
				</div>
				<div id="giaithuong-de">
					<?php echo $this->element('giaithuong_de',array('giai_thuong_des' => $giai_thuong_des,'date'=>$date,'ket_qua_id' => $id)); ?>
				</div>
			</div><!-- end col-md-6.2 -->

		</div><!-- end row-3 -->
	</div><!-- end col-md-8.1 -->

</div><!-- end row.1 -->
<div class="hidden" id="get-date" date="<?php echo $date; ?>"></div>
<div class="hidden" id="ket-qua-id" don-vi="<?php echo $id; ?>"></div>
<script type="text/javascript" src="/js/ketqua/index.js"></script>
