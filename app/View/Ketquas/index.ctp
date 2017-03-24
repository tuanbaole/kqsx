<div class="row"><!-- row.1 -->
	<div class="col-md-4"><!-- col-md-4.1 -->
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
									<td <?php echo ($value_loto['Loto']['dacbiet'] == 1) ? 'class="danger text-center"' : 'class="text-center"'; ?> ><?php echo $value_loto['Loto']['loto']; ?></td>
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
									<th class="text-center"><?php echo __('Đầu'); ?></th>
									<th class="text-center"><?php echo __('Loto'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($loto_daus)): ?>
									<?php foreach ($loto_daus as $key_loto_dau => $value_loto_dau): ?>
										<tr>
											<td class="text-center"><?php echo $key_loto_dau; ?></td>
											<td class="text-center">
												<?php $string_dau = ''; ?>
												<?php foreach ($value_loto_dau as $key_value_loto_dau => $value_value_loto_dau): ?>
													<?php 
														if ($value_value_loto_dau['Loto']['dacbiet'] != 1) {
															$string_dau .= $value_value_loto_dau['Loto']['loto'].','; 
														} else {
															$string_dau .= '<span class="text-danger">'.$value_value_loto_dau['Loto']['loto'].'</span>'.','; 
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
									<th class="text-center"><?php echo __('Đuôi'); ?></th>
									<th class="text-center"><?php echo __('Loto'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($loto_dits)): ?>
									<?php foreach ($loto_dits as $key_loto_dit => $value_loto_dit): ?>
										<tr>
											<td class="text-center"><?php echo $key_loto_dit; ?></td>
											<td class="text-center">
												<?php $string_dit = ''; ?>
												<?php foreach ($value_loto_dit as $key_value_loto_dit => $value_value_loto_dit): ?>
													<?php 
														if ($value_value_loto_dit['Loto']['dacbiet'] != 1) {
															$string_dit .= $value_value_loto_dit['Loto']['loto'].','; 
														} else {
															$string_dit .= '<span class="text-danger">'.$value_value_loto_dit['Loto']['loto'].'</span>'.','; 
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

	<div class="col-md-2"><!-- col-md-2.1 -->
		<div class="input-group">
		    <span class="input-group-addon"><?php echo __('Loto'); ?></span>
		    <input id="loto" type="number" class="form-control" name="loto" placeholder="Loto" max="99" min="0">
		</div>
		<div class="input-group">
		    <span class="input-group-addon"><?php echo __('Diem'); ?></span>
		    <input id="diem" type="number" class="form-control" name="number" placeholder="Diem" step="0.1">
		</div>
	</div><!-- end col-md-2.1 -->

	<div class="col-md-6" id="bang-ket-qua"><!-- col-md-6.3 -->
	</div><!-- end col-md-6.3 -->

</div><!-- end row.1 -->
<script type="text/javascript" src="/js/ketqua/index.js"></script>