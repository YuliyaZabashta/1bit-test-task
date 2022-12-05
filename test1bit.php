<?php
/*
Template Name: test1bit
Template Post Type: post, page, product
*/

?>
<?php wp_head()?>
<body>
	<section class="section_menu">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
						<li class="nav-item price-button" role="presentation">
						<a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-personal1" role="tab" aria-controls="pills-home" aria-selected="true">Лиды</a>
						</li>
						<li class="nav-item price-button" role="presentation">
						<a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-abonement1" role="tab" aria-controls="pills-profile" aria-selected="false">Обратная связь</a>
						</li>
					</ul>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-1"></div>
				<div class="col-md-10 price">
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-personal1" role="tabpanel" aria-labelledby="pills-home-tab">
							<h4>Лиды</h4>
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr class="grey">
										<th scope="col">Название</th>
										<th scope="col">Имя</th>
										<th scope="col">Телефон</th>
										<th scope="col">Дата создания</th>
										<th scope="col">Время создания</th>
										</tr>
									</thead>
									<?foreach($lides as $lide):?>
									<?php if($lide['CONTACT_ID'] == 0): ?>
									<tbody>
										<tr>
											<th scope="col"><?=$lide['TITLE']?></th>
											<th scope="col"><?=$lide['NAME']?></th>
											<th scope="col"><?= phone_format($lide['PHONE'][0]['VALUE']);?></th>
											<th scope="col"><?=$new_date_format = date('m.d.Y', strtotime($lide['DATE_CREATE']));?></th>
											<th scope="col"><?=$new_date_format = date('H:i', strtotime($lide['DATE_CREATE']));?></th>
									<?php endif;?>
										<?foreach($contacts_lid as $contact_lid):?>
										<?php if($lide['CONTACT_ID'] == $contact_lid['ID']):?>
											<th scope="col"><?=$lide['TITLE']?></th>
											<th scope="col"><?=$contact_lid['NAME']?></th>
											<th scope="col"><?php if($lide['PHONE']):?><?= phone_format($lide['PHONE'][0]['VALUE']);?><?php elseif($contact_lid['PHONE']):?><?= phone_format($contact_lid['PHONE'][0]['VALUE']);?><?php else:?><?="Поле не заполнено"?><?php endif;?></th>
											<th scope="col"><?=$new_date_format = date('m.d.Y', strtotime($lide['DATE_CREATE']));?></th>
											<th scope="col"><?=$new_date_format = date('H:i', strtotime($lide['DATE_CREATE']));?></th>
										<?php endif;?>
										<?php endforeach?>		
										</tr>
									</tbody>
									<?php endforeach?>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-abonement1" role="tabpanel" aria-labelledby="pills-profile-tab">
							<a href="https://b24-mp0onw.bitrix24.site/crm_form_l4vvn/"  target="_blank" style="width: 30%; margin-bottom: 16px;" class="btn myform-btn btn-primary" type="submit">Дать обратную связь</a>
							<script data-b24-form="inline/1/7v3gfr" data-skip-moving="true">
							(function(w,d,u){
							var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
							var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
							})(window,document,'https://cdn-ru.bitrix24.ru/b23721798/crm/form/loader_1.js');
							</script>
						</div>
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</section>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
